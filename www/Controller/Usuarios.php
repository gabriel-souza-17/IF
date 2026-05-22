<?php

require_once __DIR__ . '/../Models/Usuarios.php';

class Usuarios {

    public function index(){
        require __DIR__ . '/../Views/Usuarios/index.php';
    }

    public function new(){
        require __DIR__ . '/../Views/Usuarios/new.php';
    }

    public function save(){

        $usuarios_dono = $_POST['dono'] ?? null;
        $usuarios_barbearia = $_POST['barbearia'] ?? null;
        $usuarios_email = $_POST['email'] ?? null;
        $usuarios_cpf = $_POST['cpf'] ?? null;
        $usuarios_fone = $_POST['fone'] ?? null;
        $usuarios_senha = $_POST['senha'] ?? null;

        $usuarios_nivel = 'barbeiro';

        if(
            !$usuarios_dono ||
            !$usuarios_barbearia ||
            !$usuarios_email ||
            !$usuarios_cpf ||
            !$usuarios_fone ||
            !$usuarios_senha
        ){
            echo "Preencha todos os campos";
            return;
        }

        $usuarios_senha = password_hash($usuarios_senha, PASSWORD_DEFAULT);

        Usuario::save(
            $usuarios_dono,
            $usuarios_barbearia,
            $usuarios_email,
            $usuarios_cpf,
            $usuarios_fone,
            $usuarios_senha,
            $usuarios_nivel
        );

        header("Location: " . base_url('login'));
        exit;
    }

}