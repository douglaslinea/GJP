{view}include file="{view}$HEAD{/view}"{/view}
<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}parceiros/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}parceiros')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a>
	</li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
	{view}if $dados_parceiros !== false{/view} {view}if	isset($params.mensagem_confirmacao){/view}
	<div class="notification success">
	<a href="#" class="close-notification"	title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
		<p>{view}$params.mensagem_confirmacao{/view}</p>
	</div>
	{view}/if{/view}
	<article class="half-block">
	<div class="article-container">
		{view}foreach from=$dados_parceiros item=parceiros	name=acom{/view}

		<header>
		<h2>{view}$parceiros.txt_idioma{/view}</h2>
		</header>
		<section>
		<table>
			<tr>
				<td width="50%" colspan="2"><strong>Data</strong><br />
					<h3>{view}$parceiros.txt_titulo{/view}</h3>
				</td>

			</tr>
			<tr>
				<td class="detalhes" colspan="2"><strong>Descri��o</strong><br />
						{view}$parceiros.txt_apresentacao{/view}</td>
			</tr>
			
			{view}if $parceiros.img_capa_cropada != NULL{/view}
			<tr>
				<td class="detalhes"><strong>Imagem</strong>&nbsp&nbsp&nbsp&nbsp<img src="{view}$URL_DEFAULT{/view}../web_files/arq_din/{view}$parceiros.img_capa_cropada{/view}"></td>
			</tr>
			{view}/if{/view}
			
		</table>
		</section>
		<br /> <br /> {view}/foreach{/view}
	</div>
	</article>

	<div class="clearfix"></div>
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}parceiros/editar/id_relacao_idioma/{view}$parceiros.cod_relacao_idioma{/view}')" />

	{view}$textos_layout[42]{/view}
	</button>
	&nbsp&nbsp
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}parceiros')" />
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