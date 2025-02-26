<?php
$dbConfig = parse_ini_file(".env");

$host = $dbConfig["host"];
$user = $dbConfig["username"];
$pass = $dbConfig["password"];
$dbName = $dbConfig["name"];
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = trim($_POST['identifiant'] ?? '');
    $pseudo = trim($_POST['pseudo'] ?? '');
    $motdepasse = trim($_POST['motdepasse'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (!empty($identifiant) && !empty($pseudo) && !empty($motdepasse) && !empty($email)) {


        $motdepasse_hache = password_hash($motdepasse,PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs (username, pseudo, password, emailadress)
                VALUES (:username, :pseudo, :password, :emailadress)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $identifiant);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password', $motdepasse_hache);
        $stmt->bindParam(':emailadress', $email);

        if ($stmt->execute()) {
            header("Location: ../Controllers/indexgame.php");
exit();

        } else {
            echo "Erreur lors de l'inscription.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
}
?>