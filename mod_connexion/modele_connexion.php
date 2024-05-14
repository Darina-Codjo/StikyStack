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
            //echo $_POST['email'];
            try {
                $selectprep = self::$bdd->prepare("SELECT email, passwrd FROM user WHERE email=?;");
                //echo "SELECT email, passwrd FROM user WHERE email=?;";
                $selectprep->execute(array($email));
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
    let form = document.querySelector('form[action="index.php?module=connexion&action=inscription"]');

    form.addEventListener("submit", function(event) {
        let isValid = true;

        // Effacer les erreurs précédentes
        document.querySelectorAll('.error-messages').forEach(function(div) {
            div.innerHTML = '';
        });

        let firstName = form.querySelector('[name="firstName"]').value.trim();
        if (!firstName) {
            document.getElementById('errorFirstName').innerHTML = "Le prénom est requis.";
            isValid = false;
        }

        let lastName = form.querySelector('[name="lastName"]').value.trim();
        if (!lastName) {
            document.getElementById('errorLastName').innerHTML = "Le nom de famille est requis.";
            isValid = false;
        }

        let birthDate = form.querySelector('[name="birthDate"]').value.trim();
        if (!birthDate) {
            document.getElementById('errorBirthDate').innerHTML = "La date de naissance est requise.";
            form.querySelector('[name="birthDate"]').style.backgroundColor = "red";
            isValid = false;
        } else if (!birthDate.match(/^\d{4}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])$/)) {
            document.getElementById('errorBirthDate').innerHTML = "La date de naissance doit être au format AAAAMMJJ.";
            isValid = false;
        } else {
            form.querySelector('[name="birthDate"]').style.backgroundColor = "";
        }

        let email = form.querySelector('[name="email"]').value.trim();
        if (!email) {
            document.getElementById('errorEmail').innerHTML = "L'email est requis.";
            form.querySelector('[name="email"]').style.backgroundColor = "red";
            isValid = false;
        } else if (!email.match(/^\S+@\S+\.\S+$/)) {
            document.getElementById('errorEmail').innerHTML = "L'email saisi n'est pas valide.";
            isValid = false;
        } else {
            form.querySelector('[name="email"]').style.backgroundColor = "";
        }

        let password = form.querySelector('[name="passwrd"]').value;
        if (!password) {
            document.getElementById('errorPasswrd').innerHTML = "Le mot de passe est requis.";
            isValid = false;
        } else if (password.length < 6) {
            document.getElementById('errorPasswrd').innerHTML = "Le mot de passe doit contenir au moins 6 caractères.";
            form.querySelector('[name="passwrd"]').style.backgroundColor = "red";
            isValid = false;
        } else {
            form.querySelector('[name="passwrd"]').style.backgroundColor = "";
        }

        let confirmPassword = form.querySelector('[name="passwrd_confirm"]').value;
        if (!confirmPassword) {
            document.getElementById('errorPasswrd_confirm').innerHTML = "La confirmation du mot de passe est requise.";
            isValid = false;
        } else if (password !== confirmPassword) {
            document.getElementById('errorPasswrd_confirm').innerHTML = "Les mots de passe ne correspondent pas.";
            form.querySelector('[name="passwrd"]').style.backgroundColor = "red";
            form.querySelector('[name="passwrd_confirm"]').style.backgroundColor = "red";
            isValid = false;
        } else {
            form.querySelector('[name="passwrd_confirm"]').style.backgroundColor = "";
        }

        if (!isValid) {
            event.preventDefault(); // Empêcher l'envoi du formulaire
        }
    });
});
</script>


