{view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript">
function replaceAll(string, token, newtoken)
{
	while (string.indexOf(token) != -1)
	{
 		string = string.replace(token, newtoken);
	}
	return string;
}
</script>

<script type="text/javascript">

$(function()
{
	$('#data_de,#data_ate').datepick({ 
	    onSelect: customRange}); 
});

function customRange(dates) { 
    if (this.id == 'data_de') { 
        $('#data_ate').datepick('option', 'minDate', dates[0] || null); 
        
    } 
    else { 
        $('#data_de').datepick('option', 'maxDate', dates[0] || null); 
    } 
}


</script>
<article class="full-block clearfix">
<div class="article-container">
	<header>
	<h2>Exportar</h2>
	<nav>
	<ul class="tab-switch">
		<li><a
			onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco');"
			href="" rel="tooltip" title="Listar">Listar</a></li>
		<li><a class="default-tab"
			onclick="document.location.replace('{view}$URL_DEFAULT{/view}Faleconosco/exportar');"
			href="" rel="tooltip" title="Exportar cadastros">Exportar cadastros</a>
		</li>
		<li class="inativo">Ver Detalhes</li>
	</ul>
	</nav> </header>

	<div class="tab default-tab" id="tab0">
		<table>
			<tr>
				<form name="frm_filtrar" id="frm_filtrar"
					action="{view}$URL_DEFAULT{/view}faleconosco/exportar_filtro"
					method="post">
					<td>De: <input type="text" name="data_de" id="data_de"
						maxlength="10" class="datepicker medium"
						onkeyup="mascara(this,soData)" value="{view}$de{/view}"><br /> <span
						id="msg_data_de"></span>
					</td>

					<td>At&eacute;: <input type="text" name="data_ate" id="data_ate"
						maxlength="10" class="datepicker medium"
						onkeyup="mascara(this,soData)" value="{view}$ate{/view}"><br /> <span
						id="msg_data_ate"></span>
					</td>

					<td>
						<button name="btn_filtrar" id="btn_filtrar" type="submit"
							class="gray"
							onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco/exportar_filtro');">Filtrar</button>
					</td>
					
				</form>


				{view}if $de != '' && $ate != '' {/view}
				
				<td>
					<button name="btn_exportar_periodo" id="btn_exportar_periodo"
						onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco/exportar/de/'+(replaceAll(document.getElementById('data_de').value, '/', '_'))+'/ate/'+(replaceAll(document.getElementById('data_ate').value, '/', '_')))"
						class="gray">Exportar registros do per&iacute;odo selecionado</button>
				</td>
				
				<td>
					<button name="btn_mostrar_todos" id="btn_mostrar_todos"
						class="gray"
						onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco/exportar')">Voltar a mostrar todos</button>
				</td>
				
				
				
				{view}/if{/view}
				{view}if $de == '' && $ate == '' {/view}
				<td>
					<button name="btn_exportar_todos" id="btn_exportar_todos"
						onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco/exportar_filtro')"
						class="gray">Exportar todos os registros</button>
				</td> 
				{view}/if{/view}
				
				
			</tr>
		</table>

		<table class="datatable">
			<thead>
				<tr>
					<th width="20%">Data / Hora</th>
                            <th width="40%">Nome</th>                                
                            <th width="10%">E-mail</th>
                            <th width="30%">Assunto</th>
                            <th>&nbsp;</th>
				</tr>
			</thead>

			<tbody>
				{view}foreach from=$array_faleConosco item=faleconosco{/view}
				<tr>
					<td width="20%">{view}$faleconosco.dat_datahora{/view}</td>
					<td width="15%">{view}$faleconosco.txt_nome{/view}</td>
					<td width="15%">{view}$faleconosco.txt_email{/view}</td>
					<td width="15%">{view}$faleconosco.txt_assunto{/view}</td>
				</tr>
				{view}/foreach{/view}
			</tbody>
		</table>
	</div>
	{view}include file="{view}$FOOTER{/view}"{/view}