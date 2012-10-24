<?php
class EmailformularioController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
		*/
	public function EmailformularioController($controller,$action,$urlparams)
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

		//Solicita os dados dos textos
		$dados = $this->Delegator('ConcreteEmailformulario', 'BuscarCadastro');
			
		//Leva os dados para a view
		$this->View()->assign('dados_cadastro', $dados);

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

		//Exibe a view
		$this->View()->display('index.php');

	}

	
	/**
	 * Tela de Edição de texto
	 */
	private function editar()
	{
		//Verifica se o usuário postou o formulário
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do texto
			$resultado = $this->Delegator('ConcreteEmailformulario', 'editaEmailFormulario', $this->getPost());
		}
		else
		{
			//seleciona tudo
			$resultado = $this->Delegator("ConcreteEmailformulario", "SelectEmailFormularioId", array("cod_id" => $this->getParam('id')));

			//Coloca os dados da vaga na View
			$this->View()->assign('dados_emailformulario',$resultado);

			//Exibe a view
			$this->View()->display('editar.php');
		}
	}

	/**
	 * Localiza um texto pelo ID
	 */
	private function getTextoById()
	{
		//Valida o id do texto
		if($this->getParam('id_rel_idioma') !== false && is_numeric($this->getParam('id_rel_idioma')))
		{
			//Busca os dados do texto
			$recordset = $this->Delegator('ConcreteTextos', 'getTextos', array("cod_texto" => $this->getParam('id_rel_idioma')));

			//Verifica o resultado da consulta
			if($recordset !== false)
			{
				//Leva os dados para a view
				$this->View()->assign('dados_texto',$recordset);
			}
			else
			{
				die("Ocorreu um erro ao tentar localizar o registro solicitado");
			}
		}
	}
}