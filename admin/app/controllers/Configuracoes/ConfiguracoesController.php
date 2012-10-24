<?php
class ConfiguracoesController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
		*/
	public function ConfiguracoesController($controller,$action,$urlparams)
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
		$this->detalhes();
	}
	
	private function detalhes($params = null)
	{
		//verifica se passou o id e se é numérico
		if($this->getParam('id') !== false && is_numeric($this->getParam('id')))
		{
			//Solicita os dados da Vaga
			$dados = $this->Delegator('ConcreteConfiguracoes', 'SelectConfiguracoes', array('id' => $this->getParam('id')));

			//joga o $dados na view
			$this->View()->assign('dados_configuracao',$dados);
			
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
			
			//mostra a view
			$this->View()->display('index.php');
		}
	}

	/**
	 * Tela de edição
	 */
	private function editar()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{		
			//Solicita o cadastramento do Contato
			$resultado = $this->Delegator('ConcreteConfiguracoes', 'EditaConfiguracoes', $this->getPost());
		}
		else
		{
			//Localiza os dados pelo id
			$this->getWebsiteInf();
			
			//Exibe a view
			$this->View()->display('editar.php');
		}
	}
	
	private function getWebsiteInf()
	{
		//Valida o id do Contato
		if($this->getParam('id') !== false && is_numeric($this->getParam('id')))
		{
			//Busca os idiomas
			$this->getIdiomas();
				
			//Busca os dados da tabela websiteInfo
			$dados = $this->Delegator('ConcreteConfiguracoes', 'SelectConfiguracoes', array('id' => $this->getParam('id')));

			//Verifica o resultado da consulta
			if($dados !== false)
			{
				//Leva os dados para a view
				$this->View()->assign('dados_configuracao',$dados);
			}
			else
			{	
				die("Ocorreu um erro ao tentar localizar o registro solicitado");
			}
		}
	}
	
	/**
	 * Solicita os dados dos idiomas e carrega na view
	 */
	private function getIdiomas()
	{
		//Solicita os dados dos idiomas
		$recordset = $this->Delegator('ConcreteConfiguracoes', 'getIdiomas');

		//Associa os dados na view
		$this->View()->assign('idiomas',$recordset);
	}
}