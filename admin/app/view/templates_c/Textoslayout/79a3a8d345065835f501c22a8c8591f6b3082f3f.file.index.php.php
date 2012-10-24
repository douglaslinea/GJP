<?php /* Smarty version Smarty-3.1.1, created on 2012-10-19 11:40:11
         compiled from "app/view/templates/Textoslayout/index.php" */ ?>
<?php /*%%SmartyHeaderCode:975107375081664b0f0cb3-14617816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79a3a8d345065835f501c22a8c8591f6b3082f3f' => 
    array (
      0 => 'app/view/templates/Textoslayout/index.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '975107375081664b0f0cb3-14617816',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_textos' => 0,
    'params' => 0,
    'texto' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5081664b20171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5081664b20171')) {function content_5081664b20171($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Textos do Layout</h2>
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos-layout');" href="" rel="tooltip" title="Listar">Listar</a></li>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<?php if ($_smarty_tpl->tpl_vars['dados_textos']->value!==false){?>
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
							<th width="10%">Idioma</th>
							<th width="80%">Texto</th>
							<th width="10%">&nbsp;</th>
						</tr>
					</thead>
					
					<tbody>
						<?php  $_smarty_tpl->tpl_vars['texto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['texto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_textos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['texto']->key => $_smarty_tpl->tpl_vars['texto']->value){
$_smarty_tpl->tpl_vars['texto']->_loop = true;
?>
							<tr>
								<td width="10%"><?php echo $_smarty_tpl->tpl_vars['texto']->value['WebsiteIdiomas']['txt_idioma'];?>
</td>
								<td width="80%"><?php echo $_smarty_tpl->tpl_vars['texto']->value['txt_texto'];?>
</td>
								<td width="10%">
									<ul class="actions">
										<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout/editar/cod_texto/<?php echo $_smarty_tpl->tpl_vars['texto']->value['cod_texto'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
">editar</a></li>
									</ul>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php }else{ ?>
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>

			<?php }?>
		</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>