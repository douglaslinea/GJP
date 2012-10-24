<?php /* Smarty version Smarty-3.1.1, created on 2012-08-28 16:11:35
         compiled from "app/view/templates/Configuracoes/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:704528640503d17e7055708-80900555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14c85c27025043f51f7fb771519169d44020f8aa' => 
    array (
      0 => 'app/view/templates/Configuracoes/editar.php',
      1 => 1345738648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '704528640503d17e7055708-80900555',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'dados_configuracao' => 0,
    'textos_layout' => 0,
    'idiomas' => 0,
    'idioma' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_503d17e7228e7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503d17e7228e7')) {function content_503d17e7228e7($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<header>
			<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['id'];?>
');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
					<li><a class="default-tab" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">
			<form name="frm_configuracoes" id="frm_configuracoes" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['id'];?>
', 'frm_configuracoes','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['id'];?>
', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')">

				<fieldset>
					<legend>Configura&ccedil;&otilde;es gerais</legend>                
					<dl>
                        <dt>
							<label>T&iacute;tulo padr&atilde;o do website</label>
                        </dt>
                        
                        <dd>
                        	<input type="text" name="txt_default_title" id="txt_default_title" value="<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_title'];?>
" class="medium"/>
                        	<span id="msg_txt_default_title"></span>
                        	<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
                        </dd>
					</dl>
					<dl>
						<dt>
							<label>Idioma padr&atilde;o</label>
                        </dt>
                        
                        <dd>
                            <select name="cod_idioma" id="cod_idioma" class="small">
                            	<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
                            	<?php  $_smarty_tpl->tpl_vars['idioma'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['idioma']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['idiomas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['idioma']->key => $_smarty_tpl->tpl_vars['idioma']->value){
$_smarty_tpl->tpl_vars['idioma']->_loop = true;
?>
                            		<option value="<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['dados_configuracao']->value['cod_idioma_default']==$_smarty_tpl->tpl_vars['idioma']->value['cod_id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_idioma'];?>
</option>
                            	<?php } ?>
                            </select>
            
            				<span id="msg_idioma"></span>
            				<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
            			</dd>
					</dl>
					<dl>
                        <dt>
							<label>Palavras-chave padr&atilde;o do website</label>
                        </dt>
                        
                        <dd>
                        	<textarea name="txt_default_key" id="txt_default_key" class="medium"><?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_key'];?>
</textarea>
                        	<span id="msg_txt_default_key"></span>
                        	<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os termos devem ser separados por v&iacute;rgulas.</p>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
                        </dd>
					</dl>
					<dl>
                        <dt>
							<label>Descri&ccedil;&atilde;o padr&atilde;o do website</label>
                        </dt>
                        
                        <dd>
                        	<textarea name="txt_default_desc" id="txt_default_desc" class="medium"><?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_desc'];?>
</textarea>
                        	<span id="msg_txt_default_desc"></span>
                        	<p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
                        </dd>
					</dl>
					<dl>
                        <dt>
							<label>E-mail (webmaster)</label>
                        </dt>                       
                        <dd>
                        	<input type="text" name="txt_email_webmaster" id="txt_email_webmaster" value="<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_email_webmaster'];?>
" class="medium" maxlength="255"/>
                        	<span id="msg_txt_email_webmaster"></span>
                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
                        </dd>
                    </dl>
                </fieldset>
                
                <button type="submit" id="btn_enviar" class="gray" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[50];?>
</button>
                &nbsp;ou&nbsp; 
                <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['id'];?>
" />Cancelar</a>
                <input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['id'];?>
" />
        	</form>
        </div>   	
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>