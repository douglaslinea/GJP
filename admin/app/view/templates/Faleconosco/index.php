{view}include file="{view}$HEAD{/view}"{/view}

		<article class="full-block clearfix">
		
			<div class="article-container">

				<header>
					<h2>Fale Conosco - Registros</h2>

					<nav>
						<ul class="tab-switch">
							<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco');" href="" rel="tooltip" title="Listar">Listar</a></li>
							<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco/exportar');" href="" rel="tooltip" title="Exportar cadastros">Exportar cadastros</a></li>
							<li class="inativo">Ver Detalhes</li>                            
                            
                            
						</ul>
					</nav>

				</header>


				<div class="tab default-tab" id="tab0">

				{view}if $dados_faleConosco !== false{/view}
                
                    {view}if isset($params.mensagem_confirmacao){/view}
                    
                    <div class="notification success">
                    <a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
                    <p>{view}$params.mensagem_confirmacao{/view}</p>
                    </div>
                    
                    {view}/if{/view}  
                    
                    <table class="datatable">
                    
                    <thead>
                      <tr>
                        	<th width="20%">Data / Hora</th>
                            <th width="40%">Nome</th>                                
                            <th width="10%">E-mail</th>
                            <th width="30%">Assunto</th>
                            <th>&nbsp;</th>
                            
                      </tr>
                    </thead>
                        <tbody>
                          {view}foreach from=$dados_faleConosco item=faleConosco{/view}
                          <tr>
                            <td>{view}$faleConosco.dat_datahora{/view}</td>
                            <td>{view}$faleConosco.txt_nome{/view}</td>
                            <td>{view}$faleConosco.txt_email{/view}</td>
                            <td>{view}$faleConosco.txt_assunto{/view}</td>
                            <td>
                            <ul class="actions">
                                <li><a class="view" href="{view}$URL_DEFAULT{/view}faleconosco/detalhes/cod_id/{view}$faleConosco.cod_id{/view}" rel="tooltip" original-title="Ver detalhes">ver</a></li>
	                           <!--  <li><a class="edit" href="{view}$URL_DEFAULT{/view}textos/editar/id_rel_idioma/{view}$faleConosco.cod_texto{/view}" rel="tooltip" original-title="Editar registro">editar</a></li> -->
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