<?php

require_once __DIR__ . '/../Models/Barbearias.php';
require_once __DIR__ . '/../Models/Equipe.php';

class Usuarios {

    public function index(){
        require __DIR__ . '/../Views/Usuarios/index.php';
    }

    public function new(){
        require __DIR__ . '/../Views/Usuarios/new.php';
    }

    public function save(){

        $dono = $_POST['dono'] ?? null;
        $barbearia = $_POST['barbearia'] ?? null;
        $email = $_POST['email'] ?? null;
        $cpf = $_POST['cpf'] ?? null;
        $fone = $_POST['fone'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if(!$dono || !$barbearia || !$email || !$cpf || !$fone || !$senha){
            echo "Preencha todos os campos";
            return;
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // 1. CRIA BARBEARIA
        $barbearia_id = Barbearias::save(
            $barbearia,
            $email,
            $cpf,
            $fone
        );

        // 2. CRIA DONO NA EQUIPE
        Equipe::save(
            $barbearia_id,
            $dono,
            $email,
            $senhaHash,
            'dono',
            1
        );

        header("Location: " . base_url('login'));
        exit;
    }
}