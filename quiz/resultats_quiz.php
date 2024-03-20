<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le bouton de soumission a été cliqué et si des données ont été envoyées
    $score = 0;

    // Récupérer les réponses correctes de votre fichier CSV ou de votre base de données
    // Je vais supposer que vous stockez les réponses correctes dans un tableau associatif
    $reponses_correctes = array(
        'question1' => 'reponse_correcte',
        'question2' => 'reponse_correcte',
        // Ajoutez les réponses correctes pour chaque question ici
    );

    // Parcourir les réponses soumises par l'utilisateur et comparer avec les réponses correctes
    foreach ($_POST as $question => $reponse) {
        if (isset($reponses_correctes[$question]) && $reponse == $reponses_correctes[$question]) {
            $score++;
        }
    }

    // Afficher le score à l'utilisateur
    echo "<h1>Votre score est de : $score</h1>";

} else {
    // Redirection vers la page d'accueil si le formulaire n'a pas été soumis
    header("Location: accueil.php");
    exit();
}
?>


