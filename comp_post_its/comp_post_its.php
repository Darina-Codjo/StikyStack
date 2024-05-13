<?php

include_once 'cont_compPost.php';

class ComposantPostIts{

	private $controleur;

	public function __construct(){
		$this->controleur=new ControleurPostIts();
	}

	function afficherPost(){
		echo $this->controleur->getVue()->getVuePostIts();
	}
}