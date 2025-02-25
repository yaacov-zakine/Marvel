<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Marvel Run - Choix des Personnages</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Bangers&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div id="personnages-page" class="container">
      <h1 class="title">Choisissez votre Personnage</h1>
      <div class="characters">
        <div class="character" onclick="selectCharacter('La torche humaine')">
          <img
            src="../Personnages PNG/L'homme feu Fantastic.png"
            alt="La torche humaine"
          />
          <p>La torche humaine</p>
        </div>
        <div class="character" onclick="selectCharacter('Mr. Fantastic')">
          <img src="../Personnages PNG/Mr Fantastic.png" alt="Mr. Fantastic" />
          <p>Mr. Fantastic</p>
        </div>
        <div class="character" onclick="selectCharacter('La Chose')">
          <img
            src="../Personnages PNG/La choses Fantastic.png"
            alt="La Chose"
          />
          <p>La Chose</p>
        </div>
        <div class="character" onclick="selectCharacter('Jane storm')">
          <img src="../Personnages PNG/Mmr fantastic.png" alt="Jane storm" />
          <p>Jane storm</p>
        </div>
      </div>
      <!-- Bouton pour démarrer la partie -->
      <a href="/Marvel-Run-Game/index.php"><button class="start-button" onclick="startGame()">
        Commencer la partie!
      </button></a>
    </div>
    <script src="script3.php"></script>
  </body>
</html>
