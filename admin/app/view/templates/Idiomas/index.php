{view}include file="{view}$HEAD{/view}"{/view}

				<header>
					<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
					<nav>
						<ul class="tab-switch">
							<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}idiomas');" href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a></li>
							<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}idiomas/incluir');" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
                            <li class="inativo">{view}$textos_layout[42]{/view}</li>
						</ul>
					</nav>
				</header>

				<div class="tab default-tab" id="tab0">
					{view}if $dados_idioma !== false{/view}
						{view}if isset($params.mensagem_confirmacao){/view}
							<div class="notification success">
								<a href="#" class="close-notification" title="{view}$textos_layout[44]{/view}" rel="tooltip">x</a>
									<p>{view}$params.mensagem_confirmacao{/view}</p>
							</div>
                        	{view}/if{/view}

							<table class="datatable" id="first-asc">
								<thead>
									<tr>
										<th width="50%">Idioma</th>
										<th width="40%">Meta-tag</th>
										<th width="10%">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									{view}foreach from=$dados_idioma item=idioma{/view}
									<tr>
										<td>{view}$idioma.txt_idioma{/view}</td>
										<td>{view}$idioma.txt_meta{/view}</td>
										<td>
											<ul class="actions">
												<li><a class="edit" href="{view}$URL_DEFAULT{/view}idiomas/editar/id/{view}$idioma.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">edit</a></li>
												<li><a class="delete" onclick="javascript:exclusao('{view}$URL_DEFAULT{/view}idiomas/excluir/id/{view}$idioma.cod_id{/view}', '{view}$URL_DEFAULT{/view}idiomas', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="{view}$textos_layout[48]{/view}">delete</a></li>
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