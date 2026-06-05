<?php

namespace Controllers;

require_once("Models/Database.php");
require_once("Config/Helpers.php");

use Models\Database as Conexao;
use \PDO;

class Login{

    private $usuarios;
    
    function __construct(){
        $this->usuarios = new Conexao('usuarios');
    }

    protected function redirect($path, $message = null) {
        if ($message) {
            $_SESSION['msg'] = $message;
        }
        header("Location: {$path}");
        exit;
    }

    

    //R - Função Listar todas os registros de uma tabela do BD
    function index(){
        $data = [];
        $data['pagina'] = 'login';
        $data['msg'] = '';
        return view('login/index',$data);
    }

    function auth(){
        $requests = $_POST;

        $login = $requests['login'];
        $senha = $requests['senha'];

        $where = "usuarios_cpf = '{$login}' OR usuarios_email = 
        '{$login}' AND usuarios_senha = '{$senha}' ";

        $usuario = $this->usuarios->select(null, $where)->fetchObject();

        if($usuario){
            if($usuario->usuarios_nivel == 1){
                $_SESSION['usuario_logado'] = $usuario;
                $msg = ['texto'=>"Logado!", 'color'=>"success"];
                Login::redirect(base_url('admin'),$msg);


            }else if($usuario->usuarios_nivel == 2){
                $_SESSION['usuario_logado'] = $usuario;
                $msg = ['texto'=>"Logado!", 'color'=>"success"];
                Login::redirect(base_url('user'),$msg);

            }else{
                $msg = ['texto'=>"Usuário ou senha inválidos!", 'color'=>"danger"];
                Login::redirect(base_url('login'),$msg);
            }

        }else{
            $msg = ['texto'=>"Usuário ou senha inválidos!", 'color'=>"danger"];
            Login::redirect(base_url('login'),$msg);
        }
    }

    function logout(){
        unset($_SESSION['usuario_logado']);
        session_destroy();
        $msg = ['texto'=>"Deslogado!", 'color'=>"success"];
            Login::redirect(base_url('/'),$msg);
    }



}



