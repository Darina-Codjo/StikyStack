<?php 

include_once 'modele_compHeader_accueil.php';
include_once 'vue_compHeader_accueil.php';

class ControleurHeaderAccueil {

	private $modele;
	private $vue;

	public function __construct(){

		$this->vue = new VueHeaderAccueil();
		$this->modele = new ModeleHeaderAccueil();
	}

	public function afficherNav() {
		$this->vue->afficherNav();
	}

	function getVue(){
		return $this->vue;
	}

}