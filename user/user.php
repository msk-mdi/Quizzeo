<?php
include '../accueil/header.php';

$user_id = $_SESSION['id'];

$filename = "../traitement/users.csv";
$file = fopen($filename, "a+");

if ($_SESSION['rôle'] == 'User')
{
    while (($line = fgetcsv($file)) !== false)
    {
        if ($line[3] == $user_id)
        {
            echo "<h3>Current Last name</h3>";
            echo "<li>$line[1]</li>";
            echo "<h3>Current First name</h3>";
            echo "<li>$line[2]</li>";
            echo "<h3>Current Email</h3>";
            echo "<li>$line[6]</li>";
        }
    }
}
else
{
    header('location: ../accueil/accueil.php');
}
fclose($file);

// AFTER

if(isset($_SESSION['User']))
{
    if(isset($_POST['modify']))
    {
        $file_open = fopen($filename, 'r+');

        $updatedLines = [];

        while (($line = fgetcsv($file_open)) !== FALSE)
        {
            // changer ici
            if ($line[3] == $userId)
            {
                $line[5] = ($line[5] == "1") ? "0" : "1";
            }
            $updatedLines[] = $line;
            // 
        }

        fclose($file_open);

        $file_open = fopen($filename, 'w');
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
        <title>My account</title>
    </head>
    <body>
        <div class ='admin'>
            <h1>Database</h1>
            <h2>All accounts</h2>
            <ul>
                <?php
                $filename = '../traitement/users.csv';
                $file_open = fopen($filename,'r');

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
                $filename = '../traitement/users.csv';
                $file_open = fopen($filename,'a+');

                while (($line = fgetcsv($file_open)) !== FALSE)
                {
                    echo "<li>$line[1]</li>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='id' value='$line[3]'>";
                    echo "<button type='submit' name='modify'>Change lastname</button>";
                    echo "</form>";

                    echo "<li>$line[2]</li>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='id' value='$line[3]'>";
                    echo "<button type='submit' name='modify'>Change firstname</button>";
                    echo "</form>";

                    echo "<li>$line[6]</li>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='id' value='$line[3]'>";
                    echo "<button type='submit' name='modify'>Change email</button>";
                    echo "</form>";
                }
                fclose($file_open);
                ?>
            </ul>
        </div>
    </body>
    </html>
    <?php
}?>
