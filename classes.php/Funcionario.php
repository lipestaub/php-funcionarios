<?php
    class Funcionario {
        private $id;
        private string $nome;
        private string $genero;
        private int $idade;
        private float $salario;

        public function __construct(string $nome, string $genero, int $idade, float $salario)
        {
            $this->id = null;
            $this->nome = $nome;
            $this->genero = $genero;
            $this->idade = $idade;
            $this->salario = $salario;
        }

        public function getAllInfo() : array {
            return [
                'id' => $this->id,
                'nome' => $this->nome,
                'genero' => $this->genero,
                'idade' => $this->idade,
                'salario' => $this->salario
            ];
        }

        public function getId() {
            return $this->id;
        }

        public function setId(int $id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome(string $nome) {
            $this->nome = $nome;
        }

        public function getGenero() {
            return $this->genero;
        }

        public function setGenero(string $genero) {
            $this->genero = $genero;
        }

        public function getIdade() {
            return $this->idade;
        }

        public function setIdade(int $idade) {
            $this->idade = $idade;
        }

        public function getSalario() {
            return $this->salario;
        }

        public function setSalario(float $salario) {
            $this->salario = $salario;
        }
    }
?>