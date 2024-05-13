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

				case "form_logIn":
					$this->controleur->form_logIn();
					break;

				case "connexion":
					if(isset($_SESSION['passwrd'])){

						switch (connection_status()){
							case CONNECTION_NORMAL:
								$txt = 'Connection is in a normal state';
								break;
								
							case CONNECTION_ABORTED:
								$txt = 'Connection aborted';
								break;
							case CONNECTION_TIMEOUT:
								$txt = 'Connection timed out';
								break;
							case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
								$txt = 'Connection aborted and timed out';
								break;
							default:
								$txt = 'Unknown';
								break;
						}
						echo $txt;

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
				
				case "form_signIn":
					$this->controleur->form_signIn();
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