// Declaro uma variável global para poder acessar de todo o escopo do projeto
var categoria_id;

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

    $("#btnSalvar").click(function(event){
		event.preventDefault();

		/*	Pega todos os campos tem foram enviados pelo formulário que tem o name,
			caso não tenha o name não será enviado.
		*/
		var dados_formulario = $("#form_alterar_post").serialize();
		// Nessa parte nós adicionado um ID que irá obter o ID atual do post.
		dados_formulario += "&post[id]="+pageURL[4];
		var link_acao = $("#form_alterar_post").attr("action");
		var metodo = $("#form_alterar_post").attr("method");

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
	        type: metodo,
	        url: link_acao,
	        data: dados_formulario,
	        dataType: 'json',
	        beforeSend: function(){},
	        error: function(){},
	        success: retornoAlterar
	    });
	});
});

function retorno(post) {
	/**
	 * Para cada posição dentro de nosso post nós atualizamos no html
	 * correspondente ao ID da posição
	 * Ex: posicao = titulo, post[titulo] = "Meu primeiro post"
	 */
	for(var posicao in post) {
		$("#"+posicao).val(post[posicao]);
    }

    // Atribuio o ID da atual categoria para minha variável global
    categoria_id = post.categoria_id;

    /**
     * Iremos enviar uma requisição para listar todas as categorias.
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
        success: retornoCategoria
    });
}

function retornoCategoria(categorias) {
	// Declaro uma variável onde irei receber todo o HTML do meu forEach
	var categoriaHTML = '';

	// Como eu recebo um Objeto com várias posições eu preciso percorrer esse objeto.
	categorias.forEach(function(categoria, i) {
		/*
		 * Se o id da categoria que estou percorrendo neste momento for igual
		 * ao ID da categoria que eu tenho guardado na variável global então eu marco como selecionado
		 */
		if(categoria.id == categoria_id)
			categoriaHTML += '<option value="'+categoria.id+'" selected>'+categoria.nome+'</option>';
		else
			categoriaHTML += '<option value="'+categoria.id+'">'+categoria.nome+'</option>';
	});

	// Agora eu jogo o meu categoriaHTML dentro de um ID chamado categoria que criei no meu HTML.
	$("#categoria").html(categoriaHTML);
}

function retornoAlterar(resposta) {
	alert(resposta.text);
	setTimeout(function(){ window.location.href = "/" }, 1000);
}