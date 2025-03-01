<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Movie.php';

// Initialiser le modèle Movie
$movieModel = new Movie($dbo);

// Récupérer tous les films
try {
    $movies = $movieModel->getAllMovies();
} catch (Exception $e) {
    error_log($e->getMessage());
    $movies = [];
}

// Récupérer le message de succès de l'URL
$successMessage = isset($_GET['success']) ? urldecode($_GET['success']) : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinéphoria</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <script src="path/to/your/script.js" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bienvenue sur Cinéphoria</h1>
        <div class="row">
            <?php foreach ($movies as $movie): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-1000">
                        <?php if (!empty($movie['poster'])): ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($movie['poster']); ?>" class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                        <?php else: ?>
                            <img src="path/to/default-image.jpg" class="card-img-top img-fluid" alt="Default Image">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo htmlspecialchars($movie['title']); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if ($successMessage): ?>
        <div id="successPopup" class="success-popup">
            <div class="popup-content">
                <p><?php echo $successMessage; ?></p>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>