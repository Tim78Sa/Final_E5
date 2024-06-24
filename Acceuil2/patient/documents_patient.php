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

// Récupérer les documents du patient
$result = $conn->query("SELECT * FROM documents WHERE utilisateurs_id = $utilisateurs_id");

$documents = [];
while ($row = $result->fetch_assoc()) {
    $documents[] = $row;
}

// Récupérer la liste des docteurs pour le formulaire
$docteurs = $conn->query("SELECT docteur_id, nom, prenom FROM docteur");
