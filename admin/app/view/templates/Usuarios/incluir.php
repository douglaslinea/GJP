{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Usu&aacute;rios</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo">Ver Detalhes</li>
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<!--<form name="frm_usuario" id="frm_usuario" action="javascript:inclui('{view}$URL_DEFAULT{/view}usuarios/incluir', 'frm_usuario', '{view}$URL_DEFAULT{/view}usuarios');" method="post">-->
			<form name="frm_usuario" id="frm_usuario" method="post" action="{view}$URL_DEFAULT{/view}usuarios/incluir">
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Controler e Ação</label>
						</dt>
						
						<dd>
							{view}foreach from=$controller_acao item=contr{/view}
								<input type="checkbox" name="controller_acao[]" id="controller_acao" value="{view}$contr.cod_controller{/view}|{view}$contr.cod_acao{/view}">
								{view}$contr.FrameworkControllers.txt_nome_amigavel{/view} {view}$contr.FrameworkAcoes.txt_nome_amigavel{/view}
								<br/>
							{view}/foreach{/view}
							
						</dd>
					</dl>
				</fieldset>

				<button type="submit" id="btn_enviar" class="gray" />Enviar</button>
				&nbsp;ou&nbsp;
				<a href="{view}$URL_DEFAULT{/view}usuarios" />Cancelar</a>
			</form>
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}