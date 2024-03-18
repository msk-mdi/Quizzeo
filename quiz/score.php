<?php
include('../accueil/header.php');
$score = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reponsesFile = fopen("../traitement/quiz_reponse.csv", "r");
    if ($reponsesFile) {
        fgetcsv($reponsesFile); // Ignorer la première ligne (en-têtes)
        while (($reponsesData = fgetcsv($reponsesFile)) !== false) {
            // Vérifier si la réponse de l'utilisateur est correcte
            $reponseUtilisateur = $_POST[$reponsesData[1]]; // Récupérer la réponse de l'utilisateur
            if ($reponsesData[6] === $reponseUtilisateur) {
                $score++;
            }
        }
        fclose($reponsesFile);
    }
    echo "<p>Votre score total est : $score</p>";
}
?>
