<?php
class DestinoController extends ControllerBase
{
	public function DestinoController ($controller,$action,$urlparams)
	{
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function index_action($params=null)
	{
		//mostra a view
		$dados = $this->Delegator('ConcreteDestino', 'SelectDestino');

		$this->View()->assign('dados_destino',$dados);

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

	private function editar()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteDestino', 'EditaDestino', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteDestino', 'SelectDestinoId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));

				$this->getIdiomas();
				$this->getEstados();
				$this->View()->assign('dados_destino',$dados);
			}
		}
		$this->View()->display('editar.php');
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			//pega o id
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscaDestinoID($id_relacao_idioma);

			if(!is_null($params))
			{
				//Adiciona os dados extras na view
				$this->View()->assign('params',$params);
			}
			//Verifica se há dados extras a serem adicionados na view(via SESSÃO)
			else if(isset($_SESSION['view_data']))
			{
				//Adiciona os dados extras na view
				$this->View()->assign('params',$_SESSION['view_data']);
				//Elimina a sessão
				unset($_SESSION['view_data']);
			}


			$this->View()->assign('dados_destino',$dados);
			//mostra a view
			$this->View()->display('detalhes.php');
		}
	}

	private function incluir()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->Delegator('ConcreteDestino', 'IncluirDestinos', $this->getPost());
		}
		else
		{
			$this->getIdiomas();
			$this->getEstados();

			$this->View()->display('incluir.php');
		}
	}

	private function buscaCidades($cod_uf=null)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		if(!is_null($cod_uf))
		{
			$parametros = array('data' => array('cod_uf' => $cod_uf));
		}
		else
		{
			$parametros = array('json_data' => true,'data' => (HelperFactory::getInstance()->isAjax() ? $this->getPost() : false));
		}

		if($parametros !== false)
		{
			$recordset = $this->Delegator('ConcreteDestino', 'buscaCidades', $parametros);

			if(!isset($parametros['json_data']))
			{
				$this->View()->assign('cidades',$recordset);
			}
		}
	}

	private function getEstados()
	{
		$dados = $this->Delegator('ConcreteDestino', 'getEstados');
		$this->View()->assign('estados',$dados);
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteDestino', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getBuscaDestinoID($cod_relacao_idioma)
	{
		$dados_destino = $this->Delegator('ConcreteDestino', 'SelectDestinoId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_destino', $dados_destino);
		return $dados_destino;
	}

	private function excluir()
	{
		//Verifica se o usuário enviou uma requisição POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Exclui os dados
			$this->Delegator('ConcreteDestino', 'ExcluirDestinos', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}
}