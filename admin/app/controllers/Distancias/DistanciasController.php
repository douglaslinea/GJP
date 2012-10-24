<?php
class DistanciasController extends ControllerBase
{
	public function DistanciasController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteDistancias', 'BuscarDistancias');
		$this->View()->assign('dados_distancias',$dados);

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
			$this->Delegator('ConcreteDistancias', 'IncluirDistancias', $this->getPost());
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
			$this->Delegator('ConcreteDistancias', 'ExcluirDistancias', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscaDistanciasID($id_relacao_idioma);

			if(!is_null($params))
			{
				$this->View()->assign('params',$params);
			}
			else if(isset($_SESSION['view_data']))
			{
				$this->View()->assign('params',$_SESSION['view_data']);
				unset($_SESSION['view_data']);
			}
			$this->View()->assign('dados_distancias',$dados);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteDistancias', 'EditaTexto', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteDistancias', 'SelectDistanciasId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
				$this->getHoteis();
				$this->getIdiomas();

				$this->View()->assign('dados_distancias',$dados);
				$this->View()->display('editar.php');
			}
		}
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteDistancias', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getBuscaDistanciasID($cod_relacao_idioma)
	{
		$dados_distancias = $this->Delegator('ConcreteDistancias', 'SelectDistanciasId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_distancias', $dados_distancias);
		return $dados_distancias;
	}


	private function getHoteis()
	{
		$dados = $this->Delegator('ConcreteDistancias', 'getHoteis');
		$this->View()->assign('hoteis',$dados);
	}

}