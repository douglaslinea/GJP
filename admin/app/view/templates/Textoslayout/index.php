{view}include file="{view}$HEAD{/view}"{/view}

<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Textos do Layout</h2>
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos-layout');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			{view}if $dados_textos !== false{/view}
				{view}if isset($params.mensagem_confirmacao){/view}
					<div class="notification success">
						<a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
						<p>{view}$params.mensagem_confirmacao{/view}</p>
					</div>
				{view}/if{/view}
				
				<table class="datatable">
					<thead>
						<tr>
							<th width="10%">Idioma</th>
							<th width="80%">Texto</th>
							<th width="10%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
						{view}foreach from=$dados_textos item=texto{/view}
							<tr>
								<td width="10%">{view}$texto.WebsiteIdiomas.txt_idioma{/view}</td>
								<td width="80%">{view}$texto.txt_texto{/view}</td>
								<td width="10%">
									<ul class="actions">
										<li><a class="edit" href="{view}$URL_DEFAULT{/view}textoslayout/editar/cod_texto/{view}$texto.cod_texto{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">editar</a></li>
									</ul>
								</td>
							</tr>
						{view}/foreach{/view}
					</tbody>
				</table>
			{view}else{/view}
				{view}$textos_layout[24]{/view}
			{view}/if{/view}
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}