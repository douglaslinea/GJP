<?php
#######################################################
#                                                     #
#  		 Configura��o do Banco de dados       #
#						      #
#######################################################

################# SGBD UTILIZADO #################################################################
define('SGBD','mysql');
##################################################################################################

################# USUARIO BANCO DE DADOS #########################################################
define('DB_USER','gjp');
##################################################################################################

################# SENHA BANCO DE DADOS ###########################################################
define('DB_PASS','t80R92U0');
##################################################################################################

################# HOST BANCO DE DADOS ############################################################
define('DB_HOST','192.168.0.167');
##################################################################################################

################# NOME BANCO DE DADOS ############################################################
define('DB_NAME','gjp');
##################################################################################################


#######################################################
#                                                     #
#  		 Configura��o dos Paths do FrameWork  #
#				                      #
#######################################################

################# PASTA RAIZ DO SISTEMA ##########################################################
define('__ROOT__', dirname(dirname(__FILE__))."/");
##################################################################################################

################# PASTA PRINCIPAL DO SISTEMA #####################################################
define('SYSTEM','system/');
##################################################################################################

################# DIRET�RIO DAS FACTORIES ########################################################
define('FACTORIES','system/factories/');
##################################################################################################

################# FLAG DOCTRINE ##################################################################
define('INSERT',true);
define('UPDATE',false);
##################################################################################################

################# URL OFFSET #####################################################################
define('URL_OFFSET','23');
##################################################################################################

################# URL PADRAO IMAGENS/SISTEMA #####################################################
define('IMG',DEFAULT_URL.'web_files/img-din/');
##################################################################################################

################# PASTA DE FONTES ################################################################
define('FONTS','web_files/fonts/');
##################################################################################################

################# FONTE DEFAULT DO CAPTCHA #######################################################
define('DEFAULT_CAPTCHA_FONT',FONTS.'anonymous.gdf');
##################################################################################################

################# IMAGEM DEFAULT DO CAPTCHA ######################################################
define('DEFAULT_CAPTCHA_IMAGE',DEFAULT_URL.'web_files/img/captcha.png');
##################################################################################################

################# CONTROLLERS DO SITE/SISTEMA ####################################################
define('CONTROLLERS','app/controllers/');
##################################################################################################

################# VIEWS DO SITE/SISTEMA ##########################################################
define('VIEWS','app/view/');
##################################################################################################

################# MODELS DO SITE/SISTEMA #########################################################
define('MODELS','app/tables/');
##################################################################################################

############## HELPERS/PLUGINS DO SITE/SISTEMA ###################################################
define('HELPERS','system/helpers/');
##################################################################################################

############## TABELAS DE IDIOMAS DA APLICA��O ###################################################
define('WEBSITE_IDIOMAS_TABLE','website_idiomas');
##################################################################################################

############## TABELAS DE TEXTOS DE LAYOUT #######################################################
define('TABELA_TEXTOS_LAYOUT','textos_layout');
##################################################################################################

############## TABELAS DE TEXTOS DE AJUDA ########################################################
define('TABELA_TEXTOS_AJUDA','textos_ajuda');
##################################################################################################

############## TABELAS DE TEXTOS GERAIS ##########################################################
define('TABELA_TEXTOS_GERAIS','textos');
##################################################################################################

################# PASTA INC DO SITE/SISTEMA ######################################################
define('INC','web_files/inc/');
##################################################################################################

################# PASTA LIB DO SITE/SISTEMA ######################################################
define('LIB','web_files/lib/');
##################################################################################################

################# PASTA LIB DO SITE/SISTEMA ######################################################
define('JS','web_files/js/');
##################################################################################################

################# PASTA ICONS DO SITE/SISTEMA ####################################################
define('ICONS',DEFAULT_URL.'web_files/icons/');
##################################################################################################

################# PASTA CSS DO SITE/SISTEMA ######################################################
define('CSS',DEFAULT_URL.'web_files/css/');
##################################################################################################

################# PASTA de Upload DO SITE/SISTEMA ################################################
define('UPLOAD_PATH','admin/web_files/upload/');
##################################################################################################

################# BACKUP DE BANCO DE DADOS #######################################################
define('BD_BACKUP','system/_bd_backup/');
##################################################################################################

################# BACKUP DE DIRET�RIOS ###########################################################
define('FTP_BACKUP','system/_ftp_backup/'.date("Y_m_d"));
##################################################################################################
?>