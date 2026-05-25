<?php

ob_start();

?>

<div class="sidebar">

<div class="logo">

✂ Easy Barber

</div>

<div class="menu">

<a href="">Dashboard</a>

<a href="">Agenda</a>

<a href="">Minha Equipe</a>

<a href="">Serviços</a>

<a href="">Visagismo IA</a>

<a href="">Configurações</a>

</div>

</div>

<div class="main">

<h1>

Olá,
<?= $_SESSION['usuario_nome']; ?>
👋

</h1>

<p class="subtitle">

Sua agenda está pronta

</p>

<div class="dashboard-box">

<div class="top-row">

<h2>

Próximos Serviços

</h2>

<button class="btn-gold">

Adicionar Serviço

</button>

</div>

<?php

for(
$i=0;
$i<3;
$i++
):

?>

<div class="card-agenda">

<strong>

Sem agendamento

</strong>

<br>

Cliente aguardando

<br>

Nenhum serviço

</div>

<?php endfor; ?>

</div>

</div>

<?php

$content =
ob_get_clean();

require
__DIR__ .
'/../../../../Templates/barbeiro.php';

?>