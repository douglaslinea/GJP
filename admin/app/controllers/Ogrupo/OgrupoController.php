<?php
class OgrupoController extends ControllerBase
{

	private $altura_crop = 100;
	private $largura_crop = 200;
	private $diretorio = "../web_files/arq_din/";
	private $tamanho_maximo = 1;
	private $largura_maxima = 300;
	private $altura_cropada = 140;
	private $largura_cropada = 210;


	public function OgrupoController ($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);

		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteOgrupo', 'selectGrupo');

		$this->View()->assign('dados_grupo', $dados);

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
		//Verifica se o formulário foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do Servico
			$this->Delegator('ConcreteOgrupo', 'IncluirMarca', $this->getPost());
		}
		else
		{
			//Busca os valores da tabela
			$this->getIdiomas();

			$this->View()->assign('altura_crop',$this->altura_crop);
			$this->View()->assign('largura_crop',$this->largura_crop);
			$this->View()->assign('altura_cropada', $this->altura_cropada);
			$this->View()->assign('largura_cropada', $this->largura_cropada);
			$this->View()->display('incluir.php');
		}
	}

	private function detalhes()
	{
		if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
		{
			//pega o id
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscaMarcaID($id_relacao_idioma);

			if(!is_null($params))
			{
				$this->View()->assign('params',$params);
			}
			else if(isset($_SESSION['view_data']))
			{
				$this->View()->assign('params',$_SESSION['view_data']);

				unset($_SESSION['view_data']);
			}

			$this->View()->assign('dados_grupo',$dados);

			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteOgrupo', 'EditaGrupo', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteOgrupo', 'SelectMarcaId', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));

					
				if($dados !== false)
				{
					$this->getIdiomas();
					$this->getImprensa();

					$this->View()->assign('altura_crop',$this->altura_crop);
					$this->View()->assign('largura_crop',$this->largura_crop);

					$this->View()->assign('dados_grupo',$dados);
					$this->View()->assign('Helper',HelperFactory::getInstance());
					$this->View()->assign('altura_crop',$this->altura_crop);
					$this->View()->assign('largura_crop',$this->largura_crop);
					$this->View()->assign('altura_cropada', $this->altura_cropada);
					$this->View()->assign('largura_cropada', $this->largura_cropada);
					$this->View()->assign('diretorio', $this->diretorio);

					$this->View()->display('editar.php');
				}
				else
				{
					die("Ocorreu um erro ao tentar localizar o registro solicitado");
				}
			}
		}
	}


	####### Funções de Busca  ##########
	private function getBuscaMarcaID($cod_relacao_idioma)
	{
		$dados_grupo = $this->Delegator('ConcreteOgrupo', 'SelectMarcaId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_grupo', $dados_grupo);
		return $dados_grupo;
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteOgrupo', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getImprensa()
	{
		$dados_imprensa = $this->Delegator('ConcreteOgrupo', 'getImprensa');
		$this->View()->assign('dados_imprensa',$dados_imprensa);
	}

	#######  Começo das funções de Imagem  ######
	private function imagem()
	{
		$this->Delegator('ConcreteOgrupo', 'SelectImagem', array('altura_crop' => $this->altura_crop, 'largura_crop' => $this->largura_crop, 'diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo, 'largura_maxima' => $this->largura_maxima));
	}
	private function deletimg()
	{
		$this->Delegator('ConcreteOgrupo', 'deletimg', array('nome_imagem_original' => $this->getPost('nome_imagem_original'), 'nome_imagem_cropada' => $this->getPost('nome_imagem_cropada'),'id' => $this->getPost('id') ));

	}

	//Esse método é responsável pela edição dos campos referentes as imagens
	private function inserirImagem(){
		$this->Delegator('ConcreteOgrupo', 'trocaImagem', array('nome_imagem_original' => $this->getPost('campo_imagem_original'), 'nome_imagem_cropada' => $this->getPost('campo_imagem_cropada'),'id' => $this->getPost('id') ));
	}




}