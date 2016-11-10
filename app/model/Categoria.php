<?php

// Importação de Model
require_once("Model.php");

class Categoria extends Model
{
	// Toda vez que utilizamos a classe Categoria esse método será chamado mesmo não chamando ele
	public function __construct()
	{
		// Esse método abre a conexão com o banco de dados
		$this->open();
	}
	public function listar()
	{
		/**
		 * Lista todas as categorias do banco de dados
		 */
		$listar = $this->database->select("categoria", "*");
		return $listar;
	}
}