<?php require_once('Config/Helpers.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Easy Barber - Master Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
background:#0d0d0d;
color:white;
font-family:Arial,sans-serif;
overflow-x:hidden;
}

/* SIDEBAR */

.sidebar{

position:fixed;

top:0;
left:0;

width:250px;
height:100vh;

background:#111;

border-right:1px solid rgba(255,255,255,.05);

padding:25px 18px;

overflow-y:auto;

}

.logo{

font-size:26px;
font-weight:700;

color:#d4a762;

margin-bottom:40px;

}

.menu-title{

font-size:11px;

text-transform:uppercase;

letter-spacing:1px;

color:#666;

margin-top:30px;
margin-bottom:12px;

padding-left:12px;

}

.menu a{

display:flex;

align-items:center;

gap:12px;

padding:14px;

margin-bottom:8px;

text-decoration:none;

color:#d7d7d7;

border-radius:14px;

transition:.2s;

font-size:15px;

}

.menu a:hover{

background:#1b1b1b;

color:#d4a762;

}

.menu a.active{

background:#d4a762;

color:black;

font-weight:700;

}

/* CONTENT */

.content{

margin-left:250px;

padding:30px;

}

/* TOPBAR */

.topbar{

display:flex;

justify-content:space-between;

align-items:center;

gap:20px;

margin-bottom:35px;

flex-wrap:wrap;

}

/* SEARCH */

.search-box{

position:relative;

width:100%;
max-width:500px;

}

.search-box input{

width:100%;

background:#171717;

border:none;

outline:none;

padding:16px 18px 16px 50px;

border-radius:16px;

color:white;

}

.search-box i{

position:absolute;

left:18px;
top:16px;

color:#777;

}

/* PROFILE */

.admin-profile{

background:#171717;

padding:10px 15px;

border-radius:14px;

display:flex;

align-items:center;

gap:12px;

}

.admin-profile img{

width:42px;
height:42px;

border-radius:50%;

object-fit:cover;

}

/* CARDS */

.card-eb{

background:#171717;

border:none;

border-radius:22px;

color:white;

height:100%;

}

.stats-icon{

width:55px;
height:55px;

background:#1f1f1f;

border-radius:16px;

display:flex;

align-items:center;

justify-content:center;

font-size:24px;

color:#d4a762;

margin-bottom:18px;

}

.stats-number{

font-size:34px;

font-weight:700;

margin-bottom:5px;

}

.stats-label{

color:#999;

font-size:15px;

}

/* STATUS */

.status{

padding:7px 12px;

border-radius:10px;

font-size:12px;

font-weight:700;

display:inline-block;

}

.status.online{

background:rgba(0,210,106,.15);

color:#00d26a;

}

.status.warning{

background:rgba(255,180,0,.15);

color:#ffb400;

}

.status.offline{

background:rgba(255,90,90,.15);

color:#ff5a5a;

}

/* TABLE */

.table-dark{

--bs-table-bg:#171717 !important;

border-radius:18px;

overflow:hidden;

}

.table-dark td,
.table-dark th{

padding:18px !important;

vertical-align:middle;

border-color:rgba(255,255,255,.04);

}

/* SYSTEM */

.system-item{

display:flex;

justify-content:space-between;

align-items:center;

padding:16px 0;

border-bottom:1px solid rgba(255,255,255,.05);

}

.system-item:last-child{

border:none;

}

/* QUICK ACTIONS */

.quick-btn{

width:100%;

background:#1f1f1f;

border:none;

padding:16px;

border-radius:16px;

color:white;

margin-bottom:14px;

text-align:left;

transition:.2s;

}

.quick-btn:hover{

background:#d4a762;

color:black;

}

/* MOBILE */

@media(max-width:992px){

.sidebar{

position:relative;

width:100%;
height:auto;

}

.content{

margin-left:0;

}

}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">

<i class="bi bi-scissors"></i>

Easy Barber

</div>

<div class="menu">

<div class="menu-title">

Principal

</div>

<a href="" class="active">

<i class="bi bi-grid"></i>

Dashboard

</a>

<a href="">

<i class="bi bi-shop"></i>

Barbearias

</a>

<div class="menu-title">

Sistema

</div>

<a href="">

<i class="bi bi-cpu"></i>

Sistema

</a>

<a href="">

<i class="bi bi-gear"></i>

Configurações

</a>

</div>

</div>

<!-- CONTENT -->

<div class="content">

<!-- TOPBAR -->

<div class="topbar">

<div class="search-box">

<i class="bi bi-search"></i>

<input
type="text"
placeholder="Pesquisar barbearia...">

</div>

<div class="admin-profile">

<img src="https://i.pravatar.cc/100">

<div>

<div class="fw-bold">

Gabriel

</div>

<small class="text-secondary">

MASTER ADMIN

</small>

</div>

</div>

</div>

<!-- TITLE -->

<h2 class="fw-bold mb-2">

Dashboard

</h2>

<p class="text-secondary mb-4">

Monitoramento da plataforma Easy Barber

</p>

<!-- STATS -->

<div class="row g-4">

<div class="col-md-3">

<div class="card card-eb">

<div class="card-body">

<div class="stats-icon">

<i class="bi bi-shop"></i>

</div>

<div class="stats-number">

84

</div>

<div class="stats-label">

Barbearias Ativas

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-eb">

<div class="card-body">

<div class="stats-icon">

<i class="bi bi-exclamation-triangle"></i>

</div>

<div class="stats-number">

2

</div>

<div class="stats-label">

Problemas Ativos

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-eb">

<div class="card-body">

<div class="stats-icon">

<i class="bi bi-whatsapp"></i>

</div>

<div class="stats-number">

98%

</div>

<div class="stats-label">

WhatsApp Online

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-eb">

<div class="card-body">

<div class="stats-icon">

<i class="bi bi-cloud-check"></i>

</div>

<div class="stats-number">

OK

</div>

<div class="stats-label">

Backup Diário

</div>

</div>

</div>

</div>

</div>

<!-- CONTENT AREA -->

<div class="row g-4 mt-2">

<!-- BARBERSHOPS -->

<div class="col-lg-8">

<div class="card card-eb">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-4">

<h5 class="mb-0">

Status das Barbearias

</h5>

<button class="btn btn-outline-light btn-sm">

Atualizar

</button>

</div>

<div class="table-responsive">

<table class="table table-dark align-middle">

<thead>

<tr>

<th>Barbearia</th>

<th>Status</th>

<th>Problema</th>

<th>Última atividade</th>

</tr>

</thead>

<tbody>

<tr>

<td>

Gabriel Barber

</td>

<td>

<span class="status online">

ONLINE

</span>

</td>

<td>

Nenhum

</td>

<td>

Agora mesmo

</td>

</tr>

<tr>

<td>

Alpha Barber

</td>

<td>

<span class="status warning">

INSTÁVEL

</span>

</td>

<td>

WhatsApp desconectado

</td>

<td>

5 min atrás

</td>

</tr>

<tr>

<td>

Royal Cuts

</td>

<td>

<span class="status offline">

OFFLINE

</span>

</td>

<td>

Webhook falhando

</td>

<td>

1 hora atrás

</td>

</tr>

</tbody>

</table>

</div>

</div>

</div>

</div>

<!-- SYSTEM STATUS -->

<div class="col-lg-4">

<div class="card card-eb">

<div class="card-body">

<h5 class="mb-4">

Sistema

</h5>

<div class="system-item">

<span>

API WhatsApp

</span>

<span class="status online">

ONLINE

</span>

</div>

<div class="system-item">

<span>

Fila de Processos

</span>

<span class="status online">

NORMAL

</span>

</div>

<div class="system-item">

<span>

Webhooks PIX

</span>

<span class="status warning">

2 FALHAS

</span>

</div>

<div class="system-item">

<span>

Cloudflare

</span>

<span class="status online">

OK

</span>

</div>

<div class="system-item">

<span>

Backup Automático

</span>

<span class="status online">

ATIVO

</span>

</div>

</div>

</div>

<!-- QUICK ACTIONS -->

<div class="card card-eb mt-4">

<div class="card-body">

<h5 class="mb-4">

Ações rápidas

</h5>

<button class="quick-btn">

<i class="bi bi-search"></i>

 Buscar Barbearia

</button>

<button class="quick-btn">

<i class="bi bi-arrow-clockwise"></i>

 Reiniciar Filas

</button>

<button class="quick-btn">

<i class="bi bi-whatsapp"></i>

 Reconectar WhatsApp

</button>

<button class="quick-btn">

<i class="bi bi-cloud-arrow-up"></i>

 Gerar Backup

</button>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>