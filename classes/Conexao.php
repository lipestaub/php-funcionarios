<?php
    namespace classes;

    use PDOException;

    class Conexao {
        public static function getConnection() {
            try {
                $connection = new \PDO('pgsql:host=localhost;dbname=empresa', 'postgres', 'postgres');

                return $connection;
            }
            catch (PDOException $exception) {
                echo "Connection failed: " . $exception->getMessage();
            }
        }
    }
?>