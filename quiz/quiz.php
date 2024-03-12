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
    <title>Document</title>
</head>
<body>
    <h1>Créer votre quiz</h1>
    <form action="quiz.php" method="post" id="quizForm">
        <label>Question:</label><br>
        <input type="text" name="question" required><br>
        
        <div id="choix">
            <label>Choix n°1:</label><br>
            <input type="text" name="choix_n°" required><br>
        </div>
        
        <label>Réponse correcte:</label><br>
        <select name="reponse_correcte" required>
            <option value="">Choisir</option>
            <option value="reponse1">Choix n°1</option>
            <!-- Les autres options seront ajoutées dynamiquement -->
        </select><br>
        

        
    </form>

    <button onclick="ajouterChoix()">Ajouter un choix</button>

    <script>
        function ajouterChoix() {
            var divChoix = document.getElementById("choix");
            var numChoix = divChoix.getElementsByTagName("input").length + 1;
            var nouvelInput = document.createElement("input");
            nouvelInput.type = "text";
            nouvelInput.name = "choix_n°";
            nouvelInput.required = true;
            divChoix.appendChild(document.createElement("br"));
            divChoix.appendChild(document.createTextNode("Choix n°" + numChoix + ":"));
            divChoix.appendChild(document.createElement("br"));
            divChoix.appendChild(nouvelInput);

            // Mettre à jour les options de la liste déroulante des réponses correctes
            var selectReponse = document.querySelector('select[name="reponse_correcte"]');
            var nouvelleOption = document.createElement("option");
            nouvelleOption.value = "reponse" + numChoix;
            nouvelleOption.textContent = "Choix n°" + numChoix;
            selectReponse.appendChild(nouvelleOption);
        }
    </script>
    <input type="submit" value="VALIDER">
</body>
</html>
