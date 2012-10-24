<?php /* Smarty version Smarty-3.1.1, created on 2012-10-04 13:55:31
         compiled from "app/view/templates/Contatos/incluir.php" */ ?>
<?php /*%%SmartyHeaderCode:1407971842506dbf833f0ab5-89433439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ad98fe39a126fb4aca4b40dc2400a6f856059dd' => 
    array (
      0 => 'app/view/templates/Contatos/incluir.php',
      1 => 1348259817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1407971842506dbf833f0ab5-89433439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'textos_layout' => 0,
    'URL_DEFAULT' => 0,
    'hoteis' => 0,
    'hotel' => 0,
    'contatos' => 0,
    'estados' => 0,
    'estado' => 0,
    'cidades' => 0,
    'cid' => 0,
    'idiomas' => 0,
    'idioma' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_506dbf836bbd0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506dbf836bbd0')) {function content_506dbf836bbd0($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<header>
<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
<nav>
<ul class="tab-switch">
	<li><a class="default-tab" href="#" rel="tooltip" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
	<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
	<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[60];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[60];?>
</a></li>

</ul>
</nav> </header>
<div class="tab default-tab" id="tab0">
<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/incluir', 'frm_contatos','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[59];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'class_erro', 'btn_enviar')">
<!--<form name="frm_contatos" id="frm_contatos" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/incluir">-->
		
			<fieldset>
				<legend>Dados cadastrais</legend>
			<dl>
				<dt>
					<label>Nome do Hotel</label>
				</dt>
				<dd>
					<input type="text" name="txt_titulo" id="txt_titulo" class="medium" />
					<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					<div id="msg_erro_titulo" class = "class_erro"></div>
				</dd>
				<dt>
					<label>Telefone</label>
				</dt>
				<dd>
					<input type="text" name="txt_telefone" id="txt_telefone" maxlength="14"	onkeyup="mascara(this,soTelefone);"  class="small" />
					<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					<div id="msg_erro_telefone" class = "class_erro"></div>
				</dd>
				<dt>
					<label>E-Mail</label>
				</dt>
				<dd>
					<input type="text" name="txt_email" id="txt_email" class="medium" />
					<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					<div id="msg_erro_telefone" class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Hotel</label>
				</dt>
				<dd>
					<select name="cod_hotel" id="cod_hotel">
						<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
						<?php  $_smarty_tpl->tpl_vars['hotel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['hotel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hoteis']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['hotel']->key => $_smarty_tpl->tpl_vars['hotel']->value){
$_smarty_tpl->tpl_vars['hotel']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['hotel']->value['cod_id'];?>
"	<?php if ($_smarty_tpl->tpl_vars['contatos']->value['cod_hotel']==$_smarty_tpl->tpl_vars['hotel']->value['cod_id']){?> selected="selected"<?php }?>>
						<?php echo $_smarty_tpl->tpl_vars['hotel']->value['txt_razaoSocial'];?>
</option>
						<?php } ?>
					</select> 
					<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					<div id="msg_erro_hotel" class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Estado</label>
				</dt>
				<dd>
					<select name="cod_estado" id="cod_estado" onchange="getCidade('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/buscaCidades',$(this).val(),'cod_cidade','combo_cidade')">
						<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
						<?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value){
$_smarty_tpl->tpl_vars['estado']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['estado']->value['cod_id'];?>
"	<?php if ($_smarty_tpl->tpl_vars['contatos']->value['cod_estado']==$_smarty_tpl->tpl_vars['estado']->value['cod_id']){?> selected="selected"<?php }?>>
						<?php echo $_smarty_tpl->tpl_vars['estado']->value['txt_uf'];?>
</option>
						<?php } ?>
					</select> <p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
								<div id="msg_erro_estado" class = "class_erro"></div>
				</dd>

				<dt>
					<label>Cidade</label>
				</dt>
				<dd>
					<div id="combo_cidade">
						<select name="cod_cidade" id="cod_cidade">
							<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
							<?php  $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cid']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cidades']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->key => $_smarty_tpl->tpl_vars['cid']->value){
$_smarty_tpl->tpl_vars['cid']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['cid']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cid']->value['cod_id']==$_smarty_tpl->tpl_vars['contatos']->value['cod_cidade']){?> selected="selected"<?php }?>>
							<?php echo $_smarty_tpl->tpl_vars['cid']->value['txt_cidade'];?>
</option>
							<?php } ?>
						</select>
					</div>
					<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					<div id="msg_erro_cidade" class = "class_erro"></div>
				</dd>
				
				<dt>
					<label>Pa&iacute;s</label>
				</dt>
				<dd>
					<input type="text" name="txt_pais" id="txt_pais" onkeyup="mascara(this,soLetras);" maxlenght="100" class="medium" />
					<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					<div id="msg_erro_pais" class = "class_erro"></div>
				</dd>
			</dl>
			
				
	<?php  $_smarty_tpl->tpl_vars['idioma'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['idioma']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['idiomas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['idi']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['idioma']->key => $_smarty_tpl->tpl_vars['idioma']->value){
$_smarty_tpl->tpl_vars['idioma']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['idi']['iteration']++;
?>
		<fieldset>
			<legend>
				<strong><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_idioma'];?>
</strong>
			</legend>
				
				<fieldset>
					<legend>Informações </legend>
					<dt>
					<label>Mais Informações sobre o Hotel</label>
					</dt>
					<dd>
					<textarea cols=100 ROWS=2 name="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"id="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></textarea>	
					</dd>
					
					<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
" name="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"/>
				</fieldset>
			</fieldset>

		<?php } ?>
		</fieldset>
			<button type="submit" id="btn_enviar" class="gray" />
		<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[59];?>

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
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>