<?php
class SpaController extends ControllerBase
{
	public function SpaController ($controller,$action,$urlparams)
	{
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteSpa', 'BuscarTextos');
		$this->View()->assign('dados_spa',$dados);

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
			$this->Delegator('ConcreteSpa', 'Incluirspa', $this->getPost());
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
			$this->Delegator('ConcreteSpa', 'Excluirspa', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
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

			$this->View()->assign('dados_spa',$dados);
			$this->View()->assign('dados_spa1',$dados1);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteSpa', 'EditaTexto', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteSpa', 'SelectspaId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
				$this->getHoteis();
				$this->getIdiomas();
				$this->View()->assign('dados_spa',$dados);	
				$this->View()->display('editar.php');
			}
		}
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteSpa', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getBuscatextoID($cod_relacao_idioma)
	{
		$dados_spa = $this->Delegator('ConcreteSpa', 'SelectspaId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_spa', $dados_spa);
		return $dados_spa;
	}

	private function getBuscaCategoriaID($cod_relacao_idioma)
	{
		$dados_spa1 = $this->Delegator('ConcreteSpa', 'SelectCatId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_spa1', $dados_spa1);
		return $dados_spa1;
	}

	private function getHoteis()
	{
		$dados = $this->Delegator('ConcreteSpa', 'getHoteis');
		$this->View()->assign('hoteis',$dados);
	}

}
?>