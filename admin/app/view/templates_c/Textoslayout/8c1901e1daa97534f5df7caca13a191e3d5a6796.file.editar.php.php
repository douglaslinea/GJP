<?php /* Smarty version Smarty-3.1.1, created on 2012-09-11 14:31:54
         compiled from "app/view/templates/Textoslayout/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:115955192504f758ae26d61-65312905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c1901e1daa97534f5df7caca13a191e3d5a6796' => 
    array (
      0 => 'app/view/templates/Textoslayout/editar.php',
      1 => 1346261899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115955192504f758ae26d61-65312905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_texto' => 0,
    'dados' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_504f758b01920',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504f758b01920')) {function content_504f758b01920($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Textos do Layout</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos-layout');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<form name="frm_textoslayout" id="frm_textoslayout" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_texto']->value['cod_id'];?>
', 'frm_textoslayout', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')">
				<?php  $_smarty_tpl->tpl_vars['dados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_texto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dad']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->key => $_smarty_tpl->tpl_vars['dados']->value){
$_smarty_tpl->tpl_vars['dados']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dad']['iteration']++;
?>
					<fieldset>
						<legend><?php echo $_smarty_tpl->tpl_vars['dados']->value['WebsiteIdiomas']['txt_idioma'];?>
</legend>
						<fieldset>
							<legend>Dados do registro</legend>
							<dl>
								<dt>
									<label>Texto</label>
								</dt>
								
								<dd>
									<input type="text" name="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" maxlength="255" class="medium" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_texto'];?>
" />
									<span id="msg_txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
"></span>		
									<p>Preenchimento obrigat&oacute;rio.</p>
								</dd>
							</dl>
						</fieldset>
					</fieldset>
					<input type="hidden" name="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_id'];?>
" />
				<?php } ?>
				
				<button type="submit" id="btn_enviar" class="gray" />Enviar</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos-layout" />Cancelar</a>
				<input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['dados_texto']->value['cod_id'];?>
" />
			</form>
		</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>