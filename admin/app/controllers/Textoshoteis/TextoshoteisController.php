<?php
class TextoshoteisController extends ControllerBase
{
	public function TextoshoteisController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteTextoshoteis', 'BuscarTextos');
		$this->View()->assign('dados_textos',$dados);

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
			$this->Delegator('ConcreteTextoshoteis', 'IncluirTextos', $this->getPost());
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
			$this->Delegator('ConcreteTextoshoteis', 'ExcluirTextos', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
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

			$this->View()->assign('dados_textos',$dados);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteTextoshoteis', 'EditaTexto', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteTextoshoteis', 'SelectTextosId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
				
				$this->getIdiomas();
				$this->getHoteis();
				$this->View()->assign('dados_textos',$dados);
				$this->View()->display('editar.php');
			}
		}
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteTextoshoteis', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getBuscatextoID($cod_relacao_idioma)
	{
		$dados_textos = $this->Delegator('ConcreteTextoshoteis', 'SelectTextosId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_textos', $dados_textos);
		return $dados_textos;
	}

	private function getBuscaCategoriaID($cod_relacao_idioma)
	{
		$dados_textos1 = $this->Delegator('ConcreteTextoshoteis', 'SelectCatId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_textos1', $dados_textos1);
		return $dados_textos1;
	}

	private function getHoteis()
	{
		$dados = $this->Delegator('ConcreteTextoshoteis', 'getHoteis');
		$this->View()->assign('hoteis',$dados);
	}

	private function getDestino()
	{
		$dados_destino = $this->Delegator('ConcreteTextoshoteis','SelectDestino');
		$this->View()->assign('destinos',$dados_destino);
	}
}