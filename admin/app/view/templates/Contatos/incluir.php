{view}include file="{view}$HEAD{/view}"{/view}
<header>
<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
<nav>
<ul class="tab-switch">
	<li><a class="default-tab" href="#" rel="tooltip" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
	<li class="inativo">{view}$textos_layout[41]{/view}</a></li>
	<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}contatos')" href="" rel="tooltip" title="{view}$textos_layout[60]{/view}">{view}$textos_layout[60]{/view}</a></li>

</ul>
</nav> </header>
<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}contatos/incluir', 'frm_contatos','{view}$URL_DEFAULT{/view}contatos', new Array('{view}$textos_layout[59]{/view}', '{view}$textos_layout[1]{/view}'), 'class_erro', 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}contatos/incluir">-->
		
			<fieldset>
				<legend>Dados cadastrais</legend>
			<dl>
				<dt>
					<label>Nome do Hotel</label>
				</dt>
				<dd>
					<input type="text" name="txt_titulo" id="txt_titulo" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_titulo" class = "class_erro"></div>
				</dd>
				<dt>
					<label>Telefone</label>
				</dt>
				<dd>
					<input type="text" name="txt_telefone" id="txt_telefone" maxlength="14"	onkeyup="mascara(this,soTelefone);"  class="small" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_telefone" class = "class_erro"></div>
				</dd>
				<dt>
					<label>E-Mail</label>
				</dt>
				<dd>
					<input type="text" name="txt_email" id="txt_email" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_telefone" class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Hotel</label>
				</dt>
				<dd>
					<select name="cod_hotel" id="cod_hotel">
						<option value="">--{view}$textos_layout[46]{/view}--</option>
						{view}foreach from=$hoteis item=hotel{/view}
						<option value="{view}$hotel.cod_id{/view}"	{view}if $contatos.cod_hotel == $hotel.cod_id{/view} selected="selected"{view}/if{/view}>
						{view}$hotel.txt_razaoSocial{/view}</option>
						{view}/foreach{/view}
					</select> 
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_hotel" class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Estado</label>
				</dt>
				<dd>
					<select name="cod_estado" id="cod_estado" onchange="getCidade('{view}$URL_DEFAULT{/view}contatos/buscaCidades',$(this).val(),'cod_cidade','combo_cidade')">
						<option value="">--{view}$textos_layout[46]{/view}--</option>
						{view}foreach from=$estados item=estado{/view}
						<option value="{view}$estado.cod_id{/view}"	{view}if $contatos.cod_estado== $estado.cod_id{/view} selected="selected"{view}/if{/view}>
						{view}$estado.txt_uf{/view}</option>
						{view}/foreach{/view}
					</select> <p>{view}$textos_layout[47]{/view}</p>
								<div id="msg_erro_estado" class = "class_erro"></div>
				</dd>

				<dt>
					<label>Cidade</label>
				</dt>
				<dd>
					<div id="combo_cidade">
						<select name="cod_cidade" id="cod_cidade">
							<option value="">--{view}$textos_layout[46]{/view}--</option>
							{view}foreach from=$cidades item=cid{/view}
							<option value="{view}$cid.cod_id{/view}" {view}if $cid.cod_id==	$contatos.cod_cidade{/view} selected="selected"{view}/if{/view}>
							{view}$cid.txt_cidade{/view}</option>
							{view}/foreach{/view}
						</select>
					</div>
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_cidade" class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Pa&iacute;s</label>
				</dt>
				<dd>
					<input type="text" name="txt_pais" id="txt_pais" onkeyup="mascara(this,soLetras);" maxlenght="100" class="medium" />
					<p>{view}$textos_layout[47]{/view}</p>
					<div id="msg_erro_pais" class = "class_erro"></div>
				</dd>
			</dl>
			
				
	{view}foreach from=$idiomas item=idioma name=idi{/view}
		<fieldset>
			<legend>
				<strong>{view}$idioma.txt_idioma{/view}</strong>
			</legend>
				
				<fieldset>
					<legend>Informações </legend>
					<dt>
					<label>Mais Informações sobre o Hotel</label>
					</dt>
					<dd>
					<textarea cols=100 ROWS=2 name="txt_texto{view}$smarty.foreach.idi.iteration{/view}"id="txt_texto{view}$smarty.foreach.idi.iteration{/view}"></textarea>	
					</dd>
					
					<input type="hidden" value="{view}$idioma.cod_id{/view}" name="cod_idioma{view}$smarty.foreach.idi.iteration{/view}" id="cod_idioma{view}$smarty.foreach.idi.iteration{/view}"/>
				</fieldset>
			</fieldset>

		{view}/foreach{/view}
		</fieldset>
			<button type="submit" id="btn_enviar" class="gray" />
		{view}$textos_layout[59]{/view}
		</button>
		
		<script type="text/javascript">

function getCidade(url, combo_value, combo_name, div_cidades)
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
				var combo_atualizada = "<select name='" + combo_name + "' id='" + combo_name + "'>";

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
		
		
	</form>
	{view}include file="{view}$FOOTER{/view}"{/view}