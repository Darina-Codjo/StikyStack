<?php

class VueFooterAccueil {

	private $vueFooter;
	
	public function __construct(){

		$this->vueFooter=self::afficherFooterAccueil();
	}

	public function getVueFooterAccueil(){
		return $this->vueFooter;
	}

	public function afficherFooterAccueil() { ?>
		<footer style="background-color: rgb(249, 176, 172)">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h1 class="text-capitalize font-weight-light p-3 " style="background-color: rgb(249, 176, 172)"></h1>
				</div>
			</div>
			<p class="text-center">Copyright - All write reserved to © Stiky'Stack Inc 2024</p>
		</div>
	</footer>
		

		
	<?php

	}

}
?>