<?php 

include_once 'modele_compFooter.php';
include_once 'vue_compFooter.php';

class ControleurFooter {

	private $modele;
	private $vue;

	public function __construct(){

		$this->vue = new VueFooter();
		$this->modele = new ModeleFooter();
	}

	public function afficherFooter() {
		$this->vue->afficherFooter();
	}

	function getVue(){
		return $this->vue;
	}

}