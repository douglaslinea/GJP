<?
class SeoController extends ControllerBase
{
	//private $registros_por_pagina = 15;

	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
		*/
	public function SeoController($controller,$action,$urlparams)
	{		
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	/**
	 * Quando entra na index do site
	 */
	private function index_action($params = null)
	{
		//Seleciona os dados
		$dados = $this->Delegator('ConcreteSeo','SelectDados');

		//Coloca os dados na view
		$this->View()->assign('dados_seo',$dados);

		//Verifica se há dados extras a serem adicionados na view(via parametro)
		if(!is_null($params))
		{
			//Adiciona os dados extras na view
			$this->View()->assign('params',$params);
		}

		//Verifica se há dados extras a serem adicionados na view(via SESSÃO)
		else if(isset($_SESSION['view_data']))
		{
			//Adiciona os dados extras na view
			$this->View()->assign('params',$_SESSION['view_data']);
			//Elimina a sessão
			unset($_SESSION['view_data']);
		}
			
		//Apresenta a view
		$this->View()->display('index.php');
	}
	

	/**
	 * Exclui o registro
	 */	
	private function excluir()
	{
		//Verifica se o usuário enviou uma requisição POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Exclui os dados
			$this->Delegator('ConcreteSeo', 'ExcluirSeo', array("cod_id" => $this->getParam('id')));
		}
	}
	
	/**
	 * Detalhes do registro
	 */
	private function detalhes()
	{	 
		//Valida o id
		if($this->getParam('id') !== false && is_numeric($this->getParam('id')))
		{
			//Solicita os dados
			$dados = $this->Delegator('ConcreteSeo', 'SelectDetalhes', array('id' => $this->getParam('id')));

			//Verifica o resultado da busca
			if($dados !== false)
			{
				//Coloca os dados na View
				$this->View()->assign('dados_seo',$dados);

			}else{
				//Envia uma flag para a view indicando que o seo não foi encontrado
				$this->View()->assign('conteudo_nao_encontrado',true);
			}

			//Apresenta a view
			$this->View()->display('detalhes.php');
		}
	}

	/**
	 * Inclui um novo registro
	 */
	private function incluir()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do banner
			$resultado = $this->Delegator('ConcreteSeo', 'IncluiSeo', $this->getPost());			
		}
		else
		{
			//Exibe a view
			$this->View()->display('incluir.php');
		}
	}

	/**
	 * Edita o registro
	 */
	private function editar()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do banner
			$resultado = $this->Delegator('ConcreteSeo', 'EditarSeo', $this->getPost());

		}else{

			//Valida o id do seo
			if($this->getParam('id') !== false && is_numeric($this->getParam('id')))
			{
				//Localiza o Banner
				$dados = $this->Delegator('ConcreteSeo', 'SelectDetalhes', array('id' => $this->getParam('id')));
					
				//Verifica se o banner foi encontrado
				if($dados !== false)
				{
					//Dados do seo
					$this->View()->assign('dados_seo', $dados);

					//Exibe a view
					$this->View()->display('editar.php');
				}else{

					die("Ocorreu um erro ao tentar localizar o registro solicitado.");
				}

			}
		}
	}
}