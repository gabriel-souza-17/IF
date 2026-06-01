<?php

require_once __DIR__ . '/../Models/Barbearias.php';
require_once __DIR__ . '/../Models/Usuarios.php';

class Usuarios {

    public function index(){

        require __DIR__ .
        '/../Views/Usuarios/index.php';

    }

    public function new(){

        require __DIR__ .
        '/../Views/Usuarios/new.php';

    }

    public function save(){

        $dono =
        $_POST['dono']
        ?? null;

        $barbearia =
        $_POST['barbearia']
        ?? null;

        $email =
        $_POST['email']
        ?? null;

        $cpf =
        $_POST['cpf']
        ?? null;

        $fone =
        $_POST['fone']
        ?? null;

        $senha =
        $_POST['senha']
        ?? null;

        if(

            !$dono
            ||
            !$barbearia
            ||
            !$email
            ||
            !$cpf
            ||
            !$fone
            ||
            !$senha

        ){

            echo
            "Preencha todos os campos";

            return;

        }

        $senhaHash =
        password_hash(
            $senha,
            PASSWORD_DEFAULT
        );

        // cria barbearia

        $barbearia_id =
        Barbearias::save(

            $barbearia,

            $email,

            $cpf,

            $fone

        );

        // cria dono

        Usuarios::save(

            $barbearia_id,

            $dono,

            $email,

            $cpf,

            $fone,

            $senhaHash,

            'dono',

            1,

            1

        );

        header(
            "Location: "
            .
            base_url(
                'login'
            )
        );

        exit;

    }

}