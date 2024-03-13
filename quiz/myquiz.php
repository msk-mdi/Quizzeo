<?php

include('../accueil/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['question']) && isset($_POST['reponse_correcte'])) {
        // Récupération de la question
        $question = $_POST['question'];

        // Récupération de la réponse correcte
        $reponse_correcte = $_POST['reponse_correcte'];

        // Récupération des choix supplémentaires
        $choix_supplementaires = array();
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'choix_n°') === 0) {
                $choix_supplementaires[] = $value;
            }
        }

        // Création de la carte du quiz
        echo '<div class="card">';
        echo '<div class="card-header">' . $question . '</div>';
        echo '<div class="card-body">';
        echo '<ul>';
        foreach ($choix_supplementaires as $choix) {
            echo '<li>' . $choix . '</li>';
        }
        echo '</ul>';
        echo '<p>Réponse correcte : ' . $reponse_correcte . '</p>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "Toutes les données requises ne sont pas disponibles.";
    }
}
?>
