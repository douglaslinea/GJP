{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
<div class="article-container">
	<header>
	<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
	<nav>
	<ul class="tab-switch">
		<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocialnoticias/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
		</li>
		<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
		<li class="inativo">{view}$textos_layout[60]{/view}</a></li>
	</ul>
	</nav> </header>
	<div class="tab default-tab" id="tab0">
		{view}if $dados_acao !== false{/view} {view}if isset($params.mensagem_confirmacao){/view}
		<div class="notification success"><a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
			<p>{view}$params.mensagem_confirmacao{/view}</p>
		</div>
		{view}/if{/view}

		<table class="datatable" id="first-desc">
			<thead>
				<tr>
					<th width="20%">Idioma</th>
					<th width="20%">Data</th>
					<th width="30%">Titulo</th>
					<th width="10%">Publicado</th>
					<th width="10%">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{view}foreach from=$dados_acao item=acao{/view}
				<tr>
					<td><strong>{view}$acao.WebsiteIdiomas.txt_idioma{/view}</strong></td>
					<td>{view}$Helper->FormataData($acao.dat_data,'br'){/view}</td>
					<td>{view}$acao.txt_titulo{/view}</td>
					<td>{view}if $acao.cod_publicado == 1{/view} Sim {view}else{/view} N&atilde;o {view}/if{/view}</td>
					<td>
						<ul class="actions">
							<li><a class="view"	href="{view}$URL_DEFAULT{/view}acaosocialnoticias/detalhes/id_relacao_idioma/{view}$acao.cod_relacao_idioma{/view}"	rel="tooltip" original-title="Ver detalhes">ver</a></li>
							<li><a class="edit" href="{view}$URL_DEFAULT{/view}acaosocialnoticias/editar/id_relacao_idioma/{view}$acao.cod_relacao_idioma{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">edit</a>
							</li>
							<li><a class="delete" onclick="javascript:exclusaoMultipla('{view}$URL_DEFAULT{/view}acaosocialnoticias/excluir/id_relacao_idioma/{view}$acao.cod_relacao_idioma{/view}', '{view}$URL_DEFAULT{/view}acaosocialnoticias', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="{view}$textos_layout[48]{/view}">delete</a>
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