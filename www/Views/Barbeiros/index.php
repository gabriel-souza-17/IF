<?php require_once('Config/Helpers.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Easy Barber</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<style>

body{
background:#0f0f0f;
color:white;
margin:0;
overflow-x:hidden;
}

/* SIDEBAR */

.sidebar{

width:250px;
height:100vh;

position:fixed;

top:0;
left:0;

background:#111;

padding:20px;

overflow-y:auto;

border-right:1px solid rgba(255,255,255,.05);

}

.logo{

font-size:24px;

font-weight:700;

color:#d4a762;

margin-bottom:30px;

}

.menu a{

display:block;

padding:12px;

margin-bottom:8px;

color:white;

text-decoration:none;

border-radius:12px;

transition:.2s;

}

.menu a:hover{

background:#1f1f1f;

color:#d4a762;

}

/* CONTEÚDO */

.content{

margin-left:250px;

padding:25px;

}

/* CARDS */

.card-eb{

background:#171717;

border:none;

border-radius:18px;

color:white;

height:100%;

}

.card-number{

font-size:28px;

font-weight:700;

color:#d4a762;

}

/* BOTÕES */

.btn-gold{

background:#d4a762;

color:black;

border:none;

font-weight:600;

padding:10px 18px;

border-radius:12px;

}

.btn-gold:hover{

background:#be9455;

}

/* AGENDA */

.agenda-item{

background:#1b1b1b;

padding:15px;

border-radius:14px;

margin-bottom:12px;

transition:.2s;

}

.agenda-item:hover{

background:#232323;

}

/* MOBILE */

.mobile-top{

display:none;

}

@media(max-width:768px){

.sidebar{

display:none;

}

.content{

margin-left:0;

padding:15px;

}

.mobile-top{

display:flex;

justify-content:space-between;

align-items:center;

padding:15px;

background:#111;

position:sticky;

top:0;

z-index:1000;

}

}

</style>

</head>

<body>

<!-- TOPO MOBILE -->

<div class="mobile-top">

<div class="fw-bold text-warning">

Easy Barber

</div>

<button
class="btn btn-outline-light"
data-bs-toggle="offcanvas"
data-bs-target="#menu">

<i class="bi bi-list"></i>

</button>

</div>

<!-- MENU MOBILE -->

<div
class="offcanvas offcanvas-start bg-dark text-white"
tabindex="-1"
id="menu">

<div class="offcanvas-header">

<h5>

Easy Barber

</h5>

<button
class="btn-close btn-close-white"
data-bs-dismiss="offcanvas">
</button>

</div>

<div class="offcanvas-body">

<a class="d-block text-white mb-3" href="#">
Dashboard
</a>

<a class="d-block text-white mb-3" href="#">
Agenda
</a>

<a class="d-block text-white mb-3" href="#">
Minha Equipe
</a>

<a class="d-block text-white mb-3" href="#">
Serviços
</a>

<a class="d-block text-white" href="#">
Configurações
</a>

</div>

</div>

<!-- SIDEBAR DESKTOP -->

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

<i class="bi bi-calendar3"></i>

Agenda

</a>

<a href="#">

<i class="bi bi-people"></i>

Minha Equipe

</a>

<a href="#">

<i class="bi bi-scissors"></i>

Serviços

</a>

<a href="#">

<i class="bi bi-stars"></i>

Visagismo IA

</a>

<a href="#">

<i class="bi bi-gear"></i>

Configurações

</a>

</div>

</div>

<!-- CONTEÚDO -->

<div class="content">

<h2>

Olá, Gabriel 👋

</h2>

<p class="text-secondary">

Sua agenda está pronta

</p>

<!-- CARDS -->


<!-- PRÓXIMOS SERVIÇOS -->

<div class="card card-eb">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

<h4 class="mb-0">

<i class="bi bi-calendar-week"></i>

Próximos Serviços

</h4>

<button class="btn btn-gold">

<i class="bi bi-plus-circle"></i>

Adicionar Serviço

</button>

</div>

<div class="agenda-item">

<strong>

08:00

</strong>

<br>

João Silva

<br>

<small>

Corte Social

</small>

</div>

<div class="agenda-item">

<strong>

09:00

</strong>

<br>

Pedro Alves

<br>

<small>

Low Fade

</small>

</div>

<div class="agenda-item">

<strong>

10:30

</strong>

<br>

Lucas Souza

<br>

<small>

Corte + Barba

</small>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>