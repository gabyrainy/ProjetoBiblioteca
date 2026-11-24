<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Usuario (bean)
    $categoria = new Categoria();

    // Definir os valores dos atributos a partir dos dados do form 
    $categoria->setDescricao($_POST['descricao']);
    $categoria->setId($_POST['id']);

    // Instanciar um objeto da classe UsuarioDAO
    $dao = new CategoriaDAO();

    //invocar o método update da classe UsuarioDAO
    $dao->update ($categoria);

    //Redirecionar para o index 
    header ('Location: index.php');

