<?php

class VueNav {

	private $vueNav;
	
	public function __construct(){

		$this->vueNav=self::afficherNav();
	}

	public function getVueNav(){
		return $this->vueNav;
	}

	public function afficherNav() { 
        ?>
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgb(37,42,55);">
                <?php
                if(isset($_SESSION['nomUtilisateur'])){
                    ?>                        
                    <ul class="navbar-nav ml-md-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=profil&action=afficher_profil">Mon Compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=connexion&action=deconnexion">Déconnexion</a>
                        </li>
                    </ul>
                    <?php
                }
                else{
                    ?>                        
                    <ul class="navbar-nav ml-md-auto" style="margin-right: 20px;">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=connexion&action=form_inscription">S'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=connexion&action=form_connexion"><NOBR>Se connecter</NOBR></a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
        </nav>
	<?php
	}
}
?>