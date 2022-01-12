<?php

namespace App\Core;

use App\Controller\ErroController;
use App\Controller\HomeController;

class Core 
{
    /**
     * Cérebro do projeto todo, responsável por comandar tudo que passa para
     * as controllers e views
     * @var string $urlGet
     * @return function call_user_func_array
     */
    public function start($urlGet) 
    {
        if (isset($urlGet['metodo'])) {
            $acao = $urlGet['metodo'];
        } else {
            $acao = 'index';
        }
        
        if (isset($urlGet['pagina'])) {
            $controller = ucfirst($urlGet['pagina'] . 'Controller');
        } else { 
            $controller = HomeController::class; 
        } 

        if (!class_exists($controller)) { 
            $controller = ErroController::class; 
        }

        if (isset($urlGet['id']) && ($urlGet['id'] != null)) {
            $id = $urlGet['id'];
        } else {
            $id = null;
        }

        call_user_func_array(array(new $controller, $acao), array($id));
    }
}