<?php
if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
?>

<?php
	include_once'connexionDB.php';
	include_once'./css/404NotFound_style.css';

	class ModelePostit extends Connexion{

		public function __construct() {

		}
		
		function displayAllPostit(){
			$prepare = self::$bdd->prepare("SELECT  FROM note;");
			$prepare-> execute();
			return $prepare->fetchAll();
		}

		function error404(){
            require_once('404NotFoundPage.php');
        }

	}
?>
