<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../Style/style.css" />
    <script>
      function togglePopup() {
        var popup = document.getElementById("popup");
        popup.style.display = (popup.style.display === "block") ? "none" : "block";
      }
    </script>
  </head>
  <body>
    <img
      class="imagegame"
      src="../Images/imgxomics.png"
      alt="imagegamecomics"
    />
    <div class="allbtngame">
      <a href="../JEUX_VIDEO_MARVEL/script/Indexpartie.php">
        <div class="btngame">JOUER</div>
      </a>
      <div class="btngame" onclick="togglePopup()">TUTORIEL</div>
    </div>
    <audio autoplay loop>
      <source src="../Musiques/superhero-theme-7963.mp3" type="audio/mpeg">
      Votre navigateur ne supporte pas l'audio.
    </audio>

    <div id="popup" class="popup" style="display: none;">
      <div class="popup-content">
        <span class="close" onclick="togglePopup()">&times;</span>
        <h1>Tutoriel : Comment jouer à MARVEL RUN ?</h1>
        <p>Bienvenue dans <strong>MARVEL RUN</strong> ! Suivez ces étapes pour devenir un champion et tenter de remporter une récompense.</p>
        
        <h2>🏆 1. Choisissez votre personnage</h2>
        <p>Sélectionnez votre héros préféré parmi les personnages disponibles.</p>
        
        <h2>🎮 2. Lancez la partie</h2>
        <p>Cliquez sur <span class="highlight">"votre personnage favori"</span> pour entrer dans l'action.</p>
        
        <h2>⌨️ 3. Contrôlez votre personnage</h2>
        <p>Utilisez les <span class="highlight">flèches gauche et droite</span> de votre clavier pour déplacer votre personnage.</p>
        
        <h2>⚠️ 4. Évitez Docteur Boom !</h2>
        <p>Évitez à tout prix le personnage <span class="highlight">Docteur Boom</span> pour maximiser votre score !</p>
        
        <h2>🏅 5. Classement et récompenses</h2>
        <p>Les <span class="highlight">100 meilleurs joueurs</span> recevront une récompense exclusive par e-mail !</p>
        
        <p><strong>Bonne chance et amusez-vous bien ! 🎉</strong></p>
      </div>
    </div>
  </body>
</html>
