{view}include file="{view}$HEAD{/view}"{/view}
<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocialnoticias/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocialnoticias')"href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a>
	</li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
	{view}if $dados_acao !== false{/view} {view}if
	isset($params.mensagem_confirmacao){/view}
	<div class="notification success">
		<a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
		<p>{view}$params.mensagem_confirmacao{/view}</p>
	</div>
	{view}/if{/view}
	<article class="half-block">
	<div class="article-container">
		{view}foreach from=$dados_acao item=acao name=acom{/view}
		<header>
		<h2>{view}$acao.WebsiteIdiomas.txt_idioma{/view}</h2>
		</header>
		<section>
		<table>
			<tr>
				<td width="50%" class="detalhes"><strong>Data</strong><br />
					<h3>{view}$Helper->FormataData($acao.dat_data,'br'){/view}</h3>
				</td>
		
				<td width="50%" class="detalhes"><strong>Publicado</strong><br />
						{view}if $dados.cod_publicado == 1{/view} Sim {view}else{/view} N&atilde;o {view}/if{/view}
				</td>
	
			</tr>
			<tr>
				<td width="50%" class="detalhes"><strong>Titulo</strong><br />
					<h3>{view}$acao.txt_titulo{/view}</h3>
				</td>
			</tr>	
			<tr>
				<td class="detalhes" colspan="2"><strong>Texto</strong><br />
					{view}$acao.txt_texto{/view}</td>
	
			</tr>
			<tr>
				<td width="50%" class="detalhes"><strong>Data Inicio Publicação</strong><br />
					{view}$Helper->FormataDataHora($acao.dat_inicio,'br'){/view}</td>
			
				<td width="50%" class="detalhes"><strong>Data Termino Publicação</strong><br />
					{view}$Helper->FormataDataHora($acao.dat_termino,'br'){/view}</td>
	
			</tr>

		</table>
		</section>
		<br /> <br /> {view}/foreach{/view}
	</div>
	</article>

	<div class="clearfix"></div>
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocialnoticias/editar/id_relacao_idioma/{view}$acao.cod_relacao_idioma{/view}')" />

	{view}$textos_layout[42]{/view}
	</button>
	&nbsp&nbsp
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocialnoticias')" />
	{view}$textos_layout[52]{/view}
	</button>
	{view}else{/view}
	<div class="notification error">
		<p>
			<strong>{view}$textos_layout[45]{/view}</strong>
		</p>
	</div>
	{view}/if{/view}
</div>

{view}include file="{view}$FOOTER{/view}"{/view}
