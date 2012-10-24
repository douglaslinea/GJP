<?php /* Smarty version Smarty-3.1.1, created on 2012-09-26 14:13:35
         compiled from "app/view/templates/Seo/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:621718237506337bf71b142-20970931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c48f409901ced32ce6704854ca119492599221a9' => 
    array (
      0 => 'app/view/templates/Seo/editar.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '621718237506337bf71b142-20970931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_seo' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_506337bf89c9a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506337bf89c9a')) {function content_506337bf89c9a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/incluir');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['cod_id'];?>
');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<form name="frm_seo" id="frm_seo" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/editar', 'frm_seo', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')">
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>						
						<dt>
							<label>Caminho da p&aacute;gina</label>
						</dt>
						<dd>
							<input type="text" name="url_caminho" id="url_caminho" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['url_caminho'];?>
" />
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
							<input type="text" name="txt_title" id="txt_title" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_title'];?>
" />
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
							<textarea name="txt_keywords" id="txt_keywords" class="medium"><?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_keywords'];?>
</textarea>
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
							<textarea name="txt_description" id="txt_description" class="medium"><?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_description'];?>
</textarea>
                        	<span id="msg_txt_description"></span>
                        	<p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					</dl>
				</fieldset>
				
				<button type="submit" id="btn_enviar" class="gray" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[50];?>
</button>
				&nbsp;ou&nbsp; <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" />Cancelar</a>
				<input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['cod_id'];?>
" />
			</form>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>