{view}include file="{view}$HEAD{/view}"{/view}

<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Usuário</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios');"href="" rel="tooltip" title="Listar">Listar</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			 <form name="frm_usuario" id="frm_usuario" method="post" action="javascript:acaoo('{view}$URL_DEFAULT{/view}usuarios/editar', 'frm_usuario', '{view}$URL_DEFAULT{/view}usuarios', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
			<!--<form name="frm_usuario" id="frm_usuario" method="post" action="{view}$URL_DEFAULT{/view}usuarios/editar"> -->
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Nome</label>
						</dt>
						<dd>
							<input type="text" name="txt_nome" id="txt_nome" value="{view}$dados_usuario.txt_nome{/view}" class="medium" maxlength="60" />
							<span id="msg_txt_nome"></span>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
						
						<dt>
							<label>E-mail</label>
						</dt>
						<dd>
							<input type="text" name="txt_email" id="txt_email" value="{view}$dados_usuario.txt_email{/view}" class="medium" maxlength="255" />
							<span id="msg_txt_email"></span>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
						
						<dt>
							<label>Login</label>
						</dt>
						<dd>
							<input type="text" name="txt_login" id="txt_login" value="{view}$dados_usuario.txt_login{/view}" class="medium" maxlength="20" />
							<span id="msg_txt_login"></span>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
						
						<dt>
							<label>Status</label>
						</dt>
						<dd>
							<select name="cod_status" id="cod_status">
								<option value="">{view}$textos_layout[46]{/view}</option>
								{view}foreach from=$array_status item=status{/view}
									<option value="{view}$status.cod_id{/view}" {view}if $dados_usuario.cod_status == $status.cod_id{/view} selected="selected"{view}/if{/view}">{view}$status.txt_descricao{/view}</option>
								{view}/foreach{/view}
							</select>
							<span id="msg_txt_status"></span>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
						
						<dt>
							<label>Alterar a senha?</label>
						</dt>
						<dd>
							<input type="checkbox" name="check_senha" id="check_senha" value="S" onclick="checkSenha()" />
						</dd>
						
						<dt>
							<label>Senha</label>
						</dt>
						<dd>
							<input type="password" name="txt_senha" id="txt_senha" class="medium" maxlength="255"  disabled="disabled" />
							<span id="msg_txt_senha"></span>
							<p>Preenchimento obrigat&oacute;rio (se checkbox marcado).</p>
						</dd>
						
						<dt>
							<label>Confirmar a senha</label>
						</dt>
						<dd>
							<input type="password" name="txt_confirma_senha" id="txt_confirma_senha" class="medium" maxlength="255" disabled="disabled" />
							<span id="msg_txt_confirma_senha"></span>
							<p>Preenchimento obrigat&oacute;rio (se checkbox marcado).</p>
						</dd>
					</dl>
				</fieldset>
	
				<button type="submit" id="btn_enviar" class="gray" />Enviar</button>
				&nbsp;ou&nbsp;
				<a href="{view}$URL_DEFAULT{/view}usuarios" />Cancelar</a>
				<input type="hidden" name="cod_id" id="cod_id" value="{view}$dados_usuario.cod_id{/view}" />
			</form>
		</div>
		
		<script type="text/javascript">
		
		function checkSenha()
		{
			if($('input[name=check_senha]').attr('checked') == true)
			{
				$("#txt_senha").removeAttr('disabled');
				$("#txt_confirma_senha").removeAttr('disabled');
			}
			else
			{
				$("#txt_senha").attr('disabled','disabled');
				$("#txt_confirma_senha").attr('disabled','disabled');

				$("#txt_senha").val('');
				$("#txt_confirma_senha").val('');
			}
		}

		function acaoo(url, form, url_final, mensagem_botao, id_botao)
		{
			$('#'+id_botao).attr("disabled", true); //desabilita o submit
			$('#'+id_botao).text(mensagem_botao[1]); //muda o valor do botão
			
			//seta a url e os parâmetros a serem usamos pelo PHP    
			var pars = "/rnd/" + Math.random()*4;
			
			//Requisição Ajax
		    jQuery.ajax(
		    {
		       url: url+pars, //URL de destino
		       contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		       data: jQuery('#'+form).serialize(),
		       type: 'post',
		       dataType: "json", //Tipo de Retorno
		       success: function(json)
		       {
		    	   //libera o botão e manda o valor original
		           $('#'+id_botao).attr("disabled", false);
		           $('#'+id_botao).text(mensagem_botao[0]);
		           
		           //limpa o span com os erros
		    	   limpaSpan('invalid-side-note');

		           //Se ocorrer tudo certo
		           if(json[0]=="1")
		           {
		               document.location = url_final;
		           }
		           else
		           {
		        	   //Percorre os erros    
			           for(var msg_erro in json)
			           {
			        	   erro = $('#'+json[msg_erro]['id_element']);
			        	   erro.addClass('invalid-side-note');
			        	   erro.html(json[msg_erro]['mensagem']);
				       }
				   }
				}
		    });
		}
				
		
		</script>
{view}include file="{view}$FOOTER{/view}"{/view}