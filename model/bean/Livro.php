<?php
    class Livro {
        // Atributos
        private $id;
        private $anoLancamento;
        private $sinopse;
        private $titulo;
        private $exemplares;
        private $categoria; //  Associação com classe Categoria

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getAnoLancamento() {
            return $this->anoLancamento;
        }

        public function setAnoLancamento($anoLancamento) {
            $this->anoLancamento = $anoLancamento;
        }

        public function getSinopse() {
            return $this->sinopse;
        }

        public function setSinopse($sinopse) {
            $this->sinopse = $sinopse;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getExemplares() {
            return $this->exemplares;
        }

        public function setExemplares($exemplares) {
            $this->exemplares = $exemplares;
        }

        // Get e Set do atriburo de associação
        public function getCategoria(){
            return $this->categoria;
        }

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }
    }