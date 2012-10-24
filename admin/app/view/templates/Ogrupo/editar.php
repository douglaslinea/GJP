 {view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/lib_plugin_crop.js"></script>

<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}ogrupo/imagem";
var url_padrao = "{view}$URL_DEFAULT{/view}";
var arq_din = "{view}$ARQ_DIN{/view}";
var acao_deletar = "{view}$URL_DEFAULT{/view}ogrupo/deletimg";
var acao_edicao_incluir = "{view}$URL_DEFAULT{/view}ogrupo/inserirImagem";

var altura_crop = '{view}$altura_crop{/view}';
var largura_crop = '{view}$largura_crop{/view}';

var altura_cropada = '{view}$altura_cropada{/view}';
var largura_cropada =  '{view}$largura_cropada{/view}';

</script>


<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a
		onclick="document.location.replace('{view}$URL_DEFAULT{/view}ogrupo/incluir')"	href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a
		onclick="document.location.replace('{view}$URL_DEFAULT{/view}ogrupo')"	href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a>
	</li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">

	<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}ogrupo/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}ogrupo/', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--	<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}ogrupo/editar">-->
		{view}foreach from=$dados_grupo item=grupo name=dad{/view}
		<fieldset>
			<legend>{view}$grupo.WebsiteIdiomas.txt_idioma{/view}</legend>
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Marca</label>
					</dt>
					<dd>
						<input type="text" name="txt_nomeMarca{view}$smarty.foreach.dad.iteration{/view}" id="txt_nomeMarca{view}$smarty.foreach.dad.iteration{/view}"	value="{view}$grupo.txt_nomeMarca{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_marca{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>
					<dt>
						<label>Telefone</label>
					</dt>
					<dd>
						<input type="text" name="txt_tel_vendas{view}$smarty.foreach.dad.iteration{/view}"	id="txt_tel_vendas{view}$smarty.foreach.dad.iteration{/view}" onkeyup="mascara(this,soTelefone);"	value="{view}$grupo.txt_tel_vendas{/view}" maxlength="14" class="small" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_telefone{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>

					<dt>
						<label>Link</label>
					</dt>
					<dd>
						<input type="text" name="txt_link{view}$smarty.foreach.dad.iteration{/view}" id="txt_link{view}$smarty.foreach.dad.iteration{/view}"	value="{view}$grupo.txt_link{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_link{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
					</dd>

					<dt>
						<label>Video</label>
					</dt>
					<dd>
						<input type="text"	name="arq_video_marca{view}$smarty.foreach.dad.iteration{/view}" id="arq_video_marca{view}$smarty.foreach.dad.iteration{/view}"	value="{view}$grupo.arq_video_marca{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_video{view}$smarty.foreach.dad.iteration{/view}"	class="class_erro"></div>
					</dd>
					
					<BR/>	
					<dt>
					<label>Imagem</label>
					</dt>	
						<dd>			
						<!-- INICIO DO HTML DO PLUGIN -->
						<div id="imagem_cropada_ftp{view}$smarty.foreach.dad.iteration{/view}" name="imagem_cropada_ftp{view}$smarty.foreach.dad.iteration{/view}"></div>
						  
						<button  type="button" id="deletar{view}$smarty.foreach.dad.iteration{/view}" name="deletar">Deletar imagem atual</button>
						<button  type="button" id="editar{view}$smarty.foreach.dad.iteration{/view}" name="editar_imagem" >Editar imagem</button>
						<button  type="button" id="trocar{view}$smarty.foreach.dad.iteration{/view}" name="trocar_imagem" >Trocar Imagem</button>						 
						<button  type="button" id="upload_link{view}$smarty.foreach.dad.iteration{/view}">Escolher imagem</button>
						<div id="todo_conteudo{view}$smarty.foreach.dad.iteration{/view}">
						
							<input type="hidden" name="nome_img{view}$smarty.foreach.dad.iteration{/view}" id="nome_img{view}$smarty.foreach.dad.iteration{/view}" value='{view}$grupo.img_logo_original{/view}'  />
							<input type="hidden" name="nome_img_cropada{view}$smarty.foreach.dad.iteration{/view}" id="nome_img_cropada{view}$smarty.foreach.dad.iteration{/view}" value="{view}$grupo.img_logo_cropada{/view}"  /> 						
							<div id="upload_status{view}$smarty.foreach.dad.iteration{/view}" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
					
							<div id="uploaded_image{view}$smarty.foreach.dad.iteration{/view}"></div>
							<div id="thumbnail_form{view}$smarty.foreach.dad.iteration{/view}" style="display: none;">
								<input type="hidden" name="x1" value="" id="x1{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="y1" value="" id="y1{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="x2" value="" id="x2{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="y2" value="" id="y2{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="w" value="" id="w{view}$smarty.foreach.dad.iteration{/view}" />
								<input type="hidden" name="h" value="" id="h{view}$smarty.foreach.dad.iteration{/view}" />
								<button type="button" name="save_thumb{view}$smarty.foreach.dad.iteration{/view}" id="save_thumb{view}$smarty.foreach.dad.iteration{/view}" >Salvar</button>
								<input type="hidden" name="flag" id="flag" value="edicao">
								<input type="hidden" name="id_idioma{view}$smarty.foreach.dad.iteration{/view}" id="id_idioma{view}$smarty.foreach.dad.iteration{/view}" value="{view}$smarty.foreach.dad.iteration{/view}">
								<input type="hidden" value="{view}$smarty.foreach.dad.iteration{/view}" id="{view}$smarty.foreach.dad.iteration{/view}">
								<input type="hidden" value="{view}$grupo.cod_id{/view}" id="id{view}$smarty.foreach.dad.iteration{/view}" name="id{view}$smarty.foreach.dad.iteration{/view}" />
							</div>
								
						</div>
						<!-- FIM DO HTML DO PLUGIN -->
						</dd>	
						
					<BR/>
					<dt>
						<label>Informação sobre a Marca</label>
					</dt>
					<dd>
					<textarea cols=100 ROWS=2 name="txt_texto_marca{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto_marca{view}$smarty.foreach.dad.iteration{/view}">{view}$grupo.txt_texto_marca{/view}</textarea>
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_informacao{view}$smarty.foreach.dad.iteration{/view}" class="class_erro"></div>
										
					</dd>
										
					<input type="hidden" value="{view}$grupo.cod_idioma{/view}"	name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}"	id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" />
			
			</fieldset>
			</dl>
		</fieldset>
		<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}" value="{view}$grupo.cod_id{/view}"> {view}/foreach{/view}

		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}ogrupo/detalhes/id_relacao_idioma/{view}$grupo.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}