<?php
class IndexController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller	 	
	 * Atenção Demais Métodos do Controller Devem ser Privados 
	*/
	public function IndexController($controller,$action,$urlparams)
	{
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);

		//Envia o Controller para a action solicitada
		$this->$action();
	}
	
	/**
	 * Ações Iniciais ao Entrar na Index deste Controller
	 */
	private function index_action()
	{
		//Exibe a tela de login
		$this->View()->display('index.php');
	}
	
	/**
	 * Solicita a Autenticação do Usuário
	 */
	private function login()
	{		
		//Verifica se o usuário enviou o formulário
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$login = $this->Delegator('ConcreteIndex', 'Login', $this->getPost());
		}
	}
	
	/**
	 * Desbloqueia um usuário
	 */
	private function desbloqueio()
	{
		//Verifica se a sessão existe
		if(isset($_SESSION))
		{
			//Verifica se o usuário é administrador e se o mesmo tem permissão de acesso
			if(isset($_SESSION['UserPerfil']) && $_SESSION['UserPerfil'] == "1")
			{
				//Valida o id do usuario
				if($this->getParam('usuario') != false && is_numeric($this->getParam('usuario')))
				{	 
					//Cria um objeto para armazenar os dados
					//$Object = $this->CreateObject();
					//Pega o id do usuário
					//$Object->id = $this->getParam('usuario');

					//Efetua o desbloqueio do Usuário
					$resultado_desbloqueio = $this->Delegator("ConcreteIndex","desbloquear",array("id" => $this->getParam('usuario')));

					if($resultado_desbloqueio)
					{
						echo "Usuario desbloqueado com Sucesso";
						exit();
					}
					else
					{		
						echo "Ocorreu um erro ao desbloquear o usuario";
						exit();
					}
				}
			}
		}
	}

	/**
	 * Destrói a sessão do usuário
	 */
	private function logoff()
	{	 
		//Verifica se a sessão existe
		if(isset($_SESSION))
		{		
			//Invoca o Helper de Autenticação
			$AuthHelper = HelperFactory::getInstance('auth');
				
			//Destrói a sessão
			$AuthHelper->logout();
		}
	}
}