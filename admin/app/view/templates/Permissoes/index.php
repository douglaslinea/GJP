{view}include file="{view}$HEAD{/view}"{/view}
<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Permissões</h2>
		
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo">Ver Detalhes</li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<table class="datatable">
				<thead>
					<tr>
						<th width="20%">Perfil</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					{view}foreach from=$dados item=dado{/view}
						<tr>
							<td width="20%">{view}$dado.txt_perfil{/view}</td>
							<td width="10%">
								<ul class="actions">
									<li><a class="view" href="{view}$URL_DEFAULT{/view}permissoes/detalhes/id/{view}$dado.cod_tipo{/view}" rel="tooltip" original-title="Ver detalhes">ver</a></li>
									<li><a class="edit" href="{view}$URL_DEFAULT{/view}permissoes/editar/id/{view}$dado.cod_tipo{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">editar</a></li>
									<li><a class="delete" onclick="javascript:exclusao('{view}$URL_DEFAULT{/view}permissoes/excluir/id/{view}$dado.cod_tipo{/view}', '{view}$URL_DEFAULT{/view}permissoes', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="Excluir registro">excluir</a></li>
								</ul>
							</td>
						</tr>
					{view}/foreach{/view}
				</tbody>
			</table>		
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}