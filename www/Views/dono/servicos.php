<?php 
if(isset($_SESSION['usuario_logado'])){
    if($_SESSION['usuario_logado']->cargo == 'dono'){
?>

<div class="main-content">

    <div class="d-flex justify-content-between mb-4">

        <div>

            <h1 class="text-white">
                Serviços
            </h1>

            <p class="text-secondary">
                Gerencie os serviços da barbearia.
            </p>

        </div>

        <a
            href="<?= base_url('dono/servicos/new') ?>"
            class="btn btn-primary">

            Novo Serviço

        </a>

    </div>

</div>

<?php
    }else{
        $msg = "Sem permissão de acesso!";
        redirectPage(base_url('login'));
    }
}else{
    $msg = "Sem permissão de acesso!";
        redirectPage(base_url('login'));

}