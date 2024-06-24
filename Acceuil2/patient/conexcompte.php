<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "healthnorth";

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $num_secu = $_POST['num_secu'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hacher le mot de passe

    // Préparer et exécuter la requête d'insertion
    $sql = "INSERT INTO utilisateurs (nom, prenom, date_naissance, num_secu, adresse, email, telephone, mot_de_passe)
            VALUES ('$nom', '$prenom', '$date_naissance', '$num_secu', '$adresse', '$email', '$telephone', '$mot_de_passe')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel enregistrement créé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
