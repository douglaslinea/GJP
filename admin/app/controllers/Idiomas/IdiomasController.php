<?php
class IdiomasController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
		*/
	public function IdiomasController($controller,$action,$urlparams)
	{
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	/**
	 * Ações Iniciais ao Entrar na Index deste Controller
	 */
	private function index_action($params=null)
	{
		//Seleciona os idiomas
		$dados = $this->Delegator('ConcreteIdiomas', 'SelecionaIdioma');
			
		//Associa os dados das especificações na view
		$this->View()->assign('dados_idioma',$dados);

		//Verifica se há dados extras a serem adicionados na view(via parametro)
		if(!is_null($params))
		{
			//Adiciona os dados extras na view
			$this->View()->assign('params',$params);
		}
		//Verifica se há dados extras a serem adicionados na view(via SESSÃO)
		elseif(isset($_SESSION['view_data']))
		{
			//Adiciona os dados extras na view
			$this->View()->assign('params',$_SESSION['view_data']);
			//Elimina a sessão
			unset($_SESSION['view_data']);
				
		}
		//Exibe a index
		$this->View()->display('index.php');
	}

	/**
	 * Solicita a inclusão de um novo registro
	 */
	private function incluir()
	{
		//Verifica se o usuário enviou uma requisição POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita a inclusão do registro
			$this->Delegator('ConcreteIdiomas', 'Incluir', $this->getPost());
		}
		else
		{
			//Exibe a view
			$this->View()->display('incluir.php');
		}
	}

	/**
	 * Solicita a edição do registro
	 */
	private function editar()
	{
		//Verifica se o usuário enviou uma requisição POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita a inclusão do registro
			$this->Delegator('ConcreteIdiomas', 'Editar',$this->getPost());
		}
		else
		{
			//Valida o id informado
			if($this->getParam('id') !== false && is_numeric($this->getParam('id')))
			{					
				//Solicita os dados do curso
				$dados = $this->Delegator('ConcreteIdiomas', 'SelectIdiomaId', array('cod_id' => $this->getParam('id')));

				//Verifica se o registro foi encontrado
				if($dados !== false)
				{
					//Envia os dados recuperados para a view
					$this->View()->assign('dados_idioma',$dados);
				}
				else
				{
					die("Ocorreu um erro ao tentar localizar o registro solicitado");
				}
				//Exibe a view
				$this->View()->display('editar.php');
			}
		}
	}

	private function excluir()
	{
		//Verifica se o usuário enviou uma requisição POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Exclui os dados
			$this->Delegator('ConcreteIdiomas', 'ExcluirIdioma', array("cod_id" => $this->getParam('id')));
		}
	}
}