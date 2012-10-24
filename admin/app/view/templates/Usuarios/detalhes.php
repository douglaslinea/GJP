{view}include file="{view}$HEAD{/view}"{/view}

		<article class="full-block clearfix">
		
			<div class="article-container">

				<header>
					<h2>Usu&aacute;rios</h2>

					<nav>
						<ul class="tab-switch">
							<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios');" href="" rel="tooltip" title="Listar">Listar</a></li>
							<li><a class="default-tab" href="#" rel="tooltip" title="Ver detalhes">Ver detalhes</a></li>
							<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
							<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/editar/id/{view}$dados_usuario.cod_id{/view}');" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
						</ul>
					</nav>

				</header>


				<div class="tab default-tab" id="tab0">
                {view}if !isset($usuario_nao_encontrado){/view}

                <table>
                  <tr>
                    <td width="50%" class="detalhes"><strong>Nome</strong><br />
                    <h3>{view}$dados_usuario.txt_nome{/view}</h3></td>
                    <td width="50%" class="detalhes"><strong>Perfil</strong><br />
                    {view}$dados_usuario.PermissaoPerfis.txt_perfil{/view}</td>
                  </tr>
                  <tr>
                    <td width="50%" class="detalhes"><strong>Login</strong><br />
                    {view}$dados_usuario.txt_login{/view}</td>
                    <td width="50%" class="detalhes"><strong>Status</strong><br />
                    {view}$dados_usuario.UsuariosStatus.descricao{/view}</td>
                  </tr>
                  <tr>
                    <td colspan="2" class="detalhes"><strong>E-mail</strong><br />
                    {view}$dados_usuario.txt_email{/view}</td>
                  </tr>

                          <tr>
                            <td class="detalhes" colspan="2">
                            <button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios');" />{view}$textos_layout[52]{/view}</button>&nbsp;&nbsp;&nbsp;
                            <button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/editar/id/{view}$dados_usuario.cod_id{/view}');" />{view}$textos_layout[42]{/view}</button>
                            </td>
                          </tr>
                        </table>
                          
                {view}else{/view}
                <div class="notification error">
                            <p><strong>Registro n&atilde;o encontrado.</strong> Volte para a lista e acesse um registro v&aacute;lido.</p>
                </div>
                     <br /><br />
                     <button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios');" />{view}$textos_layout[52]{/view}</button> 
                        
                {view}/if{/view}        

			</div>

{view}include file="{view}$FOOTER{/view}"{/view}