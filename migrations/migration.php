<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../App/config/env.php';

$host = 'localhost';
$user = 'pguser';
$password = 'pgpassword';
$dbname = 'wanedb';
$port = 5433;

try {
    // Connexion à la base postgres pour créer la base si besoin
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=postgres", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la base si elle n'existe pas
    $stmt = $pdo->query("SELECT 1 FROM pg_database WHERE datname = '$dbname'");
    if (!$stmt->fetch()) {
        $pdo->exec("CREATE DATABASE \"$dbname\"");
        echo "Base de données '$dbname' créée avec succès.\n";
    } else {
        echo "Base de données '$dbname' déjà existante.\n";
    }

    // Connexion à la base cible
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requêtes de création des tables
    $sql = <<<SQL
CREATE TABLE IF NOT EXISTS typeutilisateur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS utilisateur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    numeroTelephone VARCHAR(50) NOT NULL,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    numeroIdentite VARCHAR(100) NOT NULL,
    photorecto VARCHAR(100) NOT NULL,
    photoverso VARCHAR(100) NOT NULL,
    idTypeUtilisateur INT,
    FOREIGN KEY (idTypeUtilisateur) REFERENCES typeutilisateur(id)
);

CREATE TABLE IF NOT EXISTS compte (
    id SERIAL PRIMARY KEY,
    date_creation DATE NOT NULL,
    solde FLOAT NULL,
    numeroCompte INTEGER NOT NULL,
    type VARCHAR(30) NOT NULL,
    idUtilisateur INT,
    FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id)
);

CREATE TABLE IF NOT EXISTS transaction (
    id SERIAL PRIMARY KEY,
    montant FLOAT NOT NULL,
    date DATE,
    type VARCHAR(30) NOT NULL,
    idCompte INT,
    FOREIGN KEY (idCompte) REFERENCES compte(id)
);
SQL;

    // Exécution des requêtes de création des tables
    $pdo->exec($sql);
    echo "Tables créées avec succès.\n";

} catch (PDOException $e) {
    echo "Erreur lors de la création de la base de données ou des tables : " . $e->getMessage() . "\n";
    exit(1);
}
