<?php
$dbConfig = parse_ini_file(".env");

$host = $dbConfig["host"];
$username = $dbConfig["username"];
$password = $dbConfig["password"];
$dbName = $dbConfig["name"];

try {
    $pdo = new PDO(
        'mysql:host=' . $host . ';dbname=' . $dbName,
        $username,
        $password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );
} catch (PDOException $e) {
    die("Can't connect to $dbName :" . $e->getMessage());
}

if (isset($_POST["username"])&& isset($_POST["password"])&& isset($_POST["emailadress"])&& isset($_POST["pseudo"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $emailadress = $_POST["emailadress"];
    $pseudo = $_POST["pseudo"];

    $request = $pdo->prepare('INSERT INTO marvelRun (username,password,emailadress,pseudo) VALUES (:username,:password,:emailadress,:pseudo)');
    $request->bindParam(':username', $username, PDO::PARAM_STR);
    $request->bindParam(':password', $password, PDO::PARAM_STR);
    $request->bindParam(':emailadress', $emailadress, PDO::PARAM_STR);
    $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

    try {
        $request->execute();
        echo "Utilisateur ajouté avec succès !";
    } catch (PDOException $e) {
        die("Erreur lors de l'insertion : " . $e->getMessage());
    }
} else {
    echo "Tous les champs sont obligatoires";
}