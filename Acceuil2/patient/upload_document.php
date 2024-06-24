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

// Vérifier que le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $docteur_id = $_POST['docteur_id'] ? $_POST['docteur_id'] : NULL;

    // Gérer le téléchargement du fichier
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
        // Insérer les détails du document dans la base de données
        $stmt = $conn->prepare("INSERT INTO documents (titre, nom_fichier, utilisateurs_id, docteur_id, date_creation) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssiii", $titre, $_FILES["document"]["name"], $utilisateurs_id, $docteur_id);
        $stmt->execute();
        $stmt->close();
    }
}

header('Location: documents.php');
exit;
?>
