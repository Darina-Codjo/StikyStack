<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>

<?php
	include_once'vue_profil.php';
	include_once'modele_profil.php';

	class ContProfil {

		private $modele;
		private $vue;

		function __construct(){
			$this->vue = new VueProfil();
			$this->modele = new ModeleProfil();
		}

        function profil_page(){
			$userInfo = $this->modele->afficher_profil();
			$_SESSION['idUser'] = $userInfo['idUser'];
			$_SESSION['firstName'] = $userInfo['firstName'];
			$_SESSION['lastName'] = $userInfo['lastName'];
			$_SESSION['birthDate'] = $userInfo['birthDate'];
			$_SESSION['creationDate'] = $userInfo['creationDate'];
            $this->vue->profil_page();
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