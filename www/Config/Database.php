<?php

class Database {

    public static function connect(){

        try {

            $host = "mysql"; // nome do service no docker-compose
            $port = "3306";
            $dbname = "novo_projeto";
            $user = "novo_usuario";
            $pass = "123456";

            $conn = new PDO(
                "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
                $user,
                $pass
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}