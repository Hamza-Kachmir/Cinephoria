<?php
session_start();
$title = "Inscription";
include '../header.php';
?>

<div class="container mt-5">
    <h2>Inscription</h2>
    <form action="../../controllers/auth/register.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <small id="passwordHelp" class="form-text text-muted">
                Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.
            </small>
        </div>
        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger mt-3">
            <?= $_SESSION['error'] ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <p class="mt-3">Déjà un compte ? <a href="login.php">Connectez-vous</a>.</p>
</div>

<?php include '../footer.php'; ?>
