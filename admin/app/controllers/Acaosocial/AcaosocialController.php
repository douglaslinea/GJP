<?php
class AcaosocialController extends ControllerBase
{
	public function AcaosocialController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteAcaosocial', 'SelectAcaoSocial');
		$this->View()->assign('dados_acao',$dados);

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
			$this->Delegator('ConcreteAcaosocial', 'IncluirAcaoSocial', $this->getPost());
		}
		else
		{
			$this->getIdiomas();
			$this->View()->display('incluir.php');
		}
	}

	private function excluir()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->Delegator('ConcreteAcaosocial', 'ExcluirAcaoSocial', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscaAcaoSocialID($id_relacao_idioma);

			if(!is_null($params))
			{
				$this->View()->assign('params',$params);
			}
			else if(isset($_SESSION['view_data']))
			{
				$this->View()->assign('params',$_SESSION['view_data']);
				unset($_SESSION['view_data']);
			}
			$this->View()->assign('dados_acao',$dados);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteAcaosocial', 'EditaAcaoSocial', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteAcaosocial', 'SelectAcaoSocialId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
				if($dados !== false)
				{
					$this->getIdiomas();
					$this->View()->assign('dados_acao',$dados);
					$this->View()->assign('Helper',HelperFactory::getInstance());
					$this->View()->display('editar.php');
				}
				else
				{
					die("Ocorreu um erro ao tentar localizar o registro solicitado");
				}
			}
		}
	}

	private function getBuscaAcaoSocialID($cod_relacao_idioma)
	{
		$dados_acao = $this->Delegator('ConcreteAcaosocial', 'SelectAcaoSocialId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_acao', $dados_acao);
		return $dados_acao;
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteAcaosocial', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}
}
?>