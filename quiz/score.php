<?php
var_dump(($_POST));
$score = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reponsesFile = fopen("../traitement/quiz_reponse.csv", "r");
    if ($reponsesFile) {
        fgetcsv($reponsesFile); // Ignorer la première ligne (en-têtes)
        while (($reponsesData = fgetcsv($reponsesFile)) !== false) {
            // Vérifier si la réponse de l'utilisateur est correcte
            if (isset($_POST[$id_unique])) {
                // La clé existe, vous pouvez y accéder en toute sécurité
                $reponseUtilisateur = $_POST[$id_unique];
                echo $reponseUtilisateur;
            } else {
                // La clé n'existe pas, faites quelque chose pour gérer cette situation
            }
            
        }
        fclose($reponsesFile);
    }
    echo "<p>Votre score total est : $score</p>";
}