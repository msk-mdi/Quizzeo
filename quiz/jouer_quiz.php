<?php

include('../accueil/header.php');
// Initialisation de la variable score
$score = 0;
$quizSelectionne = $_GET['quiz'];

// Ouvrir le fichier CSV contenant les données des quiz
$quizDataFile = fopen("../traitement/quiz_data.csv", "r");

// Vérifier si le fichier est ouvert avec succès
if ($quizDataFile) {
    // Ignorer la première ligne (en-têtes)
    fgetcsv($quizDataFile);

    // Lire les données des quiz depuis le fichier CSV
    while (($quizData = fgetcsv($quizDataFile)) !== false) {
        // Assurez-vous que la ligne contient des données valides
        if (!empty ($quizData[1]) && $quizSelectionne == $quizData[1]) {
            // Récupérer le titre du quiz depuis la deuxième colonne
            $titreQuiz = $quizData[1];

            // Afficher le titre du quiz
            echo "<h2>Titre du quiz : $titreQuiz</h2>";
            // Ouvrir le fichier CSV contenant les questions du quiz
            $questionsFile = fopen("../traitement/quiz_question.csv", "r");

            // Vérifier si le fichier est ouvert avec succès
            if ($questionsFile) {
                // Ignorer la première ligne (en-têtes)
                fgetcsv($questionsFile);

                // Lire les questions correspondantes depuis le fichier CSV
                while (($questionsData = fgetcsv($questionsFile)) !== false) {
                    // Vérifier si le titre du quiz correspond
                    if ($questionsData[0] === $titreQuiz) {
                        // Afficher la question
                        echo "<p>Question : {$questionsData[1]}</p>";

                        // Ouvrir le fichier CSV contenant les réponses
                        $reponsesFile = fopen("../traitement/quiz_reponse.csv", "r");

                        // Vérifier si le fichier est ouvert avec succès
                        if ($reponsesFile) {
                            // Ignorer la première ligne (en-têtes)
                            fgetcsv($reponsesFile);

                            // Variable pour indiquer si la réponse à cette question est sélectionnée
                            $reponseSelectionnee = false;

                            // Parcourir le fichier CSV et afficher les réponses associées à la question
                            while (($reponsesData = fgetcsv($reponsesFile)) !== false) {
                                // Vérifier si la question correspond
                                if ($reponsesData[0] === $titreQuiz && $reponsesData[1] === $questionsData[1]) {
                                    // Afficher les choix de réponses avec des boutons radio
                                    echo "<form action='' method='post'>";
                                    echo "<input type='radio' name='reponse' value='{$reponsesData[2]}'> {$reponsesData[2]}<br>";
                                    echo "<input type='radio' name='reponse' value='{$reponsesData[3]}'> {$reponsesData[3]}<br>";
                                    echo "<input type='radio' name='reponse' value='{$reponsesData[4]}'> {$reponsesData[4]}<br>";
                                    echo "<input type='radio' name='reponse' value='{$reponsesData[5]}'> {$reponsesData[5]}<br>";
                                    echo "<input type='submit' value='Valider'>";
                                    echo "</form>";

                                    // Indiquer que la réponse à cette question est sélectionnée
                                    $reponseSelectionnee = true;
                                }
                            }

                            // Fermer le fichier CSV des réponses
                            fclose($reponsesFile);

                            // Vérifier si une réponse a été sélectionnée pour cette question
                            if (!$reponseSelectionnee) {
                                echo "<p style='color: red;'>Vous devez sélectionner une réponse pour cette question.</p>";
                            }
                        }
                    }
                }

                // Fermer le fichier CSV des questions
                fclose($questionsFile);
            }
        }
    }

    // Fermer le fichier CSV des données des quiz
    fclose($quizDataFile);

    // Afficher le bouton Valider uniquement si toutes les questions ont une réponse sélectionnée
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer la réponse soumise par l'utilisateur
        $reponseUtilisateur = $_POST['reponse'];
        $reponsesFile = fopen("../traitement/quiz_reponse.csv", "r");

        // Vérifier si le fichier est ouvert avec succès
        if ($reponsesFile) {
            // Ignorer la première ligne (en-têtes)
            fgetcsv($reponsesFile);
            while (($reponsesData = fgetcsv($reponsesFile)) !== false) {
                // Vérifier si la réponse de l'utilisateur est correcte
                if ($reponsesData[6] === $reponseUtilisateur) {
                    $score++;
                }
            }
        }
        // Afficher le score total après avoir parcouru tous les quiz
        echo "<p>Votre score total est : $score</p>";
    }
}
