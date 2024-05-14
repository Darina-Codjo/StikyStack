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

		function afficher_profil(){
			if(isset($_SESSION['email'])){
				$email = $_SESSION['email'];
				$prepare = self::$bdd->prepare("SELECT idUser,firstName,lastName,birthDate,email,creationDate FROM user where email = ?;");
				$prepare->execute(array($email));
				return $prepare->fetch(PDO::FETCH_ASSOC);
			}
		}


		function error404(){
            require_once('404NotFoundPage.php');
        }

	}
?>
