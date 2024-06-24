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

// Récupérer les informations du patient
$result = $conn->query("SELECT nom, prenom, num_secu FROM utilisateurs WHERE id = $utilisateurs_id");
$utilisateur = $result->fetch_assoc();
