<?php
    //Incluir o arquivo autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe Uusraio (bean)
    $usuario = new Usuario();

    //Defini os valores dos atributos a partir do form
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setTelefone($_POST['telefone']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setEmprestimo($_POST['emprestimo']);

    //Instanciar um objeto da classe UusarioDAO
    $dao =  new UsuarioDAO();

    //Invoocar o Método create 
    $dao->create($usuario);

    //Redirecionar para o index (COMENTAR CADO NÃO FUNCIONE)
    header('Location : index.php');