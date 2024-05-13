<?php
if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
?>

<?php
	include_once'connexionDB.php';

	class ModeleProfil extends Connexion{

		public function __construct() {

		}

		function erreur404(){
            require_once('404NotFoundPage.php');
        }

	}
?>
