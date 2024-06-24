<?php
// send_reminders.php : Script PHP pour envoyer des rappels

$conn = new mysqli('127.0.0.1', 'root', '', 'healthnorth');

// Récupérer les rendez-vous de demain
$tomorrow = date('Y-m-d', strtotime('+1 day'));
$sql = "SELECT r.*, utilisateurs.email, utilisateurs.nom, utilisateurs.prenom 
        FROM rdv
        JOIN utilisateurs  ON rdv.utilisateurs_id = utilisateurs.utilisateurs_id
        WHERE rdv.date_rdv = '$tomorrow' AND rdv.rappel_envoye = FALSE";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $email = $row['email'];
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $date = $row['date'];
    $heure = $row['heure'];

    $subject = "Rappel de rendez-vous";
    $message = "Bonjour $prenom $nom,\n\nCeci est un rappel pour votre rendez-vous le $date à $heure.";
    $headers = "From: noreply@healthnorth.com";

    if (mail($email, $subject, $message, $headers)) {
        // Marquer le rappel comme envoyé
        $updateSql = "UPDATE rdv SET rappel_envoye = TRUE WHERE id = " . $row['id'];
        $conn->query($updateSql);
    }
}

$conn->close();

