<?php

require_once __DIR__ . '/../Models/Login.php';

class Login {

    public function index(){

        require 'Views/Login/index.php';

    }

    public function auth(){

        session_start();

        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if(!$email || !$senha){

            echo "Preencha todos os campos";
            return;

        }

        $usuario =
        UsuarioLogin::buscarPorEmail(
            $email
        );

        if(!$usuario){

            echo "Usuário não encontrado";
            return;

        }

        if(
            !password_verify(
                $senha,
                $usuario['usuarios_senha']
            )
        ){

            echo "Senha inválida";
            return;

        }

        // sessão principal

        $_SESSION['usuario_logado'] = $usuario;

        // sessão rápida

        $_SESSION['usuario_id'] =
        $usuario['usuarios_id'];

        $_SESSION['usuario_nome'] =
        $usuario['usuarios_dono'];

        $_SESSION['usuario_email'] =
        $usuario['usuarios_email'];

        $_SESSION['usuario_nivel'] =
        $usuario['usuarios_nivel'];

        $_SESSION['usuario_barbearia'] =
        $usuario['usuarios_barbearia'];

        // ADMIN

        if(
            $usuario['usuarios_nivel'] == 1
        ){

            header(
                'Location: ' .
                base_url('admin')
            );

            exit;

        }

        // BARBEIRO

        if(
            $usuario['usuarios_nivel'] == 2
        ){

            header(
                'Location: ' .
                base_url('user')
            );

            exit;

        }

        session_destroy();

        echo "Nível inválido";

    }

    public function logout(){

        session_start();

        session_destroy();

        header(
            'Location: ' .
            base_url('login')
        );

        exit;

    }

}