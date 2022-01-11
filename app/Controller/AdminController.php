<?php

class AdminController
{
    /**
     * Página principal do index
     */
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');
        $objPostagens = Postagem::selectAll();

        $parametros = array();
        $parametros['postagens'] = $objPostagens;

        $conteudo = $template->render($parametros);

        echo $conteudo;
    }

    /**
     * Página de criação de publicações
     */
    public function create()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('create.html');

        $parametros = array();

        $conteudo = $template->render($parametros);

        echo $conteudo;
    }

    /**
     * Página de inserção de publicações no banco de dados
    */
    public function insert()
    {
        try {
            Postagem::insert($_POST);

            echo '<script>alert("Publicação inserida com sucesso!")</script>';
            echo '<script>location.href="?pagina=admin&metodo=index"</script>';
        } catch (Exception $e) {
            echo '<script>alert("'. $e->getMessage(). '")</script>';
            echo '<script>location.href="?pagina=admin&metodo=create"</script>';
        }
    }

    public function update($dadosPost)
    {
        try {
            Postagem::update($dadosPost);
        } catch (Exception $e) {
            echo '<script>alert("'. $e->getMessage(). '")</script>';
        }
    }
}