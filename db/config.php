<?php 
    // Charge automatiquement les classes installées avec Composer
    require_once __DIR__. '/../vendor/autoload.php';
    // Charge les variables du fichier .env
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); // __DIR__ = dossier actuel
    $dotenv->load();

    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];

    try {
        // Création d'une instance PDO pour se connecter à MySQL
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Activer le mode exception pour voir les erreurs SQL s’il y en a
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo("Connexion to database successfull");
    } catch (PDOEXCEPTION $e) {
        echo("Connexion error". $e->getMessage());
    }
?>
