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

    // Instanciar um objeto da Categoria
    $categoria = new Categoria();
    $categoria->setId($_POST['id_categoria']);

    // Definir a categoria no livro
    $livro->setCategoria($categoria);

    // Instanciar um objeto da classe livroDAO
    $dao = new LivroDAO();

    // Invocar o método create
    $dao->create($livro);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');