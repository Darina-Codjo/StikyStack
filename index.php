<?php session_start();

define('CONST_INCLUDE', NULL);
?>

<?php

    require_once "connexion.php";
    Connexion::initConnexion();

    $module = isset($_GET['module']) ? $_GET['module']: "accueil";
    
    switch($module) {
        case "connexion":
            $title="Connexion/Inscription";
            $css="./css/style_set_connexion.css";
            include "./comp_nav/comp_nav.php";
            $nav = new ComposantNav();
            include "./mod_connexion/mod_connexion.php";
            $module=new ModConnexion();
            include "./comp_footer/comp_footer.php";
            $footer=new ComposantFooter();
            break;
            
        case 'accueil':
            $title="Accueil";
            $css="./css/style.css";
            include "./comp_header_accueil/comp_header_accueil.php";
            $nav = new ComposantHeaderAccueil();
            require './accueil.php';
            include "./comp_footer_accueil/comp_footer_accueil.php";
            $footer=new ComposantFooterAccueil();
            break;
        
            default :
                die ("Interdiction d'accès à ce module");
    }
        
    require("template.php");
        
?>    