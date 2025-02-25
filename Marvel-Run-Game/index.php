<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Marvel Run Game</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="background"></div>

    <!-- Chargement de Three.js -->
    <script type="module">
        import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.173.0/build/three.module.min.js';
        console.log("Three.js chargé", THREE);
    </script>

    <!-- Chargement du script principal -->
    <script type="module" src="scriptjeu.js"></script>
</body>
</html>

