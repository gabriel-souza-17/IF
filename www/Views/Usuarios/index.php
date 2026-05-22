<?php require_once('Config/Helpers.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Easy Barber</title>

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

        .btn-gold{
            background-color: #d4a762;
            color: black;
            font-weight: bold;
            border: none;
        }

        .btn-gold:hover{
            background-color: #be9455;
        }

        .form-control{
            background-color: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
        }

        .form-control:focus{
            background-color: rgba(255,255,255,0.05);
            color: white;
            border-color: #d4a762;
            box-shadow: none;
        }

        .form-control::placeholder{
            color: rgba(255,255,255,0.5);
        }

        .login-box{
            max-width: 520px;
            width: 100%;
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
                Login
            </a>
        </div>

    </div>
</nav>

<section class="hero">
    <div class="container d-flex justify-content-center">

        <div class="login-box">

            <h1 class="fw-bold mb-3 text-center">
                Criar Conta
            </h1>

            <p class="text-center text-light mb-4">
                Cadastre sua barbearia e comece a usar o sistema
            </p>

            <form method="POST" action="<?php echo base_url('usuarios/save'); ?>">

                <div class="mb-3">
                    <label class="form-label">Nome do Dono</label>
                    <input type="text" name="dono" class="form-control" placeholder="Digite o nome do dono" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nome da Barbearia</label>
                    <input type="text" name="barbearia" class="form-control" placeholder="Digite o nome da barbearia" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="fone" class="form-control" placeholder="Digite seu telefone" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="Crie uma senha" required>
                </div>

                <button type="submit" class="btn btn-gold w-100">
                    Cadastrar
                </button>

            </form>

            <div class="text-center mt-4">
                <a href="<?php echo base_url('login'); ?>" class="text-warning">
                    Já tenho conta
                </a>
            </div>

        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>