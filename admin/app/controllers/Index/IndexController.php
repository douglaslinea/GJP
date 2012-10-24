<?php
class IndexController extends ControllerBase
{
	/* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
	 * Params String Action -> A��o a ser Executada Pelo Controller	 	
	 * Aten��o Demais M�todos do Controller Devem ser Privados 
	*/
	public function IndexController($controller,$action,$urlparams)
	{
		//Inicializa os par�metros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);

		//Envia o Controller para a action solicitada
		$this->$action();
	}
	
	/**
	 * A��es Iniciais ao Entrar na Index deste Controller
	 */
	private function index_action()
	{
		//Exibe a tela de login
		$this->View()->display('index.php');
	}
	
	/**
	 * Solicita a Autentica��o do Usu�rio
	 */
	private function login()
	{		
		//Verifica se o usu�rio enviou o formul�rio
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$login = $this->Delegator('ConcreteIndex', 'Login', $this->getPost());
		}
	}
	
	/**
	 * Desbloqueia um usu�rio
	 */
	private function desbloqueio()
	{
		//Verifica se a sess�o existe
		if(isset($_SESSION))
		{
			//Verifica se o usu�rio � administrador e se o mesmo tem permiss�o de acesso
			if(isset($_SESSION['UserPerfil']) && $_SESSION['UserPerfil'] == "1")
			{
				//Valida o id do usuario
				if($this->getParam('usuario') != false && is_numeric($this->getParam('usuario')))
				{	 
					//Cria um objeto para armazenar os dados
					//$Object = $this->CreateObject();
					//Pega o id do usu�rio
					//$Object->id = $this->getParam('usuario');

					//Efetua o desbloqueio do Usu�rio
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
	 * Destr�i a sess�o do usu�rio
	 */
	private function logoff()
	{	 
		//Verifica se a sess�o existe
		if(isset($_SESSION))
		{		
			//Invoca o Helper de Autentica��o
			$AuthHelper = HelperFactory::getInstance('auth');
				
			//Destr�i a sess�o
			$AuthHelper->logout();
		}
	}
}