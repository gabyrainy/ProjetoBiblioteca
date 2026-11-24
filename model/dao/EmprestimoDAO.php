
<?php
class EmprestimoDAO {

    public function create($emprestimo) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO emprestimo
                (codigo, data_emprestimo, data_devolucao, usuario_id_usuario)
                VALUES (:c, :e, :d, :i,)"
            );

            $query->bindValue(':c', $emprestimo->getCodigo());
            $query->bindValue(':e', $emprestimo->getDataEmprestimo());
            $query->bindValue(':d', $emprestimo->getDataDevolucao());
            
            $query->bindValue(':i', $emprestimo->getUsuario()->getId());

            $query->execute();

        } catch(PDOException $e) {
           echo "Erro #1: " . $e->getMessage();
        }
    }

    public function read() {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM emprestimo"
            );

            $query->execute();

            $listaemprestimos = array();

            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {

                $emprestimo = new Emprestimo();

                $emprestimo->setId($linha['id_emprestimo']);
                $emprestimo->setCodigo($linha['codigo']);
                $emprestimo->setDataEmprestimo($linha['data_emprestimo']);
                $emprestimo->setDataDevolucao($linha['data_devolucao']);
                

                $daoUsuario = new UsuarioDAO();
                $usuario = $daoUsuario->find($linha['usuario_id_usuario']);

                $emprestimo->setUsuario($usuario);

                array_push($listaemprestimos, $emprestimo);
            }

            return $listaemprestimos;

        } catch(PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM emprestimo
                WHERE id_emprestimo = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);
            $query->execute();

            if($linha = $query->fetch(PDO::FETCH_ASSOC)) {

                $emprestimo = new Emprestimo();

                $emprestimo->setId($linha['id_emprestimo']);
                $emprestimo->setCodigo($linha['codigo']);
                $emprestimo->setDataEmprestimo($linha['data_emprestimo']);
                $emprestimo->setDataDevolucao($linha['data_devolucao']);
                

                $daoUsuario = new UsuarioDAO();
                $usuario = $daoUsuario->find($linha['usuario_id_usuario']);
                $emprestimo->setUsuario($usuario);

                return $emprestimo;
            }

            return null;

        } catch(PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
        }
    }

    public function update($emprestimo) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE emprestimo
                SET codigo = :c, data_emprestimo = :e, data_devolucao = :d, = :l,usuario_id_usuario = :u
                WHERE id_emprestimo = :i"
            );

            $query->bindValue(':c', $emprestimo->getCodigo());
            $query->bindValue(':e', $emprestimo->getDataEmprestimo());
            $query->bindValue(':d', $emprestimo->getDataDevolucao());
            $query->bindValue(':l', $emprestimo->getLivro());
            $query->bindValue(':u', $emprestimo->getUsuario()->getId());
            $query->bindValue(':i', $emprestimo->getId(), PDO::PARAM_INT);

            $query->execute();

        } catch(PDOException $e) {
            echo "Erro #4: " . $e->getMessage();
        }
    }

    public function destroy($id) {
        try {
            $query = BD::getConexao()->prepare(
                "DELETE FROM emprestimo
                WHERE id_emprestimo = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);
            $query->execute();

        } catch(PDOException $e) {
            echo "Erro #5: " . $e->getMessage();
        }
    }
}
