<?php
include('../accueil/header.php');
if(empty($_SESSION['identifiant'])){?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title></title>
                <link rel="stylesheet" href="./register.css">
            </head>

            <body>
                <div class="container">
                    <h2>Inscription</h2>
                    <form action="../traitement/traitement_register.php" method="post">
                        <label for="type">Type of user :</label>
                            <select id="type" name="type">
                                <option value="User">User</option>
                                <option value="School">School</option>
                                <option value="Company">Company</option>
                            </select>
                        <label for="lastname">Last Name :</label>
                        <input type="text" id="lastname" name="lastname" required>
                        <label for="firstname">First Name :</label>
                        <input type="text" id="firstname" name="firstname" required>
                        <label for="id">New Id :</label>
                        <input type="text" id="id" name="id" required>
                        <label for="password">Password :</label>
                        <input type="password" id="password" name="password" required>
                        <div class="g-recaptcha" data-sitekey="6LcWdpYpAAAAADPRbtC1iHBXHMHE9XI56grmpPHz"></div>
                        <input type="submit" value="S'inscrire">
                    </form>
                    <p>You have an account ? <a href="connection.php"> Connection</a></p>
                </div>
            </body>

            </html>
<?php
}
else{
    header('location: ../accueil/index.php');
}
?>