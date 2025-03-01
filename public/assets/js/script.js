document.addEventListener("DOMContentLoaded", function() {
    // Section : Inscription

    // Vérification du mot de passe
    const passwordInput = document.getElementById('password');
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const errors = validatePassword(password);
            const passwordHelp = document.getElementById('passwordHelp');

            if (errors.length > 0) {
                let message = "Le mot de passe doit comporter au moins : " + errors.slice(0, -1).join(", ") +
                              (errors.length > 1 ? " et " : "") + errors.slice(-1);
                passwordHelp.textContent = message;
            } else {
                passwordHelp.textContent = '';
            }

            checkPasswordMatch();
            checkFormValidity();
        });
    }

    // Vérification de la confirmation du mot de passe
    const confirmPasswordInput = document.getElementById('confirm_password');
    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', function() {
            checkPasswordMatch();
            checkFormValidity();
        });
    }

    // Vérification de l'email
    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            const email = this.value;
            fetch('/controllers/auth/CheckEmailController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'email=' + encodeURIComponent(email)
            })
            .then(response => response.json())
            .then(data => {
                const emailHelp = document.getElementById('emailHelp');
                if (data.exists) {
                    emailHelp.textContent = 'Cette adresse email est déjà utilisée.';
                } else {
                    emailHelp.textContent = '';
                }
                checkFormValidity();
            });
        });
    }

    // Vérification du nom d'utilisateur
    const usernameInput = document.getElementById('username');
    if (usernameInput) {
        usernameInput.addEventListener('blur', function() {
            const username = this.value;
            fetch('/controllers/auth/CheckUsernameController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'username=' + encodeURIComponent(username)
            })
            .then(response => response.json())
            .then(data => {
                const usernameHelp = document.getElementById('usernameHelp');
                if (data.exists) {
                    usernameHelp.textContent = 'Ce nom d\'utilisateur est déjà utilisé.';
                } else {
                    usernameHelp.textContent = '';
                }
                checkFormValidity();
            });
        });
    }

    // Fonction pour vérifier la correspondance des mots de passe
    function checkPasswordMatch() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const confirmPasswordHelp = document.getElementById('confirmPasswordHelp');

        if (password !== confirmPassword) {
            confirmPasswordHelp.textContent = 'Les mots de passe ne correspondent pas.';
        } else {
            confirmPasswordHelp.textContent = '';
        }
    }

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

    // Fonction pour vérifier si tous les champs sont valides
    function checkFormValidity() {
        const registerButton = document.querySelector('button[name="register"]');
        const formFields = document.querySelectorAll('#registerForm input, #registerForm textarea');
        let isValid = true;

        formFields.forEach(function(field) {
            if (!field.value ||
                (field.id === 'password' && validatePassword(field.value).length > 0) ||
                (field.id === 'confirm_password' && field.value !== document.getElementById('password').value) ||
                (field.id === 'username' && document.getElementById('usernameHelp').textContent) ||
                (field.id === 'email' && document.getElementById('emailHelp').textContent)) {
                isValid = false;
            }
        });

        registerButton.disabled = !isValid;
    }

    // Fonction pour masquer le message de succès après 5 secondes
    function hideSuccessMessage() {
        const successPopup = document.getElementById('successPopup');

        if (successPopup) {
            setTimeout(function() {
                successPopup.style.display = 'none';
            }, 3500);
        }
    }

    // Appeler la fonction pour masquer le message de succès
    hideSuccessMessage();

    // Section : Modale de gestion des films

    const filmModal = document.getElementById("filmModal");
    const openFilmModalBtn = document.getElementById("openFilmModal");
    const closeFilmModalBtn = document.getElementById("closeFilmModal");
    const filmTabButtons = document.querySelectorAll(".filmTab");
    const filmTabContents = document.querySelectorAll(".filmTabContent");

    // Ouvrir la modale des films
    if (openFilmModalBtn) {
        openFilmModalBtn.addEventListener("click", function() {
            filmModal.style.display = "block";
        });
    }

    // Fermer la modale des films lorsqu'on clique sur la croix
    if (closeFilmModalBtn) {
        closeFilmModalBtn.addEventListener("click", function() {
            filmModal.style.display = "none";
        });
    }

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

    // Section : Modale de gestion des séances

    const sessionModal = document.getElementById("sessionModal");
    const openSessionModalBtn = document.getElementById("openSessionModal");
    const closeSessionModalBtn = document.getElementById("closeSessionModal");
    const sessionTabButtons = document.querySelectorAll(".sessionTab");
    const sessionTabContents = document.querySelectorAll(".sessionTabContent");

    // Ouvrir la modale des séances
    if (openSessionModalBtn) {
        openSessionModalBtn.addEventListener("click", function() {
            sessionModal.style.display = "block";
        });
    }

    // Fermer la modale des séances lorsqu'on clique sur la croix
    if (closeSessionModalBtn) {
        closeSessionModalBtn.addEventListener("click", function() {
            sessionModal.style.display = "none";
        });
    }

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