<?php /* Smarty version Smarty-3.1.1, created on 2012-09-21 13:51:34
         compiled from "app/view/templates/Permissoes/index.php" */ ?>
<?php /*%%SmartyHeaderCode:3027927505c9b16a2d2c3-64715620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ca9285900aa09cacf22c6361ce1b56d3017acf' => 
    array (
      0 => 'app/view/templates/Permissoes/index.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3027927505c9b16a2d2c3-64715620',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados' => 0,
    'dado' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_505c9b16b4957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_505c9b16b4957')) {function content_505c9b16b4957($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Permissões</h2>
		
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo">Ver Detalhes</li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<table class="datatable">
				<thead>
					<tr>
						<th width="20%">Perfil</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['dado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dado']->key => $_smarty_tpl->tpl_vars['dado']->value){
$_smarty_tpl->tpl_vars['dado']->_loop = true;
?>
						<tr>
							<td width="20%"><?php echo $_smarty_tpl->tpl_vars['dado']->value['txt_perfil'];?>
</td>
							<td width="10%">
								<ul class="actions">
									<li><a class="view" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/detalhes/id/<?php echo $_smarty_tpl->tpl_vars['dado']->value['cod_tipo'];?>
" rel="tooltip" original-title="Ver detalhes">ver</a></li>
									<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/editar/id/<?php echo $_smarty_tpl->tpl_vars['dado']->value['cod_tipo'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
">editar</a></li>
									<li><a class="delete" onclick="javascript:exclusao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/excluir/id/<?php echo $_smarty_tpl->tpl_vars['dado']->value['cod_tipo'];?>
', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[9];?>
')" rel="tooltip" original-title="Excluir registro">excluir</a></li>
								</ul>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>		
		</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>