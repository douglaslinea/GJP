{view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/lib_plugin_crop_hoteis_edicao.js"></script>

<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}hoteis/imagem";
var url_padrao = "{view}$URL_DEFAULT{/view}";
var arq_din = "{view}$ARQ_DIN{/view}";
var acao_deletar = "{view}$URL_DEFAULT{/view}hoteis/deletimg";
var acao_edicao_incluir = "{view}$URL_DEFAULT{/view}hoteis/inserirImagem";

var altura_crop = '{view}$altura_crop{/view}';
var largura_crop = '{view}$largura_crop{/view}';

var altura_cropada = '{view}$altura_cropada{/view}';
var largura_cropada =  '{view}$largura_cropada{/view}';

var acao_deletar2 = '{view}$URL_DEFAULT{/view}hoteis/deletimg2';
var acao_edicao_incluir2 = '{view}$URL_DEFAULT{/view}hoteis/inserirImagem2';
</script>



<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}hoteis/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}hoteis')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">

<!--<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}hoteis/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}hoteis/', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">-->	
<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}hoteis/editar">
	
	<fieldset>
		<legend>Dados do registro</legend>
			<dl>
				<dt>
					<label>Raz&atilde;o Social</label>
				</dt>
				<dd>
					<input type="text" name="txt_razaoSocial " id="txt_razaoSocial " value="{view}$dados_contatos.0.txt_razaoSocial{/view}" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_razaoSocial " class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Nome Fantasia</label>
				</dt>
				<dd>
					<input type="text" name="txt_nomeFantasia " id="txt_nomeFantasia " value="{view}$dados_contatos.0.txt_nomeFantasia{/view}" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_nomeFantasia " class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>CNPJ</label>
				</dt>
				<dd>
					<input type="text" name="num_cnpj " id="num_cnpj " maxlength="18"	onkeyup="mascara(this,soCnpj);" value="{view}$dados_contatos.0.num_cnpj{/view}" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_numero " class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>E-Mail</label>
				</dt>
				<dd>
					<input type="text" name="txt_email " id="txt_email " value="{view}$dados_contatos.0.txt_email{/view}" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_email " class = "class_erro"></div>
				</dd>
				
				
				<dt>
					<label>Cadastro MTUR</label>
				</dt>
				<dd>
					<input type="text" name="txt_cadastroMTUR " id="txt_cadastroMTUR " maxlength="18"	 value="{view}$dados_contatos.0.txt_cadastroMTUR{/view}" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_casdastroMTUR " class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Marca</label>
				</dt>
				<dd>
						<select name="cod_marca " id="cod_marca " />
						<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$dados_marca item=marca{/view}
						<option value="{view}$marca.cod_relacao_idioma{/view}">{view}$marca.txt_nomeMarca{/view}</option>
						{view}/foreach{/view} </select>
						
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_marca " class = "class_erro"></div>
				</dd>
				<dt>
					<label>Endere&ccedil;o</label>
				</dt>
				<dd>
					<input type="text" name="txt_endereco " id="txt_endereco "  value="{view}$dados_contatos.0.txt_endereco{/view}" class="medium" /> 
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_endereco " class = "class_erro"></div>
				</dd>

				<dt>
					<label>CEP</label>
				</dt>
				<dd>
					<input type="text" name="txt_cep " id="txt_cep " maxlength="10" onkeyup="mascara(this,soCep);" value="{view}$dados_contatos.0.txt_cep{/view}" class="small" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_bairro " class = "class_erro"></div>
				</dd>
				<dt>
					<label>Destino</label>
				</dt>
				<dd>
					<select name="cod_destino " id="cod_destino "/>
							<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$dados_destino item=destino{/view}
							<option value="{view}$destino.cod_id{/view}">{view}$destino.txt_destinos{/view}</option>
							{view}/foreach{/view} 
					</select>
					
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_destino " class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Bairro</label>
				</dt>
				<dd>
					<input type="text" name="txt_bairro " id="txt_bairro " onkeyup="mascara(this,soLetras);" value="{view}$dados_contatos.0.txt_bairro{/view}" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_bairro " class ="class_erro"></div>
				</dd>
			</dl>
		</fieldset>

		<fieldset>
			<legend>Dados para Google Maps</legend>
			<dl>
				<dt>
					<label>Latitude</label>
				</dt>
				<dd>
					<input type="text" name="cod_latitude " id="cod_latitude " maxlength="255" value="{view}$dados_contatos.0.cod_latitude{/view}" class="small" /> 
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_latitude " class = "class_erro"></div>
				</dd>

				<dt>
					<label>Longitude</label>
				</dt>

				<dd>
					<input type="text" name="cod_longitude " id="cod_longitude"	maxlength="255" value="{view}$dados_contatos.0.cod_longitude{/view}" class="small" /> 
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_longitude " class = "class_erro"></div>
				</dd>
			</dl>
		</fieldset>
	
	<fieldset>
			<legend> Imagens:</legend>
			<dl>
				<dt>
					<label>Capa</label>
				</dt>
				<dd>
						<!-- INICIO DO HTML DO PLUGIN -->
						<div id="imagem_cropada_ftp1" name="imagem_cropada_ftp1"></div>	  
						<button  type="button" id="deletar1" name="deletar">Deletar imagem atual</button>
						<button  type="button" id="editar1" name="editar_imagem" >Editar imagem</button>
						<button  type="button" id="trocar1" name="trocar_imagem" >Trocar Imagem</button>						 
						<button  type="button" id="upload_link1">Escolher imagem</button>
						<div id="todo_conteudo1">
						
							<input type="hidden" name="nome_img1" id="nome_img1" value='{view}$dados_contatos.0.img_capa_original{/view}'  />
							<input type="hidden" name="nome_img_cropada1" id="nome_img_cropada1" value='{view}$dados_contatos.0.img_capa_cropada{/view}'  /> 						
							<div id="upload_status1" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
					
							<div id="uploaded_image1"></div>
							<div id="thumbnail_form1" style="display: none;">
								<input type="hidden" name="x1" value="" id="x11" />
								<input type="hidden" name="y1" value="" id="y11" />
								<input type="hidden" name="x2" value="" id="x21" />
								<input type="hidden" name="y2" value="" id="y21" />
								<input type="hidden" name="w" value="" id="w1" />
								<input type="hidden" name="h" value="" id="h1" />
								<button type="button" name="save_thumb1" id="save_thumb1" >Salvar</button>
								<input type="hidden" name="flag" id="flag" value="edicao">
								<input type="hidden" name="id_idioma1" id="id_idioma1" value="1">
								<input type="hidden" value="1" id="1">
								<input type="hidden" value="{view}$dados_contatos.0.cod_relacao_idioma{/view}" id="id1" name="id1" />
							</div>
								
						</div>
						<!-- FIM DO HTML DO PLUGIN -->
				
				</dd>
				
				<dt>
					<label>Capa 2</label>
				</dt>
				
					<dd>
					<!-- INICIO DO HTML DO PLUGIN -->
						<div id="imagem_cropada_ftp2" name="imagem_cropada_ftp2"></div>
						  
						<button  type="button" id="deletar2" name="deletar">Deletar imagem atual</button>
						<button  type="button" id="editar2" name="editar_imagem" >Editar imagem</button>
						<button  type="button" id="trocar2" name="trocar_imagem" >Trocar Imagem</button>						 
						<button  type="button" id="upload_link2">Escolher imagem</button>
						<div id="todo_conteudo2">
						
							<input type="hidden" name="nome_img2" id="nome_img2" value='{view}$dados_contatos.0.img_capa2_original{/view}'  />
							<input type="hidden" name="nome_img_cropada2" id="nome_img_cropada2" value='{view}$dados_contatos.0.img_capa2_cropada{/view}'  /> 						
							<div id="upload_status2" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
					
							<div id="uploaded_image2"></div>
							<div id="thumbnail_form2" style="display: none;">
								<input type="hidden" name="x1" value="" id="x12" />
								<input type="hidden" name="y1" value="" id="y12" />
								<input type="hidden" name="x2" value="" id="x22" />
								<input type="hidden" name="y2" value="" id="y22" />
								<input type="hidden" name="w" value="" id="w2" />
								<input type="hidden" name="h" value="" id="h2" />
								<button type="button" name="save_thumb2" id="save_thumb2" >Salvar</button>
								<input type="hidden" name="flag" id="flag" value="edicao">
								<input type="hidden" name="id_idioma2" id="id_idioma2" value="2">
								<input type="hidden" value="2" id="2">
								<input type="hidden" value="{view}$dados_contatos.0.cod_relacao_idioma{/view}" id="id2" name="id2" />
							</div>
								
						</div>
						<!-- FIM DO HTML DO PLUGIN -->
	
					</dd>
				</dl>
				</fieldset>
	
		
	{view}foreach from=$dados_contatos item=hoteis name=dad{/view}	
	<fieldset>	
	<legend>{view}$hoteis.txt_idioma{/view}</legend>
		
				<fieldset>
					<legend>Contatos</legend>
					
					<dt>
						<label>Telefone</label>
					</dt>
					<dd>
						<input type="text" name="txt_telefone{view}$smarty.foreach.dad.iteration{/view}" id="txt_telefone{view}$smarty.foreach.dad.iteration{/view}"
						onkeyup="mascara(this,soTelefone);" maxlength="14" class="small" value = "{view}$hoteis.txt_telefone{/view}" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_telefone{view}$smarty.foreach.dad.iteration{/view}" class ="class_erro"></div>
					</dd>
			
					<dt>
						<label>Video</label>
					</dt>
					<dd>
						<input type="text" name="vid_video{view}$smarty.foreach.dad.iteration{/view}" id="vid_video{view}$smarty.foreach.dad.iteration{/view}" class="medium" 
						value = "{view}$hoteis.vid_video{/view}"/>
					
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_video{view}$smarty.foreach.dad.iteration{/view}" class ="class_erro"></div>
					
					</dd>
			
					<dt>
					<label>Mais Informações sobre o Hotel</label>
					</dt>
					<dd>
					<textarea cols=100 ROWS=2 name="txt_info{view}$smarty.foreach.dad.iteration{/view}"id="txt_info{view}$smarty.foreach.dad.iteration{/view}">{view}$hoteis.txt_info{/view}</textarea>
					
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_informacao{view}$smarty.foreach.dad.iteration{/view}" class ="class_erro"></div>
					
					</dd>
					<input type="hidden" value="{view}$hoteis.cod_idioma{/view}" name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}"/>
				
				</fieldset>	
			<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}"	value="{view}$hoteis.cod_id{/view}"> 
	</fieldset>
			
		{view}/foreach{/view}
	
		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}hoteis/detalhes/cod_id/{view}$hoteis.cod_id{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}