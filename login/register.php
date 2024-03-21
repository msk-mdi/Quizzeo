<?php
include('../accueil/header.php');
if(empty($_SESSION['id']))
{
    if(isset($_SESSION['error_password']))
    {
        echo '<script>alert("' . $_SESSION['error_password'] . '");</script>';
        unset($_SESSION['error_password']); // Clear the error message once displayed
    }

    if(isset($_SESSION['error_email']))
    {
        echo '<script>alert("' . $_SESSION['error_email'] . '");</script>';
        unset($_SESSION['error_email']); // Clear the error message once displayed
    }?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <script src="https://www.google.com/recaptcha/api.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Register</title>
            <link rel="stylesheet" href="./register.css">
        </head>
        <body>
            <script>
                function verifierCaptcha()
                {
                    var response = grecaptcha.getResponse();
                    if (response.length == 0) {
                        alert("Veuillez remplir le captcha.");
                        return false;
                    } else {
                        return true;
                    }
                }
            </script>
            <div class="container">
                <h2>Register</h2>
                <form action="../traitement/traitement_register.php" method="post" onsubmit="return verifierCaptcha()">
                    <label for="type">Type of user :</label>
                        <select id="type" name="type">
                            <option value="User">User</option>
                            <option value="School">School</option>
                            <option value="Company">Company</option>
                        </select>
                    <input type="text" placeholder="Lastname" id="lastname" name="lastname" required>
                    <input type="text" placeholder="Firstname" id="firstname" name="firstname" required>
                    <input type="text" placeholder="Email" id="Email" name="Email" required>
                    <input type="text" placeholder="ID" id="id" name="id" required>
                    <input type="password" placeholder="Password" id="password" name="password" required>
                    <div class="g-recaptcha" data-sitekey="6Le3opgpAAAAAPqnC4hdvBDDCnKvpcMSa9siPbPX"></div>
                    <input type="submit" value="S'inscrire">
                </form>
                <p>You have an account ?</p>
                <a href="connection.php"> Connexion</a>
            </div>
        </body>
    </html>
<?php
} else {
    header('location: ../accueil/accueil.php');
}?>