<?php
$connexion = new PDO('mysql:host=127.0.0.1;dbname=user','root','');
if ($connexion) {
    echo "connexion validé";
}
?>


<!DOCTYPE html>
<html lang="en">
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
        <from method="POST" action="">
        
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" required><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" id="prenom" name="prenom" required><br>

            <label for="date_naissance">Date de naissance :</label><br>
            <input type="date" id="date_naissance" name="date_naissance" required><br>

            <label for="num_secu">Numéro de sécurité sociale :</label><br>
            <input type="text" id="num_secu" name="num_secu" required><br>

            <label for="adresse">Adresse postale :</label><br>
            <input type="text" id="adresse" name="adresse" required><br>

            <label for="email">Adresse email :</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="telephone">Numéro de téléphone :</label><br>
            <input type="tel" id="telephone" name="telephone" required><br>

            <label for="mot_de_passe">Mot de passe :</label><br>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>


            <input type="submit" value="Créer le compte" class="blue-button">
        
        </from>
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
