<?php

include_once 'cont_compFooter.php';

class ComposantFooter{

	private $controleur;

	public function __construct(){
		$this->controleur=new ControleurFooter();
	}

	function afficherFooter(){
		echo $this->controleur->getVue()->getVueFooter();
	}
}