<?php

// Importação de Controller
require_once(__DIR__."/../controller/PostController.php");

switch($_POST["acao"])
{
	case "inserirPost":
	{
		$post = new PostController();
		echo json_encode($post->inserir());
		break;	
	}

	default:
	{
		echo "Ação não encontrada no sistema";
		break;
	}
}