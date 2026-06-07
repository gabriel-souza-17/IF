<?php

return [

    '/' => ['Home', 'index'],
    '/home' => ['Home', 'index'],
    '/home/index' => ['Home', 'index'],
    '/home/precos' => ['Home', 'precos'],
    '/home/vender' => ['Home', 'vender'],
    '/home/anuncios' => ['Home', 'anuncios'],
    '/home/contato' => ['Home', 'contato'],

    '/cadastro' => ['Cadastro', 'index'],
    '/cadastro/index' => ['Cadastro', 'index'],
    '/cadastro/create' => ['Cadastro', 'create'],
    
    '/cidades' => ['Cidades', 'index'],
    '/cidades/new' => ['Cidades', 'new'],
    '/cidades/index' => ['Cidades', 'index'],
    '/cidades/edit/{id}' => ['Cidades', 'edit'],
    '/cidades/delete/{id}' => ['Cidades', 'delete'],
    '/cidades/save' => ['Cidades', 'save'],
    '/cidades/edit_save' => ['Cidades', 'edit_save'],
    '/cidades/search' => ['Cidades', 'search'],

    '/categorias' => ['Categorias', 'index'],
    '/categorias/new' => ['Categorias', 'new'],
    '/categorias/index' => ['Categorias', 'index'],
    '/categorias/edit/{id}' => ['Categorias', 'edit'],
    '/categorias/delete/{id}' => ['Categorias', 'delete'],
    '/categorias/save' => ['Categorias', 'save'],
    '/categorias/edit_save' => ['Categorias', 'edit_save'],
    '/categorias/search' => ['Categorias', 'search'],

    '/usuarios' => ['Usuarios', 'index'],
    '/usuarios/new' => ['Usuarios', 'new'],
    '/usuarios/index' => ['Usuarios', 'index'],
    '/usuarios/edit/{id}' => ['Usuarios', 'edit'],
    '/usuarios/delete/{id}' => ['Usuarios', 'delete'],
    '/usuarios/save' => ['Usuarios', 'save'],
    '/usuarios/edit_save' => ['Usuarios', 'edit_save'],
    '/usuarios/search' => ['Usuarios', 'search'],

    '/enderecos' => ['Enderecos', 'index'],
    '/enderecos/new' => ['Enderecos', 'new'],
    '/enderecos/index' => ['Enderecos', 'index'],
    '/enderecos/edit/{id}' => ['Enderecos', 'edit'],
    '/enderecos/delete/{id}' => ['Enderecos', 'delete'],
    '/enderecos/save' => ['Enderecos', 'save'],
    '/enderecos/edit_save' => ['Enderecos', 'edit_save'],
    '/enderecos/search' => ['Enderecos', 'search'],

    '/login' => ['Login', 'index'],
    '/login/index' => ['Login', 'index'],
    '/login/auth' => ['Login', 'auth'],
    '/login/logout' => ['Login', 'logout'],

    '/admin' => ['Admin', 'index'],
    '/admin/index' => ['Admin', 'index'],

    '/user' => ['User', 'index'],
    '/user/index' => ['User', 'index'],
];