{view}include file="{view}$HEAD{/view}"{/view}

			<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
				<nav>
					<ul class="tab-switch">
						<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias');" href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a></li>
						<li class="inativo">{view}$textos_layout[41]{/view}</li> 
						<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias/incluir');" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
						<li class="inativo">{view}$textos_layout[42]{/view}</li>
					</ul>
				</nav>
			</header>
			
			<div class="tab default-tab" id="tab0">
				{view}if $dados_noticias !== false{/view} {view}if isset($params.mensagem_confirmacao){/view}
					<div class="notification success">
						<a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
						<p>{view}$params.mensagem_confirmacao{/view}</p>
					</div>
				{view}/if{/view}
				
				<table class="datatable" id="sec-desc">
						<thead>
							<tr>
								<th width="20%">Idioma</th>
								<th width="10%">Data</th>
								<th width="50%">T&iacute;tulo</th>
								<th width="10%">Publicado</th>
								<th width="10%">&nbsp;</th>
							</tr>
						</thead>
						
						<tbody>
							{view}foreach from=$dados_noticias item=noticias{/view}
								<tr>
									<td>{view}$noticias.WebsiteIdiomas.idioma{/view}</td>
									<td>{view}$noticias.dat_data{/view}</td>
									<td>{view}$noticias.txt_titulo{/view}</td>
									<td>{view}if $noticias.cod_publicado == 1{/view} Sim {view}else{/view} N&atilde;o {view}/if{/view}</td>
									<td>
										<ul class="actions">
											<li><a class="view" href="{view}$URL_DEFAULT{/view}noticias/detalhes/id_relacao_idioma/{view}$noticias.cod_relacao_idioma{/view}" rel="tooltip" original-title="{view}$textos_layout[41]{/view}">see</a></li>
											<li><a class="edit" href="{view}$URL_DEFAULT{/view}noticias/editar/id_relacao_idioma/{view}$noticias.cod_relacao_idioma{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">edit</a></li>
											<li><a class="delete" onclick="javascript:exclusaoMultipla('{view}$URL_DEFAULT{/view}noticias/excluir/id_relacao_idioma/{view}$noticias.cod_relacao_idioma{/view}', '{view}$URL_DEFAULT{/view}noticias', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="{view}$textos_layout[48]{/view}">delete</a></li>
										</ul>
									</td>
								</tr>
							{view}/foreach{/view}
						</tbody>
					</table>
                    
				{view}else{/view}
					{view}$textos_layout[49]{/view}
				{view}/if{/view}

			</div>

<script type="text/javascript">
function exclusaoMultipla(url, url_direcionamento, msg_pegunta)
{
	if(confirm(msg_pegunta))
	{
	    //seta a url e os parâmetros a serem usamos pelo PHP             
	    var pars = "/rnd/" + Math.random()*4;

	    //Requisição Ajax
	    jQuery.ajax(
	    {
	       url: url+pars, //URL de destino
	       contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
	       type: 'post',
	       dataType: "json", //Tipo de Retorno
	       success: function(json)
	       {           
	           //Verifica a resposta do JSON
	           if(json[0] == "1")
	           {
	               	document.location = url_direcionamento;
	           }
			}
	    });
	}
}


</script>

{view}include file="{view}$FOOTER{/view}"{/view}