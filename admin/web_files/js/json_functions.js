function login(url, form, url_final, mensagem_botao, id_botao) {
	// desabilita o submit
	$('#' + id_botao).attr("disabled", true);
	$('#' + id_botao).text(mensagem_botao[1]);

	// seta a url e os parâmetros a serem usamos pelo PHP
	var pars = "/rnd/" + Math.random() * 4;

	// Requisição Ajax
	$.ajax({
		url : url + pars, // URL de destino
		contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
		data : $('#' + form).serialize(),
		type : 'post',
		dataType : "json", // Tipo de Retorno
		success : function(json) {
			// libera o botão e manda o valor original
			$('#' + id_botao).attr("disabled", false);
			$('#' + id_botao).text(mensagem_botao[0]);

			// Se ocorrer tudo certo
			if (json[0] == "1") {
				document.location = url_final;
			} else {
				// limpa o span com os erros
				limpaSpan('msg_erro');

				// Percorre os erros
				for ( var msg_erro in json) {
					erro = $('#' + json[msg_erro]['id_element']);
					erro.addClass('msg_erro');
					erro.html(json[msg_erro]['mensagem']);
				}
			}
		}
	});
}

function acao(url, form, url_final, mensagem_botao, id_botao) {
	$('#' + id_botao).attr("disabled", true); // desabilita o submit
	$('#' + id_botao).text(mensagem_botao[1]); // muda o valor do botão

	// seta a url e os parâmetros a serem usamos pelo PHP
	var pars = "/rnd/" + Math.random() * 4;

	// Requisição Ajax
	jQuery.ajax({
		url : url + pars, // URL de destino
		contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
		data : jQuery('#' + form).serialize(),
		type : 'post',
		dataType : "json", // Tipo de Retorno
		success : function(json) {
			// libera o botão e manda o valor original
			$('#' + id_botao).attr("disabled", false);
			$('#' + id_botao).text(mensagem_botao[0]);

			// limpa o span com os erros
			limpaSpan('invalid-side-note');

			// Se ocorrer tudo certo
			if (json[0] == "1") {
				document.location = url_final;
			} else {
				// Percorre os erros
				for ( var msg_erro in json) {
					erro = $('#' + json[msg_erro]['id_element']);
					erro.addClass('invalid-side-note');
					erro.html(json[msg_erro]['mensagem']);
				}
			}
		}
	});
}

function limpaSpan(classe) {
	todos_elementos = $('span').get();

	for ( var i = 0; i < todos_elementos.length; i++) {
		var el = todos_elementos[i];

		if (el.className == classe) {
			span = $('#' + el.id);
			span.removeClass('invalid-side-note');
			span.html('');
		}
	}
}

function acao2(url, form, url_final, mensagem_botao, div_class, id_botao) {
	// desabilita o submit
	$('#' + id_botao).attr("disabled", true);
	$('#' + id_botao).text(mensagem_botao[1]);

	// seta a url e os parâmetros a serem usamos pelo PHP
	var pars = "/rnd/" + Math.random() * 4;

	// Requisição Ajax
	$.ajax({
		url : url + pars, // URL de destino
		contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
		data : $('#' + form).serialize(),
		type : 'post',
		dataType : "json", // Tipo de Retorno
		success : function(json) {
			// libera o botão e manda o valor original
			$('#' + id_botao).attr("disabled", false);
			$('#' + id_botao).text(mensagem_botao[0]);

			// Se ocorrer tudo certo
			if (json[0] == "1") {
				document.location = url_final;
			} else {
				// Limpa as divs
				LimpaDiv(div_class);

				// Percorre os erros
				for ( var msg_erro in json) {
					erro = $('#' + json[msg_erro]['id_element']);
					erro.addClass(div_class);
					erro.html(json[msg_erro]['mensagem']);
				}
			}
		}
	});
}

/**
 * Limpa as divs
 */
function LimpaDiv(classe) {
	todos_elementos = $('div').get();

	for ( var i = 0; i < todos_elementos.length; i++) {
		var el = todos_elementos[i];

		if (el.className == classe) {
			div = $('#' + el.id);
			div.html('');
		}
	}
}

function exclusao(url, url_direcionamento, msg_pegunta) {
	if (confirm(msg_pegunta)) {
		// seta a url e os parâmetros a serem usamos pelo PHP
		var pars = "/rnd/" + Math.random() * 4;

		// Requisição Ajax
		jQuery.ajax({
			url : url + pars, // URL de destino
			contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
			type : 'post',
			dataType : "json", // Tipo de Retorno
			success : function(json) {
				// Verifica a resposta do JSON
				if (json[0] == "1") {
					document.location = url_direcionamento;
				}
			}
		});
	}
}

function exclusaoMultipla(url, url_direcionamento, msg_pegunta) {
	if (confirm(msg_pegunta)) {
		// seta a url e os parâmetros a serem usamos pelo PHP
		var pars = "/rnd/" + Math.random() * 4;

		
		// Requisição Ajax
		jQuery.ajax({
			url : url + pars, // URL de destino
			contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
			type : 'post',
			dataType : "json", // Tipo de Retorno
			success : function(json) {
				// Verifica a resposta do JSON
				if (json[0] == "1") {
					document.location = url_direcionamento;
				}
			}
		});
	}
}
