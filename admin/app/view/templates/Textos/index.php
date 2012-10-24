{view}include file="{view}$HEAD{/view}"{/view}

		<article class="full-block clearfix">
		
			<div class="article-container">

				<header>
					<h2>Textos</h2>

					<nav>
						<ul class="tab-switch">
							<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos');" href="" rel="tooltip" title="Listar">Listar</a></li>
							<li class="inativo">Ver Detalhes</li>                            
                            <li class="inativo">Editar registro</li>
						</ul>
					</nav>

				</header>


				<div class="tab default-tab" id="tab0">

				{view}if $dados_textos !== false{/view}
                
                    {view}if isset($params.mensagem_confirmacao){/view}
                    
                    <div class="notification success">
                    <a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
                    <p>{view}$params.mensagem_confirmacao{/view}</p>
                    </div>
                    
                    {view}/if{/view}  
                    
                    <table class="datatable">
                    
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Idioma</th>
                            <th width="75%">Texto</th>                                
                            <th width="10%">&nbsp;</th>
                      </tr>
                    </thead>
                        <tbody>
                          {view}foreach from=$dados_textos item=texto{/view}
                          <tr>
                            <td>{view}$texto.cod_texto{/view}</td>
                            <td>{view}$texto.WebsiteIdiomas.txt_idioma{/view}</td>
                            <td>{view}$texto.txt_titulo{/view}</td>
                            <td>
                            <ul class="actions">
                                <li><a class="view" href="{view}$URL_DEFAULT{/view}textos/detalhes/id_rel_idioma/{view}$texto.cod_texto{/view}" rel="tooltip" original-title="Ver detalhes">ver</a></li>
	                            <li><a class="edit" href="{view}$URL_DEFAULT{/view}textos/editar/id_rel_idioma/{view}$texto.cod_texto{/view}" rel="tooltip" original-title="Editar registro">editar</a></li>
                              </ul>
							</td>
                          </tr>  
                        {view}/foreach{/view}
						</tbody>
                        </table>                    
 

            {view}else{/view}
                 
                 {view}$textos_layout[24]{/view}	
            
            {view}/if{/view}

			</div>

{view}include file="{view}$FOOTER{/view}"{/view}