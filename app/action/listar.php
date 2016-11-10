<?php

// Importação de Controller
require_once(__DIR__."/../controller/PostController.php");
require_once(__DIR__."/../controller/CategoriaController.php");

switch($_POST["acao"])
{
	case "listarPost":
	{
		$post = new PostController();
		echo json_encode($post->listar());
		break;	
	}

	case "visualizarPost":
	{
		$post = new PostController();
		echo json_encode($post->visualizar());
		break;	
	}

	case "listarCategorias":
	{
		$categoria = new CategoriaController();
		echo json_encode($categoria->listar());
		break;	
	}

	default:
	{
		echo "Ação não encontrada no sistema";
		break;
	}
}