<?php
// Configuration de la base de données
$config = parse_ini_file('config.ini');

$dsn = "mysql:host=" . $config['host'] . ";port=" . $config['port'] . ";dbname=" . $config['dbname'] . ";charset=utf8";
$dbUser = $config['dbuser'];
$dbPassword = $config['dbpassword'];

try {
    $dbo = new PDO($dsn, $dbUser, $dbPassword);
    $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // Enregistre l'erreur dans un fichier de log
    error_log("Erreur de connexion à la base de données : " . $e->getMessage());
    echo "Une erreur est survenue. Veuillez contacter l'administrateur.";
    exit;
}
?>