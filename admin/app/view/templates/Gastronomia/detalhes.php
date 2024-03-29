{view}include file="{view}$HEAD{/view}"{/view}
<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">

	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}gastronomia/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
	<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}gastronomia')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>

</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
	{view}if $dados_gastronomia !== false{/view} {view}if isset($params.mensagem_confirmacao){/view}
	<div class="notification success">
		<a href="#" class="close-notification"	title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
		<p>{view}$params.mensagem_confirmacao{/view}</p>
	</div>
	{view}/if{/view}
<article class="half-block">
	<div class="article-container">
		{view}foreach from=$dados_gastronomia item=gastronomia name=acom{/view}
			
		<header>
		<h2>{view}$gastronomia.txt_idioma{/view}</h2>
		</header>
		<section>
		<table>
			<tr>
			<td width="50%" colspan="2"><strong>Categoria</strong><br />
					<h3>{view}$gastronomia.txt_categoria{/view}</h3>
				</td>
			
			</tr>		
			<tr>
				<td width="50%" class="detalhes"><strong>Titulo</strong><br />
					{view}$gastronomia.txt_titulo{/view}
				</td>
			
				<td width="50%" class="detalhes"><strong>Hotel</strong><br />
					{view}$gastronomia.txt_razaoSocial{/view}</td>
			</tr>


			<tr>
				<td class="detalhes" colspan="2"><strong>Informações</strong><br />
					{view}$gastronomia.txt_descricao{/view}</td>

			</tr>

		</table>
		</section>
		<br /> <br /> {view}/foreach{/view}	
	</div>
	</article>

	<div class="clearfix"></div>
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}gastronomia/editar/id_relacao_idioma/{view}$gastronomia.cod_relacao_idioma{/view}')" />

	{view}$textos_layout[42]{/view}
	</button>
	&nbsp&nbsp
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}gastronomia')" />
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
