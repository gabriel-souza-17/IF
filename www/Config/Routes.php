<?php

return [

    '/' => ['Home', 'index'],
    '/home' => ['Home', 'index'],

    '/login' => ['Login', 'index'],
    '/login/auth' => ['Login', 'auth'],
    '/login/logout' => ['Login', 'logout'],

    '/usuarios' => ['Usuarios', 'index'],
    '/usuarios/new' => ['Usuarios', 'new'],
    '/usuarios/save' => ['Usuarios', 'save'],
    '/usuarios/edit' => ['Usuarios', 'edit'],
    '/usuarios/edit_save' => ['Usuarios', 'edit_save'],
    '/usuarios/delete' => ['Usuarios', 'delete'],

    '/barbeiros' => ['Barbeiros', 'index'],
    '/barbeiros/new' => ['Barbeiros', 'new'],
    '/barbeiros/save' => ['Barbeiros', 'save'],

    '/servicos' => ['Servicos', 'index'],
    '/servicos/new' => ['Servicos', 'new'],
    '/servicos/save' => ['Servicos', 'save'],

    '/agendamentos' => ['Agendamentos', 'index'],
    '/agendamentos/new' => ['Agendamentos', 'new'],
    '/agendamentos/save' => ['Agendamentos', 'save'],

    '/cliente' => ['Cliente', 'index'],
    '/admin' => ['Admin', 'index'],
    '/user' => ['User', 'index'],
    '/barbeiro' => ['Barbeiro', 'index'],

];