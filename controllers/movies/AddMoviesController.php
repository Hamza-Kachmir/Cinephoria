<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Movie.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_movie'])) {
    if (isset($_POST['title'], $_POST['description'], $_POST['release_date'], $_POST['duration'], $_POST['age_rating'])) {
        $movieModel = new Movie($dbo);

        // Gestion du téléchargement de l'affiche
        $poster = null;
        if (isset($_FILES['poster']) && $_FILES['poster']['error'] == UPLOAD_ERR_OK) {
            $poster = file_get_contents($_FILES['poster']['tmp_name']);
        }

        // Tente d'ajouter le nouveau film
        try {
            $result = $movieModel->addMovie(
                $_POST['title'],
                $_POST['description'],
                $_POST['release_date'],
                $_POST['duration'],
                $_POST['age_rating'],
                $poster
            );

            if ($result) {
                $_SESSION['success'] = "Film ajouté avec succès.";
                header('Location: /index.php?route=movies');
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de l'ajout du film dans la BDD.";
                header('Location: /index.php?route=add_movie');
                exit;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION['error'] = "Erreur SQL : " . $e->getMessage();
            header('Location: /index.php?route=add_movie');
            exit;
        }
    } else {
        $_SESSION['error'] = "Données du formulaire manquantes.";
        header('Location: /index.php?route=add_movie');
        exit;
    }
} else {
    include __DIR__ . '/../../views/movies/add_movie.php';
}
?>