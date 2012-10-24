<?php
class AtracaoController extends ControllerBase
{
	public function AtracaoController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteAtracao', 'BuscarTextos');
		$this->View()->assign('dados_atracao',$dados);

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
			$this->Delegator('ConcreteAtracao', 'IncluirAtracao', $this->getPost());
		}
		else
		{
			$this->getIdiomas();
			$this->getDestino();
			$this->View()->display('incluir.php');
		}
	}

	private function excluir()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->Delegator('ConcreteAtracao', 'ExcluirAtracao', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
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

			$this->View()->assign('dados_atracao',$dados);
			$this->View()->assign('dados_atracao1',$dados1);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteAtracao', 'EditaTexto', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteAtracao', 'SelectAtracaoId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
				
				$this->getIdiomas();
				$this->getDestino();
				$this->View()->assign('dados_atracao',$dados);
				$this->View()->display('editar.php');
					
			}
		}
	}
	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteAtracao', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getBuscatextoID($cod_relacao_idioma)
	{
		$dados_atracao = $this->Delegator('ConcreteAtracao', 'SelectAtracaoId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_atracao', $dados_atracao);
		return $dados_atracao;
	}

	private function getBuscaCategoriaID($cod_relacao_idioma)
	{
		$dados_atracao1 = $this->Delegator('ConcreteAtracao', 'SelectCatId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_atracao1', $dados_atracao1);
		return $dados_atracao1;
	}

	private function getDestino()
	{
		$dados_destino = $this->Delegator('ConcreteAtracao','SelectDestino');
		$this->View()->assign('destinos',$dados_destino);
	}
}