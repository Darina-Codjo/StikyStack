<?php 

	include_once 'modele_compNav.php';
	include_once 'vue_compNav.php';

	class ControleurNav {

		private $modele;
		private $vue;

		public function __construct(){

			$this->vue = new VueNav();
			$this->modele = new ModeleNav();
		}

		public function afficherNav() {
			$this->vue->afficherNav();
		}

		function getVue(){
			return $this->vue;
		}
	}
?>