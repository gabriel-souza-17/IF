<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meu Site PHP</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>
<h1>Meu Site PHP</h1>
</header>

<nav>
<a href="#">Home</a>
<a href="#">Sobre</a>
<a href="#">Contato</a>
</nav>

<main>

<section>
<h2>Bem-vindo!</h2>

<?php
echo "<p>Site PHP funcionando 🚀</p>";
?>

</section>

</main>

<footer>
<p>© ".date("Y")." Meu Site</p>
</footer>

</body>
</html>