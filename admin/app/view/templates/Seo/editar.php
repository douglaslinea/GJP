{view}include file="{view}$HEAD{/view}"{/view}

		<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo');" href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a></li>
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo/incluir');" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo/editar/id/{view}$dados_seo.cod_id{/view}');" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<form name="frm_seo" id="frm_seo" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}seo/editar', 'frm_seo', '{view}$URL_DEFAULT{/view}seo', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>						
						<dt>
							<label>Caminho da p&aacute;gina</label>
						</dt>
						<dd>
							<input type="text" name="url_caminho" id="url_caminho" maxlength="255" value="{view}$dados_seo.url_caminho{/view}" />
							<span id="msg_url_caminho"></span>
							<p>Parte da URL da p&aacute;gina, exclu&iacute;do o dom&iacute;nio principal. Ex.: se sua p&aacute;gina for "http://www.google.com/sua-pagina", o caminho é "sua-pagina".</p>
							<p>{view}$textos_layout[47]{/view}</p>
						</dd>
					</dl>	
                    <dl>
						<dt>
							<label>T&iacute;tulo da p&aacute;gina</label>
						</dt>
						<dd>
							<input type="text" name="txt_title" id="txt_title" maxlength="255" value="{view}$dados_seo.txt_title{/view}" />
							<span id="msg_txt_title"></span>
                        	<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
							<p>{view}$textos_layout[47]{/view}</p>
						</dd>
					</dl>	
                    <dl>
						<dt>
							<label>Palavras-chave da p&aacute;gina</label>
						</dt>
						<dd>
							<textarea name="txt_keywords" id="txt_keywords" class="medium">{view}$dados_seo.txt_keywords{/view}</textarea>
                        	<span id="msg_txt_keywords"></span>
                        	<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os termos devem ser separados por v&iacute;rgulas.</p>
							<p>{view}$textos_layout[47]{/view}</p>
						</dd>
					</dl>	
                    <dl>
						<dt>
							<label>Descri&ccedil;&atilde;o da p&aacute;gina</label>
						</dt>
						<dd>							
							<textarea name="txt_description" id="txt_description" class="medium">{view}$dados_seo.txt_description{/view}</textarea>
                        	<span id="msg_txt_description"></span>
                        	<p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
                        	<p>{view}$textos_layout[47]{/view}</p>
						</dd>
					</dl>
				</fieldset>
				
				<button type="submit" id="btn_enviar" class="gray" />{view}$textos_layout[50]{/view}</button>
				&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}seo" />Cancelar</a>
				<input type="hidden" name="cod_id" id="cod_id" value="{view}$dados_seo.cod_id{/view}" />
			</form>

{view}include file="{view}$FOOTER{/view}"{/view}