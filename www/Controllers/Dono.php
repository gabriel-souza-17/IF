<?php

namespace Controllers;

require_once("Models/Database.php");
require_once("Config/Helpers.php");

use Models\Database as Conexao;
use PDO;

class Dono
{
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = new Conexao('usuarios');
    }
    
    public function index()
    {
        require 'Views/dono/index.php';
    }

    public function equipe()
    {
        if (
            !isset($_SESSION['usuario_logado']) ||
            $_SESSION['usuario_logado']->cargo != 'dono'
        ) {
            redirectPage(base_url('login'));
            exit;
        }

        $barbearia_id = $_SESSION['usuario_logado']->barbearia_id;

        $equipe = $this->usuarios
            ->select(
                null,
                "barbearia_id = {$barbearia_id} AND cargo <> 'dono'",
                null,
                null
            )
            ->fetchAll(PDO::FETCH_CLASS);

        $data = [];
        $data['pagina'] = 'Minha Equipe';

        require 'Views/dono/equipe.php';
    }
    
    public function equipe_new()
    {
        $data = [];

        $data['pagina'] = 'Novo Barbeiro';

        require 'Views/dono/equipe_form.php';
    }

    public function equipe_save()
    {
        if (
            !isset($_SESSION['usuario_logado']) ||
            $_SESSION['usuario_logado']->cargo != 'dono'
        ) {
            redirectPage(base_url('login'));
            exit;
        }

        $requests = $_POST;

        $usuario = [
            'barbearia_id'    => $_SESSION['usuario_logado']->barbearia_id,
            'nome'            => trim($requests['nome']),
            'email'           => trim($requests['email']),
            'telefone'        => trim($requests['telefone']),
            'senha'           => md5($requests['senha']),
            'cargo'           => $requests['cargo'],
            'atende_clientes' => $requests['atende_clientes'],
            'agenda_ativa'    => 1,
            'status'          => 1,
            'created_at'      => date('Y-m-d H:i:s')
        ];

        if ($this->usuarios->insert($usuario)) {

            $_SESSION['msg'] = [
                'texto' => 'Colaborador cadastrado com sucesso!',
                'color' => 'success'
            ];

            header('Location: ' . base_url('dono/equipe'));
            exit;
        }

        $_SESSION['msg'] = [
            'texto' => 'Erro ao cadastrar colaborador.',
            'color' => 'danger'
        ];

        header('Location: ' . base_url('dono/equipe/new'));
        exit;
    }

    public function agenda()
    {
        require 'Views/dono/agenda.php';
    }

    public function servicos()
    {
        require 'Views/dono/servicos.php';
    }

    public function configuracoes()
    {
        require 'Views/dono/configuracoes.php';
    }

    public function visagismo()
    {
        require 'Views/dono/visagismo.php';
    }
}