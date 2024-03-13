<?php
include('../accueil/header.php');
if(isset($_SESSION['admin'])){

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./admin.css">
        <title>Admin</title>
    </head>
    <body>
        <div class ='admin'>
            <h1>Data Base</h1>
            <h2>All the users :</h2>
            <ul>
                <?php
                $file_name = '../traitement/users.csv';
                $file_open = fopen($file_name,'r');

                $Row1 = true;
                while (($line = fgetcsv($file_open)) !== FALSE)
                {
                    echo "<li>$line[3]</li>";
                }
                fclose($file_open);
                ?>
            </ul>
        </div>
    </body>
</html>
<?php
}
?>
