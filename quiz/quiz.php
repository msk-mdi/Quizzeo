<?php 
include  '../accueil/header.php';

if(isset($_POST['ajouter_choix'])) {
    // Traitement pour ajouter un choix supplémentaire
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./quiz.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./quiz.css">
    <title>Document</title>
</head>
<body>
    <div class ='quizz'>
        <h1>Créer votre quiz</h1>
        <form action="quiz.php" method="post" id="quizForm">
            <label>Question:</label><br>
            <input type="text" name="question" required><br>
            
            <div id="choix">
                <label>Choix n°1:</label><br>
                <input type="text" name="choix_n°" required><br>
            </div>
            <div id="choix">
                <label>Choix n°2:</label><br>
                <input type="text" name="choix_n°" required><br>
            </div>
            <div id="choix">
                <label>Choix n°3:</label><br>
                <input type="text" name="choix_n°" required><br>
            </div>
            <div id="choix">
                <label>Choix n°4:</label><br>
                <input type="text" name="choix_n°" required><br>
            </div>
            
            <label>Réponse correcte:</label><br>
            <select name="reponse_correcte" required>
                <option value="">Choisir</option>
                <option value="reponse1">Choix n°1</option>
                <option value="reponse1">Choix n°2</option>
                <option value="reponse1">Choix n°3</option>
                <option value="reponse1">Choix n°4</option>
            </select><br>
        
        </form>
        <input type="submit" value="VALIDER">
    </div>
</body>
</html>
