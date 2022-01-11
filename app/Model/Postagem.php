<?php

class Postagem
{
    /**
     * Método que seleciona todas as postagens da tabela
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
            throw new \Exception("Não foi encontrado nenhum registro no banco");
        }

        return $resultado;
    }

    /**
     * Método que seleciona apenas uma página de acordo com o ID
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
            throw new \Exception("Não foi encontrado nenhum registro no banco");
        } else {
            $resultado->comentarios = Comentario::selectComents($resultado->id);
        }

        return $resultado;
    }

    public static function insert($dadosPost)
    {
        if (empty($dadosPost['titulo']) OR empty($dadosPost['conteudo'])) {
            throw new Exception("Preencha todos os campos");

            return false;
        }

        $con = Connection::getConn();

        $sql = 'INSERT INTO postagem (titulo, conteudo) VALUES (:tit, :cont)';
        $sql = $con->prepare($sql);
        $sql->bindValue(':tit', $dadosPost['titulo']);
        $sql->bindValue(':cont', $dadosPost['conteudo']);
        $res = $sql->execute();

        if ($res == 0) {
            throw new Exception("Falha ao inserir publicação");
        
            return false;
        }

        return true;
    }

    public static function update($dadosPost)
    {
        $con = Connection::getConn();
        
        $sql = 'UPDATE postagem SET titulo = :tit, conteudo = :cont
        WHERE id = :id';
        $sql = $con->prepare($sql);
        $sql->vindValue(':tit', $dadosPost['titulo']);
        $sql->vindValue(':cont', $dadosPost['conteudo']);
    }
}