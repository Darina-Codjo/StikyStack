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