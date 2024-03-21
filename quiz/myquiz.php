<?php
include('../accueil/header.php');

if ($_SESSION['rôle'] == 'School'){
function afficherQuizzes() {
    $quizTitres = array();
    $file = fopen("../traitement/quiz_data.csv", "r");
    fgetcsv($file);
    while (($row = fgetcsv($file)) !== false) {
        if (isset($row['1'])&& $row[0] == 'School') {
        $titreQuiz = $row[1];
        $quizTitres[] = $titreQuiz;
        }
    }

    fclose($file);

    $quizTitres = array_unique($quizTitres);


    foreach ($quizTitres as $titreQuiz) {
        echo "<div class='cardquiz'>";
        echo "<h3 class='quiz-title'><a href='jouer_quiz.php?quiz=$titreQuiz'>$titreQuiz</a></h3>";
        echo "<a href='jouer_quiz.php?quiz=$titreQuiz'><button class='play-button'>Play</button></a>";
        echo "</div>";
    }
}
}

if ($_SESSION['rôle'] == 'Company'){
    function afficherQuizzes() {
        $quizTitres = array();
        $file = fopen("../traitement/quiz_data.csv", "r");
        fgetcsv($file);
        while (($row = fgetcsv($file)) !== false) {
            if (isset($row['1'] )&& $row[0] == 'Company') {
            $titreQuiz = $row[1];
            $quizTitres[] = $titreQuiz;
            }
        }
    
        fclose($file);
    
        $quizTitres = array_unique($quizTitres);
    
    
        foreach ($quizTitres as $titreQuiz) {
            echo "<div class='cardquiz'>";
            echo "<h3 class='quiz-title'><a href='jouer_quiz.php?quiz=$titreQuiz'>$titreQuiz</a></h3>";
            echo "<a href='jouer_quiz.php?quiz=$titreQuiz'><button class='play-button'>Play</button></a>";
            echo "</div>";
        }
    }
    }

    if ($_SESSION['rôle'] == 'User'){
        function afficherQuizzes() {
            $quizTitres = array();
            $file = fopen("../traitement/quiz_data.csv", "r");
            fgetcsv($file);
            while (($row = fgetcsv($file)) !== false) {
                if (isset($row['1'] )) {
                $titreQuiz = $row[1];
                $quizTitres[] = $titreQuiz;
                }
            }
        
            fclose($file);
        
            $quizTitres = array_unique($quizTitres);
        
        
            foreach ($quizTitres as $titreQuiz) {
                echo "<div class='cardquiz'>";
                echo "<h3 class='quiz-title'><a href='jouer_quiz.php?quiz=$titreQuiz'>$titreQuiz</a></h3>";
                echo "<a href='jouer_quiz.php?quiz=$titreQuiz'><button class='play-button'>Play</button></a>";
                echo "</div>";
            }
        }
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes disponibles</title>
    <link rel="stylesheet" href="./myquiz.css"> 
</head>
<body>
    <h1>Quiz disponibles</h1>
    <div class="quizzes-container">
          <?php afficherQuizzes(); ?>
    </div>
</body>
</html>