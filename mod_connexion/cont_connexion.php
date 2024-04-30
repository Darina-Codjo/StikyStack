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

		function form_connexion(){
			$this->vue->form_connexion();
		}

		function connexion(){
			$tab=$this->modele->connexion();
			$isPasswordCorrect=password_verify($_POST['password'],$tab['password']);

	        if($isPasswordCorrect){
	        		$_SESSION['nomUtilisateur']=$tab['nomUtilisateur'];
					$_SESSION['password']=$tab['password'];
                    $_SESSION['email']=$tab['email'];
                    $_SESSION['role']=$tab['role'];
                    header('Location:index.php');
			}	
			else {
                echo "<p class=\"text-center mt-3\"><strong>Mauvais identifiant ou mot de passe !</strong></p>";
                $this->vue->form_connexion();
            }
		}

		function form_inscription(){
			$this->vue->form_inscription();
		}

		function inscription(){
			$this->modele->inscription($this->recupererIdMdpEmail());
            header('Location:index.php');
		}

		function recupererIdMdpEmail(){

			$identifiant=$_POST['nomUtilisateur'];
			$pass_hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
			$email=$_POST['email'];

			$tab=array("nomUtilisateur"=>$identifiant, "password" =>$pass_hash,"email"=>$email);
			return $tab;
		}

		function deconnexion(){
			$this->modele->deconnexion();
		}

		function erreur404(){
			$error = $this->modele->erreur404();
			$this->vue->erreur404($error);
		}
		function getVue(){
			return $this->vue;
	    }
	}
?>