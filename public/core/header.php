<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinéphoria</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="public/assets/js/script.js" defer></script>  
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/index.php?route=home">
          <img src="/public/assets/img/logo.png" alt="Logo Cinéphoria" width="30" height="30" class="d-inline-block align-text-top">
          Cinéphoria
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Basculer la navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="/index.php?route=home">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/index.php?route=films">Films</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/index.php?route=reservations">Réservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/index.php?route=contact">Contact</a>
            </li>
            <?php if (isset($_SESSION['user_id'])): ?>
              <?php if ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'employee'): ?>
                <li class="nav-item">
                  <a class="nav-link" href="/index.php?route=dashboard">Dashboard</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="/index.php?route=profile">Profil</a>
                </li>
              <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="/controllers/auth/LogoutController.php">Déconnexion</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="/index.php?route=login">Connexion</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>