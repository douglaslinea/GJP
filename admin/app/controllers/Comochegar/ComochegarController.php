<?php
class ComochegarController extends ControllerBase
{
	public function ComochegarController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteComochegar', 'BuscarTextos');
		$this->View()->assign('dados_chegar',$dados);

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
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->Delegator('ConcreteComochegar', 'IncluirChegar', $this->getPost());
		}
		else
		{
			$this->getIdiomas();
			$this->getHoteis();
			$this->View()->display('incluir.php');
		}
	}

	private function excluir()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->Delegator('ConcreteComochegar', 'ExcluirChegar', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
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

			$this->View()->assign('dados_chegar',$dados);
			$this->View()->assign('dados_chegar1',$dados1);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteComochegar', 'EditaTexto', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteComochegar', 'SelectChegarId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));

				$this->getHoteis();
				$this->getIdiomas();
				$this->View()->assign('dados_chegar',$dados);
				$this->View()->display('editar.php');
			}
		}
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteComochegar', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getBuscatextoID($cod_relacao_idioma)
	{
		$dados_chegar = $this->Delegator('ConcreteComochegar', 'SelectChegarId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_chegar', $dados_chegar);
		return $dados_chegar;
	}

	private function getBuscaCategoriaID($cod_relacao_idioma)
	{
		$dados_chegar1 = $this->Delegator('ConcreteComochegar', 'SelectCatId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_chegar1', $dados_chegar1);
		return $dados_chegar1;
	}

	private function getHoteis()
	{
		$dados = $this->Delegator('ConcreteComochegar', 'getHoteis');
		$this->View()->assign('hoteis',$dados);
	}
}
?>