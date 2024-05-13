<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>

<?php

    include_once'connexionDB.php';
    include_once'vue_connexion.php';

	class ModeleConnexion extends Connexion{
        private $vue;

        public function __construct(){
            $this->vue = new VueConnexion();
        }

        function inscription($tab){
            
            $firstName=$tab['firstName'];
            $lastName=$tab['lastName'];
            $userName=$tab['userName'];
            $passwrd=$tab['passwrd'];

            if(strlen($userName) <= 255 && strlen($firstName) <= 255 && strlen($lastName) <= 255 && strlen($passwrd) <= 255) {
                $requete=self::$bdd->prepare("SELECT userName FROM user where userName=? ;");
                $requete->execute(array($userName));

                if(!empty($requete->fetch())){
                    echo "<p class=\"text-center mt-3\"><strong>This user already exists</strong></p>";
                    $this->vue->form_signIn();
                }
                else{
                    //Insertion
                    echo("INSERT");
                    $req=self::$bdd->prepare("INSERT INTO user(firstName,lastName,userName,passwrd) VALUES(?,?,?,?);");
                    $req->execute(array($firstName,$lastName,$userName,$passwrd));
                    
                }
            }
            else {
                echo "<p class=\"text-center mt-3\"><strong>User name too long <strong></p>";
                $this->vue->form_signIn();
            }
        }

        function connexion(){
            $userName = $_POST['userName'];
            try {
                $selectprep = self::$bdd->prepare("SELECT userName, passwrd FROM user WHERE userName=?;");
                $selectprep->execute(array($userName));
                $resultat = $selectprep->fetch();
                return $resultat;
            } catch (PDOexception $e) {
                echo $e->getMessage() . $e->getCode();
            }
        }

        function logOut(){
            $_SESSION = array();
            session_destroy();
            header('Location:index.php');
        }

        function error404(){
            require_once('404NotFoundPage.php');
        }
    }
?>