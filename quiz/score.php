<?php
include('../accueil/header.php');
$file_name = '../traitement/quiz_resultat.csv';
$file = fopen($file_name, 'r');

// Tableau pour stocker les scores des utilisateurs
$scores = array();

while (($line = fgetcsv($file)) !== false) {
    if (isset($line[1])) {
        // Stocker le score dans le tableau associatif en utilisant l'ID de l'utilisateur comme clé
        $scores[$line[1]] = $line[3];
    }
}

fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../quiz/score.css">
    <title>Score</title>
</head>
<body>
    <div class="score">
        <h1>Félicitations !</h1>
        <?php
        // Vérifier si l'ID de session de l'utilisateur est dans le tableau des scores
        if (isset($_SESSION['id']) && isset($scores[$_SESSION['id']])) {
            echo '<h2>Bravo ' . $_SESSION['id'] . '. Voici votre score est de : ' . $scores[$_SESSION['id']] . '</h2>';
        } else {
            echo '<h2>Aucun score trouvé pour cet utilisateur.</h2>';
        }
        ?>
    </div>
</body>
</html>
