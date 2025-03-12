import * as THREE from "https://cdn.jsdelivr.net/npm/three@0.136/build/three.module.js";

// Create the scene
const scene = new THREE.Scene();

// Create the camera
const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);
camera.position.z = 5;

// Create the renderer
const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Variable of the game
let score = 0;
let difficulty = 0.5;
let startTime = Date.now();
let gameOver = false;

// Score display in the corner of the screen
const scoreElement = document.createElement("div");
scoreElement.id = "scoreDisplay";
document.body.appendChild(scoreElement);

// Button to restart the game
const restartButton = document.createElement("button");
restartButton.id = "restartButton";
restartButton.innerText = "Rejouer";
restartButton.classList.add("fade-in");
restartButton.style.display = "none";
restartButton.addEventListener("click", () => window.location.reload());
document.body.appendChild(restartButton);

// Button to go back to the menu
const backToMenuButton = document.createElement("button");
backToMenuButton.id = "backToMenuButton";
backToMenuButton.innerText = "Retour au Menu";
backToMenuButton.addEventListener("click", () => {
  window.location.href = "../../Controllers/indexgame.php";
});
document.body.appendChild(backToMenuButton);

const loader = new THREE.TextureLoader();
let player;
let enemies = [];

// Contrôles du joueur (déplacement gauche/droite)
let moveLeft = false;
let moveRight = false;

document.addEventListener("keydown", (event) => {
  if (event.key === "ArrowLeft" || event.key === "a") moveLeft = true;
  if (event.key === "ArrowRight" || event.key === "d") moveRight = true;
});

document.addEventListener("keyup", (event) => {
  if (event.key === "ArrowLeft" || event.key === "a") moveLeft = false;
  if (event.key === "ArrowRight" || event.key === "d") moveRight = false;
});

// Create the player
loader.load(
  "assets/model/invisibleWoman.png",
  (texture) => {
    const material = new THREE.SpriteMaterial({ map: texture });
    player = new THREE.Sprite(material);
    player.scale.set(1.2, 1.2, 1.2); // Player size
    player.position.y = -2.5; // Position of the player
    scene.add(player);
    console.log("Joueur chargé :", player);
  },
  undefined,
  (error) => {
    console.error("Erreur lors du chargement de l'image du joueur :", error);
  }
);

// Update player position
function updatePlayer() {
  if (!player) return;

  const speed = 0.1;
  const limit = 4;

  if (moveLeft && player.position.x > -limit) {
    player.position.x -= speed;
  }
  if (moveRight && player.position.x < limit) {
    player.position.x += speed;
  }
}

// Create function for the enemy
function createEnemy() {
  if (gameOver) return;

  loader.load(
    "assets/model/docteurFatalise.png",
    (texture) => {
      const material = new THREE.SpriteMaterial({ map: texture });
      const enemy = new THREE.Sprite(material);
      enemy.scale.set(1, 1, 1); // Enemy size
      enemy.position.set((Math.random() - 0.3) * 8, 5, 0);
      scene.add(enemy);
      enemies.push(enemy);
      console.log("Ennemi ajouté :", enemy);
    },
    undefined,
    (error) => {
      console.error(
        "Erreur lors du chargement de l'image de l'ennemi :",
        error
      );
    }
  );
}

// Enemy moving function
function updateEnemies() {
  for (let badguy = 0; badguy < enemies.length; badguy++) {
    enemies[badguy].position.y -= 0.04 * difficulty;

    if (checkCollision(enemies[badguy], player)) {
      showGameOver();
      return;
    }

    if (enemies[badguy].position.y < -5) {
      scene.remove(enemies[badguy]);
      enemies.splice(badguy, 1);
      badguy--;
    }
  }
}

// Detect collision between player and enemy
function checkCollision(enemy, player) {
  const distance = enemy.position.distanceTo(player.position);
  return distance < 0.6;
}

// Game Over display
function showGameOver() {
  gameOver = true;
  const elapsedTime = ((Date.now() - startTime) / 1000).toFixed(1);
  scoreElement.innerHTML = ` Game Over ! Score: ${score} | Temps: ${elapsedTime}s`;
  restartButton.style.display = "block";
}

// Update score and time
function updateScoreAndTime() {
  if (gameOver) return;

  score++;
  const elapsedTime = ((Date.now() - startTime) / 1000).toFixed(1);
  scoreElement.innerHTML = `Score: ${score} | Temps: ${elapsedTime}s`;

  if (score % 100 === 0) {
    difficulty += 0.2;
  }
}

// Generate enemy
setInterval(() => {
  for (let badguy = 0; badguy < 3; badguy++) createEnemy();
}, Math.max(2000 - score * 5, 500));

// Window resize handler
function handleWindowResize() {
  const width = window.innerWidth;
  const height = window.innerHeight;

  camera.aspect = width / height;
  camera.updateProjectionMatrix();

  renderer.setSize(width, height);
}

window.addEventListener("resize", handleWindowResize);
handleWindowResize();

// Animation loop
function animate() {
  if (gameOver) return;

  requestAnimationFrame(animate);

  if (player) {
    updatePlayer();
    updateEnemies();
    updateScoreAndTime();
  }

  renderer.render(scene, camera);
}

animate();
