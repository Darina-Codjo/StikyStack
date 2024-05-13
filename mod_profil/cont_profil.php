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

        function afficher_profil(){
            $this->vue->afficher_profil();
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