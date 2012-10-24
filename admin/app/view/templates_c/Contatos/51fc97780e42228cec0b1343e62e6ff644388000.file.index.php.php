<?php /* Smarty version Smarty-3.1.1, created on 2012-10-16 14:14:27
         compiled from "app/view/templates/Contatos/index.php" */ ?>
<?php /*%%SmartyHeaderCode:1399618864507d95f331f2a5-84516557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51fc97780e42228cec0b1343e62e6ff644388000' => 
    array (
      0 => 'app/view/templates/Contatos/index.php',
      1 => 1348259611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1399618864507d95f331f2a5-84516557',
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
  'unifunc' => 'content_507d95f34e6c2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507d95f34e6c2')) {function content_507d95f34e6c2($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<article class="full-block clearfix">
	<div class="article-container">
<header>
<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
<nav>
<ul class="tab-switch">
	<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a>
		<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
		<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[60];?>
</a></li>
	</ul>
</ul>
</nav> </header>
<div class="tab default-tab" id="tab0">
	<?php if ($_smarty_tpl->tpl_vars['dados_endereco']->value!==false){?> <?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])){?>
	<div class="notification success">
		<a href="#" class="close-notification" 	title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
		<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
	</div>
	<?php }?>

	<table class="datatable" id="first-desc">
		<thead>
			<tr>
				<th width="30%">Nome</th>
				<th width="20%">Telefone</th>
				<th width="20%">Cidade</th>
				<th width="20%">Estado</th>	
				<th width="20%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['endereco'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['endereco']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_endereco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['endereco']->key => $_smarty_tpl->tpl_vars['endereco']->value){
$_smarty_tpl->tpl_vars['endereco']->_loop = true;
?>
			<tr>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_titulo'];?>
</strong></td>
				<td><?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_telefone'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['endereco']->value['CepCidades']['txt_cidade'];?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['endereco']->value['CepUf']['txt_uf'];?>
</td>
				<td>
					<ul class="actions">
						<li><a class="view" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/detalhes/id_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['endereco']->value['cod_relacao_idioma'];?>
"	rel="tooltip" original-title="Ver detalhes">ver</a></li>
						<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/editar/id_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['endereco']->value['cod_relacao_idioma'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
">edit</a></li>
						<li><a class="delete" onclick="javascript:exclusaoMultipla('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/excluir/id_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['endereco']->value['cod_relacao_idioma'];?>
', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[9];?>
')" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
">delete</a></li>		
					</ul>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php }?>
		</div>
            
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>