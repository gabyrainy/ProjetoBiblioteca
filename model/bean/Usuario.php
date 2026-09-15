<?php
    class Usuario {
        // Atributos
        private $id;
        private $nome;
        private $email;
        private $telefone;
        private $senha;
        private $emprestimo;

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getEmprestimo() {
            return $this->emprestimo;
        }

        public function setEmprestimo($emprestimo) {
            $this->emprestimo = $emprestimo;
        }
    }