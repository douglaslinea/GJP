{view}include file="{view}$HEAD{/view}"{/view}
	<article class="full-block clearfix">
		<div class="article-container">
			<header>
				<h2>Fale Conosco - Detalhes</h2>
				<nav>
					<ul class="tab-switch">
						<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos');" href="" rel="tooltip" title="Listar">Listar</a></li>
						<li><a class="default-tab" href="#" rel="tooltip" title="Ver detalhes">Ver detalhes</a></li>
						<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos/editar/id/{view}$dados_texto.cod_id{/view}');" href="" rel="tooltip" title="Editar registro">Editar registro</a></l>
					</ul>
				</nav>
			</header>

			<div class="tab default-tab" id="tab0">
				{view}if !isset($texto_nao_encontrado){/view}
						<table>
							<tr>
								<td width="50%" class="detalhes">
									<strong>IP</strong><br />
	                            	<h3>{view}$dados_faleConosco.num_ip{/view}</h3>
	                            </td>
	                            
	                            <td width="50%" class="detalhes">
	                            	<strong>Data Hora</strong><br />
	                            	{view}$dados_faleConosco.dat_datahora{/view}
	                            </td>
	                        </tr>
	                        
	                        <tr>
	                        	<td width="50%" class="detalhes">
	                        		<strong>Nome</strong><br />
	                            	{view}$dados_faleConosco.txt_nome{/view}
	                            </td>
	                            <td width="50%" class="detalhes">
	                            	<strong>Telefone</strong><br />
	                            	{view}$dados_faleConosco.txt_telefone{/view}
	                            </td>
	                        </tr>
	                        
	                        <tr>
	                        	<td width="50%" class="detalhes">
	                        		<strong>Assunto</strong><br />
	                            	{view}$dados_faleConosco.txt_assunto{/view}
	                            </td>
	                        
	                        	<td width="50%" class="detalhes">
	                            	<strong>Mensagem</strong><br />
	                            	{view}$dados_faleConosco.txt_mensagem{/view}
	                            </td>
	                        </tr>
	                    <tr>
	                    	<td class="detalhes" colspan="2">
	                        	<button class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco');" />Voltar</button>&nbsp;&nbsp;&nbsp;
	                            <!-- <button class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco/editar/cod_id/{view}$dados_faleConosco.cod_id{/view}');" />Editar registro</button> -->
	                        </td>
	                    </tr>
                    </table>
                   
                {view}else{/view}
                   	<div class="notification error">
                   		<p><strong>Registro n&atilde;o encontrado.</strong> Volte para a lista e acesse um registro v&aacute;lido.</p>
                   	</div>
                   	<br /><br />
                    	
                   	<button class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}clientes');" />Voltar</button>
                {view}/if{/view}
            </div>
{view}include file="{view}$FOOTER{/view}"{/view}