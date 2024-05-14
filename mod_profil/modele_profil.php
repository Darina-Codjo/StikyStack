<?php
if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
?>

<?php
	include_once'connexionDB.php';
	include_once'./css/404NotFound_style.css';

	class ModeleProfil extends Connexion{

		public function __construct() {

		}

		function error404(){
            require_once('404NotFoundPage.php');
        }

	}
?>
