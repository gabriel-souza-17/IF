<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculo de IMC </h1>
    <form action="" method="post">
        <label for="peso">peso</label><br>
        <input type="number" name="peso" id="peso" required><br>
        <label for="altura">altura</label><br>
        <input type="number" name="altura" id="altura" required>
        <input type="submit" name="calcular" value="calcular">

        <?php 
            $imc = floatval($peso) / (floatval($altura) * floatval($altura));

            if (isset($_REQUEST['calcular'])) {
            if ($imc < 18.5) {
                echo "O seu IMC é: {$imc}, você está abaixo do peso";
            } else if ($imc < 25) {
                echo "O seu IMC é: {$imc}, você está com o peso ideal";
            } else if ($imc < 30) {
                echo "O seu IMC é: {$imc}, você está acima do peso";
            } else {
                echo "O seu IMC é: {$imc}, você está obeso";
            }
            }
        ?>
</body>
</html>