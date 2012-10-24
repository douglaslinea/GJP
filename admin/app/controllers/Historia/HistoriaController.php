<?php
class HistoriaController extends ControllerBase
{
	public function HistoriaController ($controller,$action,$urlparams)
	{
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function index_action($params=null)
	{
		//mostra a view

		$dados = $this->Delegator('ConcreteHistoria', 'BuscarTextos');

		$this->View()->assign('dados_historia',$dados);

		if(!is_null($params))
		{
			$this->View()->assign('params',$params);
		}

		else if(isset($_SESSION['view_data']))
		{
			$this->View()->assign('params',$_SESSION['view_data']);

			unset($_SESSION['view_data']);
		}

		$this->View()->display('index.php');
	}

	private function incluir()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do Servico
			$this->Delegator('ConcreteHistoria', 'IncluirHistoria', $this->getPost());
		}
		else
		{
			//Busca os valores da tabela
			$this->getIdiomas();
			$this->getDestino();
			$this->View()->display('incluir.php');
		}
	}

	private function excluir()
	{
		//Verifica se o usuário enviou uma requisição POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Exclui os dados
			$this->Delegator('ConcreteHistoria', 'ExcluirHistoria', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			//pega o id
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscatextoID($id_relacao_idioma);
			$dados1 =  $this->getBuscaCategoriaID($id_relacao_idioma);

			if(!is_null($params))
			{
				$this->View()->assign('params',$params);
			}
			else if(isset($_SESSION['view_data']))
			{
				$this->View()->assign('params',$_SESSION['view_data']);

				unset($_SESSION['view_data']);
			}

			$this->View()->assign('dados_historia',$dados);
			$this->View()->assign('dados_historia1',$dados1);

			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteHistoria', 'EditaTexto', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				//Localiza o Contato
				$dados = $this->Delegator('ConcreteHistoria', 'SelectHistoriaId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
					
				$this->getIdiomas();
				$this->getDestino();
				$this->View()->assign('dados_historia',$dados);
				$this->View()->display('editar.php');
					
			}
		}
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteHistoria', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getBuscatextoID($cod_relacao_idioma)
	{
		$dados_historia = $this->Delegator('ConcreteHistoria', 'SelectHistoriaId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_historia', $dados_historia);
		return $dados_historia;
	}

	private function getBuscaCategoriaID($cod_relacao_idioma)
	{
		$dados_historia1 = $this->Delegator('ConcreteHistoria', 'SelectCatId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_historia1', $dados_historia1);
		return $dados_historia1;
	}

	private function getDestino()
	{
		$dados_destino = $this->Delegator('ConcreteHistoria','SelectDestino');
		$this->View()->assign('destinos',$dados_destino);
	}
}