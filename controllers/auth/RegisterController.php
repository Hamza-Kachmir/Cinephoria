<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    if (isset($_POST['email'], $_POST['username'], $_POST['password'], $_POST['first_name'], $_POST['last_name'])) {
        $userModel = new User($dbo);

        // Tente d'inscrire le nouvel utilisateur
        try {
            $result = $userModel->addUser(
                $_POST['username'],
                $_POST['email'],
                password_hash($_POST['password'], PASSWORD_DEFAULT),
                $_POST['first_name'],
                $_POST['last_name'],
                'user'
            );

            if ($result) {
                $_SESSION['success'] = "Compte créé avec succès.";
                header('Location: /index.php?route=home');
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de l'ajout de l'utilisateur dans la BDD.";
                header('Location: /index.php?route=register');
                exit;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION['error'] = "Erreur SQL : " . $e->getMessage();
            header('Location: /index.php?route=register');
            exit;
        }
    } else {
        $_SESSION['error'] = "Données du formulaire manquantes.";
        header('Location: /index.php?route=register');
        exit;
    }
} else {
    include __DIR__ . '/../../views/auth/register.php';
}
?>