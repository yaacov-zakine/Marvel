<script>
document.addEventListener("DOMContentLoaded", function () {
  const image = document.querySelector(".homepage");
  const buttons = document.querySelector(".buttons");

  console.log("Image trouvée :", image);
  console.log("Boutons trouvés :", buttons);

  if (!image || !buttons) {
    console.error("Erreur : Élément manquant !");
    return;
  }

  image.addEventListener("animationend", function () {
    console.log("Animation terminée, affichage des boutons...");
    buttons.style.display = "flex"; // Affichage des boutons après l'animation
  });
});
</script>