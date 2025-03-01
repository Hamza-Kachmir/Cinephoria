<?php
class Movie {
    protected $db;

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct($dbo) {
        $this->db = $dbo;
    }

    // Méthode pour ajouter un nouveau film à la base de données
    public function addMovie($title, $description, $release_date, $duration, $age_rating, $poster = null) {
        try {
            $stmt = $this->db->prepare("INSERT INTO movies (title, description, release_date, duration, age_rating, poster, created_at)
                                        VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            return $stmt->execute([$title, $description, $release_date, $duration, $age_rating, $poster]);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'ajout du film : " . $e->getMessage());
        }
    }

    // Méthode pour récupérer un film par son ID
    public function getMovieById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM movies WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la recherche du film par ID : " . $e->getMessage());
        }
    }

    // Méthode pour récupérer tous les films
    public function getAllMovies() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM movies");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des films : " . $e->getMessage());
        }
    }

    // Méthode pour mettre à jour un film
    public function updateMovie($id, $title, $description, $release_date, $duration, $age_rating, $poster = null) {
        try {
            $stmt = $this->db->prepare("UPDATE movies SET title = ?, description = ?, release_date = ?, duration = ?, age_rating = ?, poster = ?
                                        WHERE id = ?");
            return $stmt->execute([$title, $description, $release_date, $duration, $age_rating, $poster, $id]);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour du film : " . $e->getMessage());
        }
    }

    // Méthode pour supprimer un film
    public function deleteMovie($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM movies WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression du film : " . $e->getMessage());
        }
    }
}
?>