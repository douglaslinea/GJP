<?php /* Smarty version Smarty-3.1.1, created on 2012-08-23 09:18:41
         compiled from "app/view/templates/Index/index.php" */ ?>
<?php /*%%SmartyHeaderCode:18105851250361fa1b30a28-90030595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd036f6045cc7828d3f249adef41505c2566cc504' => 
    array (
      0 => 'app/view/templates/Index/index.php',
      1 => 1342703558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18105851250361fa1b30a28-90030595',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'textos_site' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50361fa1bf12d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50361fa1bf12d')) {function content_50361fa1bf12d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

Teste de t&iacute;tulo/texto from table "textos"<br />
<h1><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['txt_titulo'];?>
</h1>
<?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['texto'];?>
<br />

<br /><br />
Teste de texto from table "textosLayout"<br />
<h2><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
</h2>
	
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>