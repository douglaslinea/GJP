<?php
class PermissoesController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
		*/
	public function PermissoesController($controller,$action,$urlparams)
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
		//Select das permissões
		$dados = $this->Delegator('ConcretePermissoes', 'SelectPermissaoPerfil');
		
		//Leva $dados para a view
		$this->View()->assign('dados',$dados);
			
		$this->View()->display('index.php');
	}
	
	private function excluir()
	{  
		
	}
	
	/**
	 * Solicita a edição do registro
	 */
	private function editar()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do Servico
			$resultado = $this->Delegator('ConcretePermissoes', 'EditarControlerAcao', $this->getPost());
		}
		else
		{
			if($this->getParam('id') !== false && is_numeric($this->getParam('id')))
			{
				//Select controller e ação
				$controller_acao = $this->Delegator('ConcretePermissoes', 'SelectControlerAcao');

				//Leva a $cont_cao para a view
				$this->View()->assign('controller_acao',$controller_acao);
				
				//pega os valores já vinculados ao perfil
				$dados_permissao = $this->Delegator('ConcretePermissoes', 'SelectPermissaoVinculoId', array("cod_perfil" => $this->getParam('id')));

				//Leva a $cont_cao para a view
				$this->View()->assign('dados_permissao',$dados_permissao);
				
				//jogar o id para o hidden
				$this->View()->assign('id',$this->getParam('id'));
				
				//Exibe a view
				$this->View()->display('editar.php');
			}
		}
	}

	private function incluir()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do Servico
			$resultado = $this->Delegator('ConcretePermissoes', 'CadastraControlerAcao', $this->getPost());
		}
		else
		{			
			//Select controller e ação
			$controller_acao = $this->Delegator('ConcretePermissoes', 'SelectControlerAcao');
			
			//Leva a $cont_cao para a view
			$this->View()->assign('controller_acao',$controller_acao);
			
			//Exibe a view
			$this->View()->display('incluir.php');
		}
	}
	
	private function detalhes()
	{
		//Valida o id
		if($this->getParam('id') !== false && is_numeric($this->getParam('id')))
		{
			//Select controller e ação
			$controller_acao = $this->Delegator('ConcretePermissoes', 'SelectPermissaoVinculoId', array("cod_perfil" => $this->getParam('id')));
			
			//Leva a $cont_cao para a view
			$this->View()->assign('controller_acao',$controller_acao);
			
			//Exibe a view
			$this->View()->display('detalhes.php');
		}
	}
}