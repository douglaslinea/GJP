 {view}include file="{view}$HEAD{/view}"{/view}
<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a class="default-tab" href="#" rel="tooltip" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
	<li class="inativo">{view}$textos_layout[42]{/view}</a></li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}acaosocialnoticias/incluir', 'frm_contatos','{view}$URL_DEFAULT{/view}acaosocialnoticias', new Array('{view}$textos_layout[59]{/view}', '{view}$textos_layout[1]{/view}'), 'class_erro', 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}acaosocialnoticias/incluir">-->
		
	<fieldset>
		<legend>Dados Cadastrais</legend>
				<dl>
					<dt>
						<label>Data de In&iacute;cio da Publica&ccedil;&atilde;o</label>
					</dt>

					<dd>
						<input type="text" name="dat_inicio" id="dat_inicio" class="datepicker small" maxlength="19"	value="{view}$data_hora_atual{/view}"	
						onKeyPress="DataHoraMinutoSegundo(event, this)" /> 
							
						<div id="msg_erro_inicio" class="class_erro"></div>
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
						<input type="text"	name="dat_termino"	id="dat_termino"class="datepicker small" maxlength="19"	value="{view}$data_hora_termino{/view}"
							onKeyPress="DataHoraMinutoSegundo(event, this)" /> 
							
						<div id="msg_erro_termino" class="class_erro"></div>
						<p>{view}$textos_layout[47]{/view}</p>
						<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
						<p>Marque a data e hora na qual voc&ecirc; quer que este
							conte&uacute;do deixe aparecer no website.</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>Data</label>
					</dt>

					<dd>
						<input type="text"	name="dat_data" id="dat_data" class="datepicker small" value="{view}$data_atual{/view}"/> 
						
						<div id="msg_erro_data" class="class_erro"></div>
						<p>{view}$textos_layout[47]{/view}</p>
						<p>Formato correto: dd/mm/aaaa.</p>
						<p>Esta &eacute; a data que aparece junto ao conte&uacute;do no
							website.</p>
					</dd>
				</dl>
				<dt>
				<label>Ação Social</label>
				</dt>
					<dd>
						<select name="cod_acaoSocial" id="cod_acaoSocial" />
						<option value="">--{view}$textos_layout[46]{/view}--</option>
						{view}foreach from=$acaoSocial item=acaoS{/view}
						<option	value="{view}$acaoS.cod_id{/view}">{view}$acaoS.txt_titulo{/view}</option>
						{view}/foreach{/view} </select>
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_hotel" class="class_erro"></div>
					</dd>
				
		{view}foreach from=$idiomas item=idioma name=dad{/view}
		<fieldset>
			<legend>
				<strong>{view}$idioma.txt_idioma{/view}</strong>
			</legend>
				<dl>
					<dt>
						<label>Publicado</label>
					</dt>
					<dd>
						<input type="radio"	name="cod_publicado{view}$smarty.foreach.dad.iteration{/view}"	id="radio" value="1" checked="checked" /> Sim
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio"	name="cod_publicado{view}$smarty.foreach.dad.iteration{/view}"	id="radio2" value="0" /> N&atilde;o 
						<div id="msg_erro_publicado" class="class_erro"></div>
						<p>
							Ao escolher "sim", o conte&uacute;do que est&aacute; sendo
							inclu&iacute;do passa a aparecer no website depois de salvo.<br />
							Ao escolher "n&atilde;o", o conte&uacute;do &eacute; salvo,
							por&eacute;m segue sem aparecer no website.
						</p>
					</dd>
				
					<dt>
						<label>Titulo</label>
					</dt>
					<dd>
						<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}"	id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_titulo" class="class_erro"></div>
					</dd>
					
					<dt>
						<label>Texto</label>
					</dt>
					<dd>
						<textarea cols=100 ROWS=2 name="txt_texto{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto{view}$smarty.foreach.dad.iteration{/view}"></textarea>
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_descricao" class="class_erro"></div>
					</dd>
				</dl>
				<input type="hidden" value="{view}$idioma.cod_id{/view}" name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}"/>
		</fieldset>
		{view}/foreach{/view}
			</fieldset>
			<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[59]{/view}
		</button>
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}