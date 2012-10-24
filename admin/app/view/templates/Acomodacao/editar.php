{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acomodacao/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acomodacao/detalhes/cod_id/{view}$hoteis.cod_id{/view}')" href="" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acomodacao')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}acomodacao/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}acomodacao/', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}acomodacao/editar">-->	
	
	<fieldset>
			<legend>Dados do registro</legend>
				<dt>
					<label>Hotel</label>
				</dt>
				<dd>
						<select name="cod_hotel" id="cod_hotel" />
						<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$hoteis item=hotel{/view}
						<option value="{view}$hotel.cod_id{/view}">{view}$hotel.txt_razaoSocial{/view}</option>
						{view}/foreach{/view} </select>
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_hotel" class = "class_erro"></div>
				</dd>
	</fieldset>			
	
	{view}foreach from=$dados_contatos item=acomodacao name=dad{/view}	
<fieldset>
	<legend>{view}$acomodacao.WebsiteIdiomas.txt_idioma{/view}</legend>
			<dl>			
				<dt>
					<label>Acomodação</label>
				</dt>
				<dd>
					<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" value="{view}$acomodacao.txt_titulo{/view}"class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_acomodacao{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>				
				<dt>
					<label>Dimensão</label>
				</dt>
				<dd>
					<input type="text" name="txt_dimensao{view}$smarty.foreach.dad.iteration{/view}" id="txt_dimensao{view}$smarty.foreach.dad.iteration{/view}" value="{view}$acomodacao.txt_dimensao{/view}" class="small" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_dimensao{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>
			
				<dt>
					<label>Capacidade</label>
				</dt>
				<dd>
					<input type="text" name="txt_capacidade{view}$smarty.foreach.dad.iteration{/view}" id="txt_capacidade{view}$smarty.foreach.dad.iteration{/view}" value="{view}$acomodacao.txt_capacidade{/view}" class="small" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_capacidade{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Ordem</label>
				</dt>
				<dd>
					<input type="text" name="txt_ordem{view}$smarty.foreach.dad.iteration{/view}" id="txt_ordem{view}$smarty.foreach.dad.iteration{/view}" value="{view}$acomodacao.txt_ordem{/view}" class="small" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_ordem{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>
			
				
				<dt>
					<label>Descrição</label>
				</dt>
				<dd>
					<textarea cols=100 ROWS=2 name="txt_descricao{view}$smarty.foreach.dad.iteration{/view}" id="txt_descricao{view}$smarty.foreach.dad.iteration{/view}"></textarea>	
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_descricao{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>	
			</dl>
		<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}"	value="{view}$acomodacao.cod_id{/view}"> 
	</fieldset>
	
		{view}/foreach{/view}

		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}acomodacao/detalhes/id_relacao_idioma/{view}$acomdacao.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}
				