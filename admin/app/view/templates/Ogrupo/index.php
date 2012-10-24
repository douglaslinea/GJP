{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
<div class="article-container">
	<header>
	<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
	<nav>
	<ul class="tab-switch">
		<li><a
			onclick="document.location.replace('{view}$URL_DEFAULT{/view}ogrupo/incluir')"
			href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
		
		<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
		<li class="inativo">{view}$textos_layout[60]{/view}</a></li>
	</ul>
	</ul>
	</nav> </header>

<div class="tab default-tab" id="tab0">
	{view}if $dados_grupo !== false{/view} {view}if	isset($params.mensagem_confirmacao){/view}
	<div class="notification success">
		<a href="#" class="close-notification" 	title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
		<p>{view}$params.mensagem_confirmacao{/view}</p>
	</div>
	{view}/if{/view}

		<table class="datatable" id="first-desc">
			<thead>
				<tr>
					<th width="30%">Grupo</th>
					<th width="20%">Telefone</th>
					<th width="40%">Link</th>
					<th width="10%">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{view}foreach from=$dados_grupo item=grupo{/view}
				<tr>
					<td><strong>{view}$grupo.txt_nomeMarca{/view}</strong></td>
					<td>{view}$grupo.txt_tel_vendas{/view}</td>
					<td>{view}$grupo.txt_link{/view}</td>
					<td>
						<ul class="actions">
							<li><a class="view"	href="{view}$URL_DEFAULT{/view}ogrupo/detalhes/id_relacao_idioma/{view}$grupo.cod_relacao_idioma{/view}"
								rel="tooltip" original-title="Ver detalhes">ver</a></li>
							<li><a class="edit"	href="{view}$URL_DEFAULT{/view}ogrupo/editar/id_relacao_idioma/{view}$grupo.cod_relacao_idioma{/view}"
								rel="tooltip" original-title="{view}$textos_layout[42]{/view}">edit</a>
							</li>
							<li><a class="delete" onclick="javascript:exclusaoMultipla('{view}$URL_DEFAULT{/view}ogrupo/excluir/id_relacao_idioma/{view}$grupo.cod_relacao_idioma{/view}', '{view}$URL_DEFAULT{/view}contatos', '{view}$textos_layout[9]{/view}')"
								rel="tooltip" original-title="{view}$textos_layout[48]{/view}">delete</a>
							</li>
						</ul>
					</td>
				</tr>
				{view}/foreach{/view}
			</tbody>
		</table>
		{view}/if{/view}
	</div>

	{view}include file="{view}$FOOTER{/view}"{/view}