
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php if (isset($title)) {
            echo $title;
        } ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <LINK <?php if (isset($css)) {
        echo "href=\"".$css."\"";
    } ?> rel="stylesheet">

</head>
<body>

<?php
    if(isset($nav)){
        echo $nav->afficherNav();
    }

    if(isset($module)){
        if($module != "accueil"){
            echo $module->getControleur()->getVue()->getAffichage();
        }
    }
?>

<?php
        if(isset($jquery)){
            echo "<script src=\"".$jquery."\"></script>";
        }

        if(isset($js)){
            echo "<script src=\"".$js."\"></script>";
        }

        if(isset($footer)){
            echo $footer->afficherFooter();
        }
?>



</body>
</html>
