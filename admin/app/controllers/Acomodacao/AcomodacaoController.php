<?php
class AcomodacaoController extends ControllerBase
{
	public function AcomodacaoController ($controller,$action,$urlparams)
	{
		//Inicializa os parтmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function index_action($params=null)
	{
		//mostra a view
		$dados = $this->Delegator('ConcreteAcomodacao', 'SelectAcomodacao');

		$this->View()->assign('dados_acomodacao',$dados);

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
		//Verifica se o formulсrio foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do Servico
			$this->Delegator('ConcreteAcomodacao', 'IncluirAcomodacao', $this->getPost());
		}
		else
		{
			//Busca os valores da tabela
			$this->getIdiomas();
			$this->getHoteis();
			$this->View()->display('incluir.php');
		}
	}

	private function excluir()
	{
		//Verifica se o usuсrio enviou uma requisiчуo POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Exclui os dados
			$this->Delegator('ConcreteAcomodacao', 'ExcluirAcomodacao', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			//pega o id
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscaAcomodacaoID($id_relacao_idioma);

			if(!is_null($params))
			{
				//Adiciona os dados extras na view
				$this->View()->assign('params',$params);
			}
			//Verifica se hс dados extras a serem adicionados na view(via SESSУO)
			else if(isset($_SESSION['view_data']))
			{
				//Adiciona os dados extras na view
				$this->View()->assign('params',$_SESSION['view_data']);
				//Elimina a sessуo
				unset($_SESSION['view_data']);
			}


			$this->View()->assign('dados_acomodacao',$dados);
			//mostra a view
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		//Verifica se o formulсrio foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{

			//Solicita o cadastramento do Contato
			$resultado = $this->Delegator('ConcreteAcomodacao', 'EditaAcomodacao', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				//Localiza o Contato
				$dados = $this->Delegator('ConcreteAcomodacao', 'SelectAcomodacaoId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));


				//Verifica se o Contato foi encontrado
				if($dados !== false)
				{
					$this->getHoteis();
					$this->getIdiomas();

					$this->View()->assign('dados_contatos',$dados);

					//Leva o Helper Principal para a view
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

	private function getBuscaAcomodacaoID($cod_relacao_idioma)
	{
		$dados_acomodacao = $this->Delegator('ConcreteAcomodacao', 'SelectAcomodacaoId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_acomodacao', $dados_acomodacao);
		return $dados_acomodacao;
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteAcomodacao', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getHoteis()
	{
		$dados = $this->Delegator('ConcreteAcomodacao', 'getHoteis');
		$this->View()->assign('hoteis',$dados);
	}

}
?>