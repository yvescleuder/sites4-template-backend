/* Quando o documento inteiro for lido, essa função será executada */
$(document).ready(function($) {
	/**
	 * Essa função pega a nossa URL e separa onde tem o caractere /
	 * sendo assim ela torna-se um vetor onde você pode acessar
	 * pela sua posição, ex: pageURL[4]
	 */
	var pageURL = window.location.href.split('/');

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
        	'acao': 'visualizarPost',
        	'id': pageURL[4]
        },
        dataType: 'json',
        beforeSend: function(){},
        error: function(){},
        success: retorno
    });

	/**
	 * Listando todas as categorias
	 */
    $.ajax({
        type: 'POST',
        url: '/app/action/listar.php',
        data: {
        	'acao': 'listarCategorias'
        },
        dataType: 'json',
        beforeSend: function(){},
        error: function(){},
        success: retornoCategorias
    });
});

function retorno(post) {
	/**
	 * Para cada posição dentro de nosso post nós atualizamos no html
	 * correspondente ao ID da posição
	 * Ex: posicao = titulo, post[titulo] = "Meu primeiro post"
	 */
	for(var posicao in post) {
		$("#"+posicao).html(post[posicao]);
    }
}

function retornoCategorias(categorias) {
	var categoriaHTML1 = '';
	var categoriaHTML2 = '';
	var metadeTamanho = Math.round(categorias.length/2);
	var i = 0;
	categorias.forEach(function(categoria, i) {
		if(metadeTamanho > i)
            categoriaHTML1 += '<li><a href="#">'+categoria.nome+'</a></li>';
		else
            categoriaHTML2 += '<li><a href="#">'+categoria.nome+'</a></li>';
	});

	$("#categoria1").html(categoriaHTML1);
	$("#categoria2").html(categoriaHTML2);
}