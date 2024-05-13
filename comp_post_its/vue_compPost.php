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

        button {
            padding: 10px 15px;
            background-color: #d59bf6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #7c73e6;
        }

        .add-button {
            position: absolute;
            top: 10px; 
            right: 10px; 
        }

        a {
            padding: 5px 10px;
            background-color: #00008B;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #FFB6C1;
        }
    </style>
</head>
<body>
<header>
    <h1>Bienvenue, <?php echo htmlspecialchars($prenomUtilisateur); ?>!</h1>
    <nav>
        <a href="deconnexion.php">Déconnexion</a>
    </nav>
</header>
<main>
    <div class="post-it-section">
        <h2>Mes Post-its</h2>
        <button class="add-button" onclick="openForm()">Ajouter Post-Its</button>
        <div class="post-it-display" id="mesPostIts"></div>
    </div>
    <div class="post-it-section" style="background-color: #ffcab0;">
        <h2>Post-its partagés</h2>
        <div class="post-it-display" id="postItspartages"></div>
    </div>
   
</main>
</body>
</html>
