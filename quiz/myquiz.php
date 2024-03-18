<?php
include('../accueil/header.php');

// Fonction pour afficher les boutons play pour chaque quiz
// Fonction pour afficher les boutons play pour chaque quiz, en évitant les doublons
function afficherQuizzes() {
    // Tableau pour stocker les titres des quiz déjà affichés
    $quizTitres = array();

    // Ouvrir le fichier contenant les titres des quiz
    $file = fopen("../traitement/quiz_data.csv", "r");
    fgetcsv($file);
    // Parcourir le fichier et stocker les titres des quiz
    while (($row = fgetcsv($file)) !== false) {
        if (isset($row['1'])) {
        $titreQuiz = $row[1]; // Récupérer le titre du quiz
        $quizTitres[] = $titreQuiz;
        }
    }

    fclose($file);

    // Supprimer les doublons de titres de quiz
    $quizTitres = array_unique($quizTitres);

    // Afficher les boutons play pour chaque titre de quiz
    foreach ($quizTitres as $titreQuiz) {
        echo "<div>";
        echo "<h3 class='quiz-title'><a href='jouer_quiz.php?quiz=$titreQuiz'>$titreQuiz</a></h3>";
        echo "<a href='jouer_quiz.php?quiz=$titreQuiz'><button class='play-button'>Play</button></a>"; // Lien vers la page pour jouer au quiz
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes disponibles</title>
    <link rel="stylesheet" href="../quiz/myquiz.css">
</head>
<body>
    <h1>Quiz disponibles</h1>
    <div class="quizzes-container">
          <?php afficherQuizzes(); ?>
    </div>
</body>
</html>