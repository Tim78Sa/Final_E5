<?php
// Connexion à la base de données
$conn = new mysqli('127.0.0.1', 'root', '', 'healthnorth');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les ordonnances pour le docteur/secrétaire connecté (supposons que le secrétaire ID est 1 pour l'exemple)
$secreteriat_id = 1;
$ordonnances = $conn->query("SELECT ordonnance.ordonnace_id, utilisateurs.nom, utilisateurs.prenom, rdv.date_rdv, rdv.heure_rdv, docteur.nom AS nom_docteur FROM ordonnance JOIN utilisateur ON ordonnance.utilisateurs_id = utilisateurs.utilisateurs_id JOIN rdv ON ordonnance.id_rdv = rdv.rdv_id JOIN docteur ON ordonnance.docteur_id = docteur.docteur_id WHERE ordonnance.secretaire_id = $secreteriat_id");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $ordonnance_id = $_POST['ordonnance_id'];
    $prix = $_POST['prix'];

    // Insérer la facture dans la base de données
    $sql = "INSERT INTO facture (utilisateurs_id, heure, date, secretaire_id, ordonnance_id, prix, docteur_id) VALUES ((SELECT utilisateur_id FROM ordonnance WHERE id = ?), (SELECT heure FROM rdv WHERE id = (SELECT rdv_id FROM ordonnance WHERE id = ?)), (SELECT date FROM rdv WHERE id = (SELECT rdv_id FROM ordonnance WHERE id = ?)), ?, ?, ?, (SELECT docteur_id FROM ordonnance WHERE id = ?))";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiii", $ordonnance_id, $ordonnance_id, $ordonnance_id, $secreteriat_id, $ordonnance_id, $prix, $ordonnance_id);

    if ($stmt->execute()) {
        echo "Facture créée avec succès!";
    } else {
        echo "Erreur: " . $stmt->error;
    }
}
