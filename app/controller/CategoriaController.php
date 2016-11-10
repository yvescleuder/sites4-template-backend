<?php

// Importação de Controller
require_once("Controller.php");

// Importaçõ de Model
require_once("../model/Categoria.php");

class CategoriaController extends Controller
{
	// Declarando a variável que irá instanciar o Objeto Post
	private $categoria;

	public function __construct()
	{
		// Clonar o contrcut da classe Pai.
		parent::__construct();
		// Instanciando o Objeto Categoria
		$this->categoria = new Categoria();
	}

	public function listar()
	{
		// Busca os dados Model
		return $this->categoria->listar();
	}
}