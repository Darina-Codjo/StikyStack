<?php
if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
?>

<?php
	include_once'vue_generique.php';
	
	class VuePostit extends VueGenerique {

		public function __construct() {
			parent::__construct();
		}

		function postit_page(){?>
			<!-- <! -- HTML -->  -->
			
            <?php

		}
		function error404($error){
			echo $error;
		}
	}
?>

