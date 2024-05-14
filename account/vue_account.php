//Couche de présentation de l'application. Elle est responsable de l'affichage des données à l'utilisateur final.
/*
 TABLE USER :
 idUser
firstName
lastName
userName
email
birthDate
creationDate
updateDate
password
 */

<!-- view/account_settings.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
</head>
<body>
    <h1>Account Settings</h1>
    <?php if (isset($_GET['success'])) : ?>
        <p style="color: green;">Your account settings have been updated successfully.</p>
    <?php endif; ?>
    <form action="?action=update" method="post">
        <label for="firstName">First Name:</label><br>
        <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($user['firstName']) ?>"><br><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" id="lastName" name="lastName" value="<?= htmlspecialchars($user['lastName']) ?>"><br><br>
        <label for="userName">Username:</label><br>
        <input type="text" id="userName" name="userName" value="<?= htmlspecialchars($user['userName']) ?>"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"><br><br>
        <label for="birthDate">Birth Date:</label><br>
        <input type="date" id="birthDate" name="birthDate" value="<?= htmlspecialchars($user['birthDate']) ?>"><br><br>
        <label for="password">New Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
