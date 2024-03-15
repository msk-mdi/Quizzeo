<?php
include '../accueil/header.php';

if ($_SESSION['id'] == 'User')
{?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User</title>
        </head>
        <body>
            <h1>User page</h1>
        </body>
    </html><?php
}
else
{
    header('location: ../accueil/accueil.php');
}

// faire ceci:
// Rôle Utilisateur
// Le rôle utilisateur permet simplement de répondre aux questionnaires. La page de base lors de la connexion est un dashboard qui indique simplement les questionnaires auxquels il a déjà répondu.
// Il doit également avoir à sa disposition une page de gestion de profil lui permettant de modifier ses informations personnelles (nom, prénom, adresse mail, mot de passe, ...)

// L'accès aux quiz se fait sur la fourniture d'un lien simple d'accès direct au quiz.