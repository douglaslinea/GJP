<?php
class ContatosController extends ControllerBase
{

	public function ContatosController($controller,$action,$urlparams)
	{
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function index_action($params=null)
	{
		//mostra a view
		$dados = $this->Delegator('ConcreteContatos', 'SelectContatos');
		$this->View()->assign('dados_endereco',$dados);

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
		$this->View()->display('index.php');
	}


	private function incluir()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do Servico
			$this->Delegator('ConcreteContatos', 'IncluirContatos', $this->getPost());
		}
		else
		{
			//Busca os idiomas
			$this->getIdiomas();
			$this->getEstados();
			$this->getHoteis();
			//busca os destinos

			//$this->View()->assign('altura_crop',$this->altura_crop);
			//$this->View()->assign('largura_crop',$this->largura_crop);

			$this->View()->display('incluir.php');
		}
	}
	private function excluir()
	{
		//Verifica se o usuário enviou uma requisição POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Exclui os dados
			$this->Delegator('ConcreteContatos', 'ExcluirContatos', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			//pega o id
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');

			$dados = $this->getBuscaContatosID($id_relacao_idioma);

			//	print_r($dados);
			//exit();
			//Verifica se há dados extras a serem adicionados na view(via parametro)
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

			$this->View()->assign('dados_endereco',$dados);
			//mostra a view
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do Contato
			$resultado = $this->Delegator('ConcreteContatos', 'EditaContatos', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{

				//Localiza o Contato
				$dados = $this->Delegator('ConcreteContatos', 'SelectContatosId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));

				//Verifica se o Contato foi encontrado
				if($dados !== false)
				{
					//Busca os idiomas
					$this->getIdiomas();

					//Busca os estados
					$this->getEstados();
					$this->getHoteis();

					$this->View()->assign('dados_contatos',$dados);

					//Leva o Helper Principal para a view
					$this->View()->assign('Helper',HelperFactory::getInstance());

					//Exibe a view
					$this->View()->display('editar.php');
				}
				else
				{
					die("Ocorreu um erro ao tentar localizar o registro solicitado");
				}
			}
		}
	}


	private function buscaCidades($cod_uf=null)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Verifica o tipo de solicitação
		if(!is_null($cod_uf))
		{
			//Parametros da Requisição
			$parametros = array('data' => array('cod_uf' => $cod_uf));
		}
		else
		{
			//Parametros da Requisição
			$parametros = array('json_data' => true,'data' => (HelperFactory::getInstance()->isAjax() ? $this->getPost() : false));
		}

		//Verifica se os parametros foram informados corretamente
		if($parametros !== false)
		{
			//Delega a tarefa ao Model
			$recordset = $this->Delegator('ConcreteContatos', 'buscaCidades', $parametros);

			//Verifica o tipo de retorno
			if(!isset($parametros['json_data']))
			{
				//Associa os dados a view
				$this->View()->assign('cidades',$recordset);
			}
		}
	}

	## Solicita os dados do idioma
	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteContatos', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getHoteis()
	{
		$dados = $this->Delegator('ConcreteContatos', 'getHoteis');
		$this->View()->assign('hoteis',$dados);
	}

	##Solicita os dados dos estado e joga na view
	private function getEstados()
	{
		$dados = $this->Delegator('ConcreteContatos', 'getEstados');
		$this->View()->assign('estados',$dados);
	}

	private function getBuscaContatosID($cod_relacao_idioma)
	{
		$dados_contatos = $this->Delegator('ConcreteContatos', 'SelectContatosId', array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_contatos', $dados_contatos);
		return $dados_contatos;
	}

}