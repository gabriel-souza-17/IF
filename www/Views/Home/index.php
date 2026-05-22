<?php require_once('Config/Helpers.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Barber</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body{
            background-color: #0f0f0f;
            color: white;
        }

        .navbar{
            background-color: #111;
        }

        .hero{
            min-height: 90vh;
            display: flex;
            align-items: center;
            background: linear-gradient(
                rgba(0,0,0,0.7),
                rgba(0,0,0,0.7)
            ),
            url('https://images.unsplash.com/photo-1621605815971-fbc98d665033?q=80&w=1600&auto=format&fit=crop') center/cover;
        }

        .hero h1{
            font-size: 4rem;
            font-weight: bold;
        }

        .btn-gold{
            background-color: #d4a762;
            color: black;
            font-weight: bold;
            border: none;
        }

        .btn-gold:hover{
            background-color: #be9455;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark py-3">
    <div class="container">

        <a class="navbar-brand fw-bold" href="<?php echo base_url(); ?>">
            <i class="bi bi-scissors"></i> Easy Barber
        </a>

        <div class="ms-auto">

            <a href="<?php echo base_url('login'); ?>" class="btn btn-gold px-4">
                Entrar
            </a>

        </div>

    </div>
</nav>

<section class="hero">
    <div class="container">

        <h1>Seu estilo começa aqui.</h1>

        <p class="lead mt-4">
            Agende seu horário online sem filas.
        </p>

        <div class="mt-4 d-flex gap-3">

            <a href="<?php echo base_url('usuarios'); ?>" class="btn btn-gold btn-lg">
                Criar Conta
            </a>

            <a href="<?php echo base_url('login'); ?>" class="btn btn-outline-light btn-lg">
                Fazer Login
            </a>

            <a href="<?php echo base_url('barbeiros'); ?>" class="btn btn-outline-light btn-lg">
                Barbeiros
            </a>
            <a href="<?php echo base_url('admin'); ?>" class="btn btn-outline-light btn-lg">
                Administração
            </a>

            <a href="<?php echo base_url('cliente'); ?>" class="btn btn-outline-light btn-lg">
                Cliente
            </a>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>