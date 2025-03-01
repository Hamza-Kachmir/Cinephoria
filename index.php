<?php
session_start();
require_once __DIR__ . '/config/config.php';

$route = $_GET['route'] ?? 'home';

include __DIR__ . '/public/core/header.php';

switch ($route) {
    case 'home':
        require_once __DIR__ . '/views/homepage.php';
        break;
    case 'login':
        require_once __DIR__ . '/controllers/auth/LoginController.php';
        break;
    case 'register':
        require_once __DIR__ . '/controllers/auth/RegisterController.php';
        break;
    case 'dashboard':
        require_once __DIR__ . '/views/dashboard/dashboard.php';
        break;
    case 'profile':
        require_once __DIR__ . '/views/profile.php';
        break;
    default:
        http_response_code(404);
        echo "<div class='container mt-5'><h1 class='text-center'>404 Not Found</h1></div>";
        break;
}

include __DIR__ . '/public/core/footer.php';
?>