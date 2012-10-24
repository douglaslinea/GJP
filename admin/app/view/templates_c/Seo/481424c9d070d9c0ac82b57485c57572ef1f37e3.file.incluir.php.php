<?php /* Smarty version Smarty-3.1.1, created on 2012-09-26 14:12:13
         compiled from "app/view/templates/Seo/incluir.php" */ ?>
<?php /*%%SmartyHeaderCode:8818777005063376da78ed3-89174512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '481424c9d070d9c0ac82b57485c57572ef1f37e3' => 
    array (
      0 => 'app/view/templates/Seo/incluir.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8818777005063376da78ed3-89174512',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5063376dbcb59',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5063376dbcb59')) {function content_5063376dbcb59($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<header>
			<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</a></li>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/incluir');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<form name="frm_seo" id="frm_seo" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/incluir', 'frm_seo', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')" method="post">
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Caminho da p&aacute;gina</label>
						</dt>
						<dd>
							<input type="text" name="url_caminho" id="url_caminho" class="medium" maxlength="255" />
							<span id="msg_url_caminho"></span>
							<p>Parte da URL da p&aacute;gina, exclu&iacute;do o dom&iacute;nio principal. Ex.: se sua p&aacute;gina for "http://www.google.com/sua-pagina", o caminho é "sua-pagina".</p>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					</dl>	
                    <dl>
						<dt>
							<label>T&iacute;tulo da p&aacute;gina</label>
						</dt>
						<dd>
							<input type="text" name="txt_title" id="txt_title" class="medium" maxlength="255" />
							<span id="msg_txt_title"></span>
                        	<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					</dl>	
                    <dl>

						<dt>
							<label>Palavras-chave da p&aacute;gina</label>
						</dt>
						<dd>
							<textarea name="txt_keywords" id="txt_keywords" class="medium"></textarea>
							<span id="msg_txt_keywords"></span>
                        	<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os termos devem ser separados por v&iacute;rgulas.</p>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					</dl>	
                    <dl>
						<dt>
							<label>Descri&ccedil;&atilde;o da p&aacute;gina</label>
						</dt>
						<dd>
							<textarea name="txt_description" id="txt_description" class="medium"></textarea>
							<span id="msg_txt_description"></span>
                        	<p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					</dl>
				</fieldset>
				
				<input type="hidden" name="cod_menu" id="cod_menu" value="1">
				<button type="submit" id="btn_enviar" class="gray" />
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>

				</button>
				&nbsp;ou&nbsp; <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" />Cancelar</a>
			</form>
		</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>