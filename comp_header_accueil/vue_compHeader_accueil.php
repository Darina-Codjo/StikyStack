<?php

class VueHeaderAccueil {

    private $vueHeader;

    public function __construct(){

        $this->vueHeader=self::afficherNav();
    }

    public function getVueHeaderAccueil(){
        return $this->vueHeader;
    }

    public function afficherNav() { ?>
        <div class="banner">
            <div class="baniere-top">
                <img src="../StikyStack/images/home_banner.png" class="img-fluid" alt="Responsive image">
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-light bg-light" >
            <?php
            if(isset($_SESSION['userName'])){
                echo "CONECTEEEEEEE";
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-sm-0" style="margin-right: 10px;">
                    
                </ul>
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?module=postit">Post'it</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?module=profil&action=profil_page">My account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?module=connexion&action=logOut">Log Out</a>
                    </li>
                </ul>
                <?php
            }
            else{
                ?>
                <ul class="navbar-nav ml-md-auto" style="margin-right: 10px;">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?module=connexion&action=form_signIn">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?module=connexion&action=form_logIn"><NOBR>Log In</NOBR></a>
                    </li>
                </ul>
                <?php
            }
            ?>
        </nav>
        <br>
        <br>
        <br>

        <?php

    }

}
?>