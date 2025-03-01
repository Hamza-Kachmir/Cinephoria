<div id="filmModal" class="modal">
    <div class="modal-content">
        <span id="closeFilmModal" class="close-btn">&times;</span>
        <h2 class="text-center">Gestion des films</h2>
        <div class="tab-buttons">
            <button class="filmTab btn btn-outline-primary active" data-tab="addFilmTab">Ajouter</button>
            <button class="filmTab btn btn-outline-primary" data-tab="editFilmTab">Modifier</button>
            <button class="filmTab btn btn-outline-primary" data-tab="deleteFilmTab">Supprimer</button>
        </div>
        <div id="addFilmTab" class="filmTabContent active">
            <h4>Ajouter un film</h4>
            <form action="/controllers/movies/AddMoviesController.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre du film</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="release_date" class="form-label">Date de sortie</label>
                    <input type="date" class="form-control" id="release_date" name="release_date" required>
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Durée (minutes)</label>
                    <input type="number" class="form-control" id="duration" name="duration" required>
                </div>
                <div class="mb-3">
                    <label for="age_rating" class="form-label">Classification par âge</label>
                    <input type="number" class="form-control" id="age_rating" name="age_rating" required>
                </div>
                <div class="mb-3">
                    <label for="poster" class="form-label">Affiche du film</label>
                    <input type="file" class="form-control" id="poster" name="poster" accept="image/*">
                </div>
                <button type="submit" name="add_movie" class="btn btn-primary">Ajouter le film</button>
            </form>
        </div>

        <div id="editFilmTab" class="filmTabContent">
            <h4>Modifier un film</h4>
            <form action="/controllers/movies/EditMovieController.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="movie_id_edit" class="form-label">ID du film à modifier</label>
                    <input type="number" class="form-control" id="movie_id_edit" name="movie_id" required>
                </div>
                <div class="mb-3">
                    <label for="title_edit" class="form-label">Nouveau titre</label>
                    <input type="text" class="form-control" id="title_edit" name="title">
                </div>
                <div class="mb-3">
                    <label for="description_edit" class="form-label">Nouvelle description</label>
                    <textarea class="form-control" id="description_edit" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="release_date_edit" class="form-label">Nouvelle date de sortie</label>
                    <input type="date" class="form-control" id="release_date_edit" name="release_date">
                </div>
                <div class="mb-3">
                    <label for="duration_edit" class="form-label">Nouvelle durée (minutes)</label>
                    <input type="number" class="form-control" id="duration_edit" name="duration">
                </div>
                <div class="mb-3">
                    <label for="age_rating_edit" class="form-label">Nouvelle classification par âge</label>
                    <input type="number" class="form-control" id="age_rating_edit" name="age_rating">
                </div>
                <div class="mb-3">
                    <label for="poster_edit" class="form-label">Nouvelle affiche</label>
                    <input type="file" class="form-control" id="poster_edit" name="poster" accept="image/*">
                </div>
                <button type="submit" name="edit_movie" class="btn btn-primary">Modifier le film</button>
            </form>
        </div>

        <div id="deleteFilmTab" class="filmTabContent">
            <h4>Supprimer un film</h4>
            <form action="/controllers/movies/DeleteMovieController.php" method="post">
                <div class="mb-3">
                    <label for="movie_id_delete" class="form-label">ID du film à supprimer</label>
                    <input type="number" class="form-control" id="movie_id_delete" name="movie_id" required>
                </div>
                <button type="submit" name="delete_movie" class="btn btn-danger">Supprimer le film</button>
            </form>
        </div>
    </div>
</div>