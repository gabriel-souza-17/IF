<?php

class User {

    public function index(){

        session_start();

        if(!isset($_SESSION['usuario_id'])){

            header('Location: ' . base_url('login'));
            exit;

        }

        require __DIR__ . '/Views/User/index.php';

    }

}
