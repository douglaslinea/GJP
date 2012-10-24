<?php /* Smarty version Smarty-3.1.1, created on 2012-07-31 18:48:37
         compiled from "app/view/templates/Permissoes/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:1388375734501852b59504c0-73005899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7c9bcff277e6d1b56ea596019fb220a490963c6' => 
    array (
      0 => 'app/view/templates/Permissoes/editar.php',
      1 => 1342703476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1388375734501852b59504c0-73005899',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'controller_acao' => 0,
    'contr' => 0,
    'id' => 0,
    'dados_permissao' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_501852b5a9dcd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501852b5a9dcd')) {function content_501852b5a9dcd($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<article class="full-block clearfix">
		<div class="article-container">
			<header>
				<h2>Notícias</h2>
				<nav>
					<ul class="tab-switch">
						<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes');" href="" rel="tooltip" title="Listar">Listar</a></li>
						<li class="inativo">Ver Detalhes</li>
						<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
						<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
					</ul>
				</nav>
			</header>
			
			<div class="tab default-tab" id="tab0">
				<form name="frm_conteudo" id="frm_conteudo" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/editar', 'frm_conteudo', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')" >
				<!--<form name="frm_conteudo" id="frm_conteudo" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/editar" >-->
							<fieldset>
								<legend>Dados de publica&ccedil;&atilde;o</legend>
								<dl>
									<dt>
										<label>Controller e Ação</label>
									</dt>
							
									<dd>
										<?php  $_smarty_tpl->tpl_vars['contr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_acao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contr']->key => $_smarty_tpl->tpl_vars['contr']->value){
$_smarty_tpl->tpl_vars['contr']->_loop = true;
?>
											<?php if ($_smarty_tpl->tpl_vars['contr']->value['PermissaoVinculo'][0]['cod_perfil']==$_smarty_tpl->tpl_vars['id']->value||$_smarty_tpl->tpl_vars['contr']->value['PermissaoVinculo'][1]['cod_perfil']==$_smarty_tpl->tpl_vars['id']->value){?>
												<input type="checkbox" name="controller_acao[]" id="controller_acao" value="<?php echo $_smarty_tpl->tpl_vars['contr']->value['cod_id'];?>
" checked="checked"/>												
											<?php }else{ ?>
												<input type="checkbox" name="controller_acao[]" id="controller_acao" value="<?php echo $_smarty_tpl->tpl_vars['contr']->value['cod_id'];?>
"  />
											<?php }?>
											<b>Controller:</b> <?php echo $_smarty_tpl->tpl_vars['contr']->value['FrameworkControllers']['txt_nome_amigavel'];?>
 <b>Ação:</b> <?php echo $_smarty_tpl->tpl_vars['contr']->value['FrameworkAcoes']['txt_nome_amigavel'];?>

											<br/>
										<?php } ?>
									</dd>
									
									<dt>
										<label>Nome do perfil</label>
									</dt>
									
									<dd>
										<input type="text" name="txt_perfil" id="txt_perfil" value="<?php echo $_smarty_tpl->tpl_vars['dados_permissao']->value['PermissaoPerfis']['txt_perfil'];?>
" />
										<span id="msg_txt_perfil"></span>
									</dd>
								</dl>
							</fieldset>
					
					<input type="hidden" name="cod_tipo" id="cod_tipo" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
					<button type="submit" id="btn_enviar" class="gray" />
					Enviar
					</button>
					&nbsp;ou&nbsp;
					<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes" />Cancelar</a>
				</form>
			</div>
			
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>