<?php

include('../accueil/header.php');
$score = 0;
$quizSelectionne = $_GET['quiz'];

$quizDataFile = fopen("../traitement/quiz_data.csv", "r");

if ($quizDataFile) {
    fgetcsv($quizDataFile);

    while (($quizData = fgetcsv($quizDataFile)) !== false) {
        if (!empty ($quizData[1]) && $quizSelectionne == $quizData[1]) {
            $titreQuiz = $quizData[1];

            echo "<h2>Titre du quiz : $titreQuiz</h2>";
            $questionsFile = fopen("../traitement/quiz_question.csv", "r");

            if ($questionsFile) {
                fgetcsv($questionsFile);

                while (($questionsData = fgetcsv($questionsFile)) !== false) {
                    if ($questionsData[0] === $titreQuiz) {
                        echo "<p>Question : {$questionsData[1]}</p>";

                        $reponsesFile = fopen("../traitement/quiz_reponse.csv", "r");

                        if ($reponsesFile) {
                            fgetcsv($reponsesFile);

                            $reponseSelectionnee = false;

                            while (($reponsesData = fgetcsv($reponsesFile)) !== false) {
                                if ($reponsesData[0] === $titreQuiz && $reponsesData[1] === $questionsData[1]) {
                                    echo "<form action='../quiz/score.php' method='post'>";

                                    echo "<input type='radio' name='{$reponsesData[1]}' value='{$reponsesData[2]}'> {$reponsesData[2]}<br>";
                                    echo "<input type='radio' name='{$reponsesData[1]}' value='{$reponsesData[3]}'> {$reponsesData[3]}<br>";
                                    echo "<input type='radio' name='{$reponsesData[1]}' value='{$reponsesData[4]}'> {$reponsesData[4]}<br>";
                                    echo "<input type='radio' name='{$reponsesData[1]}' value='{$reponsesData[5]}'> {$reponsesData[5]}<br>";

                                    $reponseSelectionnee = true;
                                }
                            }

                            fclose($reponsesFile);

                            if (!$reponseSelectionnee) {
                                echo "<p style='color: red;'>Vous devez sélectionner une réponse pour cette question.</p>";
                            }
                        }
                    }
                }
                echo "<input type='submit' value='Valider'>";
                echo "</form>";

                fclose($questionsFile);
            }
        }
    }
    fclose($quizDataFile);
  
    
}