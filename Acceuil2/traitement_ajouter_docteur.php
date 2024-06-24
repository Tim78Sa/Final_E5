<?php
// Récupérer les données du formulaire
$nom = $_POST['nom'];
$specialisation = $_POST['specialisation'];
$region = $_POST['region'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);

// Connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "healthnorth";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Préparer et exécuter la requête d'insertion
$stmt = $conn->prepare("INSERT INTO docteurs (nom, specialisation, region, adresse, email, telephone, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nom, $specialisation, $region, $adresse, $email, $telephone, $mot_de_passe);

if ($stmt->execute()) {
    echo "Docteur ajouté avec succès.";
} else {
    echo "Erreur: " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();

