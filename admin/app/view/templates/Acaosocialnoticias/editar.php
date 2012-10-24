{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocialnoticias/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
		<li><a class="default-tab" rel="tooltip" href="#" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}acaosocialnoticias')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}acaosocialnoticias/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}acaosocialnoticias/', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}acaosocialnoticias/editar">		-->
	
	<dt>
			<label>Data de In&iacute;cio da Publica&ccedil;&atilde;o</label>
	</dt>
		<dd>
			<input type="text" name="dat_inicio" id="dat_inicio" class="datepicker small" maxlength="19" onKeyPress="DataHoraMinutoSegundo(event, this)"
			value="{view}$Helper->FormataDataHora($dados_acao.0.dat_inicio,'br'){/view}" />
			<div id="msg_erro_inicio" class="class_erro"></div>
				<p>{view}$textos_layout[47]{/view}</p>
				<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
				<p>Marque a data e hora na qual voc&ecirc; quer que este conte&uacute;do passe a aparecer no website.</p>
		</dd>
	<dt>
			<label>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</label>
	</dt>					
		<dd>
		<input type="text" name="dat_termino" id="dat_termino" class="datepicker small" maxlength="19" onKeyPress="DataHoraMinutoSegundo(event, this)" 
		value="{view}$Helper->FormataDataHora($dados_acao.0.dat_termino,'br'){/view}" />
		<div id="msg_erro_termino" class="class_erro"></div>
			<p>{view}$textos_layout[47]{/view}</p>
			<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
			<p>Marque a data e hora na qual voc&ecirc; quer que este conte&uacute;do deixe aparecer no website.</p>
		</dd>
		<dt>
				<label>Data</label>
		</dt>				
		<dd>
			<input type="text"	name="dat_data" id="dat_data" class="datepicker small" value="{view}$Helper->FormataData($dados_acao.0.dat_data,'br'){/view}" />
					<div id="msg_erro_termino" class="class_erro"></div>
						<p>{view}$textos_layout[47]{/view}</p>
						<p>Formato correto: dd/mm/aaaa.</p>
						<p>Esta &eacute; a data que aparece junto ao conte&uacute;do no	website.</p>
		
		</dd>
		
		
		
		<dt>
		<label>Ação Social</label>
		</dt>
					<dd>
						<select name="cod_acaoSocial" id="cod_acaoSocial" />
						<option value="">--{view}$textos_layout[46]{/view}--</option>
						{view}foreach from=$acaoSocial item=acaoS{/view}
						<option	value="{view}$acaoS.cod_id{/view}" {view}if $dados_acao.0.cod_acao_social == $acaoS.cod_id{/view} selected="selected" {view}/if{/view}>{view}$acaoS.txt_titulo{/view}</option>
						{view}/foreach{/view} </select>
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_hotel" class="class_erro"></div>
					</dd>
		
	{view}foreach from=$dados_acao item=acao name=dad{/view}	
<fieldset>
	<legend>{view}$acao.WebsiteIdiomas.txt_idioma{/view}</legend>
			<dl>			
				<dt>
					<label>Publicado</label>
				</dt>
					<dd>
						<input type="radio" name="cod_publicado{view}$smarty.foreach.dad.iteration{/view}" id="radio" value="1" {view}if $acao.cod_publicado==1{/view}checked="checked" {view}/if{/view} />Sim 
                       &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="cod_publicado{view}$smarty.foreach.dad.iteration{/view}" id="radio2" value="0" {view}if $acao.cod_publicado== 0{/view}checked="checked" {view}/if{/view} /> N&atilde;o
						<div id="msg_erro_publicado" class="class_erro"></div>
						<p> Ao escolher "sim", o conte&uacute;do que est&aacute; sendo inclu&iacute;do passa a aparecer no website depois de salvo.<br />
							Ao escolher "n&atilde;o", o conte&uacute;do &eacute; salvo,
							por&eacute;m segue sem aparecer no website.
						</p>
				</dd>
				
				<dt>
					<label>Titulo</label>
				</dt>
				<dd>
					<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" value="{view}$acao.txt_titulo{/view}"class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_titulo{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>				
				<dt>
				<dt>
					<label>Notícia</label>
				</dt>
				<dd>
					<textarea cols=100 ROWS=2 name="txt_texto{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto{view}$smarty.foreach.dad.iteration{/view}">{view}$acao.txt_texto{/view}</textarea>	
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_descricao{view}$smarty.foreach.dad.iteration{/view}" class = "class_erro"></div>
				</dd>	
			</dl>
		<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}"	value="{view}$acao.cod_id{/view}"> 
	</fieldset>
	
		{view}/foreach{/view}

		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[50]{/view}
		</button>
		&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}acaosocialnoticias/detalhes/id_relacao_idioma/{view}$acao.cod_relacao_idioma{/view}" />Cancelar</a>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}
				