<?php
class InfraestruturaController extends ControllerBase
{
	public function InfraestruturaController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteInfraestrutura', 'BuscarTextos');
		$this->View()->assign('dados_infra',$dados);

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
			$this->Delegator('ConcreteInfraestrutura', 'IncluirInfraestrutura', $this->getPost());
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
			$this->Delegator('ConcreteInfraestrutura', 'ExcluirInfraestrutura', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscatextoID($id_relacao_idioma);

			if(!is_null($params))
			{
				$this->View()->assign('params',$params);
			}
			else if(isset($_SESSION['view_data']))
			{
				$this->View()->assign('params',$_SESSION['view_data']);
				unset($_SESSION['view_data']);
			}
			$this->View()->assign('dados_infra',$dados);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteInfraestrutura', 'EditaTexto', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteInfraestrutura', 'SelectInfraId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
				$this->getHoteis();
				$this->getIdiomas();

				$this->View()->assign('dados_infra',$dados);
				$this->View()->display('editar.php');
			}
		}
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteInfraestrutura', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getBuscatextoID($cod_relacao_idioma)
	{
		$dados_infra = $this->Delegator('ConcreteInfraestrutura', 'SelectInfraId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_infra', $dados_infra);
		return $dados_infra;
	}


	private function getHoteis()
	{
		$dados = $this->Delegator('ConcreteInfraestrutura', 'getHoteis');
		$this->View()->assign('hoteis',$dados);
	}

}