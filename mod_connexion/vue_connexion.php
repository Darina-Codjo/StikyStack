<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>

<?php

	
	include_once'vue_generique.php';
	
	class VueConnexion extends VueGenerique {

		public function __construct() {
            parent::__construct();
		}

		function form_connexion(){
			?>
            <div class="container">
                <div class="row">
				<form action="index.php?module=connexion&action=inscription" method="post" class="col-lg-8 me-auto mx-auto" style="margin-top: 100px; background-color: rgb(249, 176, 172); padding: 50px; text-align: center; color: white; border-radius: 30px;">					    <h2>Log In</h2>
			    		<br>
			    		<div class="col-lg-8 me-auto mx-auto">
					        <div class="form-group">
					            <input type="text" name="userName" class="form-control" placeholder="Pseudo">
					        </div>
					        <br>
				          	<div class="form-group">
				             	<input type="password" name="passwrd" class="form-control" placeholder="Password">
				         	</div>
				         	<br>
				          	<button type="submit" class="btn btn-black" style="background-color: #f4d529;color: #252a37; border: solid;">Login</button>
				          	<br>
				          </div>
    				</form>
			    </div>
			</div>
			<br>
        	<br>
        	<br>
        	<br>
			<?php
		}

		function form_inscription(){
			?>
			<div class="container">
				<div class="row">
					<form action="index.php?module=connexion&action=inscription" method="post" class="col-lg-8 me-auto mx-auto" style="margin-top: 100px; background-color: rgb(249, 176, 172); padding: 50px; text-align: center; color: white; border-radius: 30px;">
			    		<h2>Sign Up</h2>
			    		<br>
			    		<div class="col-lg-8 me-auto mx-auto">
							<div class="form-group">
					            <input type="text" name="firstName" class="form-control" placeholder="Firstname">
					        </div>
							<div class="form-group">
					            <input type="text" name="lastName" class="form-control" placeholder="Lastname">
							</div>
							<div class="form-group">
					            <input type="text" name="userName" class="form-control" placeholder="Pseudo">
					        </div>
				          	<div class="form-group">
				             	<input type="password" name="passwrd" class="form-control" placeholder="Password">
				         	</div>
				         	<br>
				          	<button type="submit" class="btn btn-black" style="background-color: #f4d529;color: #252a37; border: solid;">Sign in</button>
				          	<br>
			    		</div>
					</form>
			    </div>
			</div>
			<br>
	    	<br>
	    	<br>
	    	<br>
			<?php
		}

		function erreur404($error){
			echo $error;
		}
	}
?>