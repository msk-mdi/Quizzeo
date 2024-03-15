<?php
include('../accueil/header.php');
if(empty($_SESSION['identifiant']))
{?>
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
            <script>
            function verifierCaptcha() {
                // Récupérer la réponse du captcha
                var response = grecaptcha.getResponse();

                // Vérifier si la réponse n'est pas vide
                if (response.length == 0) {
                    // Le captcha n'a pas été fait
                    alert("Veuillez remplir le captcha.");
                    return false;
                } else {
                    // Le captcha a été fait, continuer avec la soumission du formulaire
                    return true;
                }
            }
            </script>
                <div class="container">
                    <h2>Inscription</h2>
                    <form action="../traitement/traitement_register.php" method="post" onsubmit="return verifierCaptcha()">
                        <label for="type">Type of user :</label>
                            <select id="type" name="type">
                                <option value="User">User</option>
                                <option value="School">School</option>
                                <option value="Company">Company</option>
                            </select>
                        <label for="lastname">Last Name :</label>
                        <input type="text" placeholder="LastName" id="lastname" name="lastname" required>
                        <input type="text" placeholder="FirstName" id="firstname" name="firstname" required>
                        <input type="text" placeholder="Email" id="Email" name="Email" required>
                        <input type="text" placeholder="New ID" id="id" name="id" required>
                        <input type="password" placeholder="Password" id="password" name="password" required>
                        <div class="g-recaptcha" data-sitekey="6Le3opgpAAAAAPqnC4hdvBDDCnKvpcMSa9siPbPX"></div>
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