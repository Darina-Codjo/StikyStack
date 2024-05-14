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
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgb(184, 184, 184)";>
            <a href="index.php" class="navbar-brand px-50">
                <img src="./images/logo.png" alt="logo" style="width: 80px; height: 80px";/>
            </a>
                <?php
                //<!-- connection_status -->
                if(isset($_SESSION['email'])){
                    ?>                        
                    <ul class="navbar-nav ml-md-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=postit&action=postit_page">My Post'it</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=profil&action=profil_page">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=connexion&action=logOut">Sing Out</a>
                        </li>
                    </ul>
                    <?php
                }
                else{
                    ?>                        
                    <ul class="navbar-nav ml-md-auto" style="margin-right: 20px;">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=connexion&action=form_inscription">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=connexion&action=form_connexion"><NOBR>Log In</NOBR></a>
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