<?php
// Inclure le fichier d'en-tête
include('../accueil/header.php');

// Vérifier si le paramètre de l'URL 'quiz' est défini
if (isset($_GET['quiz'])) {
    // Récupérer le nom du quiz à partir de l'URL
    $quizName = $_GET['quiz'];

    // Construire le chemin vers le fichier CSV
    $quizFilePath = "../traitement/quiz_questions.csv";

    // Vérifier si le fichier du quiz existe
    if (file_exists($quizFilePath)) {
        // Lire le fichier CSV contenant toutes les questions
        $quizData = array_map('str_getcsv', file($quizFilePath));

        // Initialiser un drapeau pour indiquer si le questionnaire a été trouvé
        $quizFound = false;

        // Parcourir chaque ligne du fichier CSV
        foreach ($quizData as $question) {
            // Si le premier élément de la ligne correspond au nom du questionnaire
            if ($question[0] == $quizName) {
                // Afficher le titre du quiz
                echo "<h1>Jouer au quiz : $quizName</h1>";

                // Afficher la question
                echo "<p><strong>{$question[1]}</strong></p>";

                // Afficher les options de réponse
                for ($i = 2; $i < count($question); $i++) {
                    echo "<label><input type='radio' name='q{$question[1]}' value='{$question[$i]}'> {$question[$i]}</label><br>";
                }

                // Afficher le bouton de soumission du quiz
                echo "<button onclick='submitQuiz(\"$quizName\")'>Soumettre le quiz</button>";

                // Marquer le questionnaire comme trouvé
                $quizFound = true;

                // Arrêter la recherche une fois le questionnaire trouvé
                break;
            }
        }

        // Si le questionnaire n'a pas été trouvé, afficher un message d'erreur
        if (!$quizFound) {
            echo "<p>Le questionnaire spécifié n'existe pas.</p>";
        } else {
            // Si le fichier du quiz n'existe pas, afficher un message d'erreur
            echo "<p>Le fichier de questions n'existe pas.</p>";
        }
   
    } 
}
else {
    // Si le paramètre 'quiz' n'est pas défini dans l'URL, afficher un message d'erreur
    echo "<p>Aucun quiz sélectionné.</p>";
}
?>

<!-- Script JavaScript pour soumettre le quiz -->
<script>
function submitQuiz(quizName) {
    // Rediriger l'utilisateur vers la page de résultats avec le nom du quiz dans l'URL
    window.location.href = "resultats_quiz.php?quiz=" + quizName;
}
</script>

