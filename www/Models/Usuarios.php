<?php

require_once __DIR__ . '/../Config/Database.php';

class Usuarios {

    public static function save(

        $barbearia_id,
        $nome,
        $email,
        $cpf,
        $telefone,
        $senha,
        $cargo = 'dono',
        $atende_clientes = 1,
        $agenda_ativa = 1

    ){

        $conn = Database::connect();

        $sql = "
        INSERT INTO usuarios(

            barbearia_id,
            nome,
            email,
            cpf,
            telefone,
            senha,
            cargo,
            atende_clientes,
            agenda_ativa,
            status

        )

        VALUES(

            ?,?,?,?,?,?,?,?,?,1

        )
        ";

        $stmt =
        $conn->prepare(
            $sql
        );

        $stmt->execute([

            $barbearia_id,

            $nome,

            $email,

            $cpf,

            $telefone,

            $senha,

            $cargo,

            $atende_clientes,

            $agenda_ativa

        ]);

        return
        $conn
        ->lastInsertId();

    }

    public static function buscarPorEmail(
        $email
    ){

        $conn =
        Database::connect();

        $sql =
        "
        SELECT *
        FROM usuarios
        WHERE email = ?
        LIMIT 1
        ";

        $stmt =
        $conn->prepare(
            $sql
        );

        $stmt->execute([
            $email
        ]);

        return
        $stmt
        ->fetch(
            PDO::FETCH_ASSOC
        );

    }

}