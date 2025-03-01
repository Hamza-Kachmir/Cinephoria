<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $userModel = new User($dbo);

    // Hacher le mot de passe
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Ajouter l'utilisateur
    $result = $userModel->addUser(
        $_POST['username'],
        $_POST['email'],
        $hashedPassword,
        $_POST['first_name'],
        $_POST['last_name'],
        'user'
    );

    if ($result) {
        $successMessage = urlencode("Votre compte a été créé avec succès.");
        header("Location: /index.php?route=home&success=$successMessage");
        exit;
    } else {
        $_SESSION['error'] = "Erreur lors de la création du compte.";
        header('Location: /index.php?route=register');
        exit;
    }
}

include __DIR__ . '/../../views/auth/register.php';
?>