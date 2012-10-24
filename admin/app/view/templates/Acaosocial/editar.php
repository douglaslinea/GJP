{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocial/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
		<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocial')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}acaosocial/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}acaosocial/', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}acaosocial/editar">		-->
	{view}foreach from=$dados_acao item=acao name=dad{/view}	
<fieldset>
	<legend>{view}$acao.WebsiteIdiomas.txt_idioma{/view}</legend>
			<dl>			
				<dt>
					<label>Titulo</label>
				</dt>
				<dd>
					<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" value="{view}$acao.txt_titulo{/view}"class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_titulo{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>				
				<dt>
				
				<dt>
					<label>Histórico</label>
				</dt>
				<dd>
					<textarea cols=100 ROWS=2 name="txt_historico{view}$smarty.foreach.dad.iteration{/view}" id="txt_historico{view}$smarty.foreach.dad.iteration{/view}"></textarea>	
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_descricao{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>	
			</dl>
		<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}"	value="{view}$acao.cod_id{/view}"> 
	</fieldset>
	
		{view}/foreach{/view}

		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}acaosocial/detalhes/id_relacao_idioma/{view}$acao.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}
				