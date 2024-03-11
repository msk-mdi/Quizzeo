<?php
include('../accueil/header.php');
if(empty($_SESSION['id'])){
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire d'inscription</title>
            <link rel="stylesheet" href="./connection.css">
        </head>

        <body>
            <div class="container">
                <h2>Connexion</h2>
                <form action="../traitement/traitement_connexion.php" method="post">
                    <label for="id">Your ID :</label>
                    <input type="text" id="id" name="id" required>
                    <label for="password">Password :</label>
                    <input type="password" id="password" name="password" required>
                    <input type="submit" value="Connect">
                </form>
                <p>You have not an account ? <a href="register.php"> Register</a></p>
            </div>
        </body>
        </html>
<?php
}
else{
    header('location: ../accueil/index.php');
}
?>