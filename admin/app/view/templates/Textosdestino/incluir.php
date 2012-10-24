{view}include file="{view}$HEAD{/view}"{/view}
<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a class="default-tab" href="#" rel="tooltip" rel="tooltip"
		title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
	<li class="inativo">{view}$textos_layout[42]{/view}</a></li>
</ul>
</nav> </header>
<div class="tab default-tab" id="tab0">
	<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}textosdestino/incluir', 'frm_contatos','{view}$URL_DEFAULT{/view}textosdestino', new Array('{view}$textos_layout[59]{/view}', '{view}$textos_layout[1]{/view}'), 'class_erro', 'btn_enviar')">
		<!--	<form name="frm_contatos" id="frm_contatos" method="post"	action="{view}$URL_DEFAULT{/view}textosdestino/incluir">-->
		<fieldset>
			<legend>Dados cadastrais</legend>
			<dt>
				<label>Destinos</label>
			</dt>
			<dd>
				<select name="cod_hotel" id="cod_hotel" />
				<option value="">--{view}$textos_layout[46]{/view}--</option>
				{view}foreach from=$destinos item=destino {/view}
				<option value="{view}$destino.cod_relacao_idioma{/view}">{view}$destino.txt_destinos{/view}</option>
				{view}/foreach{/view} </select>
				<p>{view}$textos_layout[47]{/view}</p>
				<div id="msg_erro_destino"	class="class_erro"></div>
			</dd>


		</fieldset>
		{view}foreach from=$idiomas item=idioma name=dad{/view}
		<fieldset>
			<legend>
				<strong>{view}$idioma.txt_idioma{/view}</strong>
			</legend>
				<dl>				
					<dt>
						<label>Titulo</label>
					</dt>
					<dd>
						<input type="text"
							name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}"
							id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}"
							class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div
							id="msg_erro_titulo{view}$smarty.foreach.dad.iteration{/view}"
							class="class_erro"></div>
					</dd>



					<dt>
						<label>Ordem</label>
					</dt>
					<dd>
						<input type="text"
							name="cod_ordem{view}$smarty.foreach.dad.iteration{/view}"
							id="cod_ordem{view}$smarty.foreach.dad.iteration{/view}"
							onkeyup="mascara(this,soNumero);" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_ordem{view}$smarty.foreach.dad.iteration{/view}"
							class="class_erro"></div>
					</dd>

					<dt>
						<label>Descrição</label>
					</dt>
					<dd>
						<textarea cols=100 ROWS=2
							name="txt_descricao{view}$smarty.foreach.dad.iteration{/view}"
							id="txt_descricao{view}$smarty.foreach.dad.iteration{/view}"></textarea>
						<p>{view}$textos_layout[47]{/view}</p>
						<div
							id="msg_erro_descricao{view}$smarty.foreach.dad.iteration{/view}"
							class="class_erro"></div>
					</dd>
				</dl>
				<input type="hidden" value="{view}$idioma.cod_id{/view}"
					name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}"
					id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" />

		
		</fieldset>
		{view}/foreach{/view}
		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[59]{/view}
		</button>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}