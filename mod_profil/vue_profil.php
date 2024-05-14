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

		function profil_page(){?>
			<div class="container" >
				<div class="card" class="col-lg-8 me-auto mx-auto" style="margin-top: 100px; background-color: #252a37; padding: 50px; text-align: center; color: white; border-radius: 30px;">
					<!-- <div class="pp">
						<div class="circle"><img src="./images/ajoutez_pp.png" id="photo" ></div>
					</div>
					<div class="upload">
						<input type="file" id="file">
					</div> -->
					<div class="info ">
						<div class="description_profil ms-5" style="text-align: center;">
							<h2>My Account</h2>
							<p> Firstname : <?php echo $_SESSION['firstName']; ?></p>
							<p> Firstname : <?php echo $_SESSION['lastName']; ?></p>
							<p> BirthDate : <?php echo $_SESSION['birthDate'];?></p>
							<p> E-mail : <?php echo $_SESSION['email']; ?></p>
							<br>
						</div>
					</div>
				</div>
			</div>
			<?php

		}
		function error404($error){
			echo $error;
		}
	}
?>

