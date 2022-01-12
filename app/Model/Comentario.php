<?php

namespace App\Model;

use App\Lib\Database\Connection;

class Comentario
{
    /**
     * Método que seleciona todas os comentários de acordo com o ID da postagem
     * @var number $idPost
     * @return array $resultado
     */
    public static function selectComents($idPost)
    {
        $con = Connection::getConn();

        $sql = 'SELECT * FROM comentario WHERE id_postagem = :id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, \PDO::PARAM_INT);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject(self::class)) {
            $resultado[] = $row;
        }

        return $resultado;
    }

    public static function inserir($reqPost)
    {
        $con = Connection::getConn();

        $sql = "INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nom, :msg, :idp)";
        $sql = $con->prepare($sql);
        $sql->bindValue(':nom', $reqPost['nome']);
        $sql->bindValue(':msg', $reqPost['msg']);
        $sql->bindValue(':idp', $reqPost['id']);
        $sql->execute();

        if ($sql->rowCount()) {
            return true;
        }

        throw new \Exception("Falha na inserção");
    }
}