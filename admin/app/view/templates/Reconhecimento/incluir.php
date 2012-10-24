{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
<div class="article-container">
	<header>
	<h2>Notícias</h2>
	<nav>
<ul class="tab-switch">
	<li><a class="default-tab" href="#" rel="tooltip" rel="tooltip"	title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
	<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}reconhecimento')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>

	<div class="tab default-tab" id="tab0">
		
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}reconhecimento/incluir', 'frm_contatos','{view}$URL_DEFAULT{/view}reconhecimento/', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}reconhecimento/incluir">-->	
		<fieldset>
			<legend>Dados Gerais</legend>
				<dt>
					<label>Marca</label>
				</dt>
					<dd>
						<select name="cod_marca" id="cod_marca" />
						<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$dados_marca item=marca{/view}
						<option value="{view}$marca.cod_relacao_idioma{/view}">{view}$marca.txt_nomeMarca{/view}</option>
						{view}/foreach{/view} </select>						
					</dd>
				
				<dt>
					<label>Hotel</label>
				</dt>
					<dd>
						<select name="cod_hotel" id="cod_hotel"/>
						<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$dados_hotel item=hotel{/view}
						<option value="{view}$hotel.cod_relacao_idioma{/view}">{view}$hotel.txt_razaoSocial{/view}</option>
						{view}/foreach{/view} </select>					
					</dd>
				
				<dt>
					<label>Ano</label>
				</dt>
					<dd>
						<input type="text" name="txt_ano" id="txt_ano"  onkeyup="mascara(this,soNumero);" MAXLENGTH=4 />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_ano" class="class_erro"></div>
					</dd>
						
				
			</fieldset>

		{view}foreach from=$idiomas item=idioma name=dad{/view}
		<fieldset>
			<legend>
				<strong>{view}$idioma.txt_idioma{/view}</strong>
			</legend>
			<fieldset>
				<legend>Dados cadastrais</legend>
				<dl>
					<dt>
						<label>Titulo</label>
					</dt>
					<dd>
						<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}"  class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_titulo{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
					<dt>
						<label>Reconhecimento</label>
					</dt>
					<dd>
					<textarea cols=100 ROWS=2 name="txt_reconhecimento{view}$smarty.foreach.dad.iteration{/view}" id="txt_reconhecimento{view}$smarty.foreach.dad.iteration{/view}"></textarea>
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_reconhecimento{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>									
					</dd>
					<input type="hidden" value="{view}$idioma.cod_id{/view}" name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}"	id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" />
			
				</dl>
				</fieldset>
				</fieldset>
				{view}/foreach{/view}
				
		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}reconhecimento/" />Voltar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}	