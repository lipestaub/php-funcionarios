<?php
    class Conexao {
        public static function getConnection() {
            $connection = new PDO('pgsql:host=localhost;dbname=company', 'postgres', 'postgres');

            return $connection;
        }
    }
?>