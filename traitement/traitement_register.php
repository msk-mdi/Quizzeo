<?php

session_start();

$error;
if (isset($_POST['type']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['id']) && isset($_POST['password']) && isset($_POST['Email']))
{
    $expression_mail = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/';
    $expression_password = '/^[a-zA-Z0-9._-]{8,512}$/';
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $_SESSION['password'] = $password;

    if (preg_match($expression_mail, $email))
    {
        if (preg_match($expression_password, $password))
        {
            $file_name = 'users.csv';
            $file = fopen($file_name, 'a');
        
            $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
            fputcsv($file, [$_POST['type'], $_POST['lastname'], $_POST['firstname'], $_POST['id'], $password_hash, '1', $_POST['Email']]);
            fclose($file);
            $_SESSION['id'] = $_POST['id'];
            header('location: ../accueil/accueil.php');
        }
        else
        {
            $error = 'Le mots de passe a besoin de 8 caracteres minimum';
        }
    }
    else
    {
        $error = 'Votre email est incorrect';
    }
}

echo $error;