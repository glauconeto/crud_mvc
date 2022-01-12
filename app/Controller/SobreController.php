<?php

namespace App\Controller;

class SobreController
{
    /**
     * Página simples de sobre, apenas para exibir uma mensagem não oficial
     * @return string $conteudo
     */
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('sobre.html');

        $parametros = array();

        $conteudo = $template->render($parametros);

        echo $conteudo;
    }
}