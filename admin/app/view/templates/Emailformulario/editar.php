{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Editar E-mail</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<!-- <li class="inativo">Ver Detalhes</li> -->
					<li><a class="default-tab" href="#" rel="tooltip" title="Editar registro">Editar registro</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<form name="frm_email" id="frm_email" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}emailformulario/editar', 'frm_email', '{view}$URL_DEFAULT{/view}emailformulario', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
			<!--<form name="frm_email" id="frm_email" method="post" action="{view}$URL_DEFAULT{/view}emailformulario/editar">-->
				
					<fieldset>
							<legend>Dados do E-mail</legend>
							<dl>
								<dt>
									<label>E-mail</label>
								</dt>
								
								<dd>
									<input type="text" name="txt_email" id="txt_email" value="{view}$dados_emailformulario.txt_email{/view}" class="small" />
									<span id="msg_txt_email"></span>
									<p>Preenchimento obrigat&oacute;rio.</p>
								</dd>
			
								<dt>
									<label>Nome do Formulário</label>
								</dt>
								<dd>
									<input type="text" name="txt_formulario" id="txt_formulario" value="{view}$dados_emailformulario.txt_formulario{/view}" class="small" />
									<span id="txt_formulario"></span>
									
								</dd>
							</dl>
					</fieldset>
					
					<input type="hidden" name="cod_id" id="cod_id" value="{view}$dados_emailformulario.cod_id{/view}" />
				
				<button type="submit" id="btn_enviar" class="blue" />Enviar</button>
				&nbsp;ou&nbsp;
				<a href="{view}$URL_DEFAULT{/view}emailformulario" />Cancelar</a>
			</form>
{view}include file="{view}$FOOTER{/view}"{/view}