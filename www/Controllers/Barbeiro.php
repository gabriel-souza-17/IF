<?php

class Barbeiro {

    public function index(){

        session_start();

        if(
            !isset(
                $_SESSION['usuario_logado']
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

        echo "<h1>Painel do Barbeiro</h1>";

        echo "<hr>";

        echo "ID: " .
        $_SESSION['usuario_id'];

        echo "<br><br>";

        echo "Nome: " .
        $_SESSION['usuario_nome'];

        echo "<br><br>";

        echo "Email: " .
        $_SESSION['usuario_email'];

        echo "<br><br>";

        echo "Nível: " .
        $_SESSION['usuario_nivel'];

    }

}