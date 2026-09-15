<?php
    class UsuarioDAO {
        public function create($usuario) {

            try {
                $query = BD::getConexao()->prepare("INSERT INTO usuario (nome, email, telefone, senha, emprestimo)
                VALUES ( :n, :e, :t, :s, :e)"
                );
                $query->bindValues(':n' , $usuario->getNome(), PDO::PARAM_STR);
                $query->bindValues(':e' , $usuario->geteEmail(), PDO::PARAM_STR);
                $query->bindValues(':t' , $usuario->getTelefone(), PDO::PARAM_STR);
                $query->bindValues(':s' , $usuario->getSenha(), PDO::PARAM_STR);
                $query->bindValues(':e' , $usuario->getEmprestimo(), PDO::PARAM_STR);

                if(!$query->execute()){
                    print_r($query->erroInfo());
                }
            }
             catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }


        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM usuario");

                if(!$query->execute()){
                    print_r($query->erroInfo());
                }

                $listaUsuario = array ();
                foreach($query->fetchAll(PDO:: FETCH_ASSOC) as $linha){
                    $usuario = new Usuario (); //Classe bean
                    $usuario->setId($linha['id_usuario']);
                    $usuario->setNome($linha['nome']);
                    $usuario->setEmail($linha['email']);
                    $usuario->setTelefone($linha['telefone']);
                    $usuario->setSenha($linha['senha']);
                    $usuario->setEmprestimo($linha['emprestimo']);


                    array_push($listaUsuario, $usuario);
                }

                return $listaUsuario;

            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }
    }