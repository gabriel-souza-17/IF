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

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
background:#0f0f0f;
color:white;
font-family:Arial, sans-serif;
overflow-x:hidden;
}

/* HERO */

.hero{

height:300px;

background:
linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.75)),
url('https://images.unsplash.com/photo-1621605815971-fbc98d665033?q=80&w=1400');

background-size:cover;
background-position:center;

display:flex;
align-items:center;
justify-content:center;

text-align:center;
padding:20px;

}

.hero h1{

font-size:52px;
font-weight:700;
margin-bottom:10px;

}

.hero p{

color:#d8d8d8;
font-size:18px;

}

/* CONTAINER */

.section{
padding:60px 20px;
}

/* TITULO */

.title{

font-size:30px;
font-weight:700;
margin-bottom:30px;

}

/* BARBEIROS */

.barber-card{

background:#171717;

border-radius:24px;

overflow:hidden;

transition:.25s;

cursor:pointer;

border:2px solid transparent;

height:100%;

}

.barber-card:hover{

transform:translateY(-5px);

border-color:#d4a762;

}

.barber-card.active{

border-color:#d4a762;

}

.barber-card img{

width:100%;
height:240px;
object-fit:cover;

}

.barber-content{

padding:20px;

}

.barber-content h4{

font-weight:700;
margin-bottom:5px;

}

.barber-content p{

color:#999;
margin:0;

}

/* SERVIÇOS */

.services{

display:grid;

grid-template-columns:repeat(auto-fit,minmax(220px,1fr));

gap:15px;

}

.service-card{

background:#171717;

border-radius:18px;

padding:20px;

cursor:pointer;

transition:.2s;

border:2px solid transparent;

}

.service-card:hover{

border-color:#d4a762;

transform:translateY(-4px);

}

.service-card.active{

border-color:#d4a762;

background:#1d1d1d;

}

.service-card h5{

font-weight:700;
margin-bottom:8px;

}

.service-price{

color:#d4a762;

font-size:22px;

font-weight:700;

}

/* HORÁRIOS */

.horarios{

display:grid;

grid-template-columns:repeat(auto-fit,minmax(95px,1fr));

gap:12px;

}

.horario{

background:#171717;

padding:15px;

border-radius:14px;

text-align:center;

cursor:pointer;

transition:.2s;

font-weight:700;

border:2px solid transparent;

}

.horario:hover{

background:#d4a762;
color:black;

}

.horario.active{

background:#d4a762;
color:black;

}

.horario.disabled{

opacity:.3;
cursor:not-allowed;

}

/* RESUMO */

.resume{

background:#171717;

border-radius:20px;

padding:25px;

margin-bottom:30px;

}

.resume-item{

display:flex;

justify-content:space-between;

margin-bottom:12px;

}

.resume-item:last-child{

margin-bottom:0;

}

/* FORM */

.card-eb{

background:#171717;

border:none;

border-radius:24px;

}

.form-control{

background:#1f1f1f !important;

border:none !important;

color:white !important;

padding:16px !important;

border-radius:14px !important;

}

.form-control:focus{

box-shadow:none !important;

border:1px solid #d4a762 !important;

}

/* BOTÃO */

.btn-gold{

background:#d4a762;

border:none;

color:black;

font-weight:700;

padding:16px;

border-radius:14px;

transition:.2s;

}

.btn-gold:hover{

background:#be9455;

}

/* FOOTER */

.footer{

padding:30px;

text-align:center;

color:#777;

border-top:1px solid rgba(255,255,255,.05);

margin-top:60px;

}

/* MOBILE */

@media(max-width:768px){

.hero{

height:240px;

}

.hero h1{

font-size:38px;

}

.title{

font-size:26px;

}

}

</style>

</head>

<body>

<!-- HERO -->

<div class="hero">

<div>

<h1>

Easy Barber

</h1>

<p>

Escolha seu barbeiro, serviço e horário

</p>

</div>

</div>

<!-- BARBEIROS -->

<div class="section container">

<h2 class="title">

Escolha um barbeiro

</h2>

<div class="row g-4">

<div class="col-md-4">

<div class="barber-card active">

<img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=800">

<div class="barber-content">

<h4>

Gabriel

</h4>

<p>

Especialista em Fade

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="barber-card">

<img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=800">

<div class="barber-content">

<h4>

João

</h4>

<p>

Barba e Social

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="barber-card">

<img src="https://images.unsplash.com/photo-1504593811423-6dd665756598?q=80&w=800">

<div class="barber-content">

<h4>

Carlos

</h4>

<p>

Cortes modernos

</p>

</div>

</div>

</div>

</div>

</div>

<!-- SERVIÇOS -->

<div class="section container">

<h2 class="title">

Escolha um serviço

</h2>

<div class="services">

<div class="service-card active">

<h5>

Corte Social

</h5>

<p class="text-secondary mb-3">

40 minutos

</p>

<div class="service-price">

R$ 35

</div>

</div>

<div class="service-card">

<h5>

Low Fade

</h5>

<p class="text-secondary mb-3">

50 minutos

</p>

<div class="service-price">

R$ 45

</div>

</div>

<div class="service-card">

<h5>

Corte + Barba

</h5>

<p class="text-secondary mb-3">

1 hora

</p>

<div class="service-price">

R$ 60

</div>

</div>

<div class="service-card">

<h5>

Barba

</h5>

<p class="text-secondary mb-3">

30 minutos

</p>

<div class="service-price">

R$ 25

</div>

</div>

</div>

</div>

<!-- HORÁRIOS -->

<div class="section container">

<h2 class="title">

Escolha um horário

</h2>

<div class="horarios">

<div class="horario">

08:00

</div>

<div class="horario">

08:30

</div>

<div class="horario">

09:00

</div>

<div class="horario disabled">

09:30

</div>

<div class="horario">

10:00

</div>

<div class="horario active">

10:30

</div>

<div class="horario">

11:00

</div>

<div class="horario">

11:30

</div>

<div class="horario disabled">

12:00

</div>

<div class="horario">

13:00

</div>

<div class="horario">

13:30

</div>

<div class="horario">

14:00

</div>

<div class="horario">

14:30

</div>

<div class="horario">

15:00

</div>

<div class="horario">

15:30

</div>

</div>

</div>

<!-- FORM -->

<div class="section container">

<div class="row justify-content-center">

<div class="col-lg-6">

<!-- RESUMO -->

<div class="resume">

<h4 class="mb-4">

Resumo do agendamento

</h4>

<div class="resume-item">

<span>

Barbeiro

</span>

<strong>

Gabriel

</strong>

</div>

<div class="resume-item">

<span>

Serviço

</span>

<strong>

Corte Social

</strong>

</div>

<div class="resume-item">

<span>

Horário

</span>

<strong>

10:30

</strong>

</div>

<div class="resume-item">

<span>

Valor

</span>

<strong class="text-warning">

R$ 35

</strong>

</div>

</div>

<!-- CARD -->

<div class="card card-eb">

<div class="card-body p-4 p-lg-5">

<h2 class="mb-4">

Finalizar Agendamento

</h2>

<form>

<div class="mb-3">

<label class="mb-2">

Nome

</label>

<input
type="text"
class="form-control"
placeholder="Digite seu nome">

</div>

<div class="mb-3">

<label class="mb-2">

WhatsApp

</label>

<input
type="text"
class="form-control"
placeholder="(64) 99999-9999">

</div>

<div class="mb-4">

<label class="mb-2">

Observações

</label>

<textarea
class="form-control"
rows="4"
placeholder="Observações adicionais"></textarea>

</div>

<button class="btn btn-gold w-100">

Confirmar Agendamento

</button>

</form>

</div>

</div>

</div>

</div>

</div>

<!-- FOOTER -->

<div class="footer">

© 2026 Easy Barber - Todos os direitos reservados

</div>

<script>

const barberCards = document.querySelectorAll('.barber-card');

barberCards.forEach(card => {

card.addEventListener('click', () => {

barberCards.forEach(c => c.classList.remove('active'));

card.classList.add('active');

});

});

const serviceCards = document.querySelectorAll('.service-card');

serviceCards.forEach(card => {

card.addEventListener('click', () => {

serviceCards.forEach(c => c.classList.remove('active'));

card.classList.add('active');

});

});

const horarios = document.querySelectorAll('.horario');

horarios.forEach(horario => {

if(!horario.classList.contains('disabled')){

horario.addEventListener('click', () => {

horarios.forEach(h => h.classList.remove('active'));

horario.classList.add('active');

});

}

});

</script>

</body>

</html>