<?php /* Smarty version Smarty-3.1.1, created on 2012-10-04 15:04:42
         compiled from "app/view/templates/Contatos/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:1604022382506dcfbaca70f0-41295560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '682647659cba73117e15962be3b3c4b1320dea51' => 
    array (
      0 => 'app/view/templates/Contatos/detalhes.php',
      1 => 1348590313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1604022382506dcfbaca70f0-41295560',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_endereco' => 0,
    'params' => 0,
    'endereco' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_506dcfbae5cab',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506dcfbae5cab')) {function content_506dcfbae5cab($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<header>
<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
<nav>
<ul class="tab-switch">
	<li><a
		onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/incluir')"
		href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a>
	</li>

	<li><a class="default-tab" rel="tooltip" href="#"
		title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a>
	</li>

	<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[60];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[60];?>
</a></li>

</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
	<?php if ($_smarty_tpl->tpl_vars['dados_endereco']->value!==false){?> <?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])){?>
	<div class="notification success">	<a href="#" class="close-notification"	title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[44];?>
" rel="tooltip">x</a>
		<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
	</div>
	<?php }?>

	<article class="half-block">
	<div class="article-container">
		<?php  $_smarty_tpl->tpl_vars['endereco'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['endereco']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_endereco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['endereco']->key => $_smarty_tpl->tpl_vars['endereco']->value){
$_smarty_tpl->tpl_vars['endereco']->_loop = true;
?>
		<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['endereco']->value['WebsiteIdiomas']['txt_idioma'];?>
</h2>
		</header>

		<section>
		<table>
			<tr>
				<td colspan="2" class="detalhes"><strong>Nome do Contato</strong><br />
					<h3><?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_titulo'];?>
</h3>
				</td>

			</tr>

			<tr>
				<td width="50%" class="detalhes"><strong>Hotel</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['endereco']->value['Hoteis']['txt_razaoSocial'];?>
</td>
				<td class="detalhes"><strong>E-Mail</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_email'];?>
</td>
			</tr>

			<tr>
				<td class="detalhes"><strong>Cidade</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['endereco']->value['CepCidades']['txt_cidade'];?>
</td>
				<td class="detalhes"><strong>UF</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['endereco']->value['CepUf']['txt_uf'];?>
</td>
			</tr>


			<tr>
				<td class="detalhes"><strong>Pa&iacute;s</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_pais'];?>
</td>
				<td class="detalhes"><strong>Telefone Principal</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_telefone'];?>
</td>
			</tr>
			<tr>
				<td class="detalhes" colspan="2"><strong>Mais Informações</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_texto'];?>
</td>

			</tr>


		</table>
		</section>
		<br /> <br /> <?php } ?>
	</div>
	</article>

	<div class="clearfix"></div>
	<button class="gray"	onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/editar/id_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['endereco']->value['cod_relacao_idioma'];?>
')" />
	<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>

	</button>
		&nbsp&nbsp
	<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos')" />
	<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>

	</button>
	<?php }else{ ?>
	<div class="notification error">
		<p>
			<strong><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>
</strong>
		</p>
	</div>
	<?php }?>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>