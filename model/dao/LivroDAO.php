<?php
    class LivroDAO {
        public function create($livro) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO livro(ano_lancamento, sinopse, titulo, exemplares,categoria_id_categoria) 
                    VALUES (:a, :s, :t, :e, :i)"
                );
                $query->bindValue(':a', $livro->getAnoLancamento(), PDO::PARAM_STR);
                $query->bindValue(':s', $livro->getSinopse(), PDO::PARAM_INT);
                $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':e', $livro->getExemplares(), PDO::PARAM_INT);
                // Bind para a chave estrangeira
                $query->bindValue(':i', $livro->getCategoria() ->getId(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM livro");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listalivros = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $livro = new Livro(); // Classe bean
                    $livro->setId($linha['id_livro']);
                    $livro->setAnoLancamento($linha['ano_lancamento']);
                    $livro->setSinopse($linha['sinopse']);
                    $livro->setTitulo($linha['titulo']);
                    $livro->setExemplares($linha['exemplares']);
                    //Atributos da associação (com Categoria)
                    $daoCategoria = new CategoriaDAO();
                    $categoria = $daoCategoria->find($linha['categoria_id_categoria']);
                    $livro->setCategoria($categoria);


                    array_push($listalivros, $livro);
                }
                
                return $listalivros;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM livro WHERE id_livro = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $livro = new livro(); // Classe bean
                    $livro->setId($linha['id_livro']);
                    $livro->setAnoLancamento($linha['ano_lancamento']);
                    $livro->setSinopse($linha['sinopse']);
                    $livro->setTitulo($linha['titulo']);
                    $livro->setExemplares($linha['exemplares']);
                }
                
                return $livro;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }

        public function update($livro) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE livro
                    SET titulo = :t, ano_lancamento = :a, sinopse = :s, exemplares = :e, id_categoria = :c,
                    WHERE id_livro = :i"
                );
                $query->bindValue(':a', $livro->getAnoLancamento(), PDO::PARAM_INT);
                $query->bindValue(':s', $livro->getSinopse(), PDO::PARAM_STR);
                $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':e', $livro->getExemplares(), PDO::PARAM_INT);
                $query->bindValue(':i', $livro->getId(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM livro
                    WHERE id_livro = :i"
                );                
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }