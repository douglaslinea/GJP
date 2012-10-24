<?php /* Smarty version Smarty-3.1.1, created on 2012-09-26 14:13:12
         compiled from "app/view/templates/Seo/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:857234821506337a82d3b68-74466304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc9bd44f1752b284a7fe37d6a578389f74b8a043' => 
    array (
      0 => 'app/view/templates/Seo/detalhes.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '857234821506337a82d3b68-74466304',
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
    'conteudo_nao_encontrado' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_506337a843a91',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506337a843a91')) {function content_506337a843a91($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<header>
			<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/incluir');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['cod_id'];?>
');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<?php if (!isset($_smarty_tpl->tpl_vars['conteudo_nao_encontrado']->value)){?>
				<table>
					<tr>
						<td width="50%" class="detalhes">
							<strong>Caminho da p&aacute;gina</strong><br />
							<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['url_caminho'];?>

						</td>
						<td width="50%" class="detalhes">
							<strong>T&iacute;tulo da p&aacute;gina</strong><br />
							<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_title'];?>

						</td>
					</tr>
					<tr>
						<td class="detalhes">
							<strong>Palavras-chave da p&aacute;gina</strong><br />
							<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_keywords'];?>

						</td>
						<td class="detalhes" colspan="2">
							<strong>Descri&ccedil;&atilde;o da p&aacute;gina</strong><br />
							<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_description'];?>

						</td>
					</tr>
				</table>
				<br />
							<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>&nbsp;&nbsp;&nbsp;
							<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['cod_id'];?>
');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
				
			<?php }else{ ?>

				<div class="notification error">
					<p>
							<strong><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>
</strong>
					</p>
				</div>
				<br /><br />
				<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo');" />
                <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>

				</button>
			<?php }?>
		</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>