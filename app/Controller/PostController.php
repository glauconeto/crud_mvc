<?php

class PostController
{
    /**
     * Página que exibe a postagem em uma página separada, junto com os
     * comentários
     */
    public function index($params)
    {
        try {
            $postagem = Postagem::selectID($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parametros = array();
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;
            $parametros['comentarios'] = $postagem->comentarios;

            $conteudo = $template->render($parametros);

            echo $conteudo;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}