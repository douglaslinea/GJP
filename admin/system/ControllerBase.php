<?php
/**
 * @author Linea04
 * Classe de representação do Front Controller(Esta classe é responsável por fornecer o suporte aos controllers para executar suas operações
 * 											   bem como manter um único local para Armazenar as informações default do sistema)
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
		
		//************ Instancia a Classe Pageinfo para receber informações do sistema ***********
		$Pageinfo = new Pageinfo();		
		//Busca os dados do sistema
		$recordset_site_info = $Pageinfo->getWebSiteInfo();
		//****************************************************************************************
		
		//******* Definindo as informações principais do framework *********
		$this->DefineFrameworkConstants($recordset_site_info);
		//******************************************************************

		//********* Verifica se a validação de Sessão deve ser feita (Verifica se o usuário esta no controller index) ***********        
		if(strtolower($this->controller) != "index")
		{
            //Valida a sessão
            $this->CheckSession();
		}
		//***********************************************************************************************************************		
				
		//******* Define as informações do Template Engine ***************		
		$this->DefineTemplateConstants($recordset_site_info,$Pageinfo);		
		//****************************************************************
	}
	
	/**
     * Valida a Sessão do Usuário
     */
    private function CheckSession()
    {	
        //Instancia o Helper de Sessão
        $SessionHelper = HelperFactory::getInstance('session');
        
        //Valida a sessão
        if(!$SessionHelper->checkSession('UserId'))
        {
            //Instancia o Helper de Redirecionamento
            $RedirectorHelper = HelperFactory::getInstance('redirector');
            //Redireciona para a página de login
            $RedirectorHelper->goToControllerAction('index','index');
        }
        else
        {
            /* O controller index(Inicial) é o único que possui permissão a todos
             pois a partir dele se dará o acesso aos demais controllers
             */
            if(strtolower($this->controller) != "logado")
            {        
                //Instancia o Helper de Autenticação
                $AuthHelper = HelperFactory::getInstance('auth');
                
                
            	/*Verifica se a ação atual deve ser avaliada na permissão de acesso
				  obs: ações vindas de requisições json/ajax cuja as mesmas retornam valores para a view
				  normalmente não precisaram ser avaliadas nas permissões,pois as mesmas apenas retornam dados
				  para as views requisitadas, as permissões serão avalidas nas requisições POST/GET de cada view. 
				*/
				if(!($this->action == "action_javascript"))
				{
					//Verifica a permissão do Usuário
					if(!$AuthHelper->getPermissao($this->controller,$this->action))
					{
						//Sem permissão de acesso
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
	 * Delega uma função para um determinado Model e retorna o resultado da tarefa
	 * @param String $DelegateClass - Classe que cuidará da tarefa
	 * @param String $action - Método que esta Classe deverá executar
	 * @param Array/stdClass $parameters - Parâmetros que esta Classe deverá Receber
	 * @return Ambiguous - Tipo de Retorno Depende da Classe
	 */
	protected function Delegator($DelegateClass,$action,$parameters=null)
	{
		//Verifica se os parâmetros são um Array ou Objeto
		if( (!is_array($parameters) && !is_object($parameters)) && !is_null($parameters) ) die("Delegator -> Parâmetro inválido");
		
		//Requisita o Arquivo do Model Delegator
		include_once(__ROOT__.SYSTEM."delegators/ModelDelegator.php");
		//Delegamos a tarefa para a classe responsabilizada
		$resultado_tarefa = ModelDelegator::delegate($DelegateClass,array($this->controller,$action,$parameters));
		 
		//Retornamos o resultado da tarefa
		return $resultado_tarefa;
	}
	
	/**
	 * Retorna um parâmetro da URL(VIA GET)
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
	 * Modifica ou cria uma chave no Array da Requisição POST atual
	 * @param String $key
	 * @param String $value
	 */
	protected function setPost($key,$value){
		$_POST[$key] = $value;
	}
	
	/**
	 * Retorna o valor de uma determinada chave do Array POST, se nenhuma chave for informada então todo Array POST será Retornado
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
	 * Recebe um parâmetro de GET ou POST
	 * @param String $name -> nome do parâmetro a ser recebido
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
		//Retorn falso pois o parâmetro não foi encontrado em GET/POST
		else{
			return false;
		}
	}
	
	/**
	 * Seta os textos padrão do layout
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
	 * Define as Informações do Framework
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
	 * Define as informações do Template Engine
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
		//Força a compilação dos templates
		$this->view->force_compile = true;
		//Chama o cabeçalho
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
		//Caminho do Cabeçalho
		$this->view->assign("HEAD",'app/view/templates/Cabecalho/index.php');		
		//Caminho do Rodape
		$this->view->assign("FOOTER",'app/view/templates/Rodape/index.php');	
		//GOOGLE ANALYTICS
		$this->view->assign("TXT_GANALYTICS",$recordset_site_info['txt_ganalytics']);		
		
		//Busca as informações da página atual
		$recordset_pagina_atual = $Pageinfo->getPageInfo();
			
		//Titulo da Página
		$this->view->assign("TXT_TITLE",$recordset_pagina_atual['txt_title']);
		//Keywords da Página
		$this->view->assign("TXT_KEYWORDS",$recordset_pagina_atual['txt_keywords']);
		//Descrição da Página
		$this->view->assign("TXT_DESCRIPTION",$recordset_pagina_atual['txt_description']);
		//*******************************************************************************************	
	}
	
	/**
	 * Funções acionadas no cabeçalho do sistema
	 */
	private function cabecalho()
	{
		//Busca o nome amigável do controller e action atuais		
		$this->view->assign("CONTROLLER_DADOS",TableFactory::getInstance('FrameworkControllers')->getController($this->controller));
		
		$this->view->assign("ACTION_DADOS",TableFactory::getInstance('FrameworkAcoes')->getAction($this->action));
		
		//Colocamos o nome do usuário na view
		$this->View()->assign('txt_usuario',$_SESSION['UserName']);
		
		//Colocamos o nome do perfil na view
		$this->View()->assign('txt_perfil',$_SESSION['UserPerfilName']);
		
		//Consulta o banco para saber qual foi a última vez que se logou
		$dadoUltimoAcesso = TableFactory::getInstance("LogsLogin")->ExibirUltimoLogin();
		
		if(count($dadoUltimoAcesso) > 0)
		{
			//Colocamos o ultimo acesso na view
			$this->View()->assign('txt_ultimo_acesso',$dadoUltimoAcesso);
		}
	}
}
?>