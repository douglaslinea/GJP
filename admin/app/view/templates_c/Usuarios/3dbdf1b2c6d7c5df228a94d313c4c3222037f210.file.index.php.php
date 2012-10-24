<?php /* Smarty version Smarty-3.1.1, created on 2012-07-31 18:48:28
         compiled from "app/view/templates/Usuarios/index.php" */ ?>
<?php /*%%SmartyHeaderCode:2066234561501852ac1d4ba7-86016830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dbdf1b2c6d7c5df228a94d313c4c3222037f210' => 
    array (
      0 => 'app/view/templates/Usuarios/index.php',
      1 => 1342703478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2066234561501852ac1d4ba7-86016830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_usuario' => 0,
    'params' => 0,
    'usuario' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_501852ac31705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501852ac31705')) {function content_501852ac31705($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Usu&aacute;rios</h2>
		
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo">Ver Detalhes</li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			<?php if (!is_null($_smarty_tpl->tpl_vars['dados_usuario']->value)){?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])){?>
					<div class="notification success">
						<a href="#" class="close-notification" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[44];?>
" rel="tooltip">x</a>
						<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
					</div>
				<?php }?>
				
				<table class="datatable">
					<thead>
						<tr>
							<th width="20%">Nome</th>
							<th width="20%">E-mail</th>
							<th width="20%">Login</th>
							<th width="10%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
						<?php  $_smarty_tpl->tpl_vars['usuario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['usuario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_usuario']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->key => $_smarty_tpl->tpl_vars['usuario']->value){
$_smarty_tpl->tpl_vars['usuario']->_loop = true;
?>
						<tr>
							<td width="20%"><?php echo $_smarty_tpl->tpl_vars['usuario']->value['txt_nome'];?>
</td>
							<td width="20%"><?php echo $_smarty_tpl->tpl_vars['usuario']->value['txt_email'];?>
</td>
							<td width="20%"><?php echo $_smarty_tpl->tpl_vars['usuario']->value['txt_login'];?>
</td>
							<td width="10%">
								<ul class="actions">
									<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/editar/id/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['cod_id'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
">editar</a></li>
									<li><a class="delete" onclick="javascript:exclusao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/excluir/id/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['cod_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[9];?>
')" rel="tooltip" original-title="Excluir registro">excluir</a></li>
								</ul>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
							
				<?php }else{ ?>
				<div class="notification error">
					<p>
						<strong>Registro n&atilde;o encontrado.</strong>
					</p>
				</div>
				<?php }?>
			</div>
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>