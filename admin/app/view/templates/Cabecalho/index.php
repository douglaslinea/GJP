<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" lang="pt" charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/style.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/colors.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/jquery.tipsy.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/jquery.wysiwyg.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/jquery.datatables.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/jquery.nyromodal.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/jquery.datepicker.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/jquery.fileinput.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/jquery.fullcalendar.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/jquery.visualize.css">

<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/ajax/http_request.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/json_functions.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/mascaras.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/jquery1.7.2.min.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/jquery_ui.js" ></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-1.7.min.js"></script>

<!-- plugin de imagem -->

<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/jquery.ocupload-packed.js"></script>
<!--  <script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/funcoesUpload.js"></script>-->

<link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>

<!-- favicon -->
<link rel="icon" href="{view}$URL_DEFAULT{/view}favicon.ico" type="image/x-icon" />

<title>{view}$textos_layout[38]{/view}</title>

</head>
<body>

<div class="fixed-wraper">
	<section role="navigation">
		<header>
			<a href="{view}$URL_DEFAULT{/view}"><img src="{view}$URL_DEFAULT{/view}web_files/img/marca-cliente.png" height="120" alt="" title="" /></a>
            <br /><br /><br />
			<h2>{view}$textos_layout[39]{/view}</h2>
		</header>
        
		<section id="user-info">
			<div style="width:180px;">
				<strong>{view}$txt_usuario{/view}</strong> <em>({view}$txt_perfil{/view})</em><br />
				{view}if $txt_ultimo_acesso != ""{/view}
					<em>{view}$textos_layout[40]{/view}: {view}$txt_ultimo_acesso{/view}</em>
				{view}/if{/view}              
				<ul>
					<li><a class="button-link" href="http://www.lineacom.com.br" title="ir para o website" rel="tooltip" target="_blank">website</a></li>
					<li><a class="button-link" href="{view}$URL_DEFAULT{/view}index/logoff" title="sair" rel="tooltip">logout</a></li>
				</ul>
			</div>
		</section>
		
		<nav id="main-nav">
			<ul>
				<li {view}if $CONTROLLER_ATUAL eq 'Logado'{/view} class="current" {view}/if{/view} ><a href="{view}$URL_DEFAULT{/view}logado/" title="" class="dashboard no-submenu current">Painel de Controle</a></li>


				<li {view}if in_array($CONTROLLER_ATUAL,array('Hoteis','Contatos','Acomodacao','Infraestrutura','Gastronomia','Spa','Lazer','ServicosEsp','Facilidades','Comochegar','Distancias','Textoshoteis')){/view} class="current" {view}/if{/view} ><a title="Hoteis" class="hotel">Hoteis</a>
               				
					<ul>
                   <!-- Contatos dos hoteis -->
				
				{view}if isset($smarty.session.UserPermissoes[43]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Hoteis'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}hoteis/" title="Hoteis">Hoteis</a></li>{view}/if{/view}
			
                    {view}if isset($smarty.session.UserPermissoes[12]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Contatos'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}contatos/" title="Contatos">Contatos</a></li>{view}/if{/view}

                    {view}if isset($smarty.session.UserPermissoes[20]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Acomodacao'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}acomodacao/" title="Acomodações">Acomodações</a></li>{view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[28]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Infraestrutura'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}infraestrutura" title="Infraestrutura">Infraestrutura</a></li>{view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[78]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Gastronomia'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}gastronomia" title="Gastronomia">Gastronomia</a></li>{view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[83]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Spa'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}spa" title="SPA">SPA</a></li>{view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[89]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Lazer'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}lazer" title="Lazer">Lazer</a></li>{view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[1]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'ServicosEsp'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}textos-layout" title="ServicosEsp">Serviçoes Especiais</a></li>{view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[141]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Comochegar'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}comochegar" title="ComoChegar">Como Chegar</a></li>{view}/if{/view}
                     
                     {view}if isset($smarty.session.UserPermissoes[146]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Facilidades'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}facilidades" title="Facilidades">Facilidades</a></li>{view}/if{/view}
                                         
                    {view}if isset($smarty.session.UserPermissoes[1]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Distancias'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}distancias" title="Distâncias">Principais Distâncias</a></li>{view}/if{/view}
                    
					{view}if isset($smarty.session.UserPermissoes[110]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Textoshoteis'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}textoshoteis" title="Textos">Textos Introdutórios</a></li>{view}/if{/view}
                    				
					</ul>
                 
				</li>

		     	 <li {view}if in_array($CONTROLLER_ATUAL,array('Noticia','PressKit','Download','RelacaoPublica' )){/view} class="current" {view}/if{/view} ><a title="Imprensa" class="gallery">Imprensa</a>
              
					<ul>
					
					{view}if isset($smarty.session.UserPermissoes[19]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Noticia'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}noticias" title="Notícias">Notícias</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'PressKit'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="PressKit">Press Kit</a></li>
                    {view}/if{/view}
					
					{view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Download'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Download">Download</a></li>
                    {view}/if{/view}
                       
                       {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'RelacaoPublica'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="RelacaoPublica">Relações Publicas</a></li>
                    {view}/if{/view}
					</ul>
				</li>
				
				 <li {view}if in_array($CONTROLLER_ATUAL,array('Destino','Clima','Atracao','Historia','Textosdestino','Links' )){/view} class="current" {view}/if{/view} ><a title="Destinos" class="projects">Destinos</a>
              
					<ul>
					
					{view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Destino'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}destino/" title="Destino">Destino</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Clima'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Clima">Clima</a></li>
                    {view}/if{/view}
					
					{view}if isset($smarty.session.UserPermissoes[99]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Atracao'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}atracao" title="Atracao">Atração</a></li>
                    {view}/if{/view}
                       
                       {view}if isset($smarty.session.UserPermissoes[94]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Historia'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}historia" title="Historia">História</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[105]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Textosdestino'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}textosdestino" title="Textos">Textos Introdutórios</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Links'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Links">Links Recomendados</a></li>
                    {view}/if{/view}
					</ul>
				</li>
				
				 <li {view}if in_array($CONTROLLER_ATUAL,array('Oferta','Promocao','Pacotes')){/view} class="current" {view}/if{/view} ><a title="OfertaPromocao" class="projects">Ofertas e Promoções</a>
              
					<ul>
					
					{view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Oferta'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Oferta">Ofertas</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Promocao'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Promocao">Promoções</a></li>
                    {view}/if{/view}
					
					{view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Pacotes'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Pacotes">Pacotes</a></li>
                    {view}/if{/view}
                       
					</ul>
				</li>
				
				 <li {view}if in_array($CONTROLLER_ATUAL,array('Conteudo','Salas','Cardapio','PlanejeEvento','Downloads')){/view} class="current" {view}/if{/view} ><a title="Eventos" class="events">Eventos</a>
              
					<ul>
					
					{view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Conteudo'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Conteudo">Conteúdo</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Salas'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Salas">Salas</a></li>
                    {view}/if{/view}
					
					{view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Cardapio'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Cardapio">Cardápio</a></li>
                    {view}/if{/view}
                       
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'PlanejeEvento'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="PlanejeEvento">Planeje seu Evento</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Downloads'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Downloads">Downloads</a></li>
                    {view}/if{/view}
					</ul>
				</li>
				
				<li {view}if in_array($CONTROLLER_ATUAL,array('Consulta','Linhatempo','Reconhecimento','Acaosocial','Acaosocialnoticias','Investimentos','Parceiros')){/view} class="current" {view}/if{/view}><a title="GrupoGJP" class="winner">Grupo GJP</a>
					<ul>
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Consulta'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}ogrupo/" title="Consulta">Consulta</a></li>
                    {view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[115]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Linhatempo'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}linhatempo" title="Linha do Tempo">Linha do Tempo</a></li>
                    {view}/if{/view}                        
                    
                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Reconhecimento'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}reconhecimento" title="Reconhecimento">Reconhecimento</a></li>
                    {view}/if{/view}

 					{view}if isset($smarty.session.UserPermissoes[132]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Acaosocial'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}acaosocial" title="Ação Social">Ação Social</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[139]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Acaosocialnoticias'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}acaosocialNoticias" title="Ação Social Noticias ">Ação Social Noticias</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Investimentos'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}seo" title="Investimentos">Investimentos e Administração</a></li>
                    {view}/if{/view}

 					{view}if isset($smarty.session.UserPermissoes[122]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Parceiros'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}parceiros" title="Parceiros">Parceiros</a></li>
                    {view}/if{/view}
					</ul>
				</li>

				<li {view}if in_array($CONTROLLER_ATUAL,array('Vagas','FacaParte')){/view} class="current" {view}/if{/view}><a title="RH" class="articles">RH</a>
					<ul>
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Vagas'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Vagas">Vagas</a></li>
                    {view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[5]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'FacaParte'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}idiomas" title="FacaParte">Faça Parte</a></li>
                    {view}/if{/view}                        
                    
					</ul>
				</li>	

				<li {view}if in_array($CONTROLLER_ATUAL,array('Cheking','Orcamento','Encomenda','Hospedagem','SuaMensagem','AgenciaViagem','TrabalheConosco','NovoNegocios','Fornecedor')){/view} class="current" {view}/if{/view}><a title="Formularios" class="dashboard">Formulários</a>
					<ul>
					
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Cheking'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Check-in">Check-in</a></li>
                    {view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[5]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Orcamento'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}idiomas" title="Orçamento">Orçamento</a></li>
                    {view}/if{/view}                        
                    
                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Encomenda'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}seo" title="Encomenda">Encomenda</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Hospedagem'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Hospedagem">Como foi a sua Hospedagem</a></li>
                    {view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[5]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'SuaMensagem'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}idiomas" title="SuaMensagem">Envie sua Mensagem</a></li>
                    {view}/if{/view}                        
                    
                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'AgenciaViagem'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}seo" title="AgenciaViajem">Cadastro de Agência e Viagem</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'TrabalheConosco'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="TrabalheConosco">Trabalhe Conosco</a></li>
                    {view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[5]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'NovoNegocios'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}idiomas" title="NovoNegocios">Novos Negócios</a></li>
                    {view}/if{/view}                        
                    
                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Fornecedor'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}seo" title="Fornecedor">Seja Nosso Fornecedor</a></li>
                    {view}/if{/view}

					</ul>
				</li>	
				
				<li {view}if in_array($CONTROLLER_ATUAL,array('RedeSocial','Grupos','ViagemCorp','AgenteViagem','FAQ','Politica')){/view} class="current" {view}/if{/view}><a title="Outros" class="config">Outros</a>
					<ul>
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'RedeSocial'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="RedeSocial">Rede Sociais</a></li>
                    {view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[5]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Grupos'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}idiomas" title="Grupos">Grupos</a></li>
                    {view}/if{/view}                        
                    
                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'ViagemCorp'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}seo" title="ViagemCorp">Viagens Corporativas</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'agenteViagem'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="AgenteViagem">Agentes de Viagem</a></li>
                    {view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[5]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'FAQ'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}idiomas" title="FAQ">FAQ</a></li>
                    {view}/if{/view}                        
                    
                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Politica'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}seo" title="Politica">Politicas de Rede</a></li>
                    {view}/if{/view}

					</ul>
				</li>	
				
				<li {view}if in_array($CONTROLLER_ATUAL,array('Configuracoes','Seo','Idiomas')){/view} class="current" {view}/if{/view}><a title="Configurações" class="settings">Configurações</a>
					<ul>
                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Configuracoes'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/id/1" title="Configura&ccedil;&otilde;es b&aacute;sicas">Configura&ccedil;&otilde;es b&aacute;sicas</a></li>
                    {view}/if{/view}
                                            
                    {view}if isset($smarty.session.UserPermissoes[5]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Idiomas'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}idiomas" title="Idiomas">Idiomas</a></li>
                    {view}/if{/view}                        
                    
                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Seo'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}seo" title="SEO">SEO</a></li>
                    {view}/if{/view}

					</ul>
				</li>	
				



				<li {view}if in_array($CONTROLLER_ATUAL,array('Usuarios','Permissoes')){/view} class="current" {view}/if{/view}><a title="Usuários" class="users">Usuários</a>
					<ul>

                    {view}if isset($smarty.session.UserPermissoes[8]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Permissoes'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}permissoes" title="Permissões">Permissões</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[34]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Usuarios'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}usuarios" title="Usu&aacute;rios">Usu&aacute;rios</a></li>
                    {view}/if{/view}

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
			<li><a href="{view}$URL_DEFAULT{/view}" title="Painel de Controle">Painel de Controle</a></li>
            <li><a href="{view}$URL_DEFAULT{/view}{view}$CONTROLLER_ATUAL{/view}">{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</a></li>
            <li>{view}$ACTION_DADOS['txt_nome_amigavel']{/view}</li>
		</ul>
        
		<article class="full-block clearfix">
			<div class="article-container">