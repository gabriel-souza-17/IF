<?php

require_once __DIR__ . '/../Config/Database.php';

class Barbearias {

    public static function save($nome_barbearia, $email, $cpf, $telefone){

        $conn = Database::connect();

        $sql = $conn->prepare("
            INSERT INTO barbearias(
                nome_barbearia,
                email,
                cpf,
                telefone,
                status,
                created_at
            )
            VALUES(
                :nome,
                :email,
                :cpf,
                :fone,
                1,
                NOW()
            )
        ");

        $sql->bindValue(':nome', $nome_barbearia);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':cpf', $cpf);
        $sql->bindValue(':fone', $telefone);

        $sql->execute();

        return $conn->lastInsertId();
    }
}