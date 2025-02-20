<?php
include '../../assets/core/header.php';
?>

<div class="container">
    <h2>Connexion</h2>
    <form action="../../controllers/auth/login.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Se connecter</button>
    </form>
    <p>Pas de compte ? <a href="index.php?page=register">Inscrivez-vous</a></p>
</div>

<?php
include '../../assets/core/footer.php';
?>
