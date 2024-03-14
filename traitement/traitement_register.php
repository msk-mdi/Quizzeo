<?php

session_start();

if (isset($_POST['type']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['id']) && isset($_POST['password']))
{
    $file_name = 'users.csv';
    $file = fopen($file_name, 'a');

    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    fputcsv($file, [$_POST['type'], $_POST['lastname'], $_POST['firstname'], $_POST['id'], $password_hash, '1']);
    fclose($file);
    $_SESSION['id'] = $_POST['id'];
    header('location: ../accueil/accueil.php');
}