{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
<div class="article-container">
	<header>
	<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
	<nav>
	<ul class="tab-switch">
		<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}reconhecimento/incluir')"href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
		<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
		<li class="inativo">{view}$textos_layout[60]{/view}</a></li>
	</ul>
	</nav> </header>
	<div class="tab default-tab" id="tab0">
	{view}if $dados_reconhecimento !== false{/view} {view}if	isset($params.mensagem_confirmacao){/view}
	<div class="notification success">
		<a href="#" class="close-notification" 	title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
		<p>{view}$params.mensagem_confirmacao{/view}</p>
	</div>
	{view}/if{/view}
		<table class="datatable">
			<thead>
				<tr>
					
				<th width="20%">Prêmio</th>
				<th width="20%">Reconhecimento</th>
				<th width="10%">Ano</th>
				<th width="20%">Marca</th>
				<th width="20%">Hotel</th>
				<th width="10%">&nbsp;</th>
			
				</tr>
			</thead>

			<tbody>
				{view}foreach from=$dados_reconhecimento item=dados{/view}
				<tr>
					<td><strong>{view}$dados.0.txt_titulo{/view}</strong></td>
					<td>{view}$dados.0.txt_reconhecimento{/view}</td>
					<td>{view}$dados.0.txt_ano{/view}</td>
					<td>{view}if $dados.0.cod_marca != "0" {/view} {view}$dados.0.txt_nomeMarca{/view} {view}else{/view} --- {view}/if{/view}</td>
					<td>{view}if $dados.0.cod_hotel != "0" {/view} {view}$dados.0.txt_razaoSocial{/view} {view}else{/view} --- {view}/if{/view}</td>
					<td>	
						<ul class="actions">
							<li><a class="view"	href="{view}$URL_DEFAULT{/view}reconhecimento/detalhes/id_relacao_idioma/{view}$dados.0.cod_relacao_idioma{/view}"	rel="tooltip" original-title="Ver detalhes">ver</a></li>
							<li><a class="edit"	href="{view}$URL_DEFAULT{/view}reconhecimento/editar/id_relacao_idioma/{view}$dados.0.cod_relacao_idioma{/view}"rel="tooltip" original-title="{view}$textos_layout[42]{/view}">edit</a>
							</li>
							<li><a class="delete" onclick="javascript:exclusaoMultipla('{view}$URL_DEFAULT{/view}reconhecimento/excluir/id_relacao_idioma/{view}$dados.0.cod_relacao_idioma{/view}', '{view}$URL_DEFAULT{/view}reconhecimento', '{view}$textos_layout[9]{/view}')"	rel="tooltip" original-title="{view}$textos_layout[48]{/view}">delete</a>
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
