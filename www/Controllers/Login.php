<?php

require_once __DIR__ . '/../Models/Login.php';

class Login {

    public function index(){
        require 'Views/Login/index.php';
    }

    public function auth(){

        session_start();

        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if(empty($email) || empty($senha)){
            echo "Preencha email e senha";
            return;
        }

        $usuario = null;
        $tipo = null;

        // 1 - ADMIN
        $usuario = UsuarioLogin::buscarAdmin($email);
        if($usuario){
            $tipo = 'admin';
        }

        // 2 - EQUIPE
        if(!$usuario){
            $usuario = UsuarioLogin::buscarEquipe($email);
            if($usuario){
                $tipo = 'equipe';
            }
        }

        // 3 - BARBEARIA (dono antigo / cadastro inicial)
        if(!$usuario){
            $usuario = UsuarioLogin::buscarBarbearia($email);
            if($usuario){
                $tipo = 'barbearia';
            }
        }

        if(!$usuario){
            echo "Usuário não encontrado";
            return;
        }

        // VERIFICA SENHA (campos diferentes dependendo da tabela)
        $senhaBanco = $usuario['senha'] ?? $usuario['usuarios_senha'];

        if(!password_verify($senha, $senhaBanco)){
            echo "Senha inválida";
            return;
        }

        // STATUS (se existir)
        if(isset($usuario['status']) && $usuario['status'] != 1){
            echo "Conta desativada";
            return;
        }

        // SESSÃO PADRÃO
        $_SESSION['logado'] = true;
        $_SESSION['tipo'] = $tipo;

        $_SESSION['usuario'] = $usuario;

        // =========================
        // REDIRECIONAMENTO
        // =========================

        if($tipo == 'admin'){
            header('Location: ' . base_url('admin'));
            exit;
        }

        if($tipo == 'equipe'){

            $_SESSION['barbearia_id'] = $usuario['barbearia_id'];
            $_SESSION['cargo'] = $usuario['cargo'];

            if($usuario['cargo'] == 'dono'){
                header('Location: ' . base_url('user'));
                exit;
            }

            if($usuario['cargo'] == 'barbeiro'){
                header('Location: ' . base_url('barbeiro'));
                exit;
            }

            if($usuario['cargo'] == 'recepcao'){
                header('Location: ' . base_url('recepcao'));
                exit;
            }
        }

        if($tipo == 'barbearia'){
            header('Location: ' . base_url('user'));
            exit;
        }

        session_destroy();
        echo "Tipo inválido";
    }

    public function logout(){

        session_start();
        session_destroy();

        header('Location: ' . base_url('login'));
        exit;
    }
}