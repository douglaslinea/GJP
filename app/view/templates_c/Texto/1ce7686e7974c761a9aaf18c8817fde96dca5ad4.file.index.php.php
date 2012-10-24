<?php /* Smarty version Smarty-3.1.1, created on 2012-08-22 15:47:31
         compiled from "app/view/templates/Texto/index.php" */ ?>
<?php /*%%SmartyHeaderCode:562962578503529431a2806-49070449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ce7686e7974c761a9aaf18c8817fde96dca5ad4' => 
    array (
      0 => 'app/view/templates/Texto/index.php',
      1 => 1342703559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '562962578503529431a2806-49070449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'textos_site' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50352943228fe',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50352943228fe')) {function content_50352943228fe($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

Exemplo texto código 1 
<h1><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['txt_titulo'];?>
</h1>
<?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['texto'];?>

<br /><br /><br /><br /><br />

Exemplo texto código 2
<h2><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[2]['txt_titulo'];?>
</h2>
<?php echo $_smarty_tpl->tpl_vars['textos_site']->value[2]['texto'];?>



<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>