<?php
include '../accueil/header.php';

$user_id = $_SESSION['id'];

$filename = "../traitement/users.csv";
$file = fopen($filename, "a+");

if ($_SESSION['rôle'] == 'User')
{
    while (($line = fgetcsv($file)) !== false)
    {
        if ($line[3] == $user_id)
        {
            echo "<h3>Current Last name</h3>";
            echo "<li>$line[1]</li>";
            echo "<h3>Current First name</h3>";
            echo "<li>$line[2]</li>";
            echo "<h3>Current Email</h3>";
            echo "<li>$line[6]</li>";
        }
    }
}
else
{
    header('location: ../accueil/accueil.php');
}

fclose($file);