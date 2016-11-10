<?php

// Importação de Controller
require_once(__DIR__."/../controller/PostController.php");

switch($_POST["acao"])
{
	case "alterarPost":
	{
		$post = new PostController();
		echo json_encode($post->alterar());
		break;	
	}

	default:
	{
		echo "Ação não encontrada no sistema";
		break;
	}
}