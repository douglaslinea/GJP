{view}include file="{view}$HEAD{/view}"{/view}

		<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias');" href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias/incluir');" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias/editar/id_relacao_idioma/{view}$dados.cod_relacao_idioma{/view}');" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			{view}if !isset($conteudo_nao_encontrado){/view}
				{view}foreach from=$dados_noticia item=dados{/view}
                
   		<article class="half-block">
			<div class="article-container">
				<header>
					<h2>{view}$dados.WebsiteIdiomas.txt_idioma{/view}</h2>
				</header>
				<section>
					<table>
                    	<tr>
							<td class="detalhes">
								<strong>Data</strong><br />
								{view}$Helper->FormataData($dados.dat_data,'br'){/view}
							</td>
                        </tr>
						<tr>
							<td class="detalhes">
								<strong>T&iacute;tulo</strong><br />
								<h3>{view}$dados.txt_titulo{/view}</h3>
							</td>
						</tr>
						<tr>
							<td class="detalhes">
								<strong>Texto</strong><br />
								{view}$dados.txt_texto{/view}
							</td>
						</tr>
						<tr>
							<td class="detalhes">
								{view}if strlen(trim($dados.txt_imagem)) > 0{/view}
									<strong>Imagem</strong><br />
									<img src="{view}$ARQ_DIN{/view}{view}$dados.txt_imagem{/view}" alt="{view}$dados.txt_titulo{/view}" title="{view}$dados.txt_titulo{/view}" width="200" />
								{view}/if{/view}
							</td>
						</tr>
						<tr>
							<td class="detalhes">
								<strong>Publicado</strong><br />
								{view}if $dados.cod_publicado == 1{/view} Sim {view}else{/view} N&atilde;o {view}/if{/view}
							</td>
						</tr>
						<tr>
							<td class="detalhes">
								<strong>Data de In&iacute;cio da Publica&ccedil;&atilde;o</strong><br />
								{view}$Helper->FormataDataHora($dados.dat_inicio_publicacao,'br'){/view}
							</td>
						</tr>
						<tr>
							<td class="detalhes">
								<strong>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</strong><br />
								{view}$Helper->FormataDataHora($dados.dat_termino_publicacao,'br'){/view}
							</td>
						</tr>
					</table>
				</section>
			</div>
		</article>
				{view}/foreach{/view}
        <div class="clearfix"></div>
        
                <button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias');" />{view}$textos_layout[52]{/view}</button>
                &nbsp;&nbsp;&nbsp;
                <button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias/editar/id_relacao_idioma/{view}$dados.cod_relacao_idioma{/view}');" />{view}$textos_layout[42]{/view}</button>
	
			{view}else{/view}
				<div class="notification error">
					<p>
							<strong>{view}$textos_layout[45]{/view}</strong>
					</p>
				</div>
				<br /> <br />
				
				<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias');" />{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
		</div>
        
{view}include file="{view}$FOOTER{/view}"{/view}