<?php 
if(isset($_SESSION['usuario_logado'])){
    if($_SESSION['usuario_logado']->cargo == 'dono'){
?>

<?php
if(
    !isset($_SESSION['usuario_logado']) ||
    $_SESSION['usuario_logado']->cargo != 'dono'
){
    redirectPage(base_url('login'));
    exit;
}
?>

<div class="main-content">

    <div class="mb-4">

        <h1 class="text-white">
            Agenda
        </h1>

        <p class="text-secondary">
            Visualize e gerencie os agendamentos.
        </p>

    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h5 class="text-white mb-0">
            Hoje
        </h5>

        <a
            href="<?= base_url('dono/agenda/new') ?>"
            class="btn btn-primary">

            <i class="bi bi-calendar-plus"></i>
            Novo Agendamento

        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <table class="table table-hover align-middle mb-0">

                <thead>

                    <tr>
                        <th>Horário</th>
                        <th>Cliente</th>
                        <th>Barbeiro</th>
                        <th>Serviço</th>
                        <th>Status</th>
                        <th width="150">Ações</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <i class="bi bi-calendar-x fs-1 d-block mb-3"></i>

                            <h5>
                                Nenhum agendamento encontrado
                            </h5>

                            <p class="text-muted mb-3">
                                Crie o primeiro agendamento.
                            </p>

                            <a
                                href="<?= base_url('dono/agenda/new') ?>"
                                class="btn btn-primary">

                                Novo Agendamento

                            </a>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

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