{view}include file="{view}$HEAD{/view}"{/view}

		<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo');" href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo/incluir');" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo/editar/id/{view}$dados_seo.cod_id{/view}');" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			{view}if !isset($conteudo_nao_encontrado){/view}
				<table>
					<tr>
						<td width="50%" class="detalhes">
							<strong>Caminho da p&aacute;gina</strong><br />
							{view}$dados_seo.url_caminho{/view}
						</td>
						<td width="50%" class="detalhes">
							<strong>T&iacute;tulo da p&aacute;gina</strong><br />
							{view}$dados_seo.txt_title{/view}
						</td>
					</tr>
					<tr>
						<td class="detalhes">
							<strong>Palavras-chave da p&aacute;gina</strong><br />
							{view}$dados_seo.txt_keywords{/view}
						</td>
						<td class="detalhes" colspan="2">
							<strong>Descri&ccedil;&atilde;o da p&aacute;gina</strong><br />
							{view}$dados_seo.txt_description{/view}
						</td>
					</tr>
				</table>
				<br />
							<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo');" />{view}$textos_layout[52]{/view}</button>&nbsp;&nbsp;&nbsp;
							<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo/editar/id/{view}$dados_seo.cod_id{/view}');" />{view}$textos_layout[42]{/view}</button>
				
			{view}else{/view}

				<div class="notification error">
					<p>
							<strong>{view}$textos_layout[45]{/view}</strong>
					</p>
				</div>
				<br /><br />
				<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo');" />
                {view}$textos_layout[52]{/view}
				</button>
			{view}/if{/view}
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}