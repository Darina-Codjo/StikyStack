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
		<footer style="background-color:rgb(37,42,55);">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h1 class="text-capitalize font-weight-light p-3 " style="color: rgb(244,213,41);"> Suivez-nous!</h1>
				</div>
			</div>
			<p class="text-center">Copyright - Tous droits réservé à </p>
		</div>
	</footer>
		

		
	<?php

	}

}
?>