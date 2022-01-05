<?php

// namespace App\Core; 
 
// use App\Controller\ErroController;
// use App\Controller\HomeController;

class Core 
{ 
    public function start($urlGet) 
    { 
        $acao = 'index';

        if (isset($urlGet['pagina'])) {
            $controller = ucfirst($urlGet['pagina'] . 'Controller');
        } else { 
            $controller = 'HomeController'; 
        } 

        if (!class_exists($controller)) { 
            $controller = 'ErroController'; 
        } 
  
        call_user_func_array(array(new $controller, $acao), array());
    }
}