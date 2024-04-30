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
					<form action="index.php?module=connexion&action=connexion" method="post"  class="col-lg-8 me-auto mx-auto" style="margin-top: 100px; background-color: #252a37; padding: 50px; text-align: center; color: white; border-radius: 30px;">
					    <h2>Connectez-vous !</h2>
			    		<br>
			    		<div class="col-lg-8 me-auto mx-auto">
					        <div class="form-group">
					            <label>Nom d'utilisateur</label>
					            <input type="text" name="nomUtilisateur" class="form-control" placeholder="Pseudo">
					        </div>
					        <br>
				          	<div class="form-group">
				             	<label>Mot de passe</label>
				             	<input type="password" name="password" class="form-control" placeholder="Mot de passe">
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
					<form action="index.php?module=connexion&action=inscription" method="post" class="col-lg-8 me-auto mx-auto" style="margin-top: 100px; background-color: #252a37; padding: 50px; text-align: center; color: white; border-radius: 30px;">
			    		<h2>Inscrivez-vous !</h2>
			    		<br>
			    		<div class="col-lg-8 me-auto mx-auto">
					        <div class="form-group">
					            <label>Nom d'utilisateur</label>
					            <input type="text" name="nomUtilisateur" class="form-control" placeholder="Pseudo">
					        </div>
					        <br>
					        <div class="form-group">
					        	<label>Adresse Mail</label>
					        	<input type="email" name="email" class="form-control" placeholder="E-mail">
					        </div>
					        <br>
				          	<div class="form-group">
				             	<label>Mot de passe</label>
				             	<input type="password" name="password" class="form-control" placeholder="Mot de passe">
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