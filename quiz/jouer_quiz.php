<?php
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
        if (!empty ($quizData[1])) {
            // Récupérer le titre du quiz depuis la deuxième colonne
            $titreQuiz = $quizData[1];
        
                // Afficher le titre du quiz
                echo "<h2>Titre du quiz : $titreQuiz</h2>";
                // ... la suite de votre code pour afficher les questions et réponses du quiz sélectionné


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

                        }

                        // Ouvrir le fichier CSV contenant les réponses
                        $reponsesFile = fopen("../traitement/quiz_reponse.csv", "r");

                        // Vérifier si le fichier est ouvert avec succès
                        if ($reponsesFile) {
                            // Ignorer la première ligne (en-têtes)
                            fgetcsv($reponsesFile);

                            // Parcourir le fichier CSV et afficher les réponses associées à la question
                            while (($reponsesData = fgetcsv($reponsesFile)) !== false) {
                                // Vérifier si la question correspond
                                if ($reponsesData[0] === $titreQuiz && $reponsesData[1] === $questionsData[1]) {
                                    // Afficher les choix de réponses
                                    echo "<form action='' method='post'>";
                                    echo "<input type='radio' name='reponse' value='{$reponsesData[2]}'> {$reponsesData[2]}<br>";
                                    echo "<input type='radio' name='reponse' value='{$reponsesData[3]}'> {$reponsesData[3]}<br>";
                                    echo "<input type='radio' name='reponse' value='{$reponsesData[4]}'> {$reponsesData[4]}<br>";
                                    echo "<input type='radio' name='reponse' value='{$reponsesData[5]}'> {$reponsesData[5]}<br>";
                                    echo "<input type='submit' value='Valider'>";
                                    echo "</form>";

                                    // Vérifier si l'utilisateur a soumis une réponse
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Récupérer la réponse soumise par l'utilisateur
                                        $reponseUtilisateur = $_POST['reponse'];

                                        // Vérifier si la réponse de l'utilisateur est correcte
                                        if ($reponsesData[6] === $reponseUtilisateur) {
                                            echo "<p>Bravo ! Vous avez choisi la bonne réponse.</p>";
                                            // Incrémenter la variable score si la réponse est correcte
                                            $score++;
                                        } else {
                                            echo "<p>Désolé, ce n'est pas la bonne réponse.</p>";
                                        }
                                    }
                                }
                            }

                            // Fermer le fichier CSV des réponses
                            fclose($reponsesFile);
                        }
                    }
                }

                // Fermer le fichier CSV des questions
                fclose($questionsFile);
            
        }
    }

    // Fermer le fichier CSV des données des quiz
    fclose($quizDataFile);

    // Afficher le score total après avoir parcouru tous les quiz
    echo "<p>Votre score total est : $score</p>";
} else {
    // En cas d'erreur lors de l'ouverture du fichier, afficher un message d'erreur
    echo "Erreur : Impossible d'ouvrir le fichier des données des quiz.";
}
?>