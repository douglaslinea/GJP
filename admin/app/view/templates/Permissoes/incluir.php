{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Permissões</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo">Ver Detalhes</li>
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<form name="frm_permissoes" id="frm_permissoes" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}permissoes/incluir', 'frm_permissoes', '{view}$URL_DEFAULT{/view}permissoes', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')" >
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Controler e Ação</label>
						</dt>
						
						<dd>
							{view}foreach from=$controller_acao item=contr{/view}
								<input type="checkbox" name="controller_acao[]" id="controller_acao" value="{view}$contr.cod_id{/view}" />
								<b>Controller:</b> {view}$contr.FrameworkControllers.txt_nome_amigavel{/view} <b>Ação:</b> {view}$contr.FrameworkAcoes.txt_nome_amigavel{/view}
								<br/>
							{view}/foreach{/view}
							
						</dd>
						
						<dt>
							<label>Nome do perfil</label>
						</dt>
						
						<dd>
							<input type="text" name="txt_perfil" id="txt_perfil" />
							<span id="msg_txt_perfil"></span>
						</dd>
					</dl>
				</fieldset>

				<button type="submit" id="btn_enviar" class="gray" />Enviar</button>
				&nbsp;ou&nbsp;
				<a href="{view}$URL_DEFAULT{/view}permissoes" />Cancelar</a>
			</form>
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}