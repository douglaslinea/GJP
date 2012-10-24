<?php /* Smarty version Smarty-3.1.1, created on 2012-07-31 18:48:31
         compiled from "app/view/templates/Usuarios/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:1831906252501852af4523a0-50991381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1adac8975cd5130699e2a0b2442bbec994bb9ff5' => 
    array (
      0 => 'app/view/templates/Usuarios/editar.php',
      1 => 1342703478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1831906252501852af4523a0-50991381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_usuario' => 0,
    'array_status' => 0,
    'status' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_501852af62d64',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501852af62d64')) {function content_501852af62d64($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<article class="full-block clearfix">
	<div class="article-container">
		<header>
			<h2>Usuário</h2>
			<nav>
				<ul class="tab-switch">
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios');"href="" rel="tooltip" title="Listar">Listar</a></li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/incluir');" href="" rel="tooltip" title="Incluir novo registro">Incluir novo registro</a></li>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				</ul>
			</nav>
		</header>

		<div class="tab default-tab" id="tab0">
			 <form name="frm_usuario" id="frm_usuario" method="post" action="javascript:acaoo('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/editar', 'frm_usuario', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')">
			<!--<form name="frm_usuario" id="frm_usuario" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/editar"> -->
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Nome</label>
						</dt>
						<dd>
							<input type="text" name="txt_nome" id="txt_nome" value="<?php echo $_smarty_tpl->tpl_vars['dados_usuario']->value['txt_nome'];?>
" class="medium" maxlength="60" />
							<span id="msg_txt_nome"></span>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
						
						<dt>
							<label>E-mail</label>
						</dt>
						<dd>
							<input type="text" name="txt_email" id="txt_email" value="<?php echo $_smarty_tpl->tpl_vars['dados_usuario']->value['txt_email'];?>
" class="medium" maxlength="255" />
							<span id="msg_txt_email"></span>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
						
						<dt>
							<label>Login</label>
						</dt>
						<dd>
							<input type="text" name="txt_login" id="txt_login" value="<?php echo $_smarty_tpl->tpl_vars['dados_usuario']->value['txt_login'];?>
" class="medium" maxlength="20" />
							<span id="msg_txt_login"></span>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
						
						<dt>
							<label>Status</label>
						</dt>
						<dd>
							<select name="cod_status" id="cod_status">
								<option value=""><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
</option>
								<?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['array_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value){
$_smarty_tpl->tpl_vars['status']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['status']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['dados_usuario']->value['cod_status']==$_smarty_tpl->tpl_vars['status']->value['cod_id']){?> selected="selected"<?php }?>"><?php echo $_smarty_tpl->tpl_vars['status']->value['txt_descricao'];?>
</option>
								<?php } ?>
							</select>
							<span id="msg_txt_status"></span>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
						
						<dt>
							<label>Alterar a senha?</label>
						</dt>
						<dd>
							<input type="checkbox" name="check_senha" id="check_senha" value="S" onclick="checkSenha()" />
						</dd>
						
						<dt>
							<label>Senha</label>
						</dt>
						<dd>
							<input type="password" name="txt_senha" id="txt_senha" class="medium" maxlength="255"  disabled="disabled" />
							<span id="msg_txt_senha"></span>
							<p>Preenchimento obrigat&oacute;rio (se checkbox marcado).</p>
						</dd>
						
						<dt>
							<label>Confirmar a senha</label>
						</dt>
						<dd>
							<input type="password" name="txt_confirma_senha" id="txt_confirma_senha" class="medium" maxlength="255" disabled="disabled" />
							<span id="msg_txt_confirma_senha"></span>
							<p>Preenchimento obrigat&oacute;rio (se checkbox marcado).</p>
						</dd>
					</dl>
				</fieldset>
	
				<button type="submit" id="btn_enviar" class="gray" />Enviar</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios" />Cancelar</a>
				<input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_usuario']->value['cod_id'];?>
" />
			</form>
		</div>
		
		<script type="text/javascript">
		
		function checkSenha()
		{
			if($('input[name=check_senha]').attr('checked') == true)
			{
				$("#txt_senha").removeAttr('disabled');
				$("#txt_confirma_senha").removeAttr('disabled');
			}
			else
			{
				$("#txt_senha").attr('disabled','disabled');
				$("#txt_confirma_senha").attr('disabled','disabled');

				$("#txt_senha").val('');
				$("#txt_confirma_senha").val('');
			}
		}

		function acaoo(url, form, url_final, mensagem_botao, id_botao)
		{
			$('#'+id_botao).attr("disabled", true); //desabilita o submit
			$('#'+id_botao).text(mensagem_botao[1]); //muda o valor do botão
			
			//seta a url e os parâmetros a serem usamos pelo PHP    
			var pars = "/rnd/" + Math.random()*4;
			
			//Requisição Ajax
		    jQuery.ajax(
		    {
		       url: url+pars, //URL de destino
		       contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		       data: jQuery('#'+form).serialize(),
		       type: 'post',
		       dataType: "json", //Tipo de Retorno
		       success: function(json)
		       {
		    	   //libera o botão e manda o valor original
		           $('#'+id_botao).attr("disabled", false);
		           $('#'+id_botao).text(mensagem_botao[0]);
		           
		           //limpa o span com os erros
		    	   limpaSpan('invalid-side-note');

		           //Se ocorrer tudo certo
		           if(json[0]=="1")
		           {
		               document.location = url_final;
		           }
		           else
		           {
		        	   //Percorre os erros    
			           for(var msg_erro in json)
			           {
			        	   erro = $('#'+json[msg_erro]['id_element']);
			        	   erro.addClass('invalid-side-note');
			        	   erro.html(json[msg_erro]['mensagem']);
				       }
				   }
				}
		    });
		}
				
		
		</script>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>