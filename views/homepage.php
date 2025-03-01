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
?>

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