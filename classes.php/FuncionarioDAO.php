<?php
    require_once __DIR__ . '/Conexao.php';

    class FuncionarioDAO {
        public function create(Funcionario $funcionario) {
            $connection = Conexao::getConnection();
            $stmt = $connection->prepare("INSERT INTO funcionarios VALUES(:id, :nome, :genero, :idade, :salario);");
            $stmt->bindParam('id', $funcionario->getId());
            $stmt->bindParam('nome', $funcionario->getNome());
            $stmt->bindParam('genero', $funcionario->getGenero());
            $stmt->bindParam('idade', $funcionario->getIdade());
            $stmt->bindParam('salario', $funcionario->getSalario());
            $stmt->execute();
        }

        public function update(Funcionario $funcionario) {
            
        }

        public function updateSalario(int $id, int $percentual) {
            
        }

        public function delete(int $id) {
            
        }

        public function getFuncionarios() {
            
        }

        public function getFuncionario(int $id) {
            
        }
    }
?>