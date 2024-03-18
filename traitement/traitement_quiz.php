<?php
session_start();
$titreQuiz = $_POST['titre_quiz'];
$questionsData = array();

for ($i = 1; $i <= 5; $i++)
{
    if (isset($_POST['question' . $i]))
    {
        $question = $_POST['question' . $i];
        $choix1 = $_POST['question' . $i . '_1'];
        $choix2 = $_POST['question' . $i . '_2'];
        $choix3 = $_POST['question' . $i . '_3'];
        $choix4 = $_POST['question' . $i . '_4'];
        $reponseCorrecte = $_POST['reponse_correcte' . $i];
        $questionsData[] = array('question' => $question,'choix1' => $choix1,'choix2' => $choix2,'choix3' => $choix3,'choix4' => $choix4,'reponseCorrecte' => $reponseCorrecte);
    }
}

$file = fopen("quiz_data.csv", "a");
foreach ($questionsData as $questionData)
{
    $row = array($_SESSION['rôle'], $titreQuiz, $questionData['question'], $questionData['choix1'], $questionData['choix2'], $questionData['choix3'], $questionData['choix4'], $questionData['reponseCorrecte']);
    fputcsv($file, $row);
}

fclose($file);

echo "Le fichier CSV a été généré avec succès.";