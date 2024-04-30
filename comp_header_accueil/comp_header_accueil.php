<?php

include_once 'cont_compHeader_accueil.php';

class ComposantHeaderAccueil{

	private $controleur;

	public function __construct(){
		$this->controleur=new ControleurHeaderAccueil();
	}

	function afficherNav(){
		echo $this->controleur->getVue()->getVueHeaderAccueil();
	}
}