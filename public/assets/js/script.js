// Vérification du mot de passe
$('#password').blur(function() {
    const password = $(this).val();
    const errors = validatePassword(password);

    if (errors.length > 0) {
        let message = "Le mot de passe doit comporter au moins : " + errors.slice(0, -1).join(", ") +
                      (errors.length > 1 ? " et " : "") + errors.slice(-1);
        $('#passwordHelp').text(message);
        $('#registerButton').prop('disabled', true);
    } else {
        $('#passwordHelp').text('');
        $('#registerButton').prop('disabled', false);
    }
});

// Vérification de la confirmation du mot de passe
$('#confirm_password').blur(function() {
    const password = $('#password').val();
    const confirmPassword = $(this).val();
    if (password !== confirmPassword) {
        $('#confirmPasswordHelp').text('Les mots de passe ne correspondent pas.');
        $('#registerButton').prop('disabled', true);
    } else {
        $('#confirmPasswordHelp').text('');
        $('#registerButton').prop('disabled', false);
    }
});

// Vérification de l'email
$('#email').blur(function() {
    const email = $(this).val();
    $.post('/controllers/auth/CheckEmailController.php', { email: email }, function(response) {
        if (response.exists) {
            $('#emailHelp').text('Cette adresse email est déjà utilisée.');
            $('#registerButton').prop('disabled', true);
        } else {
            $('#emailHelp').text('');
            $('#registerButton').prop('disabled', false);
        }
    }, 'json');
});

// Vérification du nom d'utilisateur
$('#username').blur(function() {
    const username = $(this).val();
    $.post('/controllers/auth/CheckUsernameController.php', { username: username }, function(response) {
        if (response.exists) {
            $('#usernameHelp').text('Ce nom d\'utilisateur est déjà utilisé.');
            $('#registerButton').prop('disabled', true);
        } else {
            $('#usernameHelp').text('');
            $('#registerButton').prop('disabled', false);
        }
    }, 'json');
});

// Fonction de validation du mot de passe
function validatePassword(password) {
    const errors = [];

    if (password.length < 8) {
        errors.push("8 caractères");
    }
    if (!/[A-Z]/.test(password)) {
        errors.push("une majuscule");
    }
    if (!/[a-z]/.test(password)) {
        errors.push("une minuscule");
    }
    if (!/[0-9]/.test(password)) {
        errors.push("un chiffre");
    }
    if (!/[\W_]/.test(password)) {
        errors.push("un caractère spécial");
    }

    return errors;
}

document.addEventListener("DOMContentLoaded", function() {
    // Récupération des éléments de la modale pour les films
    const filmModal = document.getElementById("filmModal");
    const openFilmModalBtn = document.getElementById("openFilmModal");
    const closeFilmModalBtn = document.getElementById("closeFilmModal");
    const filmTabButtons = document.querySelectorAll(".filmTab");
    const filmTabContents = document.querySelectorAll(".filmTabContent");

    // Ouvrir la modale des films
    openFilmModalBtn.addEventListener("click", function() {
        filmModal.style.display = "block";
    });

    // Fermer la modale des films lorsqu'on clique sur la croix
    closeFilmModalBtn.addEventListener("click", function() {
        filmModal.style.display = "none";
    });

    // Fermer la modale des films lorsqu'on clique en dehors du contenu
    window.addEventListener("click", function(event) {
        if (event.target == filmModal) {
            filmModal.style.display = "none";
        }
    });

    // Gestion des onglets des films
    filmTabButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            filmTabContents.forEach(function(content) {
                content.style.display = "none";
            });
            const tabId = this.getAttribute("data-tab");
            document.getElementById(tabId).style.display = "block";
            filmTabButtons.forEach(function(btn) {
                btn.classList.remove("active");
            });
            this.classList.add("active");
        });
    });

    // Récupération des éléments de la modale pour les séances
    const sessionModal = document.getElementById("sessionModal");
    const openSessionModalBtn = document.getElementById("openSessionModal");
    const closeSessionModalBtn = document.getElementById("closeSessionModal");
    const sessionTabButtons = document.querySelectorAll(".sessionTab");
    const sessionTabContents = document.querySelectorAll(".sessionTabContent");

    // Ouvrir la modale des séances
    openSessionModalBtn.addEventListener("click", function() {
        sessionModal.style.display = "block";
    });

    // Fermer la modale des séances lorsqu'on clique sur la croix
    closeSessionModalBtn.addEventListener("click", function() {
        sessionModal.style.display = "none";
    });

    // Fermer la modale des séances lorsqu'on clique en dehors du contenu
    window.addEventListener("click", function(event) {
        if (event.target == sessionModal) {
            sessionModal.style.display = "none";
        }
    });

    // Gestion des onglets des séances
    sessionTabButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            sessionTabContents.forEach(function(content) {
                content.style.display = "none";
            });
            const tabId = this.getAttribute("data-tab");
            document.getElementById(tabId).style.display = "block";
            sessionTabButtons.forEach(function(btn) {
                btn.classList.remove("active");
            });
            this.classList.add("active");
        });
    });
});