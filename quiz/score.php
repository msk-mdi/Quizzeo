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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link  rel="stylesheet" href="../quiz/score.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
