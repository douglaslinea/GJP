 {view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/lib_plugin_crop.js"></script>
<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}parceiros/imagem";
var url_padrao = "{view}$URL_DEFAULT{/view}";
var arq_din = "{view}$ARQ_DIN{/view}";
var acao_deletar = "{view}$URL_DEFAULT{/view}parceiros/deletimg";
var acao_edicao_incluir = "{view}$URL_DEFAULT{/view}parceiros/inserirImagem";

var altura_crop = '{view}$altura_crop{/view}';
var largura_crop = '{view}$largura_crop{/view}';

var altura_cropada = '{view}$altura_cropada{/view}';
var largura_cropada =  '{view}$largura_cropada{/view}';

</script>


<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}parceiros/incluir')"	href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}parceiros')"	href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a>
	</li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">

<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}parceiros/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}parceiros/', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}parceiros/editar">-->
			<fieldset>
				<legend>Dados do registro</legend>
			<dl>
				 
			<dt>
				<label>Imagem</label>
			</dt>	 
				 
			<dd>	 
					<!-- INICIO DO HTML DO PLUGIN -->
						<div id="imagem_cropada_ftp1" name="imagem_cropada_ftp1"></div>
						  
						<button  type="button" id="deletar1" name="deletar">Deletar imagem atual</button>
						<button  type="button" id="editar1" name="editar_imagem" >Editar imagem</button>
						<button  type="button" id="trocar1" name="trocar_imagem" >Trocar Imagem</button>						 
						<button  type="button" id="upload_link1">Escolher imagem</button>
						<div id="todo_conteudo1">
						
						<input type="hidden" name="nome_img1" id="nome_img1" value='{view}$dados_parceiros.0.img_capa_original{/view}'  />
						<input type="hidden" name="nome_img_cropada1" id="nome_img_cropada1" value="{view}$dados_parceiros.0.img_capa_cropada{/view}"  /> 						
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
								<input type="hidden" value="{view}$dados_parceiros.0.cod_relacao_idioma{/view}" id="id1" name="id1" />
							</div>
								
						</div>
				<!-- FIM DO HTML DO PLUGIN -->
			<dd>
			</dl>
				 
				</dd>
				
				</fieldset>
		{view}foreach from=$dados_parceiros item=parceiros name=dad{/view}
		<fieldset>
			<legend>{view}$parceiros.WebsiteIdiomas.txt_idioma{/view}</legend>
			
				<dl>
					<dt>
						<label>Titulo</label>
					</dt>
					<dd>
						<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" value="{view}$parceiros.txt_titulo{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_titulo{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
					<dt>
						<label>Apresentação</label>
					</dt>
					<dd>
					<textarea cols=100 ROWS=2 name="txt_apresentacao{view}$smarty.foreach.dad.iteration{/view}" id="txt_apresentacao{view}$smarty.foreach.dad.iteration{/view}"></textarea>
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_texto{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>									
					</dd>
				
					<input type="hidden" value="{view}$parceiros.cod_idioma{/view}"	name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}"	id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" />
			
			</fieldset>
			</dl>
		
		<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}" value="{view}$parceiros.cod_id{/view}">
		 {view}/foreach{/view}
</fieldset>
		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}parceiros/detalhes/id_relacao_idioma/{view}$parceiros.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}