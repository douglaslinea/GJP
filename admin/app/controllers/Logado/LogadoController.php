<?php
class LogadoController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
	 */
	public function LogadoController($controller,$action,$urlparams)
	{	
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function index_action($parametros = null)
	{
		
		//Solicita os dados
		$dados = $this->Delegator('ConcreteLogado', 'SelectWebsiteStatus');

		$helper = HelperFactory::getInstance();
	
		//Leva os dados para a view
		$this->View()->assign('helper',$helper);
		
		//Leva os dados para a view
		$this->View()->assign('dados',$dados);
		
		//Exibe a view inicial
		$this->View()->display('index.php');
		
		
	}
}