<?php
session_start();
$error;

if (isset($_POST['id']) && isset($_POST['password'])) {
    $file_name = 'users.csv';
    $file = fopen($file_name, 'r');

    if ($file) {
        while (($line = fgetcsv($file)) !== false) {
            if ($line[3] === $_POST['id']) {
                if (password_verify($_POST['password'], $line[4])) {

                    if (($line[0] == 'User'))
                    {
                        $_SESSION['id'] = $_POST['id'];
                        fclose($file);
                        header('location: ../user/user.php');
                        exit();
                    }
                    if (($line[0] == 'School'))
                    {
                        $_SESSION['id'] = $_POST['id'];
                        fclose($file);
                        header('location: ../school/school.php');
                        exit();
                    }
                    if (($line[0] == 'Company'))
                    {
                        $_SESSION['id'] = $_POST['id'];
                        fclose($file);
                        header('location: ../company/company.php');
                        exit();
                    }

                    // admin page
                    if (($line[0] == 'Admin')) {
                        $_SESSION['id'] = $_POST['id'];
                        $_SESSION['admin'] = true;
                        fclose($file);
                        header('location: ../admin/admin.php');
                        exit();
                    }
                }
                else
                {
                    $error = "Le mot de passe est incorrect.";
                }
            }
            else
            {
                $error = "L'id n'existe pas.";
            }
        }
        fclose($file);
    }
    else
    {
        $error = "Erreur lors de l'ouverture du fichier.";
    }
    echo $error;
}