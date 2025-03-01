<?php
class User {
    protected $db;

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct($dbo) {
        $this->db = $dbo;
    }

    // Méthode pour récupérer un utilisateur par son email
    public function getUserByEmail($email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la recherche de l'utilisateur par email : " . $e->getMessage());
        }
    }

    // Méthode pour récupérer un utilisateur par son nom d'utilisateur
    public function getUserByUsername($username) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la recherche de l'utilisateur par nom d'utilisateur : " . $e->getMessage());
        }
    }

    // Méthode pour ajouter un nouvel utilisateur à la base de données
    public function addUser($username, $email, $hashedPassword, $first_name, $last_name, $role) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users (username, email, password, first_name, last_name, role)
                                        VALUES (?, ?, ?, ?, ?, ?)");
            return $stmt->execute([$username, $email, $hashedPassword, $first_name, $last_name, $role]);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage());
        }
    }
}
?>