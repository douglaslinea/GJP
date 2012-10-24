<?php /* Smarty version Smarty-3.1.1, created on 2012-08-22 15:47:31
         compiled from "app/view/templates/Rodape/index.php" */ ?>
<?php /*%%SmartyHeaderCode:28916682650352943340bc4-19902352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf815f58b6aa4532f98d06fc29c1ba1d697e507' => 
    array (
      0 => 'app/view/templates/Rodape/index.php',
      1 => 1342703558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28916682650352943340bc4-19902352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DADOS_ENDERECO' => 0,
    'JS' => 0,
    'AJAX' => 0,
    'TXT_GANALYTICS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_503529433dd94',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503529433dd94')) {function content_503529433dd94($_smarty_tpl) {?><div id="footer">
	Endereço: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['endereco'];?>
, <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['numero'];?>

	<?php if ($_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['complemento']){?> / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['complemento'];?>
 <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['bairro']){?> - <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['bairro'];?>
 <?php }?><br />
	CEP: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['cep'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepCidades']['txt_cidade'];?>
 / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepUf']['txt_uf'];?>
 / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepUf']['cha_sigla'];?>
<br /><br />
	Telefone: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['telefone'];?>
<br />
</div>

<!-- close wrapper -->
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
mascaras.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
functions.util.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
json_functions.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
maskedinput.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['AJAX']->value;?>
" type="text/javascript"></script>

<?php echo $_smarty_tpl->tpl_vars['TXT_GANALYTICS']->value;?>

</body>
</html><?php }} ?>