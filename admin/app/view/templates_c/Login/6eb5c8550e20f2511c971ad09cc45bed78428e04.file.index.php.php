<?php /* Smarty version Smarty-3.1.1, created on 2012-10-10 08:41:29
         compiled from "app/view/templates/Login/index.php" */ ?>
<?php /*%%SmartyHeaderCode:115918112450755ee9c651a3-41646822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eb5c8550e20f2511c971ad09cc45bed78428e04' => 
    array (
      0 => 'app/view/templates/Login/index.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115918112450755ee9c651a3-41646822',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50755ee9d4221',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50755ee9d4221')) {function content_50755ee9d4221($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/json_functions.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/mascaras.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery_ui.js" ></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/ajaxupload.js" ></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/libs/modernizr-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/ajax/http_request.js"></script>

<form id="form_login" name="form_login" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
login/logado', 'form_login', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
admin/logado', new Array('Enviar', 'Aguarde...'))" method="post">
<!-- <form id="form_login" name="form_login" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
login/logado" method="post"> -->
    <fieldset>
        <dl>
            <dt><label>Login:</label></dt>

            <dd>
                <input type="text" name="txt_login" id="txt_login" maxlength="20" />
                <span id="msg_erro_login"></span>
            </dd>

            <dt><label>Senha:</label></dt>

            <dd>
                <input type="password" name="txt_senha" id="txt_senha" maxlength="20" />
                <span id="msg_erro_senha"></span>
            </dd>
        </dl>
    </fieldset>

    <button type="submit" id="btn_enviar" />Enviar</button>
</form><?php }} ?>