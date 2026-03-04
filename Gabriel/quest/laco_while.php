<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhando com While</title>
</head>
<body>

    <?php

    echo "<h1>While</h1><br>";
    $i = 0;
    while ($i < 10) {
        echo "O valor de i é: $i <br>";
        $i++;
    }

    echo "<h1>Do While</h1>";
    $i = 0;
    do {
        echo "O valor de i é: $i <br>";
        $i++;
    } while ($i < 10);
    ?>
</body>
</html>