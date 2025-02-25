<script>
// Fonction pour naviguer entre les pages
function showPage(pageId) {
  document.getElementById("home-page").style.display = "none";
  document.getElementById("histoire-page").style.display = "none";
  document.getElementById("personnages-page").style.display = "none";
  document.getElementById(pageId).style.display = "flex";
}

// Gestion du choix des personnages
let selectedCharacter = null;

function selectCharacter(character) {
  selectedCharacter = character;
  alert(`Vous avez sélectionné ${character}`);
}

function startGame() {
  if (selectedCharacter) {
    alert(`Le jeu commence avec ${selectedCharacter}`);
    // Ajoutez ici la logique pour démarrer le jeu
  } else {
    alert("Veuillez sélectionner un personnage");
  }
}
</script>