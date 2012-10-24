{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
	<div class="article-container">
		<header>
		<h2>Notícia</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="Ver detalhes">Ver detalhes</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/editar/id/{view}$dados.cod_usuario{/view}');" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<form name="frm_permissoes" id="frm_permissoes" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}permissoes/editar', 'frm_permissoes', '{view}$URL_DEFAULT{/view}permissoes', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')" >
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Controler e Ação</label>
						</dt>
						
						<dd>
							{view}foreach from=$controller_acao item=contr{/view}
								<b>Controller:</b> {view}$contr.PermissaoGeral.FrameworkControllers.txt_nome_amigavel{/view} <b>Ação:</b> {view}$contr.PermissaoGeral.FrameworkAcoes.txt_nome_amigavel{/view}
								<br/>
							{view}/foreach{/view}
						</dd>
						
						<dt>
							<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes');" />{view}$textos_layout[52]{/view}</button>
							<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias/editar/id/{view}$dados.cod_usuario{/view}');" />{view}$textos_layout[42]{/view}</button>
						</dt>
					</dl>
				</fieldset>
			</form>
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}