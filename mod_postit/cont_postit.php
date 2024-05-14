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
			$postitInfo = $this->modele->afficher_postit();
			if(isset($postitInfo)){
				$_SESSION['idNote'] = $postitInfo['idNote'];
				$_SESSION['title'] = $postitInfo['title'];
				$_SESSION['content'] = $postitInfo['lastName'];
				$_SESSION['noteCreationDate'] = $postitInfo['noteCreationDate'];
				$_SESSION['updateDate'] = $postitInfo['updateDate'];
			}
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