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
				<form action="index.php?module=connexion&action=connexion" method="post" class="col-lg-8 me-auto mx-auto" style="margin-top: 100px; background-color: rgb(109,109,109); padding: 50px; text-align: center; color: white; border-radius: 30px;">					    
					<h2>Log In</h2>
					<br>
					<div class="col-lg-8 me-auto mx-auto">
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="E-mail">
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
					<form action="index.php?module=connexion&action=inscription" method="post" class="col-lg-8 me-auto mx-auto" style="margin-top: 100px; background-color: rgb(109,109,109); padding: 50px; text-align: center; color: white; border-radius: 30px;">
			    		<h2>Sign Up</h2>
			    		<br>
			    		<div class="col-lg-8 me-auto mx-auto">
							<div class="form-group">
					            <input type="text" name="firstName" class="form-control" placeholder="Firstname">
								<div id="errorFirstName" class="error-messages" style="color: red;"></div>
					        </div>
							<div class="form-group">
					            <input type="text" name="lastName" class="form-control" placeholder="Lastname">
								<div id="errorLastName" class="error-messages" style="color: red;"></div>
							</div>
							<div class="form-group">
					            <input type="text" name="birthDate" class="form-control" placeholder="BirthDate">
								<div id="errorBirthDate" class="error-messages" style="color: red;"></div>
							</div>
							<div class="form-group">
					            <input type="text" name="email" class="form-control" placeholder="E-mail">
								<div id="errorEmail" class="error-messages" style="color: red;"></div>
								
					        </div>
				          	<div class="form-group">
				             	<input type="text" name="passwrd" class="form-control" placeholder="Password">
								<div id="errorPasswrd" class="error-messages" style="color: red;"></div>
				         	</div>
							 <div class="form-group">
				             	<input type="text" name="passwrd_confirm" class="form-control" placeholder="Confirm password">
								<div id="errorPasswrd_confirm" class="error-messages" style="color: red;"></div>
				         	</div>
							 <div id="errorMessages" style="color: red;">
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
			<br>
	    	<br>
	    	<br>
	    	<br>
			<?php
		}

		function error404($error){
			echo $error;
		}
	}
?>
