{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Textos do Layout</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos-layout');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<form name="frm_textoslayout" id="frm_textoslayout" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}textoslayout/editar/id/{view}$dados_texto.cod_id{/view}', 'frm_textoslayout', '{view}$URL_DEFAULT{/view}textoslayout', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
				{view}foreach from=$dados_texto item=dados name=dad{/view}
					<fieldset>
						<legend>{view}$dados.WebsiteIdiomas.txt_idioma{/view}</legend>
						<fieldset>
							<legend>Dados do registro</legend>
							<dl>
								<dt>
									<label>Texto</label>
								</dt>
								
								<dd>
									<input type="text" name="txt_texto{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto{view}$smarty.foreach.dad.iteration{/view}" maxlength="255" class="medium" value="{view}$dados.txt_texto{/view}" />
									<span id="msg_txt_texto{view}$smarty.foreach.dad.iteration{/view}"></span>		
									<p>Preenchimento obrigat&oacute;rio.</p>
								</dd>
							</dl>
						</fieldset>
					</fieldset>
					<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.cod_id{/view}" />
				{view}/foreach{/view}
				
				<button type="submit" id="btn_enviar" class="gray" />Enviar</button>
				&nbsp;ou&nbsp;
				<a href="{view}$URL_DEFAULT{/view}textos-layout" />Cancelar</a>
				<input type="hidden" name="id" id="id" value="{view}$dados_texto.cod_id{/view}" />
			</form>
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}