<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/user.php';

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $userModel = new User($dbo);
    $user = $userModel->getUserByEmail($_POST['email']);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        header('Location: /index.php?route=home');
        exit;
    } else {
        $error_message = "Email ou mot de passe incorrect.";
    }
}

include __DIR__ . '/../../views/auth/login.php';
?>