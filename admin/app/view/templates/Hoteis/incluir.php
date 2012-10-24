{view}include file="{view}$HEAD{/view}"{/view}

<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/lib_plugin_crop.js"></script>
<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}hoteis/imagem";
var url_padrao = "{view}$URL_DEFAULT{/view}";

var altura_crop = '{view}$altura_crop{/view}';
var largura_crop = '{view}$largura_crop{/view}';

var altura_cropada = '{view}$altura_cropada{/view}';
var largura_cropada =  '{view}$largura_cropada{/view}';
</script>


<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a class="default-tab" href="#" rel="tooltip" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
	<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}hoteis')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>

</ul>
</nav> </header>
<div
	class="tab default-tab" id="tab0">
	<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}hoteis/incluir', 'frm_contatos','{view}$URL_DEFAULT{/view}hoteis', new Array('{view}$textos_layout[59]{/view}', '{view}$textos_layout[1]{/view}'), 'class_erro', 'btn_enviar')">
	<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}hoteis/incluir">-->
		
			<fieldset>
				<legend>Dados cadastrais</legend>
				<dl>
					<dt>
						<label>Raz&atilde;o Social</label>
					</dt>

					<dd>
						<input type="text" name="txt_razaoSocial" id="txt_razaoSocial"  class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_razaoSocial" class = "class_erro"></div>
					</dd>

					<dt>
						<label>Nome Fantasia</label>
					</dt>
					<dd>
						<input type="text" name="txt_nomeFantasia" id="txt_nomeFantasia"  class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_nomeFantasia" class = "class_erro"></div>
					</dd>

					<dt>
						<label>E-mail</label>
					</dt>
					<dd>
						<input type="text" name="txt_email" id="txt_email" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_email" class = "class_erro"></div>
					</dd>

					<dt>
						<label>Evento</label>
					</dt>
					<dd>
						<input type="radio" name="char_evento" id="char_evento" value = "0" checked/> Social
						&ensp; <input type="radio" name="char_evento" id="char_evento" value ="1" />Corporativo
					</dd>

					<dt>
						<label>CNPJ</label>
					</dt>
					<dd>
						<input type="text" name="num_cnpj" id="num_cnpj" maxlength="18" onkeyup="mascara(this,soCnpj);" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_numero" class = "class_erro"></div>
					</dd>

					<dt>
						<label>Cadastro MTUR</label>
					</dt>
					<dd>
						<input type="text" name="txt_cadastroMTUR" id="txt_cadastroMTUR" maxlength="18" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_casdastroMTUR" class = "class_erro"></div>
					</dd>

					<dt>
						<label>Marca</label>
					</dt>
					<dd>
						<select name="cod_marca" id="cod_marca" />
						<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$dados_marca item=marca{/view}
						<option value="{view}$marca.cod_relacao_idioma{/view}">{view}$marca.txt_nomeMarca{/view}</option>
						{view}/foreach{/view} </select>
						
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_marca" class = "class_erro"></div>
					</dd>

					<dt>
						<label>Endere&ccedil;o</label>
					</dt>
					<dd>
						<input type="text" name="txt_endereco" id="txt_endereco" class="medium" /> 
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_endereco" class = "class_erro"></div>
					</dd>

					<dt>
						<label>CEP</label>
					</dt>
					<dd>
						<input type="text" name="txt_cep" id="txt_cep" maxlength="10"	onkeyup="mascara(this,soCep);" class="small" /> 
						<p>{view}$textos_layout[47]{/view}</p>							
						<div id="msg_erro_cep" class = "class_erro"></div>
					</dd>

					<dt>
						<label>Bairro</label>
					</dt>
					<dd>
						<input type="text" name="txt_bairro" id="txt_bairro" onkeyup="mascara(this,soLetras);" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_bairro" class = "class_erro"></div>
					</dd>
					
					<dt>
					<label>Destino</label>
					</dt>
					<dd>
					<select name="cod_destino" id="cod_destino"/>
					<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$dados_destino item=destino{/view}
					<option value="{view}$destino.cod_id{/view}">{view}$destino.txt_destinos{/view}</option>
					{view}/foreach{/view} </select>
					
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_destino" class = "class_erro"></div>
					</dd>
				
		</dl>

			<fieldset>
				<legend>Dados para Google Maps</legend>
				<dl>
					<dt>
						<label>Latitude</label>
					</dt>
					<dd>
						<input type="text" name="cod_latitude" id="cod_latitude" maxlength="255" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_latitude" class = "class_erro"></div>
					</dd>
					<dt>
						<label>Longitude</label>
					</dt>
					<dd>
						<input type="text" name="cod_longitude" id="cod_longitude"	maxlength="255" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_longitude" class = "class_erro"></div>
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

						<!--  COMEÇO DO HTML DO PLUGIN -->

						<input type="hidden" name="nome_img1" value="" id="nome_img1" /> 
						<input type="hidden" name="nome_img_cropada1" value="" id="nome_img_cropada1" /> 

						<div id="upload_status1" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
						<p>
							
						<button type="button" id="upload_link1">Escolher Imagem</button>
						</p>
						<span id="loader1" style="display: none;">
							<img src="loader.gif" alt="Carregando..." />
						</span>
						<span id="progress1"></span> <br />
						<div id="uploaded_image1"></div>
						<div id="thumbnail_form1" style="display: none;">
								<input type="hidden" name="x1" value="" id="x11" />
								<input type="hidden" name="y1" value="" id="y11" />
								<input type="hidden" name="x2" value="" id="x21" />
								<input type="hidden" name="y2" value="" id="y21" />
								<input type="hidden" name="w" value="" id="w1" />
								<input type="hidden" name="h" value="" id="h1" />
								<input type="hidden" name="flag" id="flag" value="inclusao">

						<button type="button" name="save_thumb1" id="save_thumb1" > Salvar </button>
								
						</div>
						<!--  FIM DO HTML DO PLUGIN -->
			
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_imagem" class = "class_erro"></div>
						
					<p>Tamanho recomendado de imagem: 200px de largura e altura	proporcional ao original do arquivo.</p>
					<p>Tamanho m&aacute;ximo recomendado de arquivo: 200kb.</p>
				</dd>
			</dl>

			<dl>
				<dt>
					<label>Capa 2</label>
				</dt>
				<dd>
					<!--  COMEÇO DO HTML DO PLUGIN -->

						<input type="hidden" name="nome_img2" value="" id="nome_img2" /> 
						<input type="hidden" name="nome_img_cropada2" value="" id="nome_img_cropada2" /> 

						<div id="upload_status2" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
						<p>
							
						<button type="button" id="upload_link2">Escolher Imagem</button>
						</p>
						<span id="loader2" style="display: none;">
							<img src="loader.gif" alt="Carregando..." />
						</span>
						<span id="progress2"></span> <br />
						<div id="uploaded_image2"></div>
						<div id="thumbnail_form2" style="display: none;">
								<input type="hidden" name="x1" value="" id="x12" />
								<input type="hidden" name="y1" value="" id="y12" />
								<input type="hidden" name="x2" value="" id="x22" />
								<input type="hidden" name="y2" value="" id="y22" />
								<input type="hidden" name="w" value="" id="w2" />
								<input type="hidden" name="h" value="" id="h2" />
								<input type="hidden" name="flag" id="flag" value="inclusao">

						<button type="button" name="save_thumb2" id="save_thumb2" > Salvar </button>
								
						</div>
						
						<!--  FIM DO HTML DO PLUGIN -->
					
			

					<p>Tamanho recomendado de imagem: 200px de largura e altura proporcional ao original do arquivo.</p>
					<p>Tamanho m&aacute;ximo recomendado de arquivo: 200kb.</p>
				</dd>
			</dl>
	</fieldset>
	{view}foreach from=$idiomas item=idioma name=idi{/view}
		<fieldset>
			<legend>
				<strong>{view}$idioma.txt_idioma{/view}</strong>
			</legend>
				
				<fieldset>
					<legend>Contatos</legend>
					
					<dt>
						<label>Telefone</label>
					</dt>
					<dd>
						<input type="text" name="txt_telefone{view}$smarty.foreach.idi.iteration{/view}" id="txt_telefone{view}$smarty.foreach.idi.iteration{/view}"
						onkeyup="mascara(this,soTelefone);" maxlength="14" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_telefone{view}$smarty.foreach.idi.iteration{/view}" class = "class_erro"></div>
					</dd>
			
					<dt>
						<label>Video</label>
					</dt>
					<dd>
						<input type="text" name="vid_video{view}$smarty.foreach.idi.iteration{/view}" id="vid_video{view}$smarty.foreach.idi.iteration{/view}" class="medium" />
					
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_video{view}$smarty.foreach.idi.iteration{/view}" class = "class_erro"></div>
					
					</dd>
			
					<dt>
					<label>Mais Informações sobre o Hotel</label>
					</dt>
					<dd>
					<textarea cols=100 ROWS=2 name="txt_info{view}$smarty.foreach.idi.iteration{/view}"id="txt_info{view}$smarty.foreach.idi.iteration{/view}"></textarea>
					
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_informacao{view}$smarty.foreach.idi.iteration{/view}" class = "class_erro"></div>
					
					</dd>
					
					<input type="hidden" value="{view}$idioma.cod_id{/view}" name="cod_idioma{view}$smarty.foreach.idi.iteration{/view}" id="cod_idioma{view}$smarty.foreach.idi.iteration{/view}"/>
					</fieldset>
			</fieldset>
		{view}/foreach{/view}
		</fieldset>
</fieldset>
		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[59]{/view}
		</button>
	</form>

	{view}include file="{view}$FOOTER{/view}"{/view}