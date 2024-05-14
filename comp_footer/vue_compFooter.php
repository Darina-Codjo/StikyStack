<?php

class VueFooter {

	private $vueFooter;
	
	public function __construct(){

		$this->vueFooter=self::afficherFooter();
	}

	public function getVueFooter(){
		return $this->vueFooter;
	}

	public function afficherFooter() { 
		?>
		<footer style="background-color: rgb(184, 184, 184)">
			<div class="container">
				<p class="text-center">Copyright - All write reserved to © Stiky'Stack Inc. 2024</p>
			</div>
		</footer>
		<?php
	}

}
?>