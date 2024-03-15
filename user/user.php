<?php
include '../accueil/header.php';

if ($_SESSION['rôle'] == 'User')
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
            <h3>Current First name</h3>
            <?php 
            if (isset($_SESSION['firstname']))
            {
                $firstname = $_SESSION['firstname'];
                echo "<li>$firstname</li>";
            }?>
            
            <h3>Current Last name</h3>
            <?php
            if (isset($_SESSION['lastname']))
            {
                $lastname = $_SESSION['lastname'];
                echo "<li>$lastname</li>";
            }?>

            <h3>Current email</h3>
            <?php 
            if (isset($_SESSION['email']))
            {
                $email = $_SESSION['email'];
                echo "<li>$email</li>";
            }?>

            <input type="text" placeholder="LastName" id="lastname" name="lastname" required>
            <input type="text" placeholder="FirstName" id="firstname" name="firstname" required>
            <input type="text" placeholder="Email" id="Email" name="Email" required>
            <input type="text" placeholder="New ID" id="id" name="id" required>
            <input type="password" placeholder="Password" id="password" name="password" required>
            <input type="submit" value="Confirmer les modifications">
        </body>
    </html><?php
}
else
{
    header('location: ../accueil/accueil.php');
}
