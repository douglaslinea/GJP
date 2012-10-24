<?php /* Smarty version Smarty-3.1.1, created on 2012-10-16 10:50:35
         compiled from "app/view/templates/Cabecalho/index.php" */ ?>
<?php /*%%SmartyHeaderCode:1585516408507d662be548f9-84745384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc38d18f8c755b9ee237c78f0f9221b317d14a84' => 
    array (
      0 => 'app/view/templates/Cabecalho/index.php',
      1 => 1350324283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1585516408507d662be548f9-84745384',
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
  'unifunc' => 'content_507d662ca1e02',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507d662ca1e02')) {function content_507d662ca1e02($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
web_files/js/jquery1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery_ui.js" ></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/libs/modernizr-1.7.min.js"></script>

<!-- plugin de imagem -->

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery.ocupload-packed.js"></script>
<!--  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/funcoesUpload.js"></script>-->

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
logado/" title="" class="dashboard no-submenu current">Painel de Controle</a></li>


				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Hoteis','Contatos','Acomodacao','Infraestrutura','Gastronomia','Spa','Lazer','ServicosEsp','Facilidades','Comochegar','PrincipalDist','Textoshoteis'))){?> class="current" <?php }?> ><a title="Hoteis" class="hotel">Hoteis</a>
               				
					<ul>
                   <!-- Contatos dos hoteis -->
				
				<?php if (isset($_SESSION['UserPermissoes'][43])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Hoteis'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
hoteis/" title="Hoteis">Hoteis</a></li><?php }?>
			
                    <?php if (isset($_SESSION['UserPermissoes'][12])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Contatos'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/" title="Contatos">Contatos</a></li><?php }?>

                    <?php if (isset($_SESSION['UserPermissoes'][20])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Acomodacao'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
acomodacao/" title="Acomodações">Acomodações</a></li><?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][28])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Infraestrutura'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
infraestrutura" title="Infraestrutura">Infraestrutura</a></li><?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][78])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Gastronomia'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
gastronomia" title="Gastronomia">Gastronomia</a></li><?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][83])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Spa'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
spa" title="SPA">SPA</a></li><?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][89])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Lazer'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
lazer" title="Lazer">Lazer</a></li><?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][1])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='ServicosEsp'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos-layout" title="ServicosEsp">Serviçoes Especiais</a></li><?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][141])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Comochegar'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
comochegar" title="ComoChegar">Como Chegar</a></li><?php }?>
                     
                     <?php if (isset($_SESSION['UserPermissoes'][146])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Facilidades'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
facilidades" title="Facilidades">Facilidades</a></li><?php }?>
                                         
                    <?php if (isset($_SESSION['UserPermissoes'][1])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='PrincipalDist'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos-layout" title="PrincipalDist">Principais Distâncias</a></li><?php }?>
                    
					<?php if (isset($_SESSION['UserPermissoes'][110])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Textoshoteis'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoshoteis" title="Textos">Textos Introdutórios</a></li><?php }?>
                    				
					</ul>
                 
				</li>

		     	 <li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Noticia','PressKit','Download','RelacaoPublica'))){?> class="current" <?php }?> ><a title="Imprensa" class="gallery">Imprensa</a>
              
					<ul>
					
					<?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Noticia'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Notícias">Notícias</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='PressKit'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="PressKit">Press Kit</a></li>
                    <?php }?>
					
					<?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Download'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Download">Download</a></li>
                    <?php }?>
                       
                       <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='RelacaoPublica'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="RelacaoPublica">Relações Publicas</a></li>
                    <?php }?>
					</ul>
				</li>
				
				 <li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Destino','Clima','Atracao','Historia','Textosdestino','Links'))){?> class="current" <?php }?> ><a title="Destinos" class="projects">Destinos</a>
              
					<ul>
					
					<?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Destino'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
destino/" title="Destino">Destino</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Clima'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Clima">Clima</a></li>
                    <?php }?>
					
					<?php if (isset($_SESSION['UserPermissoes'][99])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Atracao'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
atracao" title="Atracao">Atração</a></li>
                    <?php }?>
                       
                       <?php if (isset($_SESSION['UserPermissoes'][94])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Historia'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
historia" title="Historia">História</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][105])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Textosdestino'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textosdestino" title="Textos">Textos Introdutórios</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Links'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Links">Links Recomendados</a></li>
                    <?php }?>
					</ul>
				</li>
				
				 <li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Oferta','Promocao','Pacotes'))){?> class="current" <?php }?> ><a title="OfertaPromocao" class="projects">Ofertas e Promoções</a>
              
					<ul>
					
					<?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Oferta'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Oferta">Ofertas</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Promocao'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Promocao">Promoções</a></li>
                    <?php }?>
					
					<?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Pacotes'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Pacotes">Pacotes</a></li>
                    <?php }?>
                       
					</ul>
				</li>
				
				 <li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Conteudo','Salas','Cardapio','PlanejeEvento','Downloads'))){?> class="current" <?php }?> ><a title="Eventos" class="events">Eventos</a>
              
					<ul>
					
					<?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Conteudo'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Conteudo">Conteúdo</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Salas'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Salas">Salas</a></li>
                    <?php }?>
					
					<?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Cardapio'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Cardapio">Cardápio</a></li>
                    <?php }?>
                       
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='PlanejeEvento'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="PlanejeEvento">Planeje seu Evento</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Downloads'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Downloads">Downloads</a></li>
                    <?php }?>
					</ul>
				</li>
				
				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Consulta','Linhatempo','Premios','Acaosocial','Acaosocialnoticias','Investimentos','Parceiros'))){?> class="current" <?php }?>><a title="GrupoGJP" class="winner">Grupo GJP</a>
					<ul>
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Consulta'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
ogrupo/" title="Consulta">Consulta</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][115])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Linhatempo'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
linhatempo" title="Linha do Tempo">Linha do Tempo</a></li>
                    <?php }?>                        
                    
                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Premios'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="Prêmios">Prêmios</a></li>
                    <?php }?>

 					<?php if (isset($_SESSION['UserPermissoes'][132])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Acaosocial'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
acaosocial" title="Ação Social">Ação Social</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][139])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Acaosocialnoticias'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
acaosocialNoticias" title="Ação Social Noticias ">Ação Social Noticias</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Investimentos'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="Investimentos">Investimentos e Administração</a></li>
                    <?php }?>

 					<?php if (isset($_SESSION['UserPermissoes'][122])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Parceiros'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
parceiros" title="Parceiros">Parceiros</a></li>
                    <?php }?>
					</ul>
				</li>

				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Vagas','FacaParte'))){?> class="current" <?php }?>><a title="RH" class="articles">RH</a>
					<ul>
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Vagas'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Vagas">Vagas</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][5])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='FacaParte'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" title="FacaParte">Faça Parte</a></li>
                    <?php }?>                        
                    
					</ul>
				</li>	

				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Cheking','Orcamento','Encomenda','Hospedagem','SuaMensagem','AgenciaViagem','TrabalheConosco','NovoNegocios','Fornecedor'))){?> class="current" <?php }?>><a title="Formularios" class="dashboard">Formulários</a>
					<ul>
					
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Cheking'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Check-in">Check-in</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][5])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Orcamento'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" title="Orçamento">Orçamento</a></li>
                    <?php }?>                        
                    
                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Encomenda'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="Encomenda">Encomenda</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Hospedagem'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="Hospedagem">Como foi a sua Hospedagem</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][5])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='SuaMensagem'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" title="SuaMensagem">Envie sua Mensagem</a></li>
                    <?php }?>                        
                    
                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='AgenciaViagem'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="AgenciaViajem">Cadastro de Agência e Viagem</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='TrabalheConosco'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="TrabalheConosco">Trabalhe Conosco</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][5])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='NovoNegocios'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" title="NovoNegocios">Novos Negócios</a></li>
                    <?php }?>                        
                    
                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Fornecedor'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="Fornecedor">Seja Nosso Fornecedor</a></li>
                    <?php }?>

					</ul>
				</li>	
				
				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('RedeSocial','Grupos','ViagemCorp','AgenteViagem','FAQ','Politica'))){?> class="current" <?php }?>><a title="Outros" class="config">Outros</a>
					<ul>
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='RedeSocial'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="RedeSocial">Rede Sociais</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][5])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Grupos'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" title="Grupos">Grupos</a></li>
                    <?php }?>                        
                    
                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='ViagemCorp'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="ViagemCorp">Viagens Corporativas</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='agenteViagem'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/1" title="AgenteViagem">Agentes de Viagem</a></li>
                    <?php }?>
                                            
                    <?php if (isset($_SESSION['UserPermissoes'][5])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='FAQ'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" title="FAQ">FAQ</a></li>
                    <?php }?>                        
                    
                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Politica'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="Politica">Politicas de Rede</a></li>
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