<?php

include_once 'cont_compFooter_accueil.php';

class ComposantFooterAccueil{

	private $controleur;

	public function __construct(){
		$this->controleur=new ControleurFooterAccueil();
	}

	function afficherFooter(){
		echo $this->controleur->getVue()->getVueFooterAccueil();
	}
}