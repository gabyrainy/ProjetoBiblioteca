<?php
    class CategoriaDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM categoria");

                if(!$query->execute()){
                    print_r($query->erroInfo());
                }

                $listaCategoria = array ();
                foreach($query->fetchAll(PDO:: FETCH_ASSOC) as $linha){
                    $categoria = new Categoria (); //Classe bean
                    $categoria->setId($linha['id_categoria']);
                    $categoria->setDescricao($linha['descricao']);

                    array_push($listaCategoria, $categoria);

                }

                return $listaCategoria;

            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }
    }