<?php
    class Conexao {
        public static function getConnection() {
            $connection = new PDO('pgsql:host=localhost;dbname=empresa', 'postgres', 'postgres');

            return $connection;
        }
    }
?>