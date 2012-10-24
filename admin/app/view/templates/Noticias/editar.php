{view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/imagem1.js"></script>

<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}noticias/imagem";
var url_padrao = "{view}$URL_DEFAULT{/view}";
var arq_din = "{view}$ARQ_DIN{/view}";
var acao_deletar = "{view}$URL_DEFAULT{/view}noticias/deletimg";
var acao_edicao_incluir = "{view}$URL_DEFAULT{/view}noticias/inserirImagem";

var altura_crop = '{view}$altura_crop{/view}';
var largura_crop = '{view}$largura_crop{/view}';

</script>

			<header>
			<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
				<nav>
					<ul class="tab-switch">
						<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias');" href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a></li>
						<li class="inativo">{view}$textos_layout[41]{/view}</li>
						<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias/incluir');" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
						<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
					</ul>
				</nav>
			</header>
			
			<div class="tab default-tab" id="tab0">
				<form name="frm_conteudo" id="frm_conteudo" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}noticias/editar', 'frm_conteudo', '{view}$URL_DEFAULT{/view}noticias', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')" >
					{view}foreach from=$dados_noticia item=dados name=dad{/view}
						<fieldset>
							<legend><strong>{view}$dados.WebsiteIdiomas.txt_idioma{/view}</strong></legend>
							<fieldset>
								<legend>Dados de publica&ccedil;&atilde;o</legend>
								<dl>
									<dt>
										<label>Publicado</label>
									</dt>
							
									<dd>
										<input type="radio" name="cod_publicado{view}$smarty.foreach.dad.iteration{/view}" id="radio" value="1" {view}if $dados.cod_publicado==1{/view}checked="checked" {view}/if{/view} />Sim 
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="cod_publicado{view}$smarty.foreach.dad.iteration{/view}" id="radio2" value="0" {view}if $dados.cod_publicado== 0{/view}checked="checked" {view}/if{/view} /> N&atilde;o
										<span id="msg_cod_publicado{view}$smarty.foreach.dad.iteration{/view}"></span>
				
										<p>
											Ao escolher "sim", o conte&uacute;do que est&aacute; sendo inclu&iacute;do passa a aparecer no website depois de salvo.<br />
											Ao escolher "n&atilde;o", o conte&uacute;do &eacute; salvo,
											por&eacute;m segue sem aparecer no website.
										</p>
									</dd>
									
									<dt>
										<label>Data de In&iacute;cio da Publica&ccedil;&atilde;o</label>
									</dt>
									
									<dd>
										<input type="text" name="dat_inicio_publicacao{view}$smarty.foreach.dad.iteration{/view}" id="dat_inicio_publicacao{view}$smarty.foreach.dad.iteration{/view}" class="datepicker small" value="{view}$Helper->FormataDataHora($dados.dat_inicio_publicacao,'br'){/view}" />
										<span id="msg_dat_inicio_publicacao{view}$smarty.foreach.dad.iteration{/view}"></span>
				
										<p>{view}$textos_layout[47]{/view}</p>
										<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
										<p>Marque a data e hora na qual voc&ecirc; quer que este conte&uacute;do passe a aparecer no website.</p>
									</dd>
									
									<dt>
										<label>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</label>
									</dt>
									
									<dd>
										<input type="text" name="dat_termino_publicacao{view}$smarty.foreach.dad.iteration{/view}" id="dat_termino_publicacao{view}$smarty.foreach.dad.iteration{/view}" class="datepicker small" value="{view}$Helper->FormataDataHora($dados.dat_termino_publicacao,'br'){/view}" />
										<span id="msg_dat_termino_publicacao{view}$smarty.foreach.dad.iteration{/view}"></span>
										<p>{view}$textos_layout[47]{/view}</p>
										<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
										<p>Marque a data e hora na qual voc&ecirc; quer que este conte&uacute;do deixe aparecer no website.</p>
									</dd>
								</dl>
							</fieldset>
							
							<fieldset>
								<legend>Dados do registro</legend>
								<dl>
									<dt>
										<label>Data</label>
									</dt>
									
						<!-- INICIO DO HTML DO PLUGIN -->
						  <div id="imagem_cropada_ftp{view}$smarty.foreach.dad.iteration{/view}" name="imagem_cropada_ftp{view}$smarty.foreach.dad.iteration{/view}"></div>
						 <a href="#" id="deletar{view}$smarty.foreach.dad.iteration{/view}" name="deletar">Deletar imagem atual</a> 
						 <a href="#" id="editar{view}$smarty.foreach.dad.iteration{/view}" name="editar_imagem">Editar imagem</a> 
						 <a href="#" id="trocar{view}$smarty.foreach.dad.iteration{/view}" name="trocar_imagem">Trocar Imagem</a>  
						
						
						  
						 
							<!--  <input type="file" name="upload_link{view}$smarty.foreach.dad.iteration{/view}" id="upload_link{view}$smarty.foreach.dad.iteration{/view}" />-->
							<!--   <input type="button" name="botao{view}$smarty.foreach.dad.iteration{/view}" id="botao{view}$smarty.foreach.dad.iteration{/view}" value="teste">-->
						<a id="upload_link{view}$smarty.foreach.dad.iteration{/view}" style="font-size: 32px; color: black;" href="#" >Imagem </a>
						
						<div id="todo_conteudo{view}$smarty.foreach.dad.iteration{/view}">
						
						
						<input type="text" name="nome_img{view}$smarty.foreach.dad.iteration{/view}" id="nome_img{view}$smarty.foreach.dad.iteration{/view}" value='{view}$dados.img_original{/view}' " />
						<input type="text" name="nome_img_cropada{view}$smarty.foreach.dad.iteration{/view}" id="nome_img_cropada{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.img_cropada{/view}"  /> 
						
						
						<div id="upload_status{view}$smarty.foreach.dad.iteration{/view}" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
					
						<span id="loader{view}$smarty.foreach.dad.iteration{/view}" style="display: none;">
							<img src="loader.gif" alt="Carregando..." />
						</span>
						<span id="progress{view}$smarty.foreach.dad.iteration{/view}"></span> <br />
						<div id="uploaded_image{view}$smarty.foreach.dad.iteration{/view}"></div>
						<div id="thumbnail_form{view}$smarty.foreach.dad.iteration{/view}" style="display: none;">
								<input type="hidden" name="x1" value="" id="x1{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="y1" value="" id="y1{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="x2" value="" id="x2{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="y2" value="" id="y2{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="w" value="" id="w{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="h" value="" id="h{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="button" name="save_thumb{view}$smarty.foreach.dad.iteration{/view}" value="Save Thumbnail" id="save_thumb{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="flag{view}$smarty.foreach.dad.iteration{/view}" id="flag{view}$smarty.foreach.dad.iteration{/view}" value="edicao{view}$smarty.foreach.dad.iteration{/view}">
								
								
								<input type="hidden" value="{view}$dados.cod_id{/view}" name="id{view}$smarty.foreach.dad.iteration{/view}" id="id{view}$smarty.foreach.dad.iteration{/view}">
								</div>
								
						</div>
						
						
						<!-- FIM DO HTML DO PLUGIN -->		
									<dt>
										<label>Imagem</label>
									</dt>
									
		
							
									<dt>
										<label>T&iacute;tulo</label>
									</dt>
									
									<dd>
										<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" maxlength="255" class="medium" value="{view}$dados.txt_titulo{/view}" />
										<span id="msg_txt_titulo{view}$smarty.foreach.dad.iteration{/view}"></span>
				
										<p>{view}$textos_layout[47]{/view}</p>
									</dd>
									
									<dt>
										<label>Texto</label>
									</dt>
									
									<dd>
										<textarea name="txt_texto{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto{view}$smarty.foreach.dad.iteration{/view}" class="wysiwyg large">{view}$dados.txt_texto{/view}</textarea>
										<span id="msg_txt_texto{view}$smarty.foreach.dad.iteration{/view}"></span>
										<p>{view}$textos_layout[47]{/view}</p>
									</dd>
								</dl>
							</fieldset>
						</fieldset>
						
						<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.cod_id{/view}" />
					{view}/foreach{/view}
					
					<button type="submit" id="btn_enviar" class="gray" />{view}$textos_layout[50]{/view}</button>
					&nbsp;ou&nbsp;
					<a href="{view}$URL_DEFAULT{/view}noticias" />Cancelar</a>
				</form>
			</div>
			
{view}include file="{view}$FOOTER{/view}"{/view}