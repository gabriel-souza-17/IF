<?php

require_once __DIR__ .
'/../Config/Database.php';

class UsuarioLogin {

    public static function buscarPorEmail(
        $email
    ){

        $conn =
        Database::connect();

        $sql =
        $sql = $conn->prepare("

        SELECT

        usuarios_id,
        usuarios_dono,
        usuarios_barbearia,
        usuarios_email,
        usuarios_senha,
        usuarios_cpf,
        usuarios_fone,
        usuarios_nivel,
        usuarios_status,
        usuarios_criado
        FROM usuarios
        WHERE usuarios_email = :email
        LIMIT 1
        ");

        $sql->bindValue(
            ':email',
            $email
        );

        $sql->execute();

        return
        $sql->fetch(
            PDO::FETCH_ASSOC
        );

    }

}