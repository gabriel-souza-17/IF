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
        require 'Views/dono/equipe.php';
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