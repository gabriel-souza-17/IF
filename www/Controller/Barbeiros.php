<?php

class Barbeiros {

    public function index(){
        require __DIR__ . '/../Views/Barbeiros/index.php';
    }

    public function new(){
        require __DIR__ . '/../Views/Barbeiros/new.php';
    }

    public function save(){

        $barbeiros_dono = $_POST['dono'] ?? null;
        $barbeiros_barbearia = $_POST['barbearia'] ?? null;
        $barbeiros_email = $_POST['email'] ?? null;
        $barbeiros_cpf = $_POST['cpf'] ?? null;
        $barbeiros_fone = $_POST['fone'] ?? null;
        $barbeiros_senha = $_POST['senha'] ?? null;

        $barbeiros_nivel = 'barbeiro';

        if(
            !$barbeiros_dono ||
            !$barbeiros_barbearia ||
            !$barbeiros_email ||
            !$barbeiros_cpf ||
            !$barbeiros_fone ||
            !$barbeiros_senha
        ){
            echo "Preencha todos os campos";
            return;
        }

        $barbeiros_senha = password_hash($barbeiros_senha, PASSWORD_DEFAULT);

        Barbeiros::save(
            $barbeiros_dono,
            $barbeiros_barbearia,
            $barbeiros_email,
            $barbeiros_cpf,
            $barbeiros_fone,
            $barbeiros_senha,
            $barbeiros_nivel
        );

        header("Location: " . base_url('login'));
        exit;
    }

}
