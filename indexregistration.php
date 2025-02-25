<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <img
      class="registrationpage"
      src="IMAGESSITE/registrationpage.svg"
      alt="registrationpage"
    />

    <div class="form-registration">
      <form id="registrationForm" action="register.php" method="POST">
        <div class="form-fields">
          <div class="form-row">
            <div class="form-group">
              <label for="fullname">Nom Complet :</label>
              <input
                type="text"
                class="username"
                name="username"
                placeholder="Entrer votre nom"
                required
              />
            </div>

            <div class="form-group">
              <label class="form-group" for="username">Pseudo :</label>
              <input
                type="text"
                class="pseudo"
                name="pseudo"
                placeholder="Entrer votre pseudo"
                required
              />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="email">Adresse mail :</label>
              <input
                type="email"
                class="emailadress"
                name="emailadress"
                placeholder="Entrer votre mail"
                required
              />
            </div>
            <div class="form-group">
              <label for="password">Mot de passe :</label>
              <div class="password-container">
                <input
                  type="password"
                  class="password"
                  name="password"
                  placeholder="Entrer votre mot de passe"
                  required
                />
                <span class="toggle-password" onclick="togglePassword()"
                  >👁️</span
                >
              </div>
            </div>
          </div>
        </div>
        <div class="form-actions">
          <a href="indexgame.php">
            <buttonz id="submitBtn" class="btn" type="submit"
              >S'INSCRIRE</buttonz
            >
          </a>
        </div>

        <p id="error-message" style="color: red; display: none">
          Veuillez remplir tous les champs avant de vous inscrire.
        </p>
      </form>
    </div>
  </body>
</html>

<?php

include 'script.js';
include 'script2.php';