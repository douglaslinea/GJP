{view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/lib_plugin_crop.js"></script>
<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}parceiros/imagem";
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
	<li class="inativo">{view}$textos_layout[42]{/view}</a></li>
</ul>
</nav> </header>
<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}parceiros/incluir', 'frm_contatos','{view}$URL_DEFAULT{/view}parceiros', new Array('{view}$textos_layout[59]{/view}', '{view}$textos_layout[1]{/view}'), 'class_erro', 'btn_enviar')">
<!--			<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}parceiros/incluir">-->

		<fieldset>
			<legend>Dados cadastrais</legend>
			<fieldset>
				<legend> Imagem:</legend>
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

						<button type="button" name="save_thumb1" id="save_thumb1">Salvar</button>
								
						</div>
						<!--  FIM DO HTML DO PLUGIN -->
						
						
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_img" class="class_erro"></div>
					
						<p>Tamanho recomendado de imagem: 200px de largura e altura	proporcional ao original do arquivo.</p>
						<p>Tamanho m&aacute;ximo recomendado de arquivo: 200kb.</p>
					</dd>
				</dl>
			</fieldset>
			{view}foreach from=$idiomas item=idioma name=dad{/view}
			<fieldset>
				<legend>
					<strong>{view}$idioma.txt_idioma{/view}</strong>
				</legend>
				<dl>
					<dt>
						<label>Titulo</label>
					</dt>
					<dd>
						<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_titulo{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
					<dt>
						<label>Apresentação</label>
					</dt>
					<dd>
						<textarea cols=100 ROWS=2 name="txt_apresentacao{view}$smarty.foreach.dad.iteration{/view}"	id="txt_apresentacao{view}$smarty.foreach.dad.iteration{/view}"></textarea>
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_texto{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
				</dl>
				<input type="hidden" value="{view}$idioma.cod_id{/view}" name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" />
			</fieldset>
			{view}/foreach{/view}
			</dl>
		</fieldset>

		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[59]{/view}
		</button>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}