<?php 
            
            $servername ="localhost";


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - Health North</title>
    <link rel="stylesheet" href="compte.css">
</head>

    <!-- En-tête avec le titre et le logo -->
    <header>
        <div class="title">Le travail c'est la santé, nous travaillons pour votre santé</div>
        <div class="logo">
            <img src="logo.png" alt="Logo Health North">
        </div>
    </header>

<body>
    <!-- En-tête avec le titre -->
    <header>
        <div class="title">Créer un compte</div>
    </header>

    <!-- Formulaire de création de compte -->
    <div class="form-container">
        <form action="" method="post">
            <label for="">Nom :</label><br>
            <input type="text" name="nom"><br>

            <label for="">Prénom :</label><br>
            <input type="text" name="prenom"><br>

            <label for="">Date de naissance :</label><br>
            <input type="date" name="date_naissance"><br>

            <label for="">Numéro de sécurité sociale :</label><br>
            <input type="text" name="num_secu"><br>

            <label for="">Adresse postale :</label><br>
            <input type="text" name="adresse"><br>

            <label for="">Adresse email :</label><br>
            <input type="email" name="mail"><br>

            <label for="">Numéro de téléphone :</label><br>
            <input type="tel" name="tel"><br>

            <input type="submit" value="Créer le compte" class="blue-button">
        </form>
    </div>

    <!-- Pied de page avec liens -->
    <footer>
        <div class="footer-links">
            <a href="#">Réseaux sociaux</a>
            <a href="#">RGPD</a>
            <a href="#">Nous contacter</a>
            <a href="#">Postuler</a>
        </div>
    </footer>
</body>
</html>
