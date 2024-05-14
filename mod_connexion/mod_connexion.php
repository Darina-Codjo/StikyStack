<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>

<?php

	include_once'cont_connexion.php';

	class ModConnexion{

		private $controleur;

		public function __construct(){

			$this->controleur=new ContConnexion();

			if(isset($_GET["action"])){
				$action=$_GET["action"];				
			}
			else{
				$action="default";
			}

			switch($action){

				case "form_connexion":
					$this->controleur->form_connexion();
					break;

				case "connexion":
					if(isset($_SESSION['email'])){
						//<!-- connection_status -->

						echo "Vous etes déjà connecté";
                        header('Location:index.php');
					}
					else{
						$this->controleur->connexion();
					}
					break;
				
				case "logOut":
					$this->controleur->logOut();
					break;
				
				case "form_inscription":
					$this->controleur->form_inscription();
					break;

				case "inscription":
					$this->controleur->inscription();
					break;

				default:
					$this->controleur->error404(); 
					break;
			}
		}

		function getControleur(){
			return $this->controleur;
		}
	}
?>