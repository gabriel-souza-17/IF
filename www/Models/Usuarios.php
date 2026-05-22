<?php

require_once __DIR__ . '/../Config/Database.php';

class Usuario {

    public static function save(
        $usuarios_dono,
        $usuarios_barbearia,
        $usuarios_email,
        $usuarios_cpf,
        $usuarios_fone,
        $usuarios_senha
    ){

        $conn = Database::connect();

        // padrão = barbeiro
        $usuarios_nivel = 1;

        $sql = $conn->prepare("
            INSERT INTO usuarios (
                usuarios_dono,
                usuarios_barbearia,
                usuarios_email,
                usuarios_cpf,
                usuarios_fone,
                usuarios_senha,
                usuarios_nivel
            )
            VALUES (
                :usuarios_dono,
                :usuarios_barbearia,
                :usuarios_email,
                :usuarios_cpf,
                :usuarios_fone,
                :usuarios_senha,
                :usuarios_nivel
            )
        ");

        $sql->bindValue(':usuarios_dono', $usuarios_dono);
        $sql->bindValue(':usuarios_barbearia', $usuarios_barbearia);
        $sql->bindValue(':usuarios_email', $usuarios_email);
        $sql->bindValue(':usuarios_cpf', $usuarios_cpf);
        $sql->bindValue(':usuarios_fone', $usuarios_fone);

        $sql->bindValue(
            ':usuarios_senha',
            password_hash($usuarios_senha, PASSWORD_DEFAULT)
        );

        $sql->bindValue(':usuarios_nivel', $usuarios_nivel);

        return $sql->execute();
    }

}