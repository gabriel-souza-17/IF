<?php

class Admin {

    public function index(){

        session_start();

        if(
            !isset(
                $_SESSION['usuario_logado']
            )
        ){

            redirectPage(
                base_url('login')
            );

            exit;

        }

        if(
            $_SESSION['usuario_nivel']
            != 1
        ){

            redirectPage(
                base_url('login')
            );

            exit;

        }

        $usuario =
        $_SESSION['usuario_logado'];

        require
        'Views/Admin/index.php';

    }

}