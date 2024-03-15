<?php
session_start();
$error;

if (isset($_POST['id']) && isset($_POST['password'])) {
    $file_name = 'users.csv';
    $file = fopen($file_name, 'r');

    if ($file)
    {
        while (($line = fgetcsv($file)) == TRUE)
        {
            if ($line[3] === $_POST['id'])
            {
                if (password_verify($_POST['password'], $line[4]))
                {
                    if ($line[5] == '1')
                    {
                        $_SESSION['rôle'] = $line[0];
                        $_SESSION['lastname'] = $line[1];
                        $_SESSION['firstname'] = $line[2];
                        $_SESSION['email'] = $line[6];
                        
                        if (($line[0] == 'User'))
                        {
                            $_SESSION['id'] = $_POST['id'];
                            fclose($file);
                            header('location: ../user/user.php');
                            exit();
                        }
                        if ($line[0] == 'School')
                        {
                            $_SESSION['id'] = $_POST['id'];
                            fclose($file);
                            header('location: ../school/school.php');
                            exit();
                        }
                        if ($line[0] == 'Company')
                        {
                            $_SESSION['id'] = $_POST['id'];
                            fclose($file);
                            header('location: ../company/company.php');
                            exit();
                        }

                        if ($line[0] == 'Admin') {
                            $_SESSION['id'] = $_POST['id'];
                            $_SESSION['admin'] = true;
                            fclose($file);
                            header('location: ../admin/admin.php');
                            exit();
                        }
                    }
                    else 
                    {
                        $error = "L'utilisateur a été desactiver";
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

    if(isset($_POST['g-recaptcha-response']))
    {
        $captchaResponse = $_POST['g-recaptcha-response'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => $secretKey,
            'response' => $captchaResponse
        );
    
        $options = array('http' => array ('method' => 'POST','content' => http_build_query($data)));
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response, true);
    }
}