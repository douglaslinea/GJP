<?php
/**
 * @author Linea04
 * Classe de representa��o do Front Controller(Esta classe � respons�vel por fornecer o suporte aos controllers para executar suas opera��es
 * 											   bem como manter um �nico local para Armazenar as informa��es default do sistema)
 */
Abstract class ControllerBase {

	//Atributos da Classe
	private $controller = null;
	private $view = null;
	private $action = null;
	private $_params = null;
	
	/**
	 * Construtor da Classe
	 */
	public function ControllerBase($controller,$action,$params)
	{
		//********* Inicializa os atributos da classe ***********
		$this->controller = $controller;
		$this->action = $action;
		$this->_params = $params;
		//*******************************************************
		
		//************ Instancia a Classe Pageinfo para receber informa��es do sistema ***********
		$Pageinfo = new Pageinfo();		
		//Busca os dados do sistema
		$recordset_site_info = $Pageinfo->getWebSiteInfo();
		//****************************************************************************************
		
		//******* Definindo as informa��es principais do framework *********
		$this->DefineFrameworkConstants($recordset_site_info);
		//******************************************************************

		//********* Verifica se a valida��o de Sess�o deve ser feita (Verifica se o usu�rio esta no controller index) ***********        
		if(strtolower($this->controller) != "index")
		{
            //Valida a sess�o
            $this->CheckSession();
		}
		//***********************************************************************************************************************		
				
		//******* Define as informa��es do Template Engine ***************		
		$this->DefineTemplateConstants($recordset_site_info,$Pageinfo);		
		//****************************************************************
	}
	
	/**
     * Valida a Sess�o do Usu�rio
     */
    private function CheckSession()
    {	
        //Instancia o Helper de Sess�o
        $SessionHelper = HelperFactory::getInstance('session');
        
        //Valida a sess�o
        if(!$SessionHelper->checkSession('UserId'))
        {
            //Instancia o Helper de Redirecionamento
            $RedirectorHelper = HelperFactory::getInstance('redirector');
            //Redireciona para a p�gina de login
            $RedirectorHelper->goToControllerAction('index','index');
        }
        else
        {
            /* O controller index(Inicial) � o �nico que possui permiss�o a todos
             pois a partir dele se dar� o acesso aos demais controllers
             */
            if(strtolower($this->controller) != "logado")
            {        
                //Instancia o Helper de Autentica��o
                $AuthHelper = HelperFactory::getInstance('auth');
                
                
            	/*Verifica se a a��o atual deve ser avaliada na permiss�o de acesso
				  obs: a��es vindas de requisi��es json/ajax cuja as mesmas retornam valores para a view
				  normalmente n�o precisaram ser avaliadas nas permiss�es,pois as mesmas apenas retornam dados
				  para as views requisitadas, as permiss�es ser�o avalidas nas requisi��es POST/GET de cada view. 
				*/
				if(!($this->action == "action_javascript"))
				{
					//Verifica a permiss�o do Usu�rio
					if(!$AuthHelper->getPermissao($this->controller,$this->action))
					{
						//Sem permiss�o de acesso
						include_once (INC.'PermissaoNegada.php');
						die();
					}
				}
            }
        }
    }
	
	/**
     * Exibe a tela de acesso negado
     */
    protected function showAccessDenied()
    {    	
    	//Inclui a tela de acesso negado
    	include_once (INC.'PermissaoNegada.php');
        die();
    }
	
	/**
	 * Retorna o Controller( Nome do Controller )
	 */
	protected function Controller()
	{
		return $this->controller;
	}

	/**
	 * Retorna a Instancia da View
	 */
	protected function View()
	{
		return $this->view;
	}

	/**
	 * Retorna a Action
	 */
	protected function Action()
	{
		return $this->action;
	}

	/**
	 * Cria e retorna um novo Objeto do tipo Standard Class
	 * @return stdClass
	 */
	protected function CreateObject()
	{
			
		return new stdClass();
	}
	
	/**
	 * Delega uma fun��o para um determinado Model e retorna o resultado da tarefa
	 * @param String $DelegateClass - Classe que cuidar� da tarefa
	 * @param String $action - M�todo que esta Classe dever� executar
	 * @param Array/stdClass $parameters - Par�metros que esta Classe dever� Receber
	 * @return Ambiguous - Tipo de Retorno Depende da Classe
	 */
	protected function Delegator($DelegateClass,$action,$parameters=null)
	{
		//Verifica se os par�metros s�o um Array ou Objeto
		if( (!is_array($parameters) && !is_object($parameters)) && !is_null($parameters) ) die("Delegator -> Par�metro inv�lido");
		
		//Requisita o Arquivo do Model Delegator
		include_once(__ROOT__.SYSTEM."delegators/ModelDelegator.php");
		//Delegamos a tarefa para a classe responsabilizada
		$resultado_tarefa = ModelDelegator::delegate($DelegateClass,array($this->controller,$action,$parameters));
		 
		//Retornamos o resultado da tarefa
		return $resultado_tarefa;
	}
	
	/**
	 * Retorna um par�metro da URL(VIA GET)
	 * @param String $name
	 * @return boolean|multitype:
	 */
	protected function getParam($name = null)
	{
		if($name != null)
		{
			if(array_key_exists($name,$this->_params))
			{
				return $this->_params[$name];
			}else{
				return false;
			}
		}else{
			return $this->_params;
		}
	}
	
	/**
	 * Modifica ou cria uma chave no Array da Requisi��o POST atual
	 * @param String $key
	 * @param String $value
	 */
	protected function setPost($key,$value){
		$_POST[$key] = $value;
	}
	
	/**
	 * Retorna o valor de uma determinada chave do Array POST, se nenhuma chave for informada ent�o todo Array POST ser� Retornado
	 * @param String $name
	 * @return Ambiguous
	 */
	protected function getPost($name=null)
	{
		if($name != null)
		{
			if(array_key_exists($name,$_POST))
			{
				return $_POST[$name];
			}else{
				return false;
			}
		}else{
			return $_POST;
		}
	}
	
	/**
	 * Recebe um par�metro de GET ou POST
	 * @param String $name -> nome do par�metro a ser recebido
	 * @return
	 */
	protected function getRequestParam($name=null){
		//Verifica se existe em GET
		if($this->getParam($name) != FALSE){
			//Retorna via GET
			return $this->getParam($name);
		}
		//Verifica se existe em POST
		else if($this->getPost($name) != FALSE){
			//Retorna via POST
			return $this->getPost($name);
		}
		//Retorn falso pois o par�metro n�o foi encontrado em GET/POST
		else{
			return false;
		}
	}
	
	/**
	 * Seta os textos padr�o do layout
	 */
	private function setLayoutAdminTexts()
	{	
		//Busca os textos de layout conforme idioma
		$TextosLayoutAdmin = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
		
		//Instancia a tabela de textos
		//$Textos_site = TableFactory::getInstance('Textos')->getTexto();
		
		//Envia os textos do idioma selecionado para a view
		$this->View()->assign('textos_layout',$TextosLayoutAdmin);
		//Envia os textos do site para a view
		//$this->View()->assign('textos_site',$Textos_site);
	}
		
	/**
	 * Define as Informa��es do Framework
	 * @param Collection $recordset_site_info
	 */
	private function DefineFrameworkConstants($recordset_site_info)
	{			
		//****************** Constantes para o PHP  *************************************************		 
		//URL DEFAULT
		define('DEFAULT_URL', $recordset_site_info['url_default_admin']);
		//URL DEFAULT SITE
		define('SITE_DEFAULT_URL', $recordset_site_info['url_default']);
		//IDIOMA DEFAULT DO SISTEMA
		define('COD_IDIOMA_DEFAULT',$recordset_site_info['cod_idioma_default']);
		//Caminho dos Banners(Upload)
		define('BANNER_PATH','../web_files/img-layout/banner_arq/');
		//Define uma constante informando o Controller acessado atualmente no framework
		define('CONTROLLER_ATUAL', $this->controller);
		//Define uma constante informando a Action acessado atualmente no framework
		define('ACTION_ATUAL', $this->action);
		//*******************************************************************************************
	} 	
		
	/**
	 * Define as informa��es do Template Engine
	 * @param Collection $recordset_site_info
	 */
	private function DefineTemplateConstants($recordset_site_info,$Pageinfo)
	{		
		//******* Setando o Template Engine *********
		$this->view = new Smarty($this->controller);
		//Setando o delimitador esquerdo
		$this->view->left_delimiter = '{view}';
		//Setando o delimitador direito
		$this->view->right_delimiter = '{/view}';
		//Modo Debug desligado
		$this->view->debugging = false;
		//Caching Desligado
		$this->view->caching = false;
		//Tempo de vida do Cache
		$this->view->cache_lifetime = 120;
		//For�a a compila��o dos templates
		$this->view->force_compile = true;
		//Chama o cabe�alho
		$this->cabecalho();
		//chama a lingua
		$this->setLayoutAdminTexts();
		//*******************************************
		
		//*************************** Constantes do Smarty ******************************************
		
		//CONTROLLER_ATUAL
		$this->view->assign("CONTROLLER_ATUAL",$this->controller);
		//ACTION_ATUAL
		$this->view->assign("ACTION_ATUAL",$this->action);
		//URL DEFAULT
		$this->view->assign("URL_DEFAULT",DEFAULT_URL);		
		//IDIOMA DEFAULT DO SISTEMA
		$this->view->assign("COD_IDIOMA_DEFAULT",COD_IDIOMA_DEFAULT);
		//PASTA CSS
		$this->view->assign("CSS",DEFAULT_URL.'web_files/css/');
		//CSS SCREEN
		$this->view->assign("URL_CSS_SCREEN",DEFAULT_URL.$recordset_site_info['url_css_screen']);		
		//Caminho das Imagens ARQDIN		
		$this->view->assign("ARQ_DIN",DEFAULT_URL."../web_files/arq_din/");		
		//Caminho dos Arquivos JS
		$this->view->assign("JS",DEFAULT_URL.'web_files/js/');
		//Caminho do Ajax
		$this->view->assign("AJAX",DEFAULT_URL.'web_files/ajax/http_request.js');
		//Caminho do Cabe�alho
		$this->view->assign("HEAD",'app/view/templates/Cabecalho/index.php');		
		//Caminho do Rodape
		$this->view->assign("FOOTER",'app/view/templates/Rodape/index.php');	
		//GOOGLE ANALYTICS
		$this->view->assign("TXT_GANALYTICS",$recordset_site_info['txt_ganalytics']);		
		
		//Busca as informa��es da p�gina atual
		$recordset_pagina_atual = $Pageinfo->getPageInfo();
			
		//Titulo da P�gina
		$this->view->assign("TXT_TITLE",$recordset_pagina_atual['txt_title']);
		//Keywords da P�gina
		$this->view->assign("TXT_KEYWORDS",$recordset_pagina_atual['txt_keywords']);
		//Descri��o da P�gina
		$this->view->assign("TXT_DESCRIPTION",$recordset_pagina_atual['txt_description']);
		//*******************************************************************************************	
	}
	
	/**
	 * Fun��es acionadas no cabe�alho do sistema
	 */
	private function cabecalho()
	{
		//Busca o nome amig�vel do controller e action atuais		
		$this->view->assign("CONTROLLER_DADOS",TableFactory::getInstance('FrameworkControllers')->getController($this->controller));
		
		$this->view->assign("ACTION_DADOS",TableFactory::getInstance('FrameworkAcoes')->getAction($this->action));
		
		//Colocamos o nome do usu�rio na view
		$this->View()->assign('txt_usuario',$_SESSION['UserName']);
		
		//Colocamos o nome do perfil na view
		$this->View()->assign('txt_perfil',$_SESSION['UserPerfilName']);
		
		//Consulta o banco para saber qual foi a �ltima vez que se logou
		$dadoUltimoAcesso = TableFactory::getInstance("LogsLogin")->ExibirUltimoLogin();
		
		if(count($dadoUltimoAcesso) > 0)
		{
			//Colocamos o ultimo acesso na view
			$this->View()->assign('txt_ultimo_acesso',$dadoUltimoAcesso);
		}
	}
}
?>