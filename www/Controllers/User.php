<?php

class User {

    public function index(){

        session_start();

        // verificar login

        if(
            empty(
                $_SESSION['usuario_id']
            )
        ){

            header(
                'Location: ' .
                base_url(
                    'login'
                )
            );

            exit;

        }

        // apenas dono

        if(
            $_SESSION['usuario_nivel']
            != 2
        ){

            header(
                'Location: ' .
                base_url(
                    'login'
                )
            );

            exit;

        }

        $usuario = [

            'id' =>
            $_SESSION['usuario_id'],

            'nome' =>
            $_SESSION['usuario_nome'],

            'email' =>
            $_SESSION['usuario_email'],

            'barbearia' =>
            $_SESSION['usuario_barbearia']

        ];

        require
        __DIR__ .
        '/../Views/User/Barbearia/Dashboard/index.php';

    }

}