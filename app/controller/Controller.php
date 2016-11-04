<?php

// Importação de biblioteca
require_once(__DIR__.'/../lib/Input.php');

class Controller
{
    protected $input;
    protected $resposta = array();

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $this->input = new Input();
    }
}