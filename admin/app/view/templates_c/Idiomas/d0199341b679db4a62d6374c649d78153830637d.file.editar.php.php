<?php /* Smarty version Smarty-3.1.1, created on 2012-08-28 16:11:44
         compiled from "app/view/templates/Idiomas/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:2078907259503d17f01ccba7-59119314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0199341b679db4a62d6374c649d78153830637d' => 
    array (
      0 => 'app/view/templates/Idiomas/editar.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2078907259503d17f01ccba7-59119314',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_idioma' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_503d17f02f266',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503d17f02f266')) {function content_503d17f02f266($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<header>
			<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</a></li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/incluir');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<form name="frm_idioma" id="frm_idioma" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/editar', 'frm_idioma', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')" method="post">
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Idioma</label>
						</dt>
						<dd>
							<input type="text" name="txt_idioma" id="txt_idioma" value="<?php echo $_smarty_tpl->tpl_vars['dados_idioma']->value['txt_idioma'];?>
" class="medium" maxlength="255" />
							<span id="msg_txt_idioma"></span>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
						
						<dt>
							<label>Meta tag</label>
						</dt>
						<dd>
							<input type="text" name="txt_meta" id="txt_meta" value="<?php echo $_smarty_tpl->tpl_vars['dados_idioma']->value['txt_meta'];?>
" class="medium" maxlength="10" />
							<span id="msg_txt_meta"></span>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
	
					</dl>
				</fieldset>
	
				<input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_idioma']->value['cod_id'];?>
" />
	
				<button type="submit" id="btn_enviar" class="gray" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[50];?>
</button>
				&nbsp;ou&nbsp; <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" />Cancelar</a>
			</form>

		</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>