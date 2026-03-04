<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhando com Switch</title>
</head>
<body>
    
    <?php
    $op = 10;
    
    switch ($op) {
        case 1:
            echo "O valor é 1";
            break;
        case 2:
            echo "O valor é 2";
            break;

        default:
            echo "Opção inválida";
    }
    ?>
    
</body>
</html>