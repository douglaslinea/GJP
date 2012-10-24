<?php /* Smarty version Smarty-3.1.1, created on 2012-09-21 13:51:40
         compiled from "app/view/templates/Permissoes/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:295818178505c9b1c864b27-62275962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e68c17c2e2da5d1259f973648c5bf32c92874b1' => 
    array (
      0 => 'app/view/templates/Permissoes/detalhes.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295818178505c9b1c864b27-62275962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'dados' => 0,
    'textos_layout' => 0,
    'controller_acao' => 0,
    'contr' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_505c9b1c99c11',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_505c9b1c99c11')) {function content_505c9b1c99c11($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<article class="full-block clearfix">
	<div class="article-container">
		<header>
		<h2>Notícia</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="Ver detalhes">Ver detalhes</a></li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_usuario'];?>
');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<form name="frm_permissoes" id="frm_permissoes" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/editar', 'frm_permissoes', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')" >
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Controler e Ação</label>
						</dt>
						
						<dd>
							<?php  $_smarty_tpl->tpl_vars['contr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_acao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contr']->key => $_smarty_tpl->tpl_vars['contr']->value){
$_smarty_tpl->tpl_vars['contr']->_loop = true;
?>
								<b>Controller:</b> <?php echo $_smarty_tpl->tpl_vars['contr']->value['PermissaoGeral']['FrameworkControllers']['txt_nome_amigavel'];?>
 <b>Ação:</b> <?php echo $_smarty_tpl->tpl_vars['contr']->value['PermissaoGeral']['FrameworkAcoes']['txt_nome_amigavel'];?>

								<br/>
							<?php } ?>
						</dd>
						
						<dt>
							<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
							<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_usuario'];?>
');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
						</dt>
					</dl>
				</fieldset>
			</form>
		</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>