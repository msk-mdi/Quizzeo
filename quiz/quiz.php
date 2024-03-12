<?php 
include  '../accueil/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../quiz/quiz.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Créer votre quiz</h1>
    <form action="quiz.php" method="post"> 
        <label>Question:</label><br>
        <input type="text" name="question" required><br>
        
        <label>Choix n°1:</label><br>
        <input type="text" name="question" required><br>
        
        <label>Choix n°2:</label><br>
        <input type="text" name="question" required><br>
        
        <label>Choix n°3:</label><br>
        <input type="text" name="question" required><br>

        <label>Choix n°4:</label><br>
        <input type="text" name="question" required><br>
        
        <input type="submit" value="VALIDER">
    </form>
</body>
</html>