{view}include file="{view}$HEAD{/view}"{/view}

		<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo');" href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a></li>
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo/incluir');" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
                    <li class="inativo">{view}$textos_layout[42]{/view}</li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			{view}if $dados_seo !== false{/view}
				{view}if isset($params.mensagem_confirmacao){/view}
					<div class="notification success">
						<a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
						<p>{view}$params.mensagem_confirmacao{/view}</p>
					</div>
				{view}/if{/view}
					
				<table class="datatable" id="first-asc">
					<thead>
						<tr>
							<th width="30%">Caminho da p&aacute;gina</th>
                            <th width="30%">T&iacute;tulo da p&aacute;gina</th>
                            <th width="30%">Palavras-chave da p&aacute;gina</th>
							<th width="10%">&nbsp;</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    	{view}foreach from=$dados_seo item=seo{/view}
                    		<tr>
                    			<td>{view}$seo.url_caminho{/view}</td>
                    			<td>{view}$seo.txt_title{/view}</td>
                    			<td>{view}$seo.txt_keywords{/view}</td>
                    			<td>
                    				<ul class="actions">
                    					<li><a class="view" href="{view}$URL_DEFAULT{/view}seo/detalhes/id/{view}$seo.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[41]{/view}">see</a></li>
                    					<li><a class="edit" href="{view}$URL_DEFAULT{/view}seo/editar/id/{view}$seo.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">edit</a></li>
                    					<li><a class="delete" onclick="javascript:exclusao('{view}$URL_DEFAULT{/view}seo/excluir/id/{view}$seo.cod_id{/view}', '{view}$URL_DEFAULT{/view}seo', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="{view}$textos_layout[48]{/view}">delete</a></li>
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
{view}include file="{view}$FOOTER{/view}"{/view}