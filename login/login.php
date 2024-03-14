<?php

include('../accueil/header.php');
if(empty($_SESSION['identifiant'])){
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire d'inscription</title>
            <link rel="stylesheet" href="./login.css">
        </head>

        <body>
            <div class="container">
                <h2>Connexion</h2>
                <form action="../traitement/traitement_connexion.php" method="post">
                    <label for="identifiant">Identifiant :</label>
                    <input type="text" id="identifiant" name="identifiant" required>
                    <label for="mot_de_passe">Mot de passe :</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" required>
                    <input type="submit" value="Se connectez">
                </form>
                <p>Vous n'avez pas de compte ? <a href="inscription.php"> Inscrivez-vous</a></p>
            </div>
        </body>
        </html>
<?php
}
else{
    header('location: ../accueil/index.php');
}
?>