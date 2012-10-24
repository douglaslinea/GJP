  {view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/imagem1.js"></script>
<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}noticias/imagem";
var url_padrao = "{view}$URL_DEFAULT{/view}";

var altura_crop = '{view}$altura_crop{/view}';
var largura_crop = '{view}$largura_crop{/view}';

</script>

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a
		onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias');"
		href="" rel="tooltip" title="{view}$textos_layout[51]{/view}">{view}$textos_layout[51]{/view}</a>
	</li>
	<li class="inativo">{view}$textos_layout[41]{/view}</li>
	<li><a class="default-tab"
		onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias/incluir');"
		href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li class="inativo">{view}$textos_layout[42]{/view}</li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
	<form name="frm_conteudo" id="frm_conteudo" method="post" enctype="multipart/form-data" action='{view}$URL_DEFAULT{/view}noticias/incluir'>
	<!--   <form name="frm_conteudo" id="frm_conteudo" method="post" enctype="multipart/form-data" action="javascript:acao('{view}$URL_DEFAULT{/view}noticias/incluir', 'frm_conteudo', '{view}$URL_DEFAULT{/view}noticias', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')"> -->
		{view}foreach from=$idiomas item=idioma name=idi{/view}
		<fieldset>
			<legend>
				<strong>{view}$idioma.txt_idioma{/view}</strong>
			</legend>
			<fieldset>
				<legend>Dados de publica&ccedil;&atilde;o</legend>
				<dl>
					<dt>
						<label>Publicado</label>
					</dt>
					<dd>
						<input type="radio"
							name="cod_publicado{view}$smarty.foreach.idi.iteration{/view}"
							id="radio" value="1" checked="checked" /> Sim
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
							name="cod_publicado{view}$smarty.foreach.idi.iteration{/view}"
							id="radio2" value="0" /> N&atilde;o <span
							id="msg_cod_publicado{view}$smarty.foreach.idi.iteration{/view}"></span>
						<p>
							Ao escolher "sim", o conte&uacute;do que est&aacute; sendo
							inclu&iacute;do passa a aparecer no website depois de salvo.<br />
							Ao escolher "n&atilde;o", o conte&uacute;do &eacute; salvo,
							por&eacute;m segue sem aparecer no website.
						</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>Data de In&iacute;cio da Publica&ccedil;&atilde;o</label>
					</dt>

					<dd>
						<input type="text"
							name="dat_inicio_publicacao{view}$smarty.foreach.idi.iteration{/view}"
							id="dat_inicio_publicacao{view}$smarty.foreach.idi.iteration{/view}"
							class="datepicker small" maxlength="19"
							value="{view}$data_hora_atual{/view}"
							onKeyPress="DataHoraMinutoSegundo(event, this)" /> <span
							id="msg_dat_inicio_publicacao{view}$smarty.foreach.idi.iteration{/view}"></span>
						<p>{view}$textos_layout[47]{/view}</p>
						<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
						<p>Marque a data e hora na qual voc&ecirc; quer que este
							conte&uacute;do passe a aparecer no website.</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</label>
					</dt>

					<dd>
						<input type="text"
							name="dat_termino_publicacao{view}$smarty.foreach.idi.iteration{/view}"
							id="dat_termino_publicacao{view}$smarty.foreach.idi.iteration{/view}"
							class="datepicker small" maxlength="19"
							value="{view}$data_hora_termino{/view}"
							onKeyPress="DataHoraMinutoSegundo(event, this)" /> <span
							id="msg_dat_termino_publicacao{view}$smarty.foreach.idi.iteration{/view}"></span>
						<p>{view}$textos_layout[47]{/view}</p>
						<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
						<p>Marque a data e hora na qual voc&ecirc; quer que este
							conte&uacute;do deixe aparecer no website.</p>
					</dd>
				</dl>
			</fieldset>

			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Data</label>
					</dt>

					<dd>
						<input type="text"
							name="dat_data{view}$smarty.foreach.idi.iteration{/view}"
							id="dat_data{view}$smarty.foreach.idi.iteration{/view}"
							class="datepicker small" /> <span
							id="msg_dat_data{view}$smarty.foreach.idi.iteration{/view}"></span>
						<p>{view}$textos_layout[47]{/view}</p>
						<p>Formato correto: dd/mm/aaaa.</p>
						<p>Esta &eacute; a data que aparece junto ao conte&uacute;do no
							website.</p>
					</dd>
				</dl>
				
				<dl>
					<dt>
						<label>Imagem</label>
					</dt>
					<dd>
						<!--  COMEÇO DO HTML DO PLUGIN -->
						
						<input type="text" name="nome_img{view}$smarty.foreach.idi.iteration{/view}" value="" id="nome_img{view}$smarty.foreach.idi.iteration{/view}" /> 
						<input type="text" name="nome_img_cropada{view}$smarty.foreach.idi.iteration{/view}" value="" id="nome_img_cropada{view}$smarty.foreach.idi.iteration{/view}" /> 
						<div id="upload_status{view}$smarty.foreach.idi.iteration{/view}" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
						<p>
							<a id="upload_link{view}$smarty.foreach.idi.iteration{/view}" style="font-size: 32px; color: black;" href="#">Imagem </a>
						</p>
						<span id="loader{view}$smarty.foreach.idi.iteration{/view}" style="display: none;">
							<img src="loader.gif" alt="Carregando..." />
						</span>
						<span id="progress{view}$smarty.foreach.idi.iteration{/view}"></span> <br />
						<div id="uploaded_image{view}$smarty.foreach.idi.iteration{/view}"></div>
						<div id="thumbnail_form{view}$smarty.foreach.idi.iteration{/view}" style="display: none;">
								<input type="hidden" name="x1" value="" id="x1{view}$smarty.foreach.idi.iteration{/view}" />
								<input type="hidden" name="y1" value="" id="y1{view}$smarty.foreach.idi.iteration{/view}" />
								<input type="hidden" name="x2" value="" id="x2{view}$smarty.foreach.idi.iteration{/view}" />
								<input type="hidden" name="y2" value="" id="y2{view}$smarty.foreach.idi.iteration{/view}" />
								<input type="hidden" name="w" value="" id="w{view}$smarty.foreach.idi.iteration{/view}" />
								<input type="hidden" name="h" value="" id="h{view}$smarty.foreach.idi.iteration{/view}" />
								<input type="hidden" name="flag{view}$smarty.foreach.dad.iteration{/view}" id="flag{view}$smarty.foreach.dad.iteration{/view}" value="inclusao{view}$smarty.foreach.dad.iteration{/view}">
								<input type="button"  name="save_thumb{view}$smarty.foreach.idi.iteration{/view}" value="Save Thumbnail" id="save_thumb{view}$smarty.foreach.idi.iteration{/view}" onclick="acao{view}$smarty.foreach.idi.iteration{/view}() ;"/>
								
						</div>

							<!--  FIM DO HTML DO PLUGIN -->


						<p>Tamanho recomendado de imagem: 200px de largura e altura
							proporcional ao original do arquivo.</p>
						<p>Tamanho m&aacute;ximo recomendado de arquivo: 200kb.</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>T&iacute;tulo</label>
					</dt>

					<dd>
						<input type="text"
							name="txt_titulo{view}$smarty.foreach.idi.iteration{/view}"
							id="txt_titulo{view}$smarty.foreach.idi.iteration{/view}"
							maxlength="255" class="medium" /> <span
							id="msg_txt_titulo{view}$smarty.foreach.idi.iteration{/view}"></span>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>Texto</label>
					</dt>

					<dd>
						<textarea
							name="txt_texto{view}$smarty.foreach.idi.iteration{/view}"
							id="txt_texto{view}$smarty.foreach.idi.iteration{/view}"
							class="wysiwyg large"></textarea>
						<span id="msg_txt_texto{view}$smarty.foreach.idi.iteration{/view}"></span>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>
				</dl>
				<input type="hidden"
					name="cod_idioma{view}$smarty.foreach.idi.iteration{/view}"
					id="{view}$smarty.foreach.idi.iteration{/view}"
					value="{view}$idioma.cod_id{/view}">
			</fieldset>
		</fieldset>
		{view}/foreach{/view}


		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[43]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}noticias" />Cancelar</a>
	</form>

</div>

{view}include file="{view}$FOOTER{/view}"{/view}
