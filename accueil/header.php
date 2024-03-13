<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzeo</title>
    <link rel="stylesheet" href="../accueil/header.css">
    <script src="https://kit.fontawesome.com/3b9e7859ca.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <div class='logo'>
                <a href="../accueil/accueil.php">
                <img src="../accueil/assets/quizzeo.png" alt="logo"/> 
                </a>
            </div>
            <ul>
                <li class='home' href="../accueil/accueil.php">Home</li>
                <li class='myquizz' href="../quiz/myquiz.php">My Quizz</li>
                <li class='create'><a class="quiz" href="../quiz/quiz.php">Create</a></li>
            </ul>
        </nav>
        <div class = 'login'>
            <?php
            if(isset($_SESSION['id'])){
                ?>
                <a href="../login/deconnection.php"><i class="fa-solid fa-user fa-2xl" style="color: #9a79fb;"></i></a>
                <a href="../login/deconnection.php"><h3>Logout</h3></a>
                <?php
            }
            else{
                ?>
                <a href="../login/connection.php"><i class="fa-solid fa-user fa-2xl" style="color: #9a79fb;"></i></a>
                <a href="../login/connection.php"><h3>Login</h3></a>
                <?php
            }
            ?>
        </div>
    </header>
</body>
</html>