<?php

require_once __DIR__ . '/../Config/Database.php';

class Equipe {

    public static function save(
        $barbearia_id,
        $nome,
        $email,
        $senha,
        $cargo,
        $e_barbeiro
    ){

        $conn = Database::connect();

        $sql = $conn->prepare("
            INSERT INTO equipe(
                barbearia_id,
                nome,
                email,
                senha,
                cargo,
                e_barbeiro,
                status,
                created_at
            )
            VALUES(
                :barbearia_id,
                :nome,
                :email,
                :senha,
                :cargo,
                :e_barbeiro,
                1,
                NOW()
            )
        ");

        $sql->bindValue(':barbearia_id', $barbearia_id);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':cargo', $cargo);
        $sql->bindValue(':e_barbeiro', $e_barbeiro);

        return $sql->execute();
    }
}