<?php
session_start(); // Start the session from the beginning

// Load database configuration
$dbConfig = parse_ini_file("../Controllers/.env");

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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $motdepasse = trim($_POST['motdepasse'] ?? '');

    if (!empty($email) && !empty($motdepasse)) {
        // Check if the email exists in the database
        $sql = "SELECT id, password FROM utilisateurs WHERE emailadress = :emailadress";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':emailadress', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($motdepasse, $user['password'])) {
           // Connection successful -> Session creation
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../Controllers/indexgame.php");// Redirection to the connected page
            exit();
        } else {
            // Store the error message in the session
            $_SESSION['error_message'] = "Email ou mot de passe incorrect.";
            header("Location: ../Pages/connect.php"); // Return to login page
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Tous les champs sont requis.";
        header("Location: ../Pages/connect.php"); // Return to login page
        exit();
    }
}
?>
