<!DOCTYPE html>
<html>
    <head>
        <title>Array Terindeks dengan Foreach</title>
    </head>
    <body>
        <h2>Array Terindeks - Foreach</h2>
        <?php
            $ListDosen=["Elok Nur Hamdana", "Unggul pemenang", "Bagas Nugraha"];

            
            foreach ($ListDosen as $namaDosen) {
                echo $namaDosen . "<br>";
            }
        ?>
    </body>
</html>