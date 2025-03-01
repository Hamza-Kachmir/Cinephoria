<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Inscription</h2>
          <form action="/controllers/auth/RegisterController.php" method="post" id="registerForm">
            <div class="mb-3">
              <label for="username" class="form-label">Nom d'utilisateur</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
              <small id="usernameHelp" class="form-text text-danger"></small>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Adresse email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
              <small id="emailHelp" class="form-text text-danger"></small>
            </div>
            <div class="mb-3">
              <label for="first_name" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Entrez votre prénom" required>
            </div>
            <div class="mb-3">
              <label for="last_name" class="form-label">Nom</label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Entrez votre nom" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
              <small id="passwordHelp" class="form-text text-danger"></small>
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-label">Confirmez le mot de passe</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
              <small id="confirmPasswordHelp" class="form-text text-danger"></small>
            </div>
            <div class="d-grid">
              <button type="submit" name="register" class="btn btn-primary">S'inscrire</button>
            </div>
          </form>
          <p class="mt-3 text-center">
            Déjà un compte ? <a href="/index.php?route=login">Connexion</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>