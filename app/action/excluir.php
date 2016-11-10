<?php

// Importação de Controller
require_once(__DIR__."/../controller/PostController.php");

switch($_POST["acao"])
{
	case "excluirPost":
	{
		$post = new PostController();
		echo json_encode($post->excluir());
		break;	
	}

	default:
	{
		echo "Ação não encontrada no sistema";
		break;
	}
}