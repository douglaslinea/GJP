<?php
class ReconhecimentoController extends ControllerBase
{
	public function ReconhecimentoController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteReconhecimento', 'selectReconhecimento');
		$this->View()->assign('dados_reconhecimento', $dados);
		
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
			$this->Delegator('ConcreteReconhecimento', 'IncluirReconhecimentos', $this->getPost());
		}
		else
		{
			$this->getHotel();
			$this->getMarca();
			$this->getIdiomas();
			$this->View()->display('incluir.php');
		}
	}

	private function excluir()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->Delegator('ConcreteReconhecimento', 'ExcluirReconhecimentos', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscaReconhecimentoID($id_relacao_idioma);
		
			if(!is_null($params))
			{
				$this->View()->assign('params',$params);
			}
			else if(isset($_SESSION['view_data']))
			{
				$this->View()->assign('params',$_SESSION['view_data']);
				unset($_SESSION['view_data']);
			}
			$this->View()->assign('dados_reconhecimento',$dados);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteReconhecimento', 'EditaReconhecimentos', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteReconhecimento', 'SelectReconhecimentoId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));

				if($dados !== false)
				{
					$this->getHotel();
					$this->getMarca();
					$this->getIdiomas();
					$this->View()->assign('dados_reconhecimento',$dados);
					$this->View()->display('editar.php');
				}
				else
				{
					die("Ocorreu um erro ao tentar localizar o registro solicitado");
				}
			}
		}
	}

	private function getBuscaReconhecimentoID($cod_relacao_idioma)
	{
		$dados = $this->Delegator('ConcreteReconhecimento', 'SelectReconhecimentoId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_reconhecimento', $dados);
		return $dados;
	}


	private function getMarca()
	{
		$dados_marca = $this->Delegator('ConcreteReconhecimento','SelectMarca');
		$this->View()->assign('dados_marca',$dados_marca);
		return $dados_marca;
	}

	private function getHotel()
	{
		$dados_hotel = $this->Delegator('ConcreteReconhecimento', 'SelectHoteis');
		$this->View()->assign('dados_hotel',$dados_hotel);
		return $dados_hotel;
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteReconhecimento', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

}