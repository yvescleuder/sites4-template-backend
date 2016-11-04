/* Quando o documento inteiro for lido, essa função será executada */
$(document).ready(function($) {

	$("#btn_criar_post").click(function(event){
		event.preventDefault();

		/*	Pega todos os campos tem foram enviados pelo formulário que tem o name,
			caso não tenha o name não será enviado.
		*/
		var dados_formulario = $("#form_criar_post").serialize();
		var link_acao = $("#form_criar_post").attr("action");
		var metodo = $("#form_criar_post").attr("method");

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
	        success: retorno
	    });
	});
});

function retorno(resposta)
{
	if(resposta.success)
		$("#form_criar_post").trigger("reset");
	alert(resposta.text);
}