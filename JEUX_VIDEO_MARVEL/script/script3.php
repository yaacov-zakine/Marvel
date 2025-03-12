<script>
// Function to navigate between pages
function showPage(pageId) {
  document.getElementById("home-page").style.display = "none";
  document.getElementById("histoire-page").style.display = "none";
  document.getElementById("personnages-page").style.display = "none";
  document.getElementById(pageId).style.display = "flex";
}

// Character choice management
let selectedCharacter = null;

function selectCharacter(character) {
  selectedCharacter = character;
  alert(`Vous avez sélectionné ${character}`);
}

function startGame() {
  if (selectedCharacter) {
    alert(`Le jeu commence avec ${selectedCharacter}`);
    // Add logic here to start the game
  } else {
    alert("Veuillez sélectionner un personnage");
  }
}
</script>