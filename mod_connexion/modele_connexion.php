<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>

<?php

    include_once'connexionDB.php';
    include_once'vue_connexion.php';

	class ModeleConnexion extends Connexion{
        private $vue;

        public function __construct(){
            $this->vue = new VueConnexion();
        }

        function inscription($tab){
            $firstName=$tab['firstName'];
            $lastName=$tab['lastName'];
            $birthDate=$tab['birthDate'];
            $email=$tab['email'];
            $passwrd=$tab['passwrd'];

            if(strlen($email) <= 255 && strlen($firstName) <= 255 && strlen($lastName) <= 255 && strlen($passwrd) <= 255) {
                
                $requete=self::$bdd->prepare("SELECT email FROM user where email=? ;");
                $requete->execute(array($email));

                if(!empty($requete->fetch())){
                    echo "<p class=\"text-center mt-3\"><strong>This user already exists</strong></p>";
                    $this->vue->form_inscription();
                }
                else{
                    //Insertion
                    $req=self::$bdd->prepare("INSERT INTO user(firstName,lastName,birthDate,email,passwrd) VALUES(?,?,?,?,?);");
                    $req->execute(array($firstName,$lastName,$birthDate,$email,$passwrd));
                    
                }
            }
            else {
                echo "<p class=\"text-center mt-3\"><strong>User name too long <strong></p>";
                $this->vue->form_inscription();
            }
        }

        function connexion(){
            $email = $_POST['email'];
            try {
                $selectprep = self::$bdd->prepare("SELECT email,passwrd,firstName,lastName,birthDate FROM user WHERE email=?;");
                $selectprep->execute(array($email,$firstName,$lastName,$birthDate));
                $resultat = $selectprep->fetch();
                
                return $resultat;
            } catch (PDOexception $e) {
                echo $e->getMessage() . $e->getCode();
            }
        }

        function logOut(){
            $_SESSION = array();
            session_destroy();
            header('Location:index.php');
        }

        function error404(){
            require_once('404NotFoundPage.php');
        }
    }
    
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('form[action="index.php?module=connexion&action=inscription"]');

    form.addEventListener("submit", function(event) {
        var isValid = true;
        var errorMessages = [];

        var firstName = form.querySelector('[name="firstName"]').value.trim();
        var lastName = form.querySelector('[name="lastName"]').value.trim();
        var birthDate = form.querySelector('[name="birthDate"]').value.trim();
        var email = form.querySelector('[name="email"]').value.trim();
        var password = form.querySelector('[name="passwrd"]').value;
        var confirmPassword = form.querySelector('[name="passwrd_confirm"]').value;

        // Vérification que tous les champs sont remplis
        if (!firstName || !lastName || !birthDate || !email || !password || !confirmPassword) {
            errorMessages.push("tous les champs soivent etre saisis.");
            isValid = false;
        }

        // Validation de l'email
        if (!email.match(/^\S+@\S+\.\S+$/)) {
            errorMessages.push("L'email saisi n'est pas valide.");
            form.querySelector('[name="email"]').style.backgroundColor = "red";
            isValid = false;
        } else {
            form.querySelector('[name="email"]').style.backgroundColor = "";
        }

        // Vérification des mdp :
        if (password !== confirmPassword) {
            errorMessages.push("les deux mots de passe ne se correspondent pas !.");
            form.querySelector('[name="passwrd"]').style.backgroundColor = "red";
            form.querySelector('[name="passwrd_confirm"]').style.backgroundColor = "red";
            isValid = false;
        } else {
            form.querySelector('[name="passwrd"]').style.backgroundColor = "";
            form.querySelector('[name="passwrd_confirm"]').style.backgroundColor = "";
            if (password.length < 6) {
                errorMessages.push("Le mot de passe doit contenir plus de 6 caractères.");
                form.querySelector('[name="passwrd"]').style.backgroundColor = "red";
                isValid = false;
            }
        }

        // Si le formulaire n'est pas valide, afficher les erreurs
        if (!isValid) {
            event.preventDefault();
            alert(errorMessages.join("\n"));
        }
    });
});
</script>

