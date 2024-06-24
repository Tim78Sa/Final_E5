<?php
// Connexion à la base de données
$conn = new mysqli('127.0.0.1', 'root', '', 'healthnorth');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les rendez-vous du docteur connecté (supposons que le docteur ID est 1 pour l'exemple)
$docteur_id = 1;
$rdvs = $conn->query("SELECT rdv.rdv_id, utilisateurs.nom, utilisateurs.prenom, rdv.date_rdv, rdv.heure_rdv FROM rdv JOIN utilisateurs ON rdv.utilisateurs_id = utilisateurs.id WHERE rdv.docteur_id = $docteur_id");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $rdv_id = $_POST['rdv_id'];
    $commentaire = $_POST['commentaire'];

    // Insérer l'ordonnance dans la base de données
    $sql = "INSERT INTO ordonnance (utilisateurs_id, docteur_id, rdv_id, commentaire) VALUES ((SELECT utilisateurs_id FROM rdv WHERE id = ?), ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $rdv_id, $docteur_id, $rdv_id, $commentaire);

    if ($stmt->execute()) {
        echo "Ordonnance ajoutée avec succès!";
    } else {
        echo "Erreur: " . $stmt->error;
    }
}
