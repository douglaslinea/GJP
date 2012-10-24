{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
<div class="article-container">
	<header>
	<h2>Notícias</h2>
	<nav>
	<ul class="tab-switch">
		<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}reconhecimento/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
		</li>
		<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
		</li>
		<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}reconhecimento')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a>
		</li>
	</ul>
	</nav> </header>


	<div class="tab default-tab" id="tab0">
		
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}reconhecimento/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}reconhecimento/', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}reconhecimento/editar">-->	
		<fieldset>
			<legend>Dados Gerais</legend>
				<dt>
					<label>Marca</label>
				</dt>
				<dd>
						<select name="cod_marca" id="cod_marca" />
						<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$dados_marca item=marca{/view}
						<option value="{view}$marca.cod_relacao_idioma{/view}"{view}if $dados_reconhecimento.0.cod_marca == $marca.cod_relacao_idioma{/view} selected="selected" {view}/if{/view}>{view}$marca.txt_nomeMarca{/view}</option>
						{view}/foreach{/view} </select>

				</dd>
				
				<dt>
					<label>Hotel</label>
				</dt>
				<dd>
						<select name="cod_hotel" id="cod_hotel"/>
						<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$dados_hotel item=hotel{/view}
						<option value="{view}$hotel.cod_relacao_idioma{/view}"{view}if $dados_reconhecimento.0.cod_hotel == $hotel.cod_relacao_idioma{/view} selected="selected" {view}/if{/view}>{view}$hotel.txt_razaoSocial{/view}</option>
						{view}/foreach{/view} </select>
				</dd>
				
					<dt>
						<label>Ano</label>
					</dt>
					<dd>
						<input type="text" name="txt_ano" id="txt_ano" value="{view}$dados_reconhecimento.0.txt_ano{/view}"  onkeyup="mascara(this,soNumero);" MAXLENGTH=4 />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_ano" class="class_erro"></div>
					</dd>
					
				
			</fieldset>

		{view}foreach from=$dados_reconhecimento item=reconhecimento name=dad{/view}
		<fieldset>
			<legend>{view}$reconhecimento.txt_idioma{/view}</legend>
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Titulo</label>
					</dt>
					<dd>
						<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" value="{view}$reconhecimento.txt_titulo{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_titulo{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
					
					
					<dt>
						<label>Reconhecimento</label>
					</dt>
					<dd>
					<textarea cols=100 ROWS=2 name="txt_reconhecimento{view}$smarty.foreach.dad.iteration{/view}" id="txt_reconhecimento{view}$smarty.foreach.dad.iteration{/view}">{view}$reconhecimento.txt_reconhecimento{/view}</textarea>
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_reconhecimento{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>									
					</dd>
				
				</dl>
				</fieldset>
				</fieldset>
					<input type="hidden" value="{view}$reconhecimento.cod_id{/view}"     name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}" >
					<input type="hidden" value="{view}$reconhecimento.cod_idioma{/view}" name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}"	id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" />
				{view}/foreach{/view}
				
		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}reconhecimento/detalhes/id_relacao_idioma/{view}$reconhecimento.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}	