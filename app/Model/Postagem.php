<?php

/**
 * Classe Model da tabela postagem do banco de dados, responsável 
 * pelas ações com o banco de dados
 */
class Postagem
{
    /**
     * Método para selecionar todas as postagens da tabela
     */
    public static function selectAll()
    {
        $con = Connection::getConn();

        $sql = 'SELECT * FROM postagem ORDER BY id DESC';
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }

        return $resultado;
    }

    /**
     * Método que seleciona apenas uma página de acordo com o ID
     * @var number $id
     * @return object $resultado
     */
    public static function selectID($id)
    {
        $con = Connection::getConn();

        $sql = 'SELECT * FROM postagem WHERE id = :id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Postagem');

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        } else {
            $resultado->comentarios = Comentario::selectComents($resultado->id);
        }

        return $resultado;
    }

    /**
     * Insere uma nova postagem no banco de dados
     * @var string $dadosPost
     * @return boolean
     */
    public static function insert($dadosPost)
    {
        if (empty($dadosPost['titulo']) OR empty($dadosPost['conteudo'])) {
            throw new Exception("Preencha todos os campos");

            return false;
        }

        $con = Connection::getConn();

        $sql = $con->prepare('INSERT INTO postagem (titulo, conteudo) VALUES (:tit, :cont)');
        $sql->bindValue(':tit', $dadosPost['titulo']);
        $sql->bindValue(':cont', $dadosPost['conteudo']);
        $res = $sql->execute();

        if ($res == 0) {
            throw new Exception("Falha ao inserir publicação");

            return false;
        }

        return true;
    }

    /**
     * Atualiza um registro de uma postagem no banco de dados
     * @var string $params
     * @return boolean
     */
    public static function update($params)
    {
        $con = Connection::getConn();

        $sql = $con->prepare('UPDATE postagem SET titulo = :tit, conteudo = :cont
        WHERE id = :id');
        $sql->bindValue(':tit', $params['titulo'], );
        $sql->bindValue(':cont', $params['conteudo']);
        $sql->bindValue(':id', $params['id']);

        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("Falha ao alterar publicação");

            return false;
        }

        return true;
    }

    public static function delete($id)
    {
        $con = Connection::getConn();

        $sql = 'DELETE FROM postagem WHERE id = :id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $id);

        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("Falha ao alterar publicação");

            return false;
        }

        return true;
    }
}