{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}infraestrutura/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}infraestrutura')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}infraestrutura/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}infraestrutura', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--	<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}infraestrutura/editar">-->
	
	<fieldset>
				<legend>Dados do registro</legend>
				<dt>
					<label>Hotel</label>
				</dt>
				<dd>
					<select name="cod_hotel" id="cod_hotel">
						<option value="">--{view}$textos_layout[46]{/view}--</option>
						{view}foreach from=$hoteis item=hotel{/view}
						<option	value="{view}$hotel.cod_relacao_idioma{/view}"{view}if $dados_infra.0.cod_hotel == $hotel.cod_relacao_idioma{/view} selected="selected"{view}/if{/view}>
						{view}$hotel.txt_razaoSocial{/view}</option>
						{view}/foreach{/view}
					</select> 
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_hotel" class = "class_erro"></div>
				</dd>
	
	</fieldset>
	
			{view}foreach from=$dados_infra item=infra name=con{/view}

	<fieldset>
		<legend>{view}$infra.txt_idioma{/view}</legend>
			<dl>
			<dt>
				<label>Facilidade</label>
				</dt>
				<dd>
					<textarea cols=100 ROWS=2 name="txt_facilidades{view}$smarty.foreach.con.iteration{/view}" id="txt_facilidades{view}$smarty.foreach.con.iteration{/view}">{view}$infra.txt_facilidades{/view}</textarea>	
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_facilidades{view}$smarty.foreach.con.iteration{/view}" class = "class_erro"></div>
				</dd>	
			</dl>
	
	<input type="hidden" name="cod_id{view}$smarty.foreach.con.iteration{/view}" id="cod_id{view}$smarty.foreach.con.iteration{/view}"	value="{view}$infra.cod_id{/view}"> 
	</fieldset>
					
		{view}/foreach{/view}

		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}infraestrutura/detalhes/id_relacao_idioma/{view}$infra.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}
				