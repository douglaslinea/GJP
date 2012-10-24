{view}include file="{view}$HEAD{/view}"{/view}

		<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/{view}$dados_configuracao.id{/view}');" href="" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
					<li><a class="default-tab" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<form name="frm_configuracoes" id="frm_configuracoes" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}configuracoes/editar/id/{view}$dados_configuracao.id{/view}', 'frm_configuracoes','{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/{view}$dados_configuracao.id{/view}', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">

				<fieldset>
					<legend>Configura&ccedil;&otilde;es gerais</legend>                
					<dl>
                        <dt>
							<label>T&iacute;tulo padr&atilde;o do website</label>
                        </dt>
                        
                        <dd>
                        	<input type="text" name="txt_default_title" id="txt_default_title" value="{view}$dados_configuracao.txt_default_title{/view}" class="medium"/>
                        	<span id="msg_txt_default_title"></span>
                        	<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
                        	<p>{view}$textos_layout[47]{/view}</p>
                        </dd>
					</dl>
					<dl>
						<dt>
							<label>Idioma padr&atilde;o</label>
                        </dt>
                        
                        <dd>
                            <select name="cod_idioma" id="cod_idioma" class="small">
                            	<option value="">--{view}$textos_layout[46]{/view}--</option>
                            	{view}foreach from=$idiomas item=idioma{/view}
                            		<option value="{view}$idioma.cod_id{/view}" {view}if $dados_configuracao.cod_idioma_default == $idioma.cod_id{/view} selected="selected" {view}/if{/view}>{view}$idioma.txt_idioma{/view}</option>
                            	{view}/foreach{/view}
                            </select>
            
            				<span id="msg_idioma"></span>
            				<p>{view}$textos_layout[47]{/view}</p>
            			</dd>
					</dl>
					<dl>
                        <dt>
							<label>Palavras-chave padr&atilde;o do website</label>
                        </dt>
                        
                        <dd>
                        	<textarea name="txt_default_key" id="txt_default_key" class="medium">{view}$dados_configuracao.txt_default_key{/view}</textarea>
                        	<span id="msg_txt_default_key"></span>
                        	<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os termos devem ser separados por v&iacute;rgulas.</p>
							<p>{view}$textos_layout[47]{/view}</p>
                        </dd>
					</dl>
					<dl>
                        <dt>
							<label>Descri&ccedil;&atilde;o padr&atilde;o do website</label>
                        </dt>
                        
                        <dd>
                        	<textarea name="txt_default_desc" id="txt_default_desc" class="medium">{view}$dados_configuracao.txt_default_desc{/view}</textarea>
                        	<span id="msg_txt_default_desc"></span>
                        	<p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
                        	<p>{view}$textos_layout[47]{/view}</p>
                        </dd>
					</dl>
					<dl>
                        <dt>
							<label>E-mail (webmaster)</label>
                        </dt>                       
                        <dd>
                        	<input type="text" name="txt_email_webmaster" id="txt_email_webmaster" value="{view}$dados_configuracao.txt_email_webmaster{/view}" class="medium" maxlength="255"/>
                        	<span id="msg_txt_email_webmaster"></span>
                        	<p>{view}$textos_layout[47]{/view}</p>
                        </dd>
                    </dl>
                </fieldset>
                
                <button type="submit" id="btn_enviar" class="gray" />{view}$textos_layout[50]{/view}</button>
                &nbsp;ou&nbsp; 
                <a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/{view}$dados_configuracao.id{/view}" />Cancelar</a>
                <input type="hidden" name="id" id="id" value="{view}$dados_configuracao.id{/view}" />
        	</form>
        </div>   	
{view}include file="{view}$FOOTER{/view}"{/view}