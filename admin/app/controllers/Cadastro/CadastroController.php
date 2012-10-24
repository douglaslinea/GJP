<?php
class CadastroController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
		*/
	public function CadastroController($controller,$action,$urlparams)
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
		$dados = $this->Delegator('ConcreteCadastro', 'BuscarCadastro');
			
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
	 * Solicita os dados a serem exibidos do texto selecionado
	 */
	private function detalhes()
	{
		//Valida o id
		if($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id')))
		{
			//Solicita os dados da Vaga
			$recordset = $this->Delegator('ConcreteCadastro', 'BuscarDetalhesFaleConosco',array("cod_id" => $this->getParam('cod_id')));

			//Verifica o resultado da busca
			if($recordset !== false)
			{
				//Coloca os dados da vaga na View
				$this->View()->assign('dados_cadastro',$recordset);
			}
			else
			{
				//Envia uma flag para a view indicando que a vaga não foi encontrada
				$this->View()->assign('texto_nao_encontrado',true);
			}

			//Apresenta a view
			$this->View()->display('detalhes.php');
		}
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
			$resultado = $this->Delegator('ConcreteTextos', 'editaTexto', $this->getPost());
		}
		else
		{
			//Localiza o texto pelo id
			$this->getTextoById();
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

	private function exportar()
	{
			
		//se clicar em filtrar entra aqui, depois entra no de baixo
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			//seleciona tudo
			$resultado = $this->Delegator("ConcreteCadastro","SelectFaleconoscofiltrado", $this->getPost());
		}
		//se filtrar por uma data entra aqui para listar
		elseif($this->getParam())
		{
			
			$de = str_replace("_", "/", $this->getParam('de'));
			$ate = str_replace("_", "/", $this->getParam('ate'));
				
			//seleciona tudo
			$resultado = $this->Delegator("ConcreteCadastro","SelectFaleconoscofiltrado", array('data_de' => $de, 'data_ate' => $ate));
			
		}
		//a primeira vez que entra na pagina
		else
		{
			
			//seleciona tudo
			$resultado = $this->Delegator("ConcreteCadastro","SelectCadastro");
				
			//leva o $de para a view
			$this->View()->assign('de',$de);
			//leva o $ate para a view
			$this->View()->assign('ate',$ate);
			
			//Leva o $resultado para a view
			$this->View()->assign('array_cadastro',$resultado);
				
			//exibe a view
			$this->View()->display('exportar.php');
		}
	}

	private function exportar_filtro()
	{

		//se clicar em filtrar entra aqui, depois entra no de baixo
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			//seleciona tudo
			$resultado = $this->Delegator("ConcreteCadastro","SelectCadastroFiltrar", $this->getPost());
			
			$de = str_replace("_", "/", $this->getPost('data_de'));
			$ate = str_replace("_", "/", $this->getPost('data_ate'));

			//leva o $de para a view
			$this->View()->assign('de',$de);

			//leva o $ate para a view
			$this->View()->assign('ate',$ate);
			
			//Leva o $resultado para a view
			$this->View()->assign('array_cadastro',$resultado);
				
			//exibe a view
			$this->View()->display('exportar.php');
		}

		elseif($this->getParam("de") && $this->getParam("ate"))
		{
			
			$de = str_replace("_", "/", $this->getParam('de'));
			$ate = str_replace("_", "/", $this->getParam('ate'));

			
			//seleciona tudo
			$resultado = $this->Delegator("ConcreteCadastro","SelectFaleconoscofiltrado", array('data_de' => $de, 'data_ate' => $ate));
		}
		else
		{
			
			//seleciona tudo
			$resultado = $this->Delegator("ConcreteCadastro","SelectFaleCadastro");
		}
	}




}