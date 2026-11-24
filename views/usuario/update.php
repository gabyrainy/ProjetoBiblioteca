<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Usuario (bean)
    $usuario = new Usuario();

    // Definir os valores dos atributos a partir dos dados do form 
    $usuario->setId($_POST['id']);
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setTelefone($_POST['telefone']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setEmprestimo($_POST['emprestimo']);


    // Instanciar um objeto da classe UsuarioDAO
    $dao = new UsuarioDAO();

    //invocar o método update da classe UsuarioDAO
    $dao->update ($usuario);

    //Redirecionar para o index 
    header ('Location: index.php');