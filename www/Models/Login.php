<?php

require_once __DIR__ . '/../Config/Database.php';

class UsuarioLogin {

    public static function buscarPorEmail($email){

        $conn = Database::connect();

        $sql = $conn->prepare("
            SELECT * FROM usuarios
            WHERE usuarios_email = :email
            LIMIT 1
        ");

        $sql->bindValue(':email', $email);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);

    }

}