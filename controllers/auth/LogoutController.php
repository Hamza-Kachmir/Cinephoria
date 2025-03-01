<?php
session_start();

// Définir le temps d'inactivité maximum (en secondes)
$inactive_timeout = 1800; // 30 minutes

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactive_timeout)) {
    // Supprimer toutes les variables de session
    session_unset();

    // Détruire la session
    session_destroy();

    // Rediriger vers la page d'accueil (ou page de connexion)
    header("Location: /index.php?route=home");
    exit;
}

// Mettre à jour le temps de la dernière activité
$_SESSION['last_activity'] = time();

// Supprimer toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page d'accueil (ou page de connexion)
header("Location: /index.php?route=home");
exit;
?>