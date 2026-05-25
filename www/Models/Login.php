<?php

require_once __DIR__ . '/../Config/Database.php';

class UsuarioLogin {

    // =========================
    // ADMIN
    // =========================
    public static function buscarAdmin($email){

        $conn = Database::connect();

        $sql = $conn->prepare("
            SELECT *
            FROM admins
            WHERE email = :email
            LIMIT 1
        ");

        $sql->bindValue(':email', $email);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    // =========================
    // EQUIPE (dono, barbeiro, recepção)
    // =========================
    public static function buscarEquipe($email){

        $conn = Database::connect();

        $sql = $conn->prepare("
            SELECT *
            FROM equipe
            WHERE email = :email
            LIMIT 1
        ");

        $sql->bindValue(':email', $email);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    // =========================
    // BARBEARIA (cadastro inicial / dono antigo)
    // =========================
    public static function buscarBarbearia($email){

        $conn = Database::connect();

        $sql = $conn->prepare("
            SELECT *
            FROM barbearias
            WHERE email = :email
            LIMIT 1
        ");

        $sql->bindValue(':email', $email);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}