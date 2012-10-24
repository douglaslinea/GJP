{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}reconhecimento/incluir')"	href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
	<li><a class="default-tab" rel="tooltip" href="#"	title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}reconhecimento')"	href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>


<div class="tab default-tab" id="tab0">
	{view}if $dados_reconhecimento !== false{/view} {view}if
	isset($params.mensagem_confirmacao){/view}
	<div class="notification success"><a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
		<p>{view}$params.mensagem_confirmacao{/view}</p>
	</div>
	{view}/if{/view}

	<article class="half-block">
	<div class="article-container">
		{view}foreach from=$dados_reconhecimento item=reconhecimento name=foo{/view}
		<header>
		<h2>{view}$reconhecimento.txt_idioma{/view}</h2>
		</header>

		<section>
		<table>
			<tr>
				<td width="50%" class="detalhes"><strong>Reconhecimento</strong><br />
					<h3>{view}$reconhecimento.txt_titulo{/view}</h3>
				</td>

				<td width="50%" class="detalhes"><strong>Ano</strong><br />
					{view}$reconhecimento.txt_ano{/view}</td>
			</tr>

			<tr>
				<td class="detalhes"><strong>Marca</strong><br />
					{view}if $reconhecimento.cod_marca != "0" {/view} {view}$reconhecimento.txt_nomeMarca{/view} {view}else{/view} --- {view}/if{/view}</td>
					
					
				<td class="detalhes"><strong>Hotel</strong><br />
					{view}if $reconhecimento.cod_hotel != "0" {/view} {view}$reconhecimento.txt_razaoSocial{/view} {view}else{/view} --- {view}/if{/view}</td>
			</tr>

			<tr>
				<td class="detalhes" colspan="2"><strong>Texto Reconhecimento</strong><br />
					{view}$reconhecimento.txt_reconhecimento{/view}</td>
			</tr>
		</table>
		</section>
		<br /> {view}/foreach{/view}
	</div>
	</article>

	<div class="clearfix"></div>
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}reconhecimento/editar/id_relacao_idioma/{view}$reconhecimento.cod_relacao_idioma{/view}')" />
	{view}$textos_layout[42]{/view}
	</button>	&nbsp&nbsp
	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}reconhecimento')" />
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
