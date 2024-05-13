<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>

<?php

    if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');

	include_once'vue_connexion.php';
	include_once'modele_connexion.php';

	class ContConnexion{
		private $modele;
		private $vue;

		function __construct(){
			$this->vue = new VueConnexion();
			$this->modele = new ModeleConnexion();
		}

		function form_logIn(){
			$this->vue->form_logIn();
		}

		function connexion(){
			$tab=$this->modele->connexion();
			$isPasswordCorrect=password_verify($_POST['passwrd'],$tab['passwrd']);

	        if($isPasswordCorrect){
				$_SESSION['firstName']=$tab['firstName'];
				$_SESSION['lastName']=$tab['lastName'];
				$_SESSION['userName']=$tab['userName'];
				$_SESSION['passwrd']=$tab['passwrd'];
				header('Location:index.php');
			}	
			else {
                echo "<p class=\"text-center mt-3\"><strong>Mauvais identifiant ou mot de passe !</strong></p>";
                $this->vue->form_logIn();
            }
		}

		function form_signIn(){
			$this->vue->form_signIn();
		}

		function inscription(){
			$this->modele->inscription($this->recupererIdMdpPseudo());
            header('Location:index.php');
		}

		function recupererIdMdpPseudo(){
			$firstName=$_POST['firstName'];
			$lastName=$_POST['lastName'];
			$userName=$_POST['userName'];
			$pass_hash=password_hash($_POST['passwrd'],PASSWORD_DEFAULT);

			$tab=array('firstName'=>$firstName,'lastName'=>$lastName,'userName'=>$userName,'passwrd'=>$pass_hash);
			return $tab;
		}

		function logOut(){
			$this->modele->logOut();
		}

		function error404(){
			$error = $this->modele->error404();
			$this->vue->error404($error);
		}
		function getVue(){
			return $this->vue;
	    }
	}
?>