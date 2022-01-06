<?php

class Postagem
{
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

            if (!$resultado->comentarios) {
                $resultado->comentarios = 'Não existe nenhum comentário para essa postagem!';
            }
        }

        return $resultado;
    }
}