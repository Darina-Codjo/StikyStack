<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>

<?php

    include_once'connexion.php';
    include_once'vue_connexion.php';

	class ModeleConnexion extends Connexion{
        private $vue;

        public function __construct(){
            $this->vue = new VueConnexion();
        }

        function inscription($tab){

            $id=$tab['nomUtilisateur'];
            $password=$tab['password'];
            $email=$tab['email'];
            $role=0;



            if(strlen($id) <= 255 && strlen($password) <= 255 && filter_var($email, FILTER_VALIDATE_EMAIL) != false ) {

                $requete=self::$bdd->prepare("SELECT nomUtilisateur FROM membre where nomUtilisateur=? ;");
                $requete->execute(array($id));

                if(!empty($requete->fetch())){
                    echo "<p class=\"text-center mt-3\"><strong>Cet utilisateur existe déjà</strong></p>";
                    $this->vue->form_inscription();
                }
                else{
                    //Insertion
                    $req=self::$bdd->prepare("INSERT INTO membre(nomUtilisateur,password,email,role) VALUES(?,?,?,?); ");
                    $req->execute(array($id,$password,$email,$role));
                }
            }
            else {
                echo "<p class=\"text-center mt-3\"><strong>Pseudo trop grand ou de mot de passe incorrecte ou email invalide</strong></p>";
                $this->vue->form_inscription();
            }
        }

        function connexion(){
            $nomUtilisateur = $_POST['nomUtilisateur'];

            try {
                $selectprep = self::$bdd->prepare("SELECT nomUtilisateur,password,email,role FROM membre WHERE nomUtilisateur=?;");
                $selectprep->execute(array($nomUtilisateur));
                $resultat = $selectprep->fetch();
                return $resultat;
            } catch (PDOexception $e) {
                echo $e->getMessage() . $e->getCode();
            }
        }

        function deconnexion(){
            $_SESSION = array();
            session_destroy();
            header('Location:index.php');
        }

        function erreur404(){
            $error = self::$bdd->prepare("SELECT contenu FROM page WHERE titre_page = 'erreur404';");
            $error->execute();
            $error = $error->fetch()['contenu'];
            return $error;
        }
    }
?>