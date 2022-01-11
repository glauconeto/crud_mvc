<?php

class Comentario
{
    /**
     * Método que seleciona todas os comentários de acordo com o ID da postagem
     */
    public static function selectComents($idPost)
    {
        $con = Connection::getConn();

        $sql = 'SELECT * FROM comentario WHERE id_postagem = :id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Comentario')) {
            $resultado[] = $row;
        }

        return $resultado;
    } 
}