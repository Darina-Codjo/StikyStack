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
            $birthDate=$tab['birthDate'];
            $email=$tab['email'];
            $passwrd=$tab['passwrd'];

            if(strlen($email) <= 255 && strlen($firstName) <= 255 && strlen($lastName) <= 255 && strlen($passwrd) <= 255) {
                
                $requete=self::$bdd->prepare("SELECT email FROM user where email=? ;");
                $requete->execute(array($email));

                if(!empty($requete->fetch())){
                    echo "<p class=\"text-center mt-3\"><strong>This user already exists</strong></p>";
                    $this->vue->form_inscription();
                }
                else{
                    //Insertion
                    $req=self::$bdd->prepare("INSERT INTO user(firstName,lastName,birthDate,email,passwrd) VALUES(?,?,?,?,?);");
                    $req->execute(array($firstName,$lastName,$birthDate,$email,$passwrd));
                    
                }
            }
            else {
                echo "<p class=\"text-center mt-3\"><strong>User name too long <strong></p>";
                $this->vue->form_inscription();
            }
        }

        function connexion(){
            $email = $_POST['email'];
            //echo $_POST['email'];
            try {
                $selectprep = self::$bdd->prepare("SELECT email, passwrd FROM user WHERE email=?;");
                //echo "SELECT email, passwrd FROM user WHERE email=?;";
                $selectprep->execute(array($email));
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