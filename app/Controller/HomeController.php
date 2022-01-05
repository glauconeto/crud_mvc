<?php

// namespace App\Controller;

// use App\Model\Postagem;

class HomeController
{
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