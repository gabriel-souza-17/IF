<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach</title>
</head>
<body>
    
    <?php
    $frutas = [
        [ 'id' => 1, 'fruta' => 'Banana', 'cor' => 'Amarela' ],
        [ 'id' => 2, 'fruta' => 'Maçã', 'cor' => 'Vermelha' ],
        [ 'id' => 3, 'fruta' => 'Uva', 'cor' => 'Roxa' ]
    ];
    foreach ($frutas as $key => $fruta) {
        echo $fruta['id'] . " - " . $fruta['fruta']. '<br>';
    }

    ?>
</body>
</html>