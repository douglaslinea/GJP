{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}distancias/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
	
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}distancias')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}distancias/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}distancias', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--	<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}distancias/editar">-->
	
	<fieldset>
				<legend>Dados do registro</legend>
				<dt>
					<label>Hotel</label>
				</dt>
				<dd>
					<select name="cod_hotel" id="cod_hotel">
						<option value="">--{view}$textos_layout[46]{/view}--</option>
						{view}foreach from=$hoteis item=hotel{/view}
						<option	value="{view}$hotel.cod_relacao_idioma{/view}"{view}if $dados_distancias.0.cod_hotel == $hotel.cod_relacao_idioma{/view} selected="selected"{view}/if{/view}>
						{view}$hotel.txt_razaoSocial{/view}</option>
						{view}/foreach{/view}
					</select> 
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_hotel" class = "class_erro"></div>
				</dd>
	
	</fieldset>
	
			{view}foreach from=$dados_distancias item=distancias name=con{/view}

	<fieldset>
		<legend>{view}$distancias.txt_idioma{/view}</legend>
			<dl>
			<dt>
				<label>Distâncias</label>
				</dt>
				<dd>
					<textarea cols=100 ROWS=2 name="txt_descricao{view}$smarty.foreach.con.iteration{/view}" id="txt_descricao{view}$smarty.foreach.con.iteration{/view}">{view}$distancias.txt_descricao{/view}</textarea>	
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_distancia{view}$smarty.foreach.con.iteration{/view}" class = "class_erro"></div>
				</dd>	
			</dl>
	
	<input type="hidden" name="cod_id{view}$smarty.foreach.con.iteration{/view}" id="cod_id{view}$smarty.foreach.con.iteration{/view}"	value="{view}$distancias.cod_id{/view}"> 
	</fieldset>
					
		{view}/foreach{/view}

		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}distancias/detalhes/id_relacao_idioma/{view}$distancias.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}
				