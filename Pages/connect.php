<?php 
session_start(); // Start the session from the beginning
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../Style/style.css">
</head>
<body>

    <img class="registrationpage" src="../Images/registrationpage.svg" alt="registrationpage">

    <div class="form-connect">
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']); // Delete the message after display
        }
        ?>
        
        <form action="../Controllers/connectController.php" method="POST">
            <div class="champ-row">
                <div class="champ">
                    <label for="email">Adresse mail :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="champ">
                    <label for="motdepasse">Mot de passe :</label>
                    <input type="password" id="motdepasse" name="motdepasse" required>
                </div>
                <button class="bouton" type="submit">SE CONNECTER</button>
            </div>
        </form>
    </div>

</body>
</html>
