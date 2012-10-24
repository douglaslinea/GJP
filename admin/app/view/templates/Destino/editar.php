{view}include file="{view}$HEAD{/view}"{/view}

<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}destino/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}destino/detalhes/id_relacao_idioma/{view}$destino.cod_relacao_idioma{/view}')" href="" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a>
	</li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}destino')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">

	<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}destino/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}destino', new Array('{view}$textos_layout[50]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar')">
		<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}destino/editar">-->
	
		{view}foreach from=$dados_destino item=destino name=con{/view}
			
		<fieldset>
			<legend>Dados do registro</legend>
			<dl>
				<dt>
					<label>Destino</label>
				</dt>
				<dd>
					<input type="text"	name="txt_destinos{view}$smarty.foreach.con.iteration{/view}"	id="txt_destinos{view}$smarty.foreach.con.iteration{/view}"	value="{view}$destino.txt_destinos{/view}" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_destinos" class="class_erro"></div>
				</dd>
	
				<dt>
					<label>Estado</label>
				</dt>
				<dd>
					<select name="cod_estado{view}$smarty.foreach.con.iteration{/view}"	id="cod_estado{view}$smarty.foreach.con.iteration{/view}" onchange="getCidade('{view}$URL_DEFAULT{/view}contatos/buscaCidades',$(this).val(),'cod_cidade','combo_cidade{view}$smarty.foreach.con.iteration{/view}', '{view}$smarty.foreach.con.iteration{/view}')">
						<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$estados item=estado{/view}
						<option value="{view}$estado.cod_id{/view}"	{view}if $contatos.cod_estado  ==	$estado.cod_id{/view} selected="selected"{view}/if{/view}>
						{view}$estado.txt_uf{/view}</option> {view}/foreach{/view}
					</select>
				<p>{view}$textos_layout[47]{/view}</p>
				<div id="msg_erro_estado" class="class_erro"></div>
				</dd>

				<dt>
					<label>Cidade</label>
				</dt>
				<dd>
					<div id="combo_cidade{view}$smarty.foreach.con.iteration{/view}">
						<select name="cod_cidade{view}$smarty.foreach.con.iteration{/view}" id="cod_cidade{view}$smarty.foreach.con.iteration{/view}">
							<option value="">--{view}$textos_layout[46]{/view}--</option>{view}foreach from=$cidades item=cid{/view}
							<option value="{view}$cid.cod_id{/view}" {view}if $cid.cod_id == $contatos.cod_cidade{/view} selected="selected"{view}/if{/view}>
							{view}$cid.txt_cidade{/view}</option> {view}/foreach{/view}
						</select>
				</div>
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_cidade" class="class_erro"></div>
				</dd>

				<dt>
					<label>Clima</label>
				</dt>
				<dd>
					<input type="text"name="cod_clima{view}$smarty.foreach.con.iteration{/view}" id="cod_clima{view}$smarty.foreach.con.iteration{/view}" value="{view}$destino.cod_clima{/view}" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_clima" class="class_erro"></div>
				</dd>


				<dt>
					<label>Mais Informações sobre o Destino</label>
				</dt>
				<dd>
						<textarea cols=100 ROWS=2 name="txt_informacao{view}$smarty.foreach.con.iteration{/view}" id="txt_informacao{view}$smarty.foreach.con.iteration{/view}"></textarea>

				</dd>
				</dl>
	
	<input type="hidden" value="{view}$destino.cod_id{/view}" name="cod_id{view}$smarty.foreach.con.iteration{/view}" id="cod_id{view}$smarty.foreach.con.iteration{/view}" />
	
	</fieldset>
	{view}/foreach{/view}
	
	<button type="submit" id="btn_enviar" class="gray" />{view}$textos_layout[50]{/view}</button>
	&nbsp;ou&nbsp; <a href="{view}$URL_DEFAULT{/view}destino" />Cancelar</a>

    </form>
    	
	<script type="text/javascript">
function getCidade(url, combo_value, combo_name, div_cidades, interation)
{	
	//seta a url e os parâmetros a serem usamos pelo PHP	  		
	var pars = "/rnd/" + Math.random() * 4;

	//utiliza objeto Ajax da biblioteca Prototype
	//Requisição Ajax
	$.ajax({
		url : url + pars, //URL de destino
		contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
		data : "&cod_uf=" + combo_value,
		type : 'post',
		dataType : "json", //Tipo de Retorno
		success : function(json)
		{
			if (json.length > 0)
			{
				//Verifica se deu resposta			
				var quantidade_cidades = json.length;

				//Monta a combo com o estado selecionado
				var combo_atualizada = "<select name='" + combo_name+interation + "' id='" + combo_name+interation + "'>";

				//Opcao em branco
				combo_atualizada += "<option value=\"\">--Selecione--</option>";

				//popula a combo com as cidades do estado selecionado
				for ( var i = 0; i < quantidade_cidades; i++)
				{
					//Limpa a variavel para não inserir selected nas demais options
					seleciona_cidade = "";

					//Adiciona os valores na combo 
					combo_atualizada += "<option value='"+ json[i]['cod_id'] + "' "	+ seleciona_cidade + ">"+ json[i]['txt_cidade'] + "</option>";
				}
				//Fecha a combo
				combo_atualizada += "</select>";

				//Joga a combo na respectiva div				   
				$('#' + div_cidades).html(combo_atualizada);
			}
		}
	});
}
	</script>

	{view}include file="{view}$FOOTER{/view}"{/view}