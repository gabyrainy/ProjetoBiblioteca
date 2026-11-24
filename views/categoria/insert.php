<?php
    //Incluir o arquivo autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe Uusraio (bean)
    $categoria = new Categoria();

    //Defini os valores dos atributos a partir do form
    $categoria->setDescricao($_POST['descricao']);
    

    //Instanciar um objeto da classe UusarioDAO
    $dao =  new CategoriaDAO();

    //Invoocar o Método create 
    $dao->create($categoria);

    //Redirecionar para o index (COMENTAR CADO NÃO FUNCIONE)
    header('Location : index.php');