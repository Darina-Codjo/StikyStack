<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

	include_once 'cont_profil.php';

	class ModProfil {

		private $controleur;

		public function __construct(){

			$this->controleur=new ContProfil();

			if(isset($_GET["action"])){
				$action=$_GET["action"];							
			}
			else {
				$action="default";
			}

			switch($action){
                case "afficher_profil":
                    $this->controleur->afficher_profil();
                    break;

				default:
					$this->controleur->erreur404(); 
					break;
			}
		}
		function getControleur(){
        	return $this->controleur;
    	}
	}
?>