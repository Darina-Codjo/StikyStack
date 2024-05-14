//Responsable de la manipulation des données, de l'accès à la base de données et de la logique métier.

// model/UserModel.php

class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($user_id) {
        $query = "SELECT * FROM user WHERE idUser = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($user_id, $firstName, $lastName, $userName, $email, $birthDate, $password) {
        $query = "UPDATE user SET firstName = :firstName, lastName = :lastName, userName = :userName, email = :email, birthDate = :birthDate, password = :password WHERE idUser = :user_id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            'user_id' => $user_id,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'userName' => $userName,
            'email' => $email,
            'birthDate' => $birthDate,
            'password' => $password
        ]);
    }
}
