<div class="container mt-5">
  <?php if (!empty($error_message)) : ?>
    <div class="alert alert-danger text-center">
      <?php echo $error_message; ?>
    </div>
  <?php endif; ?>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Connexion</h2>
          <form action="/index.php?route=login" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Adresse email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="d-grid">
              <button type="submit" name="login" class="btn btn-primary">Connexion</button>
            </div>
          </form>
          <p class="mt-3 text-center">
            Pas de compte ? <a href="/index.php?route=register">Inscrivez-vous</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>