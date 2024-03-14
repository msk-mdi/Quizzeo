<?php
// Votre clé secrète reCAPTCHA
$secretKey = "6Le3opgpAAAAAMARXyq12uDgBjspwqRGypJlHc38";

// Vérifiez si le captcha a été soumis
if(isset($_POST['g-recaptcha-response'])) {
    // Vérifiez la réponse du captcha avec Google
    $captchaResponse = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $secretKey,
        'response' => $captchaResponse
    );

    $options = array(
        'http' => array (
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseKeys = json_decode($response, true);

    // Vérifiez si la réponse est valide
    if($responseKeys["success"]) {
        // Le captcha est valide, traitez le reste du formulaire
        // Insérez ici votre code pour traiter le formulaire
        echo "Captcha valide. Traitement du formulaire...";
    } else {
        // Le captcha n'est pas valide
        echo "Erreur: Captcha invalide. Veuillez réessayer.";
    }
} else {
    // Le captcha n'a pas été soumis
    echo "Erreur: Captcha manquant. Veuillez remplir le captcha.";
}
?>