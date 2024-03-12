<?php
include('../accueil/header.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Admin page</h1>
        <ul>
            <?php
            $file_name = '../traitement/users.csv';
            $file_open = fopen($file_name,'r');

            $Row1 = true;
            while (($line = fgetcsv($file_open)) !== FALSE)
            {
                echo "<li>";

                foreach ($line as $cell)
                {
                    echo "<span>$cell</span>";
                }

                echo "</li>";

                if ($Row1)
                {
                    echo "<li><strong>Row 0:</strong>";
                }

                foreach ($line as $cell)
                {
                    echo "<span>$cell</span>";
                }
                echo "</li>";
                $Row1 = false;
            }
            fclose($file_open);
            ?>
        </ul>
    </body>
</html>

