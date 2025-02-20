<?php
session_start();
require_once 'assets/core/config.php';
require_once 'models/movie.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'cinemas'; // Par défaut, redirige vers la page "cinemas"

// Charger les films disponibles
$movieModel = new Movie($dbo);
$movies = $movieModel->getAllMovies();

switch ($page) {
    case 'cinemas':
        include 'views/cinemas.php';
        break;
    case 'cinema_details':
        include 'views/cinema_details.php';
        break;
    case 'movies':
        include 'views/movies.php';
        break;
    case 'reservations':
        include 'views/reservations.php';
        break;
    case 'contact':
        include 'views/contact.php';
        break;
    case 'register':
        include 'views/auth/register.php';
        break;
    case 'login':
        include 'views/auth/login.php';
        break;
    case 'profile':
        if (isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'user') {
            include 'views/profile.php';
        } else {
            header('Location: login.php');
            exit;
        }
        break;
    case 'dashboard':
        if (isset($_SESSION['user_id']) && ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'employee')) {
            include 'views/dashboard.php';
        } else {
            header('Location: login.php');
            exit;
        }
        break;
    default:
        include 'views/404.php';
        break;
}
?>
