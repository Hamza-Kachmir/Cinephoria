
<body>
    <div class="container mt-5">
        <h1 class="text-center">Espace Employé - Dashboard</h1>
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="d-grid">
                    <button id="openFilmModal" class="btn btn-primary">Gestion des films</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-grid">
                    <button id="openSessionModal" class="btn btn-primary">Gestion des séances</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-grid">
                    <a href="/index.php?route=salles" class="btn btn-primary">Gestion des salles</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-grid">
                    <a href="/index.php?route=avis" class="btn btn-primary">Gestion des avis</a>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include __DIR__ . '/../dashboard/movies/filmModal.php'; ?>
<?php include __DIR__ . '/../dashboard/sessions/sessionModal.php'; ?>
