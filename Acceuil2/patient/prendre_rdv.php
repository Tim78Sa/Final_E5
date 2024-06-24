<?php
// Connexion à la base de données
$conn = new mysqli('127.0.0.1', 'root', '', 'healthnorth');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer la liste des docteurs
$docteurs = $conn->query("SELECT docteur_id, nom, specialisation, region FROM docteur");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $utilisateurs_id = $_POST['utilisateurs_id'];
    $docteur_id = $_POST['docteur_id'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];

    // Insérer le rendez-vous dans la base de données
    $sql = "INSERT INTO rdv (utilisateurs_id, docteur_id, date, heure) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $utilisateurs_id, $docteur_id, $date, $heure);

    if ($stmt->execute()) {
        echo "Rendez-vous pris avec succès!";
    } else {
        echo "Erreur: " . $stmt->error;
    }
}
