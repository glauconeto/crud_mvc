<?php

namespace App\Controller;

class ErroController
{
    /**
     * Página principal de erro, exibindo apenas uma mensagem simples
     */
    public function index()
    {
        echo 'Esta é uma página inexistente, por favor tente acessar novamente.';
    }
}