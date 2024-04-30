<?php 

include_once 'modele_compFooter_accueil.php';
include_once 'vue_compFooter_accueil.php';

class ControleurFooterAccueil {

	private $modele;
	private $vue;

	public function __construct(){

		$this->vue = new VueFooterAccueil();
		$this->modele = new ModeleFooterAccueil();
	}

	public function afficherFooterAccueil() {
		$this->vue->afficherFooterAccueil();
	}

	function getVue(){
		return $this->vue;
	}

}