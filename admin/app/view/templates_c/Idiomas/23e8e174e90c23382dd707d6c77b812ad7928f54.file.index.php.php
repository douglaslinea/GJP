<?php /* Smarty version Smarty-3.1.1, created on 2012-10-05 11:45:17
         compiled from "app/view/templates/Idiomas/index.php" */ ?>
<?php /*%%SmartyHeaderCode:120869580506ef27dbd64b6-28513261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23e8e174e90c23382dd707d6c77b812ad7928f54' => 
    array (
      0 => 'app/view/templates/Idiomas/index.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120869580506ef27dbd64b6-28513261',
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
    'params' => 0,
    'idioma' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_506ef27dd3161',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506ef27dd3161')) {function content_506ef27dd3161($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


				<header>
					<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
					<nav>
						<ul class="tab-switch">
							<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</a></li>
							<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/incluir');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
                            <li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
						</ul>
					</nav>
				</header>

				<div class="tab default-tab" id="tab0">
					<?php if ($_smarty_tpl->tpl_vars['dados_idioma']->value!==false){?>
						<?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])){?>
							<div class="notification success">
								<a href="#" class="close-notification" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[44];?>
" rel="tooltip">x</a>
									<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
							</div>
                        	<?php }?>

							<table class="datatable" id="first-asc">
								<thead>
									<tr>
										<th width="50%">Idioma</th>
										<th width="40%">Meta-tag</th>
										<th width="10%">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['idioma'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['idioma']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_idioma']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['idioma']->key => $_smarty_tpl->tpl_vars['idioma']->value){
$_smarty_tpl->tpl_vars['idioma']->_loop = true;
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_idioma'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_meta'];?>
</td>
										<td>
											<ul class="actions">
												<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/editar/id/<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
">edit</a></li>
												<li><a class="delete" onclick="javascript:exclusao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/excluir/id/<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[9];?>
')" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
">delete</a></li>
											</ul>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
                            
						<?php }else{ ?>
							<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>

						<?php }?>

				</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>