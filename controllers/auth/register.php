<?php
require_once '../../config/config.php';
require_once '../../models/user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Validation du mot de passe
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $_SESSION['error'] = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
        header('Location: ../../views/auth/register.php');
        exit;
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Création d'un nouvel utilisateur
    if (createUser($pdo, $username, $email, $hashed_password, $first_name, $last_name)) {
        header('Location: ../../views/auth/login.php');
        exit;
    } else {
        $_SESSION['error'] = "Erreur lors de l'inscription.";
        header('Location: ../../views/auth/register.php');
        exit;
    }
} else {
    header('Location: ../../views/auth/register.php');
    exit;
}
?>
