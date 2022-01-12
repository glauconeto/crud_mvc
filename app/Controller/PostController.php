<?php

class PostController
{
    /**
     * Página que exibe a postagem em uma página separada, junto com os
     * comentários
     * @var array $params
     * @return object $conteudo
     */
    public function index($params)
    {
        try {
            $postagem = Postagem::selectID($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parametros = array();
            $parametros['id'] = $postagem->id;
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;
            $parametros['comentarios'] = $postagem->comentarios;

            $conteudo = $template->render($parametros);

            echo $conteudo;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método para adicionar comentários a um certo post
     * @return boolean
     */
    public function addComent()
    {
        try {
            Comentario::inserir($_POST);

            header('Location: ?pagina=post&id='.$_POST['id']);
        } catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="?pagina=post&id='.$_POST['id'].'"</script>';
        }
        
    }
}