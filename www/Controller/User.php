<?php

class User {

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

        // apenas barbeiro

        if(
            $_SESSION['usuario_nivel']
            != 2
        ){

            redirectPage(
                base_url('login')
            );

            exit;

        }

        $usuario =
        $_SESSION['usuario_logado'];

        require
        'Views/User/Dashboard/index.php';

    }

}