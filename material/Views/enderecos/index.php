<?php 
if(isset($_SESSION['usuario_logado'])){
    if($_SESSION['usuario_logado']->usuarios_nivel == 1){
?>

<div class="container pt-4 pb-5 bg-light">
    <h2 class="border-bottom border-2 border-primary">
         <?= $data['pagina'] ?>
    </h2>

    <?php

    // Mensangem de retorno
     if($data['msg']){
        echo msg($data['msg']['texto'], $data['msg']['color']);
     } 

    ?>

    
    <div class="container-fluid p-3">
        <form class="d-flex" action="<?php echo base_url('enderecos/search'); ?>" role="search" method="POST">
            <input class="form-control me-2" name="pesquisar" type="search" placeholder="Pesquisar" aria-label="Search">
            <button type="submit" class="btn btn-outline-success" ><i class="bi bi-search"></i> buscar</button>
        </form>
    </div>

    

    <table class="table">
        <!-- Cabeçalho da tabela -->
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuário</th>
                <th scope="col">Endereço</th>
                <th scope="col">
                    <a class="btn btn-primary" href="<?php echo base_url('enderecos/new'); ?>">
                    <i class="bi bi-plus-circle"></i> Novo
                    </a>
                </th>
            </tr>
        </thead>
        <!-- Corpo da tabela -->
        <tbody class="table-group-divider">
            <?php 
            foreach($data['enderecos'] as $enderecos ){?>
            <tr>
                <td><?= $enderecos->enderecos_id; ?></td>
                <td><?= $enderecos->usuarios_nome; ?></td>
                <td><?= "{$enderecos->enderecos_logradouro}, {$enderecos->enderecos_numero}, {$enderecos->enderecos_complemento}, {$enderecos->enderecos_cep}, {$enderecos->cidades_nome} - {$enderecos->cidades_uf}"; ?></td>
                <td>
                    <a class="btn btn-secondary" href="<?php echo base_url('enderecos/edit/'.$enderecos->enderecos_id); ?>">
                        <i class="bi bi-pencil-square"></i> Editar 
                    </a>
                    <a class="btn btn-danger" href="<?php echo base_url('enderecos/delete/'.$enderecos->enderecos_id); ?>">
                    <i class="bi bi-x-circle"></i> Excluir
                    </a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

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

?>