<?php

class Cliente {

    public function index(){
        require __DIR__ . '/../Views/Cliente/index.php';
    }

    public function new(){
        require __DIR__ . '/../Views/Cliente/new.php';
    }

    public function save(){

        $cliente_dono = $_POST['dono'] ?? null;
        $cliente_barbearia = $_POST['barbearia'] ?? null;
        $cliente_email = $_POST['email'] ?? null;
        $cliente_cpf = $_POST['cpf'] ?? null;
        $cliente_fone = $_POST['fone'] ?? null;
        $cliente_senha = $_POST['senha'] ?? null;

        $cliente_nivel = 'barbeiro';

        if(
            !$cliente_dono ||
            !$cliente_barbearia ||
            !$cliente_email ||
            !$cliente_cpf ||
            !$cliente_fone ||
            !$cliente_senha
        ){
            echo "Preencha todos os campos";
            return;
        }

        $cliente_senha = password_hash($cliente_senha, PASSWORD_DEFAULT);

        Cliente::save(
            $cliente_dono,
            $cliente_barbearia,
            $cliente_email,
            $cliente_cpf,
            $cliente_fone,
            $cliente_senha,
            $cliente_nivel
        );

        header("Location: " . base_url('login'));
        exit;
    }

}
