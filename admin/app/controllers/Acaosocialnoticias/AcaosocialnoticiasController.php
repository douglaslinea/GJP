<?php
class AcaosocialnoticiasController extends ControllerBase
{
	public function AcaosocialnoticiasController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteAcaosocialnoticias', 'SelectAcaoNoticias');
		$this->View()->assign('Helper',HelperFactory::getInstance());
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
			$this->Delegator('ConcreteAcaosocialnoticias', 'IncluirAcaoNoticias', $this->getPost());
		}
		else
		{
			$this->View()->assign('data_atual',date("d/m/Y"));
			$this->View()->assign('data_hora_atual',date("d/m/Y H:i:s"));
			//Leva a data/hora atual + 10 anos para a view
			$this->View()->assign('data_hora_termino',date("d/m/Y",mktime(0,0,0,date('m'),date('d'),date('Y')+10))." ".date("H:i:s"));
				
			$this->getAcao();
			$this->getIdiomas();
			$this->View()->display('incluir.php');
		}
	}

	private function excluir()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->Delegator('ConcreteAcaosocialnoticias', 'ExcluirAcaoNoticias', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
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
			$this->View()->assign('Helper',HelperFactory::getInstance());
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteAcaosocialnoticias', 'EditaAcaoNoticias', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteAcaosocialnoticias', 'SelectAcaoNoticiasId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
				if($dados !== false)
				{
					$this->getAcao();
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
		$dados_acao = $this->Delegator('ConcreteAcaosocialnoticias', 'SelectAcaoNoticiasId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_acao', $dados_acao);
		return $dados_acao;
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteAcaosocialnoticias', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getAcao()
	{
		$dados = $this->Delegator('ConcreteAcaosocialnoticias', 'getAcao');
		$this->View()->assign('acaoSocial',$dados);
	}
}
?>