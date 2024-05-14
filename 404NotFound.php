<?php
if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
?>

<?php
	include_once'vue_generique.php';
	
	class VueProfil extends VueGenerique {

		public function __construct() {
			parent::__construct();
		}

		function profil_page(){ 
            ?>
            <div class="container" >
                <h1 class="neg title">
                    <span class="bg">Error - 404</span>
                </h1>
                <p>An error has occured, to continue:</p>
                <p> * Return to our homepage.<br /> * Retry later.</p>
            </div>
            <?php
        }
    }
?>