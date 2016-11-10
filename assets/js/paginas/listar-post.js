/* Quando o documento inteiro for lido, essa função será executada */
$(document).ready(function($) {
	/*
			type = Método (POST ou GET)
			url = Link de onde está a nossa ação
			data = Dados que serão enviados para o nosso PHP
			dataType = Qual tipo de retorno que ele está esperando (iremos usar json)
			beforeSend = Antes de receber a resposta (error ou success) essa ação é executada
			error = Se a requisição falhar
			success = Se a requisição foi OK (cod 200) então ela será chamada
		*/

		$.ajax({
	        type: 'POST',
	        url: '/app/action/listar.php',
	        data: {
	        	'acao': 'listarPost'
	        },
	        dataType: 'json',
	        beforeSend: function(){},
	        error: function(){},
	        success: retorno
	    });
});

function retorno(resposta)
{
	// Inicializar uma variável
	var postHTML = '';

	if(resposta.success)
	{
		/*
			Dentro de resposta[text] nós temos uma lista (vetor) de post, então temos que percorrer ela
			e armazenar dentro da variável postHTML.
		*/
		resposta.text.forEach(function(post, i) {
			postHTML += '<tr>'+
	                        '<td>'+post.titulo+'</td>'+
	                        '<td>'+post.datahora+'</td>'+
	                        '<td>'+post.autor+'</td>'+
	                        '<td><a href="/visualizar/'+post.id+'" class="btn btn-success btn-xs">Visualizar</a> <a class="btn btn-danger btn-xs" onclick="excluir('+post.id+');">Excluir</a> <a href="/editar/'+post.id+'" class="btn btn-info btn-xs">Editar</a></td>'+
	                    '</tr>';
		});

		/*
			Esse comando "append" ele adiciona no tudo da variável postHTML
			no final de onde tem o id chamado "listar_posts".
		*/
		$("#listar_posts").append(postHTML);
	}
	else
	{
		// Cria um alerta padrão do bootstrap
		postHTML = '<div class="alert alert-danger">'+resposta.text+'</div>';
		/*
			Esse comando "html" ele substitui tudo que contem
			id chamado "listar_posts" pela variável postHTML.
		*/
		$("#listar_posts").html(postHTML);
	}
}