<?php
session_start();
require_once '../../config/config.php';
require_once '../../models/user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification des informations d'identification
    $user = getUserByEmail($pdo, $email);

    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../../../index.php');
        exit;
    } else {
        $_SESSION['error'] = "Email ou mot de passe incorrect.";
        header('Location: ../../views/auth/login.php');
        exit;
    }
} else {
    header('Location: ../../views/auth/login.php');
    exit;
}
?>
