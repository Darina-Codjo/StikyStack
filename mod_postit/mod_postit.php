<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

	include_once 'cont_postit.php';

	class ModPostit {

		private $controleur;

		public function __construct(){

			$this->controleur=new ContPostit();

			if(isset($_GET["action"])){
				$action=$_GET["action"];							
			}
			else {
				$action="default";
			}

			switch($action){
                case "postit_page":
                    $this->controleur->postit_page();
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