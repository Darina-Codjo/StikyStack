
<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<body>
    <div class="bienvenue-container">
        <h1>Bienvenue à StikyStack</h1>
        <h2>Votre gestionnaire de post-its</h2>
        <p>Ce gestionnaire vous permet de créer, visualiser et gérer vos post-its de manière simple et intuitive.</p>
    </div>
    <footer>
        <p>StikyStack © 2024</p>
    </footer>
      
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        body {
            background: url('images/jhheghjezgf.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: Calibri, sans-serif;
            display: flex;
            flex-direction: column; 
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .bienvenue-container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
        }

        footer {
            position: absolute; 
            bottom: 0;
            width: 100%;
            text-align: center; 
            padding: 10px 0; 
            font-size: 16px; 
        }
    </style>
</body>
</html>
