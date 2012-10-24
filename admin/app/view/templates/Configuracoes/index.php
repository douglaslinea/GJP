{view}include file="{view}$HEAD{/view}"{/view}

		<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
			
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}configuracoes/editar/id/{view}$dados_configuracao.id{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">

			{view}if $dados_configuracao !== false{/view}
				{view}if isset($params.mensagem_confirmacao){/view}
					<div class="notification success">
	                    <a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
	                    <p>{view}$params.mensagem_confirmacao{/view}</p>
                   	</div>
                {view}/if{/view}
                			
				<table>
					<tr>
						<td width="50%" class="detalhes"><strong>T&iacute;tulo padr&atilde;o do website</strong><br />
							{view}$dados_configuracao.txt_default_title{/view}
						</td>						
						<td width="50%" class="detalhes"><strong>Idioma padr&atilde;o</strong><br />
							{view}$dados_configuracao.WebsiteIdiomas.idioma{/view}
						</td>
					</tr>
					<tr>
						<td class="detalhes"><strong>Palavras-chave padr&atilde;o do website</strong><br />
							{view}$dados_configuracao.txt_default_key{/view}
						</td>
						<td class="detalhes"><strong>Descri&ccedil;&atilde;o padr&atilde;o do website</strong><br />
							{view}$dados_configuracao.txt_default_desc{/view}
						</td>
					</tr>
					<tr>
						<td class="detalhes" colspan="2"><strong>E-mail (webmaster)</strong><br />
						<a href="mailto:{view}$dados_configuracao.txt_email_webmaster{/view}">{view}$dados_configuracao.txt_email_webmaster{/view}</a>
						</td>
					</tr>
				</table>
                <br />
							<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}configuracoes/editar/id/{view}$dados_configuracao.id{/view}');" />{view}$textos_layout[42]{/view}</button>

			
				{view}else{/view}
					<div class="notification error">
						<p>
							<strong>{view}$textos_layout[45]{/view}</strong>
						</p>
					</div>
				{view}/if{/view}

			</div>
            
{view}include file="{view}$FOOTER{/view}"{/view}