<?php
$secretKey = "6Le3opgpAAAAAMARXyq12uDgBjspwqRGypJlHc38";

if(isset($_POST['g-recaptcha-response']))
{
    $captchaResponse = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => $secretKey,'response' => $captchaResponse);

    $options = array('http' => array ('method' => 'POST','content' => http_build_query($data)));

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseKeys = json_decode($response, true);

    if($responseKeys["success"])
    {
        echo "Captcha valide. Traitement du formulaire...";
    } else {
        echo "Erreur: Captcha invalide. Veuillez réessayer.";
    }
}
else {
    echo "Erreur: Captcha manquant. Veuillez remplir le captcha.";
}