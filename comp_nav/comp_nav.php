<?php

include_once 'cont_compNav.php';

class ComposantNav {

	private $controleur;

	public function __construct(){
		$this->controleur=new ControleurNav();
	}

	function afficherNav(){
		echo $this->controleur->getVue()->getVueNav();
	}
}