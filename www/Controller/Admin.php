<?php
//require_once __DIR__ . '/Models/Admin.php';
class Admin {

    public function index(){

        require 'Views/Admin/index.php';

    }

    public function auth(){

        session_start();

        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if(!$email || !$senha){

            echo "Preencha todos os campos";
            return;

        }

        $admin = AdminLogin::buscarPorEmail($email);

        if(!$admin){

            echo "Usuário não encontrado";
            return;

        }

        if(!password_verify($senha, $admin['admins_senha'])){

            echo "Senha inválida";
            return;

        }

        $_SESSION['admin_id'] = $admin['admins_id'];
        $_SESSION['admin_nome'] = $admin['admins_dono'];
        $_SESSION['admin_email'] = $admin['admins_email'];
        $_SESSION['admin_nivel'] = $admin['admins_nivel'];

        if($admin['admins_nivel'] == 2){

            header('Location: ' . base_url('admin'));
            exit;

        }

        if($admin['admins_nivel'] == 1){

            header('Location: ' . base_url('user'));
            exit;

        }

        session_destroy();

        echo "Nível de usuário inválido";
    }

    public function logout(){

        session_start();

        session_destroy();

        header('Location: ' . base_url('login'));
        exit;

    }

}
