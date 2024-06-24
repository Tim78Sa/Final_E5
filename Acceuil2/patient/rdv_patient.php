<?php
// Connexion à la base de données
$conn = new mysqli('127.0.0.1', 'root', '', 'healthnorth');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Supposons que l'utilisateur est connecté et son ID est stocké dans une session
session_start();
$utilisateurs_id = $_SESSION['utilisateurs_id'];

// Récupérer les rendez-vous du patient
$result = $conn->query("SELECT rdv.date_rdv, rdv.heure_rdv, docteur.nom AS docteur_nom, docteur.specialisation
                        FROM rdv
                        JOIN docteur ON rdv.docteur_id = docteur.id
                        WHERE rdv.utilisateurs_id = $utilisateurs_id");

$rdvs = [];
while ($row = $result->fetch_assoc()) {
    $rdvs[] = $row;
}