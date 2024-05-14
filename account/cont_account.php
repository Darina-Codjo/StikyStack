//Intermédiaire entre le modèle et la vue. Il traite les requêtes de l'utilisateur, récupère les données nécessaires auprès du modèle, effectue les calculs ou les manipulations nécessaires, puis passe ces données à la vue pour affichage.

// controller/AccountSettingsController.php

require_once 'model/UserModel.php';

class AccountSettingsController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
    }

    public function index() {
        $user_id = $_SESSION['user_id'];
        $user = $this->userModel->getUserById($user_id);
        include 'view/account_settings.php';
    }

    public function update() {
        $user_id = $_SESSION['user_id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName = $_POST['userName'];
            $email = $_POST['email'];
            $birthDate = $_POST['birthDate'];
            $password = $_POST['password'];

            // Vous pouvez ajouter ici des validations supplémentaires des données

            // Mettre à jour les informations de l'utilisateur
            $success = $this->userModel->updateUser($user_id, $firstName, $lastName, $userName, $email, $birthDate, $password);

            if ($success) {
                header('Location: ?action=index&success=1');
                exit;
            } else {
                // Gérer les erreurs de mise à jour
                // Peut-être afficher un message d'erreur à l'utilisateur
            }
        }
    }
}
