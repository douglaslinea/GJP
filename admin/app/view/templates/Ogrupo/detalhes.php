{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}ogrupo/incluir')"	href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>

	<li><a class="default-tab" rel="tooltip" href="#"	title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>

	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}ogrupo')"	href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>


<div class="tab default-tab" id="tab0">
	{view}if $dados_grupo !== false{/view} {view}if
	isset($params.mensagem_confirmacao){/view}
	<div class="notification success"><a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
		<p>{view}$params.mensagem_confirmacao{/view}</p>
	</div>
	{view}/if{/view}

	<article class="half-block">
	<div class="article-container">
		{view}foreach from=$dados_grupo item=grupo name=foo{/view}
		<header>
		<h2>{view}$grupo.WebsiteIdiomas.txt_idioma{/view}</h2>
		</header>

		<section>
		<table>
			<tr>
				<td width="50%" class="detalhes"><strong>Marca</strong><br />
					<h3>{view}$grupo.txt_nomeMarca{/view}</h3>
				</td>

				<td width="50%" class="detalhes"><strong>Telefone Vendas</strong><br />
					{view}$grupo.txt_tel_vendas{/view}</td>
			</tr>

			<tr>
				<td class="detalhes"><strong>Link</strong><br />
					{view}$grupo.txt_link{/view}</td>
				<td class="detalhes"><strong>Sala de Imprensa</strong><br />
					{view}$grupo.ImprensaCategoria.txt_categoria{/view}</td>
			</tr>

			<tr>
				<td class="detalhes" colspan="2"><strong>Mais Informações</strong><br />
					{view}$grupo.txt_texto_marca{/view}</td>
			</tr>

			<tr>
			
				<td><iframe type="text/html" width="320" height="240" src="https://www.youtube.com/embed/{view}$grupo.arq_video_marca{/view}" frameborder="0"></iframe></td>
				<td><img src="{view}$URL_DEFAULT{/view}../web_files/arq_din/{view}$grupo.img_logo_cropada{/view}"></td>
				
			</tr>


		</table>
		</section>
		<br /> {view}/foreach{/view}
	</div>
	</article>

	<div class="clearfix"></div>
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}ogrupo/editar/id_relacao_idioma/{view}$grupo.cod_relacao_idioma{/view}')" />
	{view}$textos_layout[42]{/view}
	</button>	&nbsp&nbsp
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}ogrupo')" />
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
