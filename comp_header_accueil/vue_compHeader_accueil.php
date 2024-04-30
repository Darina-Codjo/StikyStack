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
                
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-light bg-light" >
            <?php
            if(isset($_SESSION['nomUtilisateur'])){
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-sm-0" style="margin-right: 10px;">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link">
                            
                        </a>
                    <?php
                    if($_SESSION['role']==1){
                    }
                    ?>
                </ul>
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
                <ul class="navbar-nav ml-md-auto" style="margin-right: 10px;">
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
        <br>
        <br>
        <br>

        <?php

    }

}
?>