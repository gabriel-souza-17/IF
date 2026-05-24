<?php

require_once __DIR__ . '/../Models/Login.php';

class Login {

    public function index(){

        require 'Views/Login/index.php';

    }

    public function auth(){

        session_start();

        $email = trim(
            $_POST['email'] ?? ''
        );

        $senha = trim(
            $_POST['senha'] ?? ''
        );

        // validar campos

        if(
            empty($email) ||
            empty($senha)
        ){

            echo "Preencha email e senha";
            return;

        }

        // buscar usuário

        $usuario =
        UsuarioLogin::buscarPorEmail(
            $email
        );

        if(!$usuario){

            echo "Usuário não encontrado";
            return;

        }

        // verificar senha

        if(
            !password_verify(
                $senha,
                $usuario['usuarios_senha']
            )
        ){

            echo "Senha inválida";
            return;

        }

        // verificar status

        if(
            $usuario['usuarios_status'] != 1
        ){

            echo "Conta desativada";
            return;

        }

        // salvar sessão completa

        $_SESSION['usuario_logado'] = true;

        $_SESSION['usuario'] = [

            'id' =>
            $usuario['usuarios_id'],

            'nome' =>
            $usuario['usuarios_dono'],

            'email' =>
            $usuario['usuarios_email'],

            'cpf' =>
            $usuario['usuarios_cpf'],

            'fone' =>
            $usuario['usuarios_fone'],

            'nivel' =>
            $usuario['usuarios_nivel'],

            'status' =>
            $usuario['usuarios_status'],

            'criado' =>
            $usuario['usuarios_criado']

        ];

        // sessões rápidas

        $_SESSION['usuario_id'] =
        $usuario['usuarios_id'];

        $_SESSION['usuario_nome'] =
        $usuario['usuarios_dono'];

        $_SESSION['usuario_email'] =
        $usuario['usuarios_email'];

        $_SESSION['usuario_barbearia'] =
        $usuario['usuarios_barbearia'];

        $_SESSION['usuario_nivel'] =
        $usuario['usuarios_nivel'];

        $_SESSION['usuario_status'] =
        $usuario['usuarios_status'];

        // ADMIN

        if(
            $usuario['usuarios_nivel'] == 1
        ){

            header(
                'Location: ' .
                base_url(
                    'admin'
                )
            );

            exit;

        }

        // DONO BARBEARIA

        if(
            $usuario['usuarios_nivel'] == 2
        ){

            header(
                'Location: ' .
                base_url(
                    'user'
                )
            );

            exit;

        }

        // BARBEIRO

        if(
            $usuario['usuarios_nivel'] == 3
        ){

            header(
                'Location: ' .
                base_url(
                    'barbeiro'
                )
            );

            exit;

        }

        // CLIENTE

        if(
            $usuario['usuarios_nivel'] == 4
        ){

            header(
                'Location: ' .
                base_url(
                    'cliente'
                )
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
            base_url(
                'login'
            )
        );

        exit;

    }

}