<?php

// Importação de Controller
require_once("Controller.php");

// Importaçõ de Model
require_once("../model/Post.php");

class PostController extends Controller
{
	// Declarando a variável que irá instanciar o Objeto Post
	private $post;

	public function __construct()
	{
		// Clonar o contrcut da classe Pai.
		parent::__construct();
		// Instanciando o Objeto Post
		$this->post = new Post();
	}

	public function inserir()
	{
		// Enviando os dados para ser inserindo no banco de dados
		$dados = $this->input->get("post");

		$dados["datahora"] = date('Y-m-d H:i:s');
		$dados["categoria_id"] = $dados["categoria"];
		unset($dados["categoria"]);

		$inserir = $this->post->novo($dados);

		if($inserir)
			$this->resposta = ["success" => true, "text" => "Post inserido com sucesso!"];
		else
			$this->resposta = ["success" => false, "text" => "Erro ao criar o post!"];

		return $this->resposta;
	}

	public function listar()
	{
		// Busca os dados Model
		$listar = $this->post->listar();
		if(!empty($listar))
			$this->resposta = ["success" => true, "text" => $listar];
		else
			$this->resposta = ["success" => false, "text" => "Não há nenhum post criado!"];

		return $this->resposta;
	}
}