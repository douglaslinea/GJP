{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a
		onclick="document.location.replace('{view}$URL_DEFAULT{/view}lazer/incluir')"
		href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a class="default-tab" rel="tooltip" href="#"
		title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a
		onclick="document.location.replace('{view}$URL_DEFAULT{/view}lazer')"
		href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a>
	</li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
	<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}lazer/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}lazer', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--	<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}lazer/editar">-->
	<fieldset>
				<legend>Dados do registro</legend>
				<dt>
					<label>Hotel</label>
				</dt>
				<dd>
					<select name="cod_hotel" id="cod_hotel">
						<option value="">--{view}$textos_layout[46]{/view}--</option>
						{view}foreach from=$hoteis item=hotel{/view}
						<option	value="{view}$hotel.cod_relacao_idioma{/view}|{view}$hotel.cod_marca{/view}">{view}$hotel.txt_razaoSocial{/view}</option>
						{view}/foreach{/view}
					</select> 
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_hotel" class = "class_erro"></div>
				</dd>
	
	</fieldset>
				
		{view}foreach from=$dados_lazer item=lazer name=con{/view}
		<fieldset>
			<legend>{view}$lazer.txt_idioma{/view}</legend>
			
				<dl>
					<dt>
						<label>Titulo</label>
					</dt>
					<dd>
						<strong><input type="text"
							name="txt_titulo{view}$smarty.foreach.con.iteration{/view}"
							id="txt_titulo{view}$smarty.foreach.con.iteration{/view}"
							value="{view}$lazer.txt_titulo{/view}" class="medium" /> </strong>
						<p>{view}$textos_layout[47]{/view}</p>
						<div
							id="msg_erro_titulo{view}$smarty.foreach.con.iteration{/view}"
							class="class_erro"></div>
					</dd>

					<dt>
						<label>Ordem</label>
					</dt>
					<dd>
						<input type="text"
							name="cod_ordem{view}$smarty.foreach.con.iteration{/view}"
							id="cod_ordem{view}$smarty.foreach.con.iteration{/view}"onkeyup="mascara(this,soNumero);"
							value="{view}$lazer.cod_ordem{/view}" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_ordem{view}$smarty.foreach.con.iteration{/view}"
							class="class_erro"></div>
					</dd>


					<dt>
						<label>Descrição</label>
					</dt>
					<dd>
						<textarea cols=100 ROWS=2
							name="txt_descricao{view}$smarty.foreach.con.iteration{/view}"
							id="txt_descricao{view}$smarty.foreach.con.iteration{/view}"></textarea>
						<p>{view}$textos_layout[47]{/view}</p>
						<div
							id="msg_erro_descricao{view}$smarty.foreach.con.iteration{/view}"
							class="class_erro"></div>
					</dd>
				</dl>
			</fieldset>
					<input type="hidden" name="cod_id{view}$smarty.foreach.con.iteration{/view}"id="cod_id{view}$smarty.foreach.con.iteration{/view}" value="{view}$lazer.cod_id{/view}"> 
					<input type="hidden" name="cod_id_categoria{view}$smarty.foreach.fin1.iteration{/view}"	id="cod_id_categoria{view}$smarty.foreach.fin1.iteration{/view}"
				value="{view}$lazer1.cod_id{/view}">
				
	{view}/foreach{/view}

		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a
			href="{view}$URL_DEFAULT{/view}lazer/detalhes/id_relacao_idioma/{view}$lazer.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}