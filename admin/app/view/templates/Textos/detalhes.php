{view}include file="{view}$HEAD{/view}"{/view}
	<article class="full-block clearfix">
		<div class="article-container">
			<header>
				<h2>Textos</h2>
				<nav>
					<ul class="tab-switch">
						<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos');" href="" rel="tooltip" title="Listar">Listar</a></li>
						<li><a class="default-tab" href="#" rel="tooltip" title="Ver detalhes">Ver detalhes</a></li>
						<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos/editar/id_rel_idioma/{view}$dados_texto.cod_texto{/view}');" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
                     </ul>
				</nav>
			</header>

			<div class="tab default-tab" id="tab0">
				{view}if !isset($texto_nao_encontrado){/view}
                
					{view}foreach from=$dados_texto item=dados{/view}
                    
                    <fieldset>
                    	<legend>{view}$dados.WebsiteIdiomas.txt_idioma{/view}</legend>
						<table>
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
                    </table>
                    </fieldset>
                    <br />

                    {view}/foreach{/view}
                    
	                        	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos');" />{view}$textos_layout[52]{/view}</button>&nbsp;&nbsp;&nbsp;
	                            <button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos/editar/id_rel_idioma/{view}$dados.cod_texto{/view}');" />{view}$textos_layout[42]{/view}</button>
                   
                {view}else{/view}
                
                   	<div class="notification error">
                   		<p><strong>Registro n&atilde;o encontrado.</strong> Volte para a lista e acesse um registro v&aacute;lido.</p>
                   	</div>
                   	<br /><br />
                    	
                   	<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos');" />{view}$textos_layout[52]{/view}</button>
                {view}/if{/view}
            </div>
            
{view}include file="{view}$FOOTER{/view}"{/view}