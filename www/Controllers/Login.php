<?php

require_once __DIR__ . '/../Models/Login.php';
require_once __DIR__ . '/../Config/Helpers.php';

class Login {

    public function index(){

        require 'Views/Login/index.php';

    }

    public function auth(){

        session_start();

        $login = trim(
            $_POST['login'] ?? ''
        );

        $senha = trim(
            $_POST['senha'] ?? ''
        );

        if(
            empty($login)
            ||
            empty($senha)
        ){

            echo "Preencha login e senha";
            return;

        }

        $usuario = null;
        $tipo = null;

        // ADMIN
        $usuario =
        UsuarioLogin::buscarAdmin(
            $login
        );

        if($usuario){

            $tipo = 'admin';

        }

        // EQUIPE
        if(!$usuario){

            $usuario =
            UsuarioLogin::buscarEquipe(
                $login
            );

            if($usuario){

                $tipo = 'equipe';

            }

        }

        // BARBEARIA
        if(!$usuario){

            $usuario =
            UsuarioLogin::buscarBarbearia(
                $login
            );

            if($usuario){

                $tipo = 'barbearia';

            }

        }

        if(!$usuario){

            echo "Usuário não encontrado";
            return;

        }

        // senha do banco
        $senhaBanco =
        $usuario['senha']
        ??
        $usuario['usuarios_senha']
        ??
        null;

        if(!$senhaBanco){

            echo "Senha não encontrada";
            return;

        }

        // verifica senha
        if(
            !password_verify(
                $senha,
                $senhaBanco
            )
        ){

            echo "Senha inválida";
            return;

        }

        // status
        if(
            isset(
                $usuario['status']
            )
            &&
            $usuario['status'] != 1
        ){

            echo "Conta desativada";
            return;

        }

        // sessão
        $_SESSION[
            'logado'
        ] = true;

        $_SESSION[
            'tipo'
        ] = $tipo;

        $_SESSION[
            'usuario'
        ] = $usuario;

        // ADMIN
        if(
            $tipo
            ==
            'admin'
        ){

            header(
                'Location: ' .
                base_url(
                    'admin'
                )
            );

            exit;

        }

        // EQUIPE
        if(
            $tipo
            ==
            'equipe'
        ){

            $_SESSION[
                'barbearia_id'
            ] =
            $usuario[
                'barbearia_id'
            ]
            ??
            null;

            $_SESSION[
                'cargo'
            ] =
            $usuario[
                'cargo'
            ]
            ??
            null;

            if(
                $_SESSION[
                    'cargo'
                ]
                ==
                'dono'
            ){

                header(
                    'Location: ' .
                    base_url(
                        'user'
                    )
                );

                exit;

            }

            if(
                $_SESSION[
                    'cargo'
                ]
                ==
                'barbeiro'
            ){

                header(
                    'Location: ' .
                    base_url(
                        'barbeiro'
                    )
                );

                exit;

            }

            if(
                $_SESSION[
                    'cargo'
                ]
                ==
                'recepcao'
            ){

                header(
                    'Location: ' .
                    base_url(
                        'recepcao'
                    )
                );

                exit;

            }

        }

        // BARBEARIA
        if(
            $tipo
            ==
            'barbearia'
        ){

            header(
                'Location: ' .
                base_url(
                    'user'
                )
            );

            exit;

        }

        session_destroy();

        echo "Tipo inválido";

    }

    public function logout(){

        session_start();

        unset(
            $_SESSION['logado']
        );

        unset(
            $_SESSION['usuario']
        );

        unset(
            $_SESSION['tipo']
        );

        session_destroy();

        header(
            'Location: ' .
            base_url(
                'login'
            )
        );

        exit;

    }

}