<?php

namespace App\Controller;

use App\Model\Postagem;

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
        } catch (\Exception $e) {
            echo '<script>alert("'. $e->getMessage(). '")</script>';
            echo '<script>location.href="?pagina=admin&metodo=create"</script>';
        }
    }

    /**
     * View do formulário de alteração da postagem
     * @var string $paramId
     * @return string $conteudo
     */
    public function change($paramId)
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('update.html');

        $post = Postagem::selectID($paramId);

        $parametros = array();
        $parametros['id'] = $post->id;
        $parametros['titulo'] = $post->titulo;
        $parametros['conteudo'] = $post->conteudo;

        $conteudo = $template->render($parametros);

        echo $conteudo;
    }

    public function update()
    {
        try {
            Postagem::update($_POST);

            echo '<script>alert("Publicação alterada com sucesso!")</script>';
            echo '<script>location.href="?pagina=admin&metodo=index"</script>';
        } catch (\Exception $e) {
            echo '<script>alert("'. $e->getMessage(). '")</script>';
            echo '<script>location.href="?pagina=admin&metodo=change&id='. $_POST['id']. '"</script>';
        }
    }

    public function delete($paramId)
    {
        try {
            Postagem::delete($paramId);

            echo '<script>alert("Publicação deletada com sucesso!")</script>';
            echo '<script>location.href="?pagina=admin&metodo=index"</script>';
        } catch (\Exception $e) {
            echo '<script>alert("'. $e->getMessage(). '")</script>';
            echo '<script>location.href="?pagina=admin&metodo=index"</script>';
        }
    }
}