<?php 
include '../accueil/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['question']) && isset($_POST['reponse_correcte'])) {
        // Création d'un tableau avec les données à écrire dans le fichier CSV
        $data = array($_POST['question']);
        foreach ($_POST as $key => $value) {
            // Vérifie si la clé commence par 'choix_n°'
            if (substr($key, 0, 9) === 'choix_n°') {
                $data[] = $value;
            }
        }
        $data[] = $_POST['reponse_correcte'];

        // Ouverture du fichier CSV et écriture des données
        $csv_file = 'quiz.csv';
        $file = fopen($csv_file, 'a');
        fputcsv($file, $data);
        fclose($file);

        echo "Les données ont été ajoutées au fichier CSV avec succès.";
        header('location: ../accueil/accueil.php');
    } else {
        echo "Toutes les données requises ne sont pas disponibles.";
    }
}
?>
