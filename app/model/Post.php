<?php

// Importação de Model
require_once("Model.php");

class Post extends Model
{
	// Toda vez que utilizamos a classe Post esse método será chamado mesmo não chamando ele
	public function __construct()
	{
		// Esse método abre a conexão com o banco de dados
		$this->open();
	}

	public function novo($dados)
	{
		/**
		 * Insere os $dados no banco na tabela post e retorna
		 * o último ID inserido no banco.
		 */
		$novo = $this->database->insert("post", $dados);
		return $novo;
	}

	public function listar()
	{
		/**
		 * Lista todos os posts do banco de dados
		 */
		$listar = $this->database->select("post", "*");
		return $listar;
	}

}