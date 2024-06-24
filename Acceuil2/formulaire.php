


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération des données du formulaire</title>
</head>
<body>
    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $date_naissance = $_POST["date_naissance"];
        $num_secu = $_POST["num_secu"];
        $adresse = $_POST["adresse"];
        $email = $_POST["email"];
        $telephone = $_POST["telephone"];
        
        // Afficher les données récupérées
        echo "<h2>Données récupérées du formulaire :</h2>";
        echo "<p>Nom : " . $nom . "</p>";
        echo "<p>Prénom : " . $prenom . "</p>";
        echo "<p>Date de naissance : " . $date_naissance . "</p>";
        echo "<p>Numéro de sécurité sociale : " . $num_secu . "</p>";
        echo "<p>Adresse postale : " . $adresse . "</p>";
        echo "<p>Adresse email : " . $email . "</p>";
        echo "<p>Numéro de téléphone : " . $telephone . "</p>";
    } else {
        // Si le formulaire n'a pas été soumis, afficher un message d'erreur
        echo "<p>Aucune donnée n'a été soumise.</p>";
    }
    ?>
</body>
</html>
