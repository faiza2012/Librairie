<?php
$dsn = 'mysql:host=localhost;dbname=e2195490_librairie;charset=utf8';
$username = 'e2195490';
$password = 'Samyzakyrob2024@'; // même que FileZilla

try {
    $pdo = new PDO($dsn, $username, $password);
    echo "✅ Connexion réussie à la base de données MySQL.";
} catch (PDOException $e) {
    echo "❌ Erreur de connexion : " . $e->getMessage();
}
?>
