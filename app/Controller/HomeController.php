<?php

class HomeController
{
    /**
     * Página de home, responsável por exibir todas as publicações em uma 
     * página principal
     */
    public function index()
    {
        try {
            $collectPostagens = Postagem::selectAll();

            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $parametros = array();
            $parametros['postagens'] = $collectPostagens;

            $conteudo = $template->render($parametros);

            echo $conteudo;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}