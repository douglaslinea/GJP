<?
class NoticiasController extends ControllerBase
{
	private $altura_crop = 100;
	private $largura_crop = 200;
	private $diretorio = "../web_files/arq_din/";
	private $tamanho_maximo = 1;
	private $largura_maxima = 300;
	
	/* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
	 * Params String Action -> A��o a ser Executada Pelo Controller
	 * Aten��o Demais M�todos do Controller Devem ser Privados
	 */
	public function NoticiasController($controller,$action,$urlparams)
	{
		//Inicializa os par�metros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	/**
	 * A��es Iniciais ao Entrar na Index deste Controller
	 */
	private function index_action($params = null)
	{
		//Solicita os dados dos textos
		$dados = $this->Delegator('ConcreteNoticias', 'SelectConteudos');
			
		//Leva os dados para a view
		$this->View()->assign('dados_noticias',$dados);
			
		//Verifica se h� dados extras a serem adicionados na view(via parametro)
		if(!is_null($params))
		{		
			//Adiciona os dados extras na view
			$this->View()->assign('params',$params);
		}
		//Verifica se h� dados extras a serem adicionados na view(via SESS�O)
		else if(isset($_SESSION['view_data']))
		{		
			//Adiciona os dados extras na view
			$this->View()->assign('params',$_SESSION['view_data']);
			//Elimina a sess�o
			unset($_SESSION['view_data']);
		}
			
		//Exibe a view
		$this->View()->display('index.php');
	}


	/**
	 * Incluir uma not�cia
	 */
	private function incluir()
	{
		//Verifica se o formul�rio foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			//Solicita o cadastramento do Servico
			$resultado = $this->Delegator('ConcreteNoticias', 'IncluirNoticia',$this->getPost());		
			
		}
		else
		{	 
			//Busca os idiomas
			$this->getIdiomas();

			
			//Leva a data/hora atual para a view
			$this->View()->assign('data_hora_atual',date("d/m/Y H:i:s"));
			//Leva a data/hora atual + 10 anos para a view
			$this->View()->assign('data_hora_termino',date("d/m/Y",mktime(0,0,0,date('m'),date('d'),date('Y')+10))." ".date("H:i:s"));
			$this->View()->assign('altura_crop',$this->altura_crop);
			$this->View()->assign('largura_crop',$this->largura_crop);
			 
			//Exibe a view
			$this->View()->display('incluir.php');
		}
		
	}

	/**
	 * Solicita a atualiza��o da Not�cia
	 */
	private function editar()
	{
		//Verifica se o formul�rio foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{	 
			
			//Solicita o cadastramento do Conteudo
			$this->Delegator('ConcreteNoticias', 'EditaNoticia', $this->getPost()); 
		}
		else
		{	 
			//Valida o id do Conteudo
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				//Localiza o Conteudo
				$dados = $this->Delegator('ConcreteNoticias', 'SelectNoticiaRelacaoId', array("cod_relacao_idioma" => $this->getParam('id_relacao_idioma')));

				//Verifica se o Conteudo foi encontrado
				if($dados !== false)
				{		
					//Busca os idiomas
					$this->getIdiomas();

					//Dados do Conteudo
					$this->View()->assign('dados_noticia',$dados);
					
					//Leva o Helper Principal para a view
					$this->View()->assign('Helper',HelperFactory::getInstance());
					$this->View()->assign('altura_crop',$this->altura_crop);
					$this->View()->assign('largura_crop',$this->largura_crop);
					
					//Exibe a view
					$this->View()->display('editar.php');
				}
				else
				{
					$this->listar(array('mensagem_confirmacao' => 'Ocorreu um erro ao tentar localizar o registro solicitado.'));
				}

			}
		}
	}

	/**
	 * Solicita a exclus�o de uma not�cia
	 */
	private function excluir()
	{
		//Verifica se o usu�rio enviou uma requisi��o POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Exclui os dados
			$this->Delegator('ConcreteNoticias', 'ExcluirNoticia', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	/**
	 * Exibe os detalhes das not�cias
	 */
	private function detalhes()
	{  
		//Valida o id
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			//Solicita os dados da Vaga
			$dados = $this->Delegator('ConcreteNoticias', 'SelectNoticiaRelacaoId', array('cod_relacao_idioma' => $this->getParam('id_relacao_idioma')));
			
			//Verifica o resultado da busca
			if($dados !== false)
			{				
				$helper = HelperFactory::getInstance();
				
				//Envia o Helper para a view afim de auxiliar na formata��o dos dados
				$this->View()->assign('Helper',$helper);
				
				//Coloca os dados da vaga na View
				$this->View()->assign('dados_noticia',$dados);
			}
			else
			{
				//Envia uma flag para a view indicando que a vaga n�o foi encontrada
				$this->View()->assign('conteudo_nao_encontrado',true);
			}
			//Apresenta a view
			$this->View()->display('detalhes.php');
		}
	}

	/**
	 * Solicita os dados dos idiomas e carrega na view
	 */
	private function getIdiomas()
	{
		//Solicita os dados dos idiomas
		$dados = $this->Delegator('ConcreteNoticias', 'getIdiomas');

		//Associa os dados na view
		$this->View()->assign('idiomas',$dados);
	}   
	
	private function imagem()
	{
		
		$this->Delegator('ConcreteNoticias', 'SelectImagem', array('altura_crop' => $this->altura_crop, 'largura_crop' => $this->largura_crop, 'diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo, 'largura_maxima' => $this->largura_maxima));
	}
	
	private function deletimg()
	{	
		
		
		//LibFactory::getInstance(null,null,'Zend/Json.php');
		$this->Delegator('ConcreteNoticias', 'deletimg', array('nome_imagem_original' => $this->getPost('nome_imagem_original'), 'nome_imagem_cropada' => $this->getPost('nome_imagem_cropada'),'id' => $this->getPost('id') ));			
		//echo Zend_Json::encode(array("1"));
	}
	
	//Esse m�todo � respons�vel pela edi��o dos campos referentes as imagens
	private function inserirImagem(){
		$this->Delegator('ConcreteNoticias', 'trocaImagem', array('nome_imagem_original' => $this->getPost('campo_imagem_original'), 'nome_imagem_cropada' => $this->getPost('campo_imagem_cropada'),'id' => $this->getPost('id') ));			
	}
}