<?php require_once('Config/Helpers.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard - Easy Barber</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<style>

body{
    background:#0f0f0f;
    color:white;
}

.sidebar{

    width:260px;

    position:fixed;

    left:0;
    top:0;

    height:100vh;

    background:#111;

    padding:25px;

    border-right:1px solid rgba(255,255,255,.05);

}

.logo{

    font-size:24px;

    font-weight:bold;

    color:#d4a762;

    margin-bottom:40px;

}

.menu a{

    display:block;

    text-decoration:none;

    color:#ccc;

    padding:14px;

    margin-bottom:8px;

    border-radius:12px;

}

.menu a:hover{

    background:#1a1a1a;

    color:#d4a762;

}

.content{

    margin-left:260px;

    padding:30px;

}

.card-eb{

    background:#161616;

    border:none;

    border-radius:18px;

    color:white;

}

.card-value{

    font-size:30px;

    font-weight:bold;

    color:#d4a762;

}

.agenda-item{

    background:#1a1a1a;

    padding:15px;

    border-radius:12px;

    margin-bottom:10px;

}

.btn-gold{

    background:#d4a762;

    color:black;

    border:none;

    font-weight:bold;

}

.btn-gold:hover{

    background:#be9455;

}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">
<i class="bi bi-scissors"></i>
Easy Barber
</div>

<div class="menu">

<a href="#">
<i class="bi bi-grid"></i>
Dashboard
</a>

<a href="#">
<i class="bi bi-calendar"></i>
Agenda
</a>

<a href="#">
<i class="bi bi-people"></i>
Clientes
</a>

<a href="#">
<i class="bi bi-cash-stack"></i>
Financeiro
</a>

<a href="#">
<i class="bi bi-scissors"></i>
Serviços
</a>

<a href="#">
<i class="bi bi-stars"></i>
IA / Visagismo
</a>

<a href="#">
<i class="bi bi-box"></i>
Estoque
</a>

</div>

</div>

<div class="content">

<div class="d-flex justify-content-between mb-4">

<div>

<h2>
Olá, Gabriel
</h2>

<p class="text-secondary">
Resumo do dia
</p>

</div>

<button class="btn btn-gold">

Novo Agendamento

</button>

</div>

<div class="row g-3 mb-4">

<div class="col-md-3">

<div class="card card-eb">

<div class="card-body">

Agendamentos

<div class="card-value">
18
</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-eb">

<div class="card-body">

Receita

<div class="card-value">
R$620
</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-eb">

<div class="card-body">

Clientes

<div class="card-value">
12
</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-eb">

<div class="card-body">

IA Hoje

<div class="card-value">
4
</div>

</div>

</div>

</div>

</div>

<div class="row">

<div class="col-lg-8">

<div class="card card-eb">

<div class="card-body">

<h5 class="mb-4">
Agenda do Dia
</h5>

<div class="agenda-item">

08:00

<br>

João

<br>

<small>
Corte + Barba
</small>

</div>

<div class="agenda-item">

09:00

<br>

Pedro

<br>

<small>
Low Fade
</small>

</div>

<div class="agenda-item">

10:00

<br>

Lucas

<br>

<small>
Visagismo
</small>

</div>

</div>

</div>

</div>

<div class="col-lg-4">

<div class="card card-eb mb-3">

<div class="card-body">

<h5>
Próximo Cliente
</h5>

<hr>

Pedro

<br>

09:00

</div>

</div>

<div class="card card-eb">

<div class="card-body">

<h5>
Ações rápidas
</h5>

<hr>

<button class="btn btn-gold w-100 mb-2">

Novo Cliente

</button>

<button class="btn btn-outline-light w-100 mb-2">

Abrir Agenda

</button>

<button class="btn btn-outline-warning w-100">

Abrir IA

</button>

</div>

</div>

</div>

</div>

</div>

</body>

</html>