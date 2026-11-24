
<?php

class Emprestimo {

    private $id;
    private $codigo;
    private $data_emprestimo;
    private $data_devolucao;
    private $livro;
    private $usuario;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDataEmprestimo() {
        return $this->data_emprestimo;
    }

    public function setDataEmprestimo($data) {
        $this->data_emprestimo = $data;
    }

    public function getDataDevolucao() {
        return $this->data_devolucao;
    }

    public function setDataDevolucao($data) {
        $this->data_devolucao = $data;
    }


    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
}
