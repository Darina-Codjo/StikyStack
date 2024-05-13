<?php 

include_once 'modele_compPost.php';
include_once 'vue_compPost.php';

class ControleurPostIts{

	private $modele;
	private $vue;

	public function __construct(){

		$this->vue = new VuePostIts();
		$this->modele = new ModelePostIts();
	}

	public function afficherPost() {
		$this->vue->afficherPost();
	}

	function getVue(){
		return $this->vue;
	}

}