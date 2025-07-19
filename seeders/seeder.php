<?php

$host = 'localhost';
$user = 'pguser';
$password = 'pgpassword';
$dbname = 'wanedb'; 
$port = 5433;

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Seed typeutilisateur
    $pdo->exec("INSERT INTO typeutilisateur (nom) VALUES ('client'), ('commercial') ON CONFLICT DO NOTHING;");

    // Récupérer l'id du type 'client'
    $stmt = $pdo->query("SELECT id FROM typeutilisateur WHERE nom = 'client' LIMIT 1;");
    $typeClient = $stmt->fetch(PDO::FETCH_ASSOC);
    $typeClientId = $typeClient ? $typeClient['id'] : 1;

    // Seed utilisateur
    $sql = "INSERT INTO utilisateur (nom, prenom, numeroTelephone, login, password, numeroIdentite, photorecto, photoverso, idTypeUtilisateur)
            VALUES (:nom, :prenom, :numeroTelephone, :login, :password, :numeroIdentite, :photorecto, :photoverso, :idTypeUtilisateur)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom' => 'Doe',
        ':prenom' => 'John',
        ':numeroTelephone' => '770000000',
        ':login' => 'johndoe',
        ':password' => password_hash('secret', PASSWORD_BCRYPT), // ~60 caractères
        ':numeroIdentite' => 'CNI123456',
        ':photorecto' => 'recto.jpg',
        ':photoverso' => 'verso.jpg',
        ':idTypeUtilisateur' => $typeClientId
    ]);

    echo "Données insérées avec succès !\n";
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage() . "\n";
    exit(1);
}
