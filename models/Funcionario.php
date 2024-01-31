<?php
    namespace models;

    require_once __DIR__ . '/../classes/Conexao.php';
    require_once __DIR__ . '/../classes/Funcionario.php';

    use classes\Conexao;
    use classes\Funcionario as FuncionarioClass;

    class Funcionario {
        public function create(FuncionarioClass $funcionario) {
            $connection = Conexao::getConnection();
            
            $stmt = $connection->prepare("INSERT INTO funcionarios (nome, genero, idade, salario) VALUES(:nome, :genero, :idade, :salario);");
            $stmt->bindValue(':nome', $funcionario->getNome());
            $stmt->bindValue(':genero', $funcionario->getGenero());
            $stmt->bindValue(':idade', $funcionario->getIdade());
            $stmt->bindValue(':salario', $funcionario->getSalario());
            $stmt->execute();
        }

        public function update(FuncionarioClass $funcionario) {
            $connection = Conexao::getConnection();

            $stmt = $connection->prepare("UPDATE funcionarios SET nome = :nome, genero = :genero, idade = :idade, salario = :salario WHERE id = :id;");
            $stmt->bindValue(':id', $funcionario->getId());
            $stmt->bindValue(':nome', $funcionario->getNome());
            $stmt->bindValue(':genero', $funcionario->getGenero());
            $stmt->bindValue(':idade', $funcionario->getIdade());
            $stmt->bindValue(':salario', $funcionario->getSalario());
            $stmt->execute();
        }

        public function updateSalario(int $id, int $percentual) {
            $connection = Conexao::getConnection();

            $percentual = 1 + ($percentual / 100);

            $stmt = $connection->prepare("UPDATE funcionarios SET salario = salario * :percentual WHERE id = :id;");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':percentual', $percentual);
            $stmt->execute();
        }

        public function delete(int $id) {
            $connection = Conexao::getConnection();

            $stmt = $connection->prepare("DELETE FROM funcionarios WHERE id = :id;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function getFuncionarios() {
            $connection = Conexao::getConnection();

            $stmt = $connection->prepare("SELECT * FROM funcionarios;");
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);

            return $stmt->fetchAll();
        }

        public function getFuncionario(int $id) {
            $connection = Conexao::getConnection();

            $stmt = $connection->prepare("SELECT * FROM funcionarios WHERE id = :id;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);

            return $stmt->fetchAll();
        }
    }
?>