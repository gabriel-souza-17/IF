<?php

namespace Controllers;

class Dono
{
    public function index()
    {
        require 'Views/dono/index.php';
    }

    public function equipe()
    {
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