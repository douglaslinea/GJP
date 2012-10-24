<?php /* Smarty version Smarty-3.1.1, created on 2012-07-31 18:48:31
         compiled from "app/view/templates/Cabecalho/index.php" */ ?>
<?php /*%%SmartyHeaderCode:657636392501852af634898-57704030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc38d18f8c755b9ee237c78f0f9221b317d14a84' => 
    array (
      0 => 'app/view/templates/Cabecalho/index.php',
      1 => 1343060606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '657636392501852af634898-57704030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'txt_usuario' => 0,
    'txt_perfil' => 0,
    'txt_ultimo_acesso' => 0,
    'CONTROLLER_ATUAL' => 0,
    'CONTROLLER_DADOS' => 0,
    'ACTION_DADOS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_501852af92d95',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501852af92d95')) {function content_501852af92d95($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" lang="pt" charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/style.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/colors.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/jquery.tipsy.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/jquery.wysiwyg.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/jquery.datatables.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/jquery.nyromodal.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/jquery.datepicker.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/jquery.fileinput.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/jquery.fullcalendar.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/jquery.visualize.css">

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/ajax/http_request.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/json_functions.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/mascaras.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery_ui.js" ></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/libs/modernizr-1.7.min.js"></script>


<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery-pack.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery.ocupload-packed.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/funcoesUpload.js"></script>

<link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>

<!-- favicon -->
<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
favicon.ico" type="image/x-icon" />

<title><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[38];?>
</title>

</head>
<body>

<div class="fixed-wraper">
	<section role="navigation">
		<header>
			<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/marca-cliente.png" height="120" alt="" title="" /></a>
            <br /><br /><br />
			<h2><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[39];?>
</h2>
		</header>
        
		<section id="user-info">
			<div style="width:180px;">
				<strong><?php echo $_smarty_tpl->tpl_vars['txt_usuario']->value;?>
</strong> <em>(<?php echo $_smarty_tpl->tpl_vars['txt_perfil']->value;?>
)</em><br />
				<?php if ($_smarty_tpl->tpl_vars['txt_ultimo_acesso']->value!=''){?>
					<em><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[40];?>
: <?php echo $_smarty_tpl->tpl_vars['txt_ultimo_acesso']->value;?>
</em>
				<?php }?>              
				<ul>
					<li><a class="button-link" href="http://www.lineacom.com.br" title="ir para o website" rel="tooltip" target="_blank">website</a></li>
					<li><a class="button-link" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
index/logoff" title="sair" rel="tooltip">logout</a></li>
				</ul>
			</div>
		</section>
		
		<nav id="main-nav">
			<ul>
				<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Logado'){?> class="current" <?php }?> ><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
" title="" class="dashboard no-submenu current">Painel de Controle</a></li>


				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Contatos','Noticias','Textos','Textoslayout'))){?> class="current" <?php }?> ><a title="Conte&uacute;dos do site" class="projects">Conte&uacute;dos do site</a>
                
					<ul>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][12])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Contatos'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/detalhes/id/1" title="Contatos">Contatos</a></li>                    <?php }?>

                    <?php if (isset($_SESSION['UserPermissoes'][20])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Noticias'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias" title="Not&iacute;cias">Not&iacute;cias</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][28])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Textos'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos" title="Textos">Textos</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][1])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Textoslayout'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos-layout" title="Textos de layout">Textos de layout</a></li>
                    <?php }?>
                    
					</ul>
                    
				</li>

				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Configuracoes','Seo','Idiomas'))){?> class="current" <?php }?>><a title="Configurações" class="settings">Configurações</a>
					<ul>
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Configuracoes'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Configura&ccedil;&otilde;es b&aacute;sicas">Configura&ccedil;&otilde;es b&aacute;sicas</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][5])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Idiomas'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" title="Idiomas">Idiomas</a></li>
                    <?php }?>                        
                    
                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Seo'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="SEO">SEO</a></li>
                    <?php }?>

					</ul>
				</li>

				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Usuarios','Permissoes'))){?> class="current" <?php }?>><a title="Usuários" class="users">Usuários</a>
					<ul>

                    <?php if (isset($_SESSION['UserPermissoes'][8])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Permissoes'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes" title="Permissões">Permissões</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][34])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Usuarios'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios" title="Usu&aacute;rios">Usu&aacute;rios</a></li>
                    <?php }?>

					</ul>
				</li>
                
			</ul>

        <br /><br /><br /><br /><br /><br />
        <section class="sidebar nested">
        <em>
        desenvolvido por: <a href="http://www.lineacom.com.br" target="_blank">Linea Comunica&ccedil;&atilde;o</a>
        </em>
        </section>
		</nav>
	</section>

	<section role="main">
		<ul id="breadcrumbs">        	
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
" title="Painel de Controle">Painel de Controle</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
<?php echo $_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</a></li>
            <li><?php echo $_smarty_tpl->tpl_vars['ACTION_DADOS']->value['txt_nome_amigavel'];?>
</li>
		</ul>
        
		<article class="full-block clearfix">
			<div class="article-container"><?php }} ?>