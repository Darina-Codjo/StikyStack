<?php
if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
?>

<?php
	include_once'connexionDB.php';
	include_once'./css/404NotFound_style.css';

	class ModelePostit extends Connexion{

		public function __construct() {

		}
		
		function afficher_postit(){
			if(isset($_SESSION['email'])){
				$idUser = $_SESSION['idUser'];
				$prepare = self::$bdd->prepare("SELECT note.idNote,title,content,noteCreationDate,updateDate,idUser FROM note, link where idUser = ?;");
				$prepare->execute(array($idUser));
				return $prepare->fetch(PDO::FETCH_ASSOC);
			}
		}

		function error404(){
            require_once('404NotFoundPage.php');
        }

	}
?>

<!-- / Rajouter un nouveau post- it
Author Laetitia
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'init_db.php'; // Charger les configurations de la base de données
header('Content-Type: application/json'); 

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['userId'])) {
    echo json_encode(["error" => "Erreur: Utilisateur non identifié."]);
    exit;
}

// Vérifie si les données requises sont envoyées via POST
if (isset($_POST['title'], $_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = $_SESSION['userId'];
    $currentTime = date('Y-m-d H:i:s'); // Date et heure actuelle

    // Requête SQL pour insérer la nouvelle note
    $sql = "INSERT INTO note (title, content, creationDate, updateDate) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$title, $content, $currentTime, $currentTime])) {
        $noteId = $pdo->lastInsertId();

        // Requête pour lier l'utilisateur à la note créée
        $linkSql = "INSERT INTO link (idUser, idNote) VALUES (?, ?)";
        $linkStmt = $pdo->prepare($linkSql);
        if ($linkStmt->execute([$userId, $noteId])) {
            echo json_smithsonian_channel_encode(["noteId" => $noteId]);
        } else {
            echo json_encode(["error" => "Erreur: Échec de la liaison utilisateur-note."]);
        }
    } else {
        echo json_encode(["error" => "Erreur: Échec de l'insertion de la note."]);
    }
} else {
    echo json_encode(["error" => "Erreur: Données manquantes."]);
}
?>

// Supprimer un post-it 


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'init_db.php'; // Chargement des configurations de la base de données

// Vérifie l'authentification de l'utilisateur
if (!isset($_SESSION['userId'])) {
    echo "Erreur: Utilisateur non identifié.";
    exit;
}

// Vérifie que l'ID du post-it est fourni
if (isset($_POST['noteId'])) {
    $noteId = $_POST['noteId'];
    $userId = $_SESSION['userId'];

    try {
        $pdo->beginTransaction(); 

        // Suppression des liens associés à la note
        $deleteLink = $pdo->prepare("DELETE FROM link WHERE idNote = ? AND idUser = ?");
        $deleteLink->execute([$noteId, $userId]);

        // Suppression de la note si elle existe et est liée à l'utilisateur
        $deleteNote = $pdo->prepare("DELETE FROM note WHERE idNote = ? AND EXISTS (SELECT 1 FROM link WHERE idNote = ? AND idUser = ?)");
        $deleteNote->execute([$noteWId, $noteId, $userId]);

        // Vérification que la suppression a affecté au moins une ligne
        if ($deleteNote->rowCount()) {
            $pdo->commit(); // Validation de la transaction
            echo "Suppression réussie.";
        } else {
            throw new Exception("Aucun post-it trouvé .");
        }
    } catch (Exception $e) {
        $pdo->rollBack(); // Annulation de la transaction en cas d'erreur
        echo "Erreur lors de la suppression du post-it: " . $e->getMessage();
    }
} else {
    echo "Erreur: ID du post-it manquant.";
}
?>


// Modifier un post-it 

<?php
require 'init_ciss.php'; // Charge la configuration de la base de données

session_start();

// Vérifie si l'utilisateur est authentifié
if (!isset($_SESSION['userId'])) {
    echo "Erreur: Utilisateur non identifié.";
    exit;
}

// Vérifie si toutes les données nécessaires sont présentes
if (isset($_POST['noteId'], $_POST['title'], $_POST['content'])) {
    $noteId = $_POST['noteId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = $_SESSION['userId'];
    $updateDate = date('Y-m-d H:i:s'); // Utilise la fonction date() pour obtenir la date et l'heure actuelles

    // Prépare et exécute la requête SQL pour mettre à jour le post-it
    $stmt = $pdo->prepare("UPDATE note SET title = ?, content = ?, updateDate = ? WHERE idNote = ? AND EXISTS (SELECT 1 FROM link WHERE idNote = ? AND idUser = ?)");
    if ($stmt->execute([$title, $content, $updateDate, $noteId, $noteId, $userId])) {
        echo "Post-it modifié avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du post-it.";
    }
} else {
    echo "Données manquantes.";
}
?>
// Récupérer les post-its d'un utilisateur  

// Récupérer les post-its d'un utilisateur  

<?php
// Configuration de l'affichage des erreurs pour le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialisation de la session et connexion à la base de données
session_start();
include 'init_db.php';  

header('Content-Type: application/json'); 

// Vérification de l'authentification de l'utilisateur
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Utilisateur non identifié.']);
    exit;
}

// Récupération et validation de l'ID du post-it passé en paramètre GET
$id_postit = isset($_GET['id_postit']) ? intval($_GET['id_postit']) : 0;
$user_id = $_SESSION['user_id'];

if ($id_postit > 0) {
    try {
        // Préparation et exécution de la requête pour obtenir les détails d'un post-it spécifique
        $stmt = $pdo->prepare("SELECT id_postit, titre, contenu, strftime('%Y-%m-%d', date_ajout) AS date_ajout, strftime('%Y-%m-%d', date_modification) AS date_modification 
            FROM Post_it 
            WHERE id_postit = ? AND id_utilisateur = ?");
        $stmt->execute([$id_postit, $user_id]);
        $postIt = $stmt->fetch(PDO::FETCH_ASSOC);

        // Affichage du post-it ou d'une erreur si non trouvé ou non autorisé
        if ($postIt) {  
            echo json_encode($postIt);
        } else {
            echo json_encode(['error' => 'Post-it non trouvé ou vous n\'êtes pas le propriétaire.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erreur de la base de données : ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ID du post-it non spécifié.']);
}
?> -->
