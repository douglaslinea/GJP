{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Textos</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo">Ver Detalhes</li>
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<form name="frm_textos" id="frm_textos" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}textos/editar', 'frm_textos', '{view}$URL_DEFAULT{/view}textos', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
				{view}foreach from=$dados_texto item=dados name=dad{/view}
					<fieldset>
						<legend>{view}$dados.WebsiteIdiomas.txt_idioma{/view}</legend>
						<fieldset>
							<legend>Dados do registro</legend>
							<dl>
								<dt>
									<label>T&iacute;tulo</label>
								</dt>
								
								<dd>
									<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.txt_titulo{/view}" class="small" />
									<span id="msg_txt_titulo{view}$smarty.foreach.dad.iteration{/view}"></span>
									<p>Preenchimento obrigat&oacute;rio.</p>
								</dd>
			
								<dt>
									<label>Texto</label>
								</dt>
								<dd>
									<textarea name="txt_texto{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto{view}$smarty.foreach.dad.iteration{/view}" class="wysiwyg large">{view}$dados.txt_texto{/view}</textarea>
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
				<a href="{view}$URL_DEFAULT{/view}textos" />Cancelar</a>
			</form>
{view}include file="{view}$FOOTER{/view}"{/view}