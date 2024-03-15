<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du Quiz</title>
</head>
<body>
    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lire le fichier CSV contenant les questions et les réponses
        $questions = array_map('str_getcsv', file('questions.csv'));

        // Initialiser le score
        $score = 0;

        // Tableau pour enregistrer les réponses de l'utilisateur
        $userAnswers = array();

        // Parcourir chaque question pour vérifier les réponses soumises
        for ($i = 0; $i < count($questions); $i++) {
            // Récupérer la réponse de l'utilisateur
            $userAnswer = $_POST["q$i"];
            // Récupérer la réponse correcte à partir du fichier CSV
            $correctAnswer = $questions[$i][3];
            // Ajouter la réponse de l'utilisateur au tableau
            $userAnswers[] = $userAnswer;
            // Vérifier si la réponse de l'utilisateur est correcte
            if ($userAnswer == $correctAnswer) {
                echo "<p>✔ Bonne réponse : {$questions[$i][0]}</p>";
                $score++; // Incrémenter le score si la réponse est correcte
            } else {
                echo "<p>❌ Mauvaise réponse : {$questions[$i][0]}</p>";
                echo "<p>La réponse correcte est : $correctAnswer</p>";
            }
        }

        // Afficher le score final
        echo "<h2>Votre score : $score / " . count($questions) . "</h2>";

        // Enregistrer les réponses de l'utilisateur dans un fichier CSV
        $fp = fopen('user_answers.csv', 'w');
        fputcsv($fp, $userAnswers);
        fclose($fp);
    } else {
        // Afficher le formulaire de quiz avant que le formulaire soit soumis
        $questions = array_map('str_getcsv', file('questions.csv'));
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php
            // Afficher chaque question avec les options
            foreach ($questions as $index => $question) {
                echo "<p><strong>Question " . ($index + 1) . " :</strong> {$question[0]}</p>";
                // Afficher les options sous forme de boutons radio
                for ($i = 1; $i <= 2; $i++) {
                    echo "<label><input type='radio' name='q$index' value='{$question[$i]}'> {$question[$i]}</label><br>";
                }
            }
            ?>
            <input type="submit" value="Soumettre">
        </form>
    <?php } ?>
</body>
</html>
