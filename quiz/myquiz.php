<?php
include('../accueil/header.php');

$home = "../accueil/accueil.php";

if (isset($_SESSION['rôle'])) 
{
    if ($_SESSION['rôle'] == 'School' || $_SESSION['rôle'] == 'Company') 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST['question']) && isset($_POST['reponse_correcte']))
            {
                $question = $_POST['question'];
        
                $reponse_correcte = $_POST['reponse_correcte'];
        
                $choix_supplementaires = array();
                foreach ($_POST as $key => $value)
                {
                    if (strpos($key, 'choix_n°') === 0)
                    {
                        $choix_supplementaires[] = $value;
                    }
                }

                echo '<div class="card">';
                echo '<div class="card-header">' . $question . '</div>';
                echo '<div class="card-body">';
                echo '<ul>';
                
                foreach ($choix_supplementaires as $choix)
                {
                    echo '<li>' . $choix . '</li>';
                }
                
                echo '</ul>';
                echo '<p>Réponse correcte : ' . $reponse_correcte . '</p>';
                echo '</div>';
                echo '</div>';
            }
            else
            {
                echo "Toutes les données requises ne sont pas disponibles.";
            }
        }
    }
    else
    {
        header("location:".$home);
    }
}
else
{
    header("location:".$home);
}