<!DOCTYPE html>
<html lang="fr">
    <meta charset="UTF-8">
    <title>Bienvenue à StickyStack</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        body {
            background-size: cover;
            font-family: 'Calibri', sans-serif;
            display: flex;
            flex-direction: column; 
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .bienvenue-container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.8);
            border: 1px solid #ffffff50;
            transition: transform 0.3s ease-in-out;
        }

        .bienvenue-container:hover {
            transform: scale(1.05);
        }

        h1, h2 {
            font-family: 'Georgia', serif;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2.5em;
            color: #FFD700; 
        }

        h2 {
            font-size: 1.5em;
            color: #ADFF2F; 
        }

        p {
            font-size: 1.2em;
            color: #FFFFFF;
        }
    </style>

<body>
    <div class="bienvenue-container">
        <h1>Bienvenue à StickyStack</h1>
        <h2>Votre gestionnaire de post-its</h2>
        <p>Ce gestionnaire vous permet de créer, visualiser et gérer vos post-its de manière simple et intuitive.</p>
    </div>
</body>
</html>
