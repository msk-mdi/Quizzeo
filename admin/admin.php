<?php
include('../accueil/header.php');
if(isset($_SESSION['admin']))
{
    if(isset($_POST['toggle']))
    {
        $userId = $_POST['id'];
        $file_name = '../traitement/users.csv';
        $file_open = fopen($file_name, 'r+');

        $updatedLines = [];

        while (($line = fgetcsv($file_open)) !== FALSE)
        {
            if ($line[3] == $userId)
            {
                $line[5] = ($line[5] == "1") ? "0" : "1";
            }
            $updatedLines[] = $line;
        }

        fclose($file_open);

        $file_open = fopen($file_name, 'w');
        foreach ($updatedLines as $updatedLine)
        {
            fputcsv($file_open, $updatedLine);
        }
        fclose($file_open);

        header("Location: ".$_SERVER['REQUEST_URI']);
        exit();
    }?>

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
            <h1>Database</h1>
            <h2>All accounts</h2>
            <ul>
                <?php
                $file_name = '../traitement/users.csv';
                $file_open = fopen($file_name,'r');

                while (($line = fgetcsv($file_open)) !== FALSE)
                {
                    echo "<li>$line[0]: $line[3]</li>";
                }
                fclose($file_open);
                ?>
            </ul>
            <h2>Activate | Deactivate account</h2>
            <ul>
                <?php
                $file_name = '../traitement/users.csv';
                $file_open = fopen($file_name,'a+');

                while (($line = fgetcsv($file_open)) !== FALSE)
                {
                    if ($line[5] == "1")
                    {
                        echo "<li>$line[3]</li>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='id' value='$line[3]'>";
                        echo "<button type='submit' name='toggle'>Désactiver</button>";
                        echo "</form>";
                    }
                    if ($line[5] == "0")
                    {
                        echo "<li>$line[3]</li>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='id' value='$line[3]'>";
                        echo "<button type='submit' name='toggle'>Activer</button>";
                        echo "</form>";
                    }
                }
                fclose($file_open);
                ?>
            </ul>
        </div>
    </body>
    </html>
    <?php
}?>
