{view}include file="{view}$HEAD{/view}"{/view}

<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/lib_plugin_crop.js"></script>
<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}ogrupo/imagem";
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
	<li><a class="default-tab" href="#" rel="tooltip" rel="tooltip"	title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
	<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}ogrupo')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>
<div class="tab default-tab" id="tab0">
	<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}ogrupo/incluir', 'frm_contatos','{view}$URL_DEFAULT{/view}ogrupo', new Array('{view}$textos_layout[59]{/view}', '{view}$textos_layout[1]{/view}'), 'class_erro', 'btn_enviar')">
	<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}ogrupo/incluir">-->

		{view}foreach from=$idiomas item=idioma name=dad{/view}
		<fieldset>
			<legend>
				<strong>{view}$idioma.txt_idioma{/view}</strong>
			</legend>
			<fieldset>
				<legend>Dados cadastrais</legend>

				<dl>
					<dt>
						<label>Nome Marca</label>
					</dt>
					<dd>
						<input type="text" name="txt_nomeMarca{view}$smarty.foreach.dad.iteration{/view}" id="txt_nomeMarca{view}$smarty.foreach.dad.iteration{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_marca{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>

					<dt>
						<label>Telefone Vendas</label>
					</dt>
					<dd>
						<input type="text"	name="txt_tel_vendas{view}$smarty.foreach.dad.iteration{/view}" maxlength="14"	onkeyup="mascara(this,soTelefone);"  id="txt_tel_vendas{view}$smarty.foreach.dad.iteration{/view}" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_telefone{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
					<dt>
						<label>Link</label>
					</dt>
					<dd>
						<input type="text"	name="txt_link{view}$smarty.foreach.dad.iteration{/view}" id="txt_link{view}$smarty.foreach.dad.iteration{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_link{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
				
					<dt>
						<label>Ordem</label>
					</dt>
					<dd>
						<input type="text"	name="txt_ordem{view}$smarty.foreach.dad.iteration{/view}" onkeyup="mascara(this,soNumero);" maxlength="2" id="txt_ordem{view}$smarty.foreach.dad.iteration{/view}" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_ordem{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
				
					<dt>
						<label>Video</label>
					</dt>
					<dd>
						<input type="text"	name="arq_video_marca{view}$smarty.foreach.dad.iteration{/view}" id="arq_video_marca{view}$smarty.foreach.dad.iteration{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_video{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
					
				<dl>
					<dt>
						<label>Imagem</label>
					</dt>
					<dd>
						<!--  COMEÇO DO HTML DO PLUGIN -->
						
						<input type="hidden" name="nome_img{view}$smarty.foreach.dad.iteration{/view}" value="" id="nome_img{view}$smarty.foreach.dad.iteration{/view}" /> 
						<input type="hidden" name="nome_img_cropada{view}$smarty.foreach.dad.iteration{/view}" value="" id="nome_img_cropada{view}$smarty.foreach.dad.iteration{/view}" /> 
						<div id="upload_status{view}$smarty.foreach.dad.iteration{/view}" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
						<p>
							<!--  <a id="upload_link{view}$smarty.foreach.dad.iteration{/view}" style="font-size: 32px; color: black;" href="#">Imagem </a>-->
							<button type="button" id="upload_link{view}$smarty.foreach.dad.iteration{/view}">Escolher Imagem</button>
						</p>
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
								<input type="hidden" name="flag" id="flag" value="inclusao">
								<button type="button" name="save_thumb{view}$smarty.foreach.dad.iteration{/view}" id="save_thumb{view}$smarty.foreach.dad.iteration{/view}" > Salvar </button>
								
						</div>
						<!--  FIM DO HTML DO PLUGIN -->
						
						
						
						
						
						<p>Tamanho recomendado de imagem: 200px de largura e altura
							proporcional ao original do arquivo.</p>
						<p>Tamanho m&aacute;ximo recomendado de arquivo: 200kb.</p>
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_foto{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
				</dl>
					<dt>
						<label>Descrição</label>
					</dt>
					<dd>
						<textarea cols=100 ROWS=2 name="txt_texto_marca{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto_marca{view}$smarty.foreach.dad.iteration{/view}"></textarea>
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_informacao{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
				
				</dl>
				<input type="hidden" value="{view}$idioma.cod_id{/view}" name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" />

			</fieldset>
		</fieldset>
		{view}/foreach{/view}
		</fieldset>
		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[59]{/view}
		</button>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}