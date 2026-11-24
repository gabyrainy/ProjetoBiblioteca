<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe livro (bean)
    $livro = new Livro();

    // Definir os valores dos atributos a partir do form
    $livro->setTitulo($_POST['titulo']);
    $livro->setAnoLancamento($_POST['ano_lancamento']);
    $livro->setExemplares($_POST['exemplares']);
    $livro->setSinopse($_POST['sinopse']);
    $livro->setId($_POST['id']);

    // Instanciar um objeto da classe livroDAO
    $dao = new LivroDAO();

    // Invocar o método create
    $dao->update($livro);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');