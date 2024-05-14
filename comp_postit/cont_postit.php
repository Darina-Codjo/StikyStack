<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>

<?php
	include_once'vue_postit.php';
	include_once'modele_postit.php';

	class ContPostit {

		private $modele;
		private $vue;

		function __construct(){
			$this->vue = new VuePostit();
			$this->modele = new ModelePostit();
		}

        function postit_page(){
            $this->vue->postit_page();
        }

		function error404(){
			$error = $this->modele->error404();
			$this->vue->error404($error);
		}
		
		function getVue(){
            return $this->vue;
        }
	}
?>