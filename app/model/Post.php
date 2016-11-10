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

	public function excluir($id)
	{
		/**
		 * Primeiramente deleta todos os comentários referente a esse post
		 * Depois deleta o post.
		 */
		$this->database->delete("comentario", ["post_id" => $id]);
		$deletar = $this->database->delete("post", ["id" => $id]);
		return $deletar;
	}

	public function visualizar($id)
	{
		/**
		 * Busca um determinado post pelo ID
		 */
		$listar = $this->database->query("SELECT
											t1.*, t2.nome AS categoria
										FROM post AS t1
										INNER JOIN categoria AS t2 ON (t1.categoria_id = t2.id)
										WHERE t1.id = $id")->fetch();
		return $listar;
	}

	public function alterar($dados)
	{
		/**
		 * Altera os $dados no banco na tabela post
		 */
		
		// Atribuo o a posição id do meu array dados e logo após eu deleto ele
		// para poder efetuar o update com as posições necessárias
		$id = $dados["id"];
		unset($dados["id"]);
		$alterar = $this->database->update("post", $dados, ["id" => $id]);
		return $alterar;
	}

}