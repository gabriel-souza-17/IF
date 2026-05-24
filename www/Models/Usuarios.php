<?php

require_once __DIR__ .
'/../Config/Database.php';

class Usuario {

    public static function save(

        $usuarios_dono,

        $usuarios_barbearia,

        $usuarios_email,

        $usuarios_cpf,

        $usuarios_fone,

        $usuarios_senha,

        $usuarios_nivel,

        $usuarios_status

    ){

        $conn =
        Database::connect();

        $sql =
        $conn->prepare("

            INSERT INTO usuarios(

                usuarios_dono,

                usuarios_barbearia,

                usuarios_email,

                usuarios_cpf,

                usuarios_fone,

                usuarios_senha,

                usuarios_nivel,

                usuarios_status,

                usuarios_criado

            )

            VALUES(

                :dono,

                :barbearia,

                :email,

                :cpf,

                :fone,

                :senha,

                :nivel,

                :status,

                NOW()

            )

        ");

        $sql->bindValue(
            ':dono',
            $usuarios_dono
        );

        $sql->bindValue(
            ':barbearia',
            $usuarios_barbearia
        );

        $sql->bindValue(
            ':email',
            $usuarios_email
        );

        $sql->bindValue(
            ':cpf',
            $usuarios_cpf
        );

        $sql->bindValue(
            ':fone',
            $usuarios_fone
        );

        $sql->bindValue(
            ':senha',
            $usuarios_senha
        );

        $sql->bindValue(
            ':nivel',
            $usuarios_nivel
        );

        $sql->bindValue(
            ':status',
            $usuarios_status
        );

        return
        $sql->execute();

    }

}