function excluir(id) {
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
        url: '/app/action/excluir.php',
        data: {
        	'acao': 'excluirPost',
        	'id': id
        },
        dataType: 'json',
        beforeSend: function(){},
        error: function(){},
        success: function(resposta) {
        	alert(resposta.text);
        	setTimeout(function(){ location.reload(); }, 3000);
        } 
	});
}