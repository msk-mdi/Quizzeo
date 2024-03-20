<?php

$quizSelectionne = $_GET['quiz'];

$quizDataFile = fopen("../traitement/quiz_data.csv", "r");

if ($quizDataFile) {
  
    fgetcsv($quizDataFile);

   
    while (($quizData = fgetcsv($quizDataFile)) !== false) {
      
        if (!empty($quizData[1]) && $quizSelectionne == $quizData[1]) {
          
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

                           
                            echo "<form action='resultats_quiz.php' method='post'>";
                            while (($reponsesData = fgetcsv($reponsesFile)) !== false) {
                               
                                if ($reponsesData[0] === $titreQuiz && $reponsesData[1] === $questionsData[1]) {
                                    echo "<label><input type='radio' name='reponse{$questionsData[1]}' value='{$reponsesData[2]}'> {$reponsesData[2]}</label><br>";
                                    echo "<label><input type='radio' name='reponse{$questionsData[1]}' value='{$reponsesData[3]}'> {$reponsesData[3]}</label><br>";
                                    echo "<label><input type='radio' name='reponse{$questionsData[1]}' value='{$reponsesData[4]}'> {$reponsesData[4]}</label><br>";
                                    echo "<label><input type='radio' name='reponse{$questionsData[1]}' value='{$reponsesData[5]}'> {$reponsesData[5]}</label><br>";
                                }
                            }
                            echo "</form>";

                           
                            fclose($reponsesFile);
                        }
                    }
                }

               
                fclose($questionsFile);
            }
        }
    }

  
    fclose($quizDataFile);

   
    echo "<form action='resultats_quiz.php' method='post'>";
    echo "<input type='submit' value='Valider le questionnaire'>";
    echo "</form>";

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
    }
} else {
   
    echo "Erreur : Impossible d'ouvrir le fichier des données des quiz.";
}
?>
