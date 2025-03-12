<?php 
   include '../Controllers/loginPageController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="../Style/style.css"/>
</head>
<body>
<img
      class="registrationpage"
      src="../Images/registrationpage.svg"
      alt="registrationpage"
    />


<div class="form-registration">
<form action="" method="post">

    <div class="form-row">
       <div class="form-group">
            <label for="fullname">Nom Complet :</label>
            <input type="text" id="identifiant" name="identifiant" required><br><br>
       </div>
       
       <div class="form-group">
    <label for="username">Personnage Favori :</label>
    <select id="pseudo" name="pseudo" required>
        <option value="">Sélectionnez un personnage</option>
        <option value="La Torche">La Torche</option>
        <option value="La chose">La chose</option>
        <option value="Mr fantastique">Mr fantastique</option>
        <option value="Invisible Women">Invisible Women</option>
        <option value="Dooms Day">Fatalis</option>
        <!-- Ajoutez d'autres options selon vos besoins -->
    </select>
    <br><br>
</div>
    </div>


    <div class="form-row">
         <div class="form-group">
             <label for="email">Adresse mail :</label>
             <input type="email" id="email" name="email" required><br><br>
         </div>

         <div class="form-group">
             <label for="password">Mot de passe :</label>
             <input type="password" id="motdepasse" name="motdepasse" required><br><br>
         </div>
    </div>

    <div class="form-actions">
            <button id="submitBtn" class="btn" type="submit"
              >S'INSCRIRE</button
            >
      </div>
</form>
</div>
</body>
</html>