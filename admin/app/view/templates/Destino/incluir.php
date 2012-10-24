{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a class="default-tab" href="#" rel="tooltip" rel="tooltip"	title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
	<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}destino')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>
<div class="tab default-tab" id="tab0">
	<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}destino/incluir', 'frm_contatos','{view}$URL_DEFAULT{/view}destino', new Array('{view}$textos_layout[59]{/view}', '{view}$textos_layout[1]{/view}'), 'class_erro', 'btn_enviar')">
	<!--<form name="frm_contatos" id="frm_contatos" method="post"action="{view}$URL_DEFAULT{/view}destino/incluir">-->

		{view}foreach from=$idiomas item=idioma name=idi{/view}
		<fieldset>
			<legend>
				<strong>{view}$idioma.txt_idioma{/view}</strong>
			</legend>
			<fieldset>
				<legend>Dados cadastrais</legend>
				<dl>
					<dt>
						<label>Destino</label>
					</dt>
					<dd>
						<input type="text" name="txt_destinos{view}$smarty.foreach.idi.iteration{/view}" id="txt_destinos{view}$smarty.foreach.idi.iteration{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_destino{view}$smarty.foreach.idi.iteration{/view}" class="class_erro"></div>
					</dd>

					<dt>
						<label>Clima</label>
					</dt>
					<dd>
						<input type="text" name="cod_clima{view}$smarty.foreach.idi.iteration{/view}" id="cod_clima{view}$smarty.foreach.idi.iteration{/view}" class="medium" />
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_clima{view}$smarty.foreach.idi.iteration{/view}" class="class_erro"></div>
					</dd>

					<dt>
					<label>Estado</label>
				</dt>
				<dd>
					<select name="cod_estado{view}$smarty.foreach.idi.iteration{/view}" id="cod_estado{view}$smarty.foreach.idi.iteration{/view}" onchange="getCidade('{view}$URL_DEFAULT{/view}contatos/buscaCidades',$(this).val(),'cod_cidade','combo_cidade{view}$smarty.foreach.idi.iteration{/view}', '{view}$smarty.foreach.idi.iteration{/view}')">
						<option value="">--{view}$textos_layout[46]{/view}--</option>
						{view}foreach from=$estados item=estado{/view}
						<option value="{view}$estado.cod_id{/view}"	{view}if $contatos.cod_estado== $estado.cod_id{/view} selected="selected"{view}/if{/view}>
						{view}$estado.txt_uf{/view}</option>
						{view}/foreach{/view}
					</select> <p>{view}$textos_layout[47]{/view}</p>
								<div id="msg_erro_estado{view}$smarty.foreach.idi.iteration{/view}" class = "class_erro"></div>
				</dd>

				<dt>
					<label>Cidade</label>
				</dt>
				<dd>
					<div id="combo_cidade{view}$smarty.foreach.idi.iteration{/view}">
						<select name="cod_cidade{view}$smarty.foreach.idi.iteration{/view}" id="cod_cidade{view}$smarty.foreach.idi.iteration{/view}">
							<option value="">--{view}$textos_layout[46]{/view}--</option>
							{view}foreach from=$cidades item=cid{/view}
							<option value="{view}$cid.cod_id{/view}" {view}if $cid.cod_id==	$contatos.cod_cidade{/view} selected="selected"{view}/if{/view}>
							{view}$cid.txt_cidade{/view}</option>
							{view}/foreach{/view}
						</select>
					</div>
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_cidade{view}$smarty.foreach.idi.iteration{/view}" class = "class_erro"></div>
				</dd>
						<label>Informações</label>
					</dt>
					<dd>
						<textarea cols=100 ROWS=2 name="txt_informacao{view}$smarty.foreach.idi.iteration{/view}"id="txt_informacao{view}$smarty.foreach.idi.iteration{/view}"></textarea>	
						<p>{view}$textos_layout[47]{/view}</p>
						<div id="msg_erro_informacao{view}$smarty.foreach.idi.iteration{/view}" class="class_erro"></div>
					</dd>
				</dl>
			</fieldset>
		</fieldset>
		<input type="hidden" value="{view}$idioma.cod_id{/view}" name="cod_idioma{view}$smarty.foreach.idi.iteration{/view}" id="cod_idioma{view}$smarty.foreach.idi.iteration{/view}"/>
			
		{view}/foreach{/view}
		<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[59]{/view}
		</button>
	</form>
		<script type="text/javascript">
function getCidade(url, combo_value, combo_name, div_cidades, interation)
{	  		
	var pars = "/rnd/" + Math.random() * 4;

	$.ajax({
		url : url + pars, 
		contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
		data : "&cod_uf=" + combo_value,
		type : 'post',
		dataType : "json", 
		success : function(json)
		{
			if (json.length > 0)
			{
				var quantidade_cidades = json.length;

				var combo_atualizada = "<select name='" + combo_name+interation + "' id='" + combo_name+interation + "'>";

				combo_atualizada += "<option value=\"\">--Selecione--</option>";

				for ( var i = 0; i < quantidade_cidades; i++)
				{
					seleciona_cidade = "";

					combo_atualizada += "<option value='"+ json[i]['cod_id'] + "' "	+ seleciona_cidade + ">"+ json[i]['txt_cidade'] + "</option>";
				}
				
				combo_atualizada += "</select>";
	   
				$('#' + div_cidades).html(combo_atualizada);
			}
		}
	});
}
	</script>

	{view}include file="{view}$FOOTER{/view}"{/view}