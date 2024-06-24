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
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        // Afficher les données récupérées
        echo "<h2>Données récupérées du formulaire :</h2>";
        echo "<p>Adresse email : " . $email . "</p>";
        echo "<p>Mot de passe : " . $password . "</p>";
    } else {
        // Si le formulaire n'a pas été soumis, afficher un message d'erreur
        echo "<p>Aucune donnée n'a été soumise.</p>";
    }
    ?>
</body>
</html>
