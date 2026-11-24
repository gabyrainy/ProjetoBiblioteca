<?php
    require "../../autoload.php";

    // Coletar o valor do id pela URL
    $id = $_GET ['id'];

    // Instanciar um objeto da classe ClienteDAO
    $dao = new CategoriaDAO();

    // Instanciar um objeto da classe UsuarioDAO
    $dao->destroy($id);

    //Redirecionar para o index
    header ('Location: index.php');