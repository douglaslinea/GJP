{view}include file="{view}$HEAD{/view}"{/view}

		<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}idiomas');" href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}idiomas/incluir');" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<form name="frm_idioma" id="frm_idioma" action="javascript:acao('{view}$URL_DEFAULT{/view}idiomas/editar', 'frm_idioma', '{view}$URL_DEFAULT{/view}idiomas', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')" method="post">
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Idioma</label>
						</dt>
						<dd>
							<input type="text" name="txt_idioma" id="txt_idioma" value="{view}$dados_idioma.txt_idioma{/view}" class="medium" maxlength="255" />
							<span id="msg_txt_idioma"></span>
							<p>{view}$textos_layout[47]{/view}</p>
						</dd>
						
						<dt>
							<label>Meta tag</label>
						</dt>
						<dd>
							<input type="text" name="txt_meta" id="txt_meta" value="{view}$dados_idioma.txt_meta{/view}" class="medium" maxlength="10" />
							<span id="msg_txt_meta"></span>
							<p>{view}$textos_layout[47]{/view}</p>
						</dd>
	
					</dl>
				</fieldset>
	
				<input type="hidden" name="cod_id" id="cod_id" value="{view}$dados_idioma.cod_id{/view}" />
	
				<button type="submit" id="btn_enviar" class="gray" />{view}$textos_layout[50]{/view}</button>
				&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}idiomas" />Cancelar</a>
			</form>

		</div>

{view}include file="{view}$FOOTER{/view}"{/view}