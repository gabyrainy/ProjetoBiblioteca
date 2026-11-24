<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe emprestimo (bean)
    $emprestimo = new Emprestimo();

    // Definir os valores dos atributos a partir do form
    $emprestimo->setCodigo($_POST['codigo']);
    $emprestimo->setDataEmprestimo($_POST['data_emprestimo']);
    $emprestimo->setDataDevolucao($_POST['data_devolucao']);
    

    // Instanciar um objeto da Usuario
    $usuario = new Usuario();
    $usuario->setId($_POST['id_usuario']);

    // Definir a usuario no emprestimo
    $emprestimo->setUsuario($usuario);

    // Instanciar um objeto da classe emprestimoDAO
    $dao = new EmprestimoDAO();

    // Invocar o método create
    $dao->create($emprestimo);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    //header('Location: index.php');
    