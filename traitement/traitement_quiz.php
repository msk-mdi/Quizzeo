<?php
session_start();
    // Vérifier si le bouton de soumission a été cliqué et si des données ont été envoyées
    $titreQuiz = $_POST['titre_quiz'];
    $questionsData = array();

    // Parcourir les données pour chaque question
    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST['question' . $i])) {
            $question = $_POST['question' . $i];
            $choix1 = $_POST['question' . $i . '_1'];
            $choix2 = $_POST['question' . $i . '_2'];
            $choix3 = $_POST['question' . $i . '_3'];
            $choix4 = $_POST['question' . $i . '_4'];
            $reponseCorrecte = $_POST['reponse_correcte' . $i];

            // Ajouter les données de la question à un tableau
            $questionsData[] = array(
                'question' => $question,
                'choix1' => $choix1,
                'choix2' => $choix2,
                'choix3' => $choix3,
                'choix4' => $choix4,
                'reponseCorrecte' => $reponseCorrecte
            );
        }
    }

    // Écrire les données dans un fichier CSV
    $file = fopen("quiz_data.csv", "a");
    // Écrire les données de chaque question dans le fichier CSV
    foreach ($questionsData as $questionData) {
        $row = array($_SESSION['rôle'], $titreQuiz );
        fputcsv($file, $row);
    }
    fclose($file);

    $question = fopen("quiz_question.csv", "a");
    // Écrire les données de chaque question dans le fichier CSV
    foreach ($questionsData as $questionData) {
        $row = array($_SESSION['rôle'], $titreQuiz, $questionData['question']);
        fputcsv($question, $row);
    }

    fclose($question);

    $reponse = fopen("quiz_reponse.csv", "a");
    // Écrire les données de chaque question dans le fichier CSV
    foreach ($questionsData as $questionData) {
        $row = array($_SESSION['rôle'], $titreQuiz, $questionData['choix1'], $questionData['choix2'], $questionData['choix3'], $questionData['choix4'], $questionData['reponseCorrecte']);
        fputcsv($reponse, $row);
    }

    fclose($reponse);

    echo "Le fichier CSV a été généré avec succès.";