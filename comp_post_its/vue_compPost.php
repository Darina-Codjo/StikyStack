<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['first_name'])) {
   
    header('Location: connexion.php');
    exit;
}
$fnameUser = $_SESSION['first_name'];
?> 


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
    <style>
        body {
            margin: 0;
            font-family: 'Calibri', sans-serif;
            background: url('images/fond 2.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #000;
        }
        header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: lightgray;
        }
        main {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .post-it-section {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            background-color: #e0ffcd;
            position: relative; 
        }
        .post-it-display {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
        }
        .post-it {
            width: 100px;
            height: 100px;
            margin: 5px;
            background: url('images/post-it.jpeg') no-repeat center center;
            background-size: contain;
            position: relative;
            cursor: pointer;
        }
        button, a {
            padding: 10px 15px;
            background-color: #d59bf6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover, a:hover {
            background-color: #7c73e6;
        }
        .add-button {
            position: absolute;
            top: 10px; 
            right: 10px; 
        }
        .form-popup {
            display: none; 
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 3px solid #f1f1f1;
            z-index: 9;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            width: 400px;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            border-radius: 5px;
        }
        input[type=text]:focus, textarea:focus {
            background-color: #ddd;
            outline: none;
        }
        .btn, .cancel {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }
        .cancel {
            background-color: #f44336;
        }
    </style>
</head>
<body>
<header>
    <h1>Bienvenue, <?php echo htmlspecialchars($fnameUser); ?>!</h1>
    <nav>
        <a href="deconnexion.php">Déconnexion</a>
    </nav>
</header>
<main>
    <div class="post-it-section">
        <h2>Mes Post-its</h2>
        <button class="add-button" onclick="openForm()">Ajouter Post-its</button>
        <div class="post-it-display" id="mesPostIts"></div>
    </div>
    <div class="post-it-section" style="background-color: #ffcab0;">
        <h2>Post-its partagés</h2>
        <div class="post-it-display" id="postItsPartages"></div>
    </div>
</main>

<div class="form-popup" id="myForm">
    <form class="form-container" action="submit_postit.php" method="post">
        <h1>Ajouter Post-it</h1>
        <label for="titre"><b>Titre</b></label>
        <input type="text" id="titre" name="titre" placeholder="Entrez le titre" required maxlength="150">
        <label for="contenu"><b>Contenu</b></label>
        <textarea placeholder="Écrivez le contenu" name="contenu" required></textarea>
        <button type="submit" class="btn">Ajouter</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
    </form>
</div>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }
    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
</body>
</html>


// popup modif

    <style>
      
        .form-popup {
            display: block; 
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 3px solid #f1f1f1;
            z-index: 9;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            width: 400px; 
        }

     
        input[type=text],
        textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            border-radius: 5px;
        }

        input[type=text]:focus,
        textarea:focus {
            background-color: #ddd;
            outline: none;
        }

        .btn {
            background-color: #4CAF50;  */
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .btn:hover {
            opacity: 1;
        }

    
        .cancel {
            background-color: #f44336;
            color: white;
        }

       
        .email-tag {
            display: flex;
            align-items: center;
            padding: 5px;
            margin-right: 5px;
            background-color: #e4e4e4;
            border-radius: 16px;
            font-size: 0.9em;
            margin-bottom: 5px;
        }

        .delete-email {
            margin-left: 8px;
            cursor: pointer;
            color: red;
            font-weight: bold;
        }

        #email-tags-container {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 8px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

     
        #suggestions {
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10;
        }

        #suggestions div {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }

        #suggestions div:hover {
            background-color: #f9f9f9;
        }
    </style>

 

<div class="form-popup" id="editForm">
    <form class="form-container" onsubmit="modifierPostIt(event)">
        <h1>Modifier Post-Its</h1>

        <label for="edit-titre"><b>Titre</b></label>
        <input type="text" id="edit-titre" name="edit-titre" required maxlength="50">

        <label for="edit-contenu"><b>Contenu</b></label>
        <textarea id="edit-contenu" name="edit-contenu" required
        maxlength="150"></textarea>

        <div>Date d'ajout: <span id="edit-date_ajout"></span></div>
        <div>Date de modification: <span id="edit-date_modification"></span></div>

        <input type="hidden" id="edit-id" name="edit-id">

        <button type="submit" class="btn">Modifier</button>
        <button type="button" class="btn cancel" onclick="closeEditForm()">Fermer</button>
    </form>
</div>
 
//popup

    <style>
       
        .form-popup {
            display: block;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 3px solid #f1f1f1;
            z-index: 9;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            width: 400px;  
        }

       
        input[type=text],
        textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            border-radius: 5px;
        }

        input[type=text]:focus,
        textarea:focus {
            background-color: #ddd;
            outline: none;
        }

        
        .btn {
            background-color: #4CAF50;  
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .btn:hover {
            opacity: 1;
        }

      
        .cancel {
            background-color: #f44336;
            color: white;
        }


        .email-tag {
            display: flex;
            align-items: center;
            padding: 5px;
            margin-right: 5px;
            background-color: #e4e4e4;
            border-radius: 16px;
            font-size: 0.9em;
            margin-bottom: 5px;
        }

        .delete-email {
            margin-left: 8px;
            cursor: pointer;
            color: red;
            font-weight: bold;
        }

        #email-tags-container {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 8px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

      
        #suggestions {
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10;
        }

        #suggestions div {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }

        #suggestions div:hover {
            background-color: #f9f9f9;
        }
    </style>


<div class="form-popup" id="editForm">
    <form class="form-container" onsubmit="modifierPostIt(event)">
        <h1>Modifier Post-Its</h1>

        <label for="edit-titre"><b>Titre</b></label>
        <input type="text" id="edit-titre" name="edit-titre" required maxlength="50">

        <label for="edit-contenu"><b>Contenu</b></label>
        <textarea id="edit-contenu" name="edit-contenu" required
        maxlength="150"></textarea>

        <div>Date d'ajout: <span id="edit-date_ajout"></span></div>
        <div>Date de modification: <span id="edit-date_modification"></span></div>

        <input type="hidden" id="edit-id" name="edit-id">

        <button type="submit" class="btn">Modifier</button>
        <button type="button" class="btn cancel" onclick="closeEditForm()">Fermer</button>
    </form>
</div>


<script>
 function openEditForm() {
   
    document.getElementById("editForm").style.display = "block";
}
function closeEditForm() {
    document.getElementById("editForm").style.display = "none";
}   
</script>

</body>
</html>
