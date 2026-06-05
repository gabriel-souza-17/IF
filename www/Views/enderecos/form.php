<?php 
if(isset($_SESSION['usuario_logado'])){
    if($_SESSION['usuario_logado']->usuarios_nivel == 1){
?>

<div class="container pt-4 pb-5 bg-light">
    
    <h2 class="border-bottom border-2 border-primary">
        <?= ucfirst($data['pagina']) ?>
    </h2>
    <form action="<?php echo base_url('enderecos/'.$data['method']); ?>" method="post">

        <div class="mb-3">
            <label for="enderecos_nome" class="form-label"> Nome para o endereço </label>
            <input type="text" class="form-control" name="enderecos_nome" value="<?= $data['enderecos']->enderecos_nome; ?>"  id="enderecos_nome">
        </div>

        <div class="mb-3">
            <label for="enderecos_usuarios_id" class="form-label"> Usuário </label>
            <select class="form-control" name="enderecos_usuarios_id" id="enderecos_usuarios_id">
                <?php 
                $enabled = '';
                foreach($data['usuarios'] as $usuarios){
                    if($usuarios->usuarios_id == $data['enderecos']->enderecos_usuarios_id){
                        $enabled = 'enabled';
                    }else{
                        $enabled = '';
                    }
                ?>
                    <option <?=  $enabled ?> value="<?= $usuarios->usuarios_id ?>"><?= $usuarios->usuarios_nome ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="enderecos_cidades_id" class="form-label"> Cidade </label>
            <select class="form-control" name="enderecos_cidades_id" id="enderecos_cidades_id">
                <?php 
                $enabled = '';
                foreach($data['cidades'] as $cidades){
                    if($cidades->cidades_id == $data['cidades']->enderecos_cidades_id){
                        $enabled = 'enabled';
                    }else{
                        $enabled = '';
                    }
                ?>
                    <option <?=  $enabled ?> value="<?= $cidades->cidades_id ?>"><?= $cidades->cidades_nome ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="enderecos_logradouro" class="form-label"> Endereço </label>
            <input type="text" class="form-control" name="enderecos_logradouro" value="<?= $data['enderecos']->enderecos_logradouro; ?>"  id="enderecos_logradouro">
        </div>

        <div class="mb-3">
            <label for="enderecos_numero" class="form-label"> Número </label>
            <input type="text" class="form-control" name="enderecos_numero" value="<?= $data['enderecos']->enderecos_numero; ?>"  id="enderecos_numero">
        </div>

        <div class="mb-3">
            <label for="enderecos_complemento" class="form-label"> Complemento</label>
            <input type="text" class="form-control" name="enderecos_complemento" value="<?= $data['enderecos']->enderecos_complemento; ?>"  id="enderecos_complemento">
        </div>

        <div class="mb-3">
            <label for="enderecos_cep" class="form-label"> CEP</label>
            <input type="text" class="form-control" name="enderecos_cep" value="<?= $data['enderecos']->enderecos_cep; ?>"  id="enderecos_cep">
        </div>

        <input type="hidden" name="enderecos_id" value="<?= $data['enderecos']->enderecos_id; ?>" >

        <div class="mb-3">
            <input class="btn btn-success" type="submit" name="<?= $data['method']; ?>" value="Salvar">
        </div>
    
    </form>

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