{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Usu&aacute;rios</h2>
		
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo">Ver Detalhes</li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			{view}if !is_null($dados_usuario){/view}
				{view}if isset($params.mensagem_confirmacao){/view}
					<div class="notification success">
						<a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
						<p>{view}$params.mensagem_confirmacao{/view}</p>
					</div>
				{view}/if{/view}
				
				<table class="datatable">
					<thead>
						<tr>
							<th width="20%">Nome</th>
							<th width="20%">E-mail</th>
							<th width="20%">Login</th>
							<th width="10%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
						{view}foreach from=$dados_usuario item=usuario{/view}
						<tr>
							<td width="20%">{view}$usuario.txt_nome{/view}</td>
							<td width="20%">{view}$usuario.txt_email{/view}</td>
							<td width="20%">{view}$usuario.txt_login{/view}</td>
							<td width="10%">
								<ul class="actions">
									<li><a class="edit" href="{view}$URL_DEFAULT{/view}usuarios/editar/id/{view}$usuario.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">editar</a></li>
									<li><a class="delete" onclick="javascript:exclusao('{view}$URL_DEFAULT{/view}usuarios/excluir/id/{view}$usuario.cod_id{/view}', '{view}$URL_DEFAULT{/view}usuarios', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="Excluir registro">excluir</a></li>
								</ul>
							</td>
						</tr>
						{view}/foreach{/view}
					</tbody>
				</table>
							
				{view}else{/view}
				<div class="notification error">
					<p>
						<strong>Registro n&atilde;o encontrado.</strong>
					</p>
				</div>
				{view}/if{/view}
			</div>
	{view}include file="{view}$FOOTER{/view}"{/view}