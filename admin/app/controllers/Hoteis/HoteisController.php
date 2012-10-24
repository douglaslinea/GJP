<?php
class HoteisController extends ControllerBase
{
	private $altura_crop = 100;
	private $largura_crop = 200;
	private $diretorio = "../web_files/arq_din/";
	private $tamanho_maximo = 1;
	private $largura_maxima = 300;
	private $altura_cropada = 140;
	private $largura_cropada = 210;


	public function HoteisController($controller,$action,$urlparams)
	{
		parent::ControllerBase($controller, $action,$urlparams);
		$this->$action();
	}

	private function index_action($params=null)
	{
		$dados = $this->Delegator('ConcreteHoteis', 'SelectHoteis');
		$this->View()->assign('dados_endereco',$dados);

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
			$this->Delegator('ConcreteHoteis', 'IncluirHoteis', $this->getPost());
		}
		else
		{
			$this->getIdiomas();
			$this->getEstados();
			$this->getMarca();
			$this->getDestino();
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
			$id_relacao_idioma = $this->getParam('id_relacao_idioma');
			$dados = $this->getBuscaHoteisID($id_relacao_idioma);

			foreach($dados as $key=>$dad)
			{
				$mapa .= $dad['cod_latitude']."[;]".$dad['cod_longitude']."|";
			}

			$this->View()->assign('mapa',$mapa);

			if(!is_null($params))
			{
				$this->View()->assign('params',$params);
			}
			else if(isset($_SESSION['view_data']))
			{
				$this->View()->assign('params',$_SESSION['view_data']);
				unset($_SESSION['view_data']);
			}
			$this->View()->assign('dados_endereco',$dados);
			$this->View()->display('detalhes.php');
		}
	}

	private function editar()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$resultado = $this->Delegator('ConcreteHoteis', 'EditaHoteis', $this->getPost());
		}
		else
		{
			if($this->getParam('id_relacao_idioma') !== false && is_numeric($this->getParam('id_relacao_idioma')))
			{
				$dados = $this->Delegator('ConcreteHoteis', 'SelecionaHoteisEditID', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));

				if($dados !== false)
				{

					$this->getIdiomas();
					$this->getEstados();
					$this->getDestino();
					$this->getMarca();

					$this->View()->assign('altura_crop',$this->altura_crop);
					$this->View()->assign('largura_crop',$this->largura_crop);					
					$this->View()->assign('altura_cropada', $this->altura_cropada);
					$this->View()->assign('largura_cropada', $this->largura_cropada);
					$this->View()->assign('diretorio', $this->diretorio);
					$this->View()->assign('dados_contatos',$dados);
					$this->View()->assign('Helper',HelperFactory::getInstance());
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

	private function excluir()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->Delegator('ConcreteHoteis', 'ExcluirHotel', array("id_relacao_idioma" => $this->getParam('id_relacao_idioma')));
		}
	}

	#######  Começo das Funções de Busca #############
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
			$recordset = $this->Delegator('ConcreteHoteis', 'buscaCidades', $parametros);

			if(!isset($parametros['json_data']))
			{
				$this->View()->assign('cidades',$recordset);
			}
		}
	}

	private function getIdiomas()
	{
		$dados = $this->Delegator('ConcreteHoteis', 'getIdiomas');
		$this->View()->assign('idiomas',$dados);
	}

	private function getEstados()
	{
		$dados = $this->Delegator('ConcreteHoteis', 'getEstados');
		$this->View()->assign('estados',$dados);
	}

	private function getBuscaHoteisID($cod_relacao_idioma)
	{
		$dados_hoteis = $this->Delegator('ConcreteHoteis', 'SelectHoteisId',array("id_relacao_idioma" => $cod_relacao_idioma));
		$this->View()->assign('dados_hoteis', $dados_hoteis);
		return $dados_hoteis;
	}

	private function getMarca()
	{
		$dados_marca = $this->Delegator('ConcreteHoteis','SelectMarca');
		$this->View()->assign('dados_marca',$dados_marca);
		return $dados_marca;
	}

	private function getDestino()
	{
		$dados_destino = $this->Delegator('ConcreteHoteis','SelectDestino');
		$this->View()->assign('dados_destino',$dados_destino);
		return $dados_destino;
	}

	#######  Começo das Funções das Imagens #############
	private function imagem()
	{
		$this->Delegator('ConcreteHoteis', 'SelectImagem', array('altura_crop' => $this->altura_crop, 'largura_crop' => $this->largura_crop, 'diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo, 'largura_maxima' => $this->largura_maxima));
	}

	private function deletimg()
	{
		$this->Delegator('ConcreteHoteis', 'deletimg', array('nome_imagem_original' => $this->getPost('nome_imagem_original'), 'nome_imagem_cropada' => $this->getPost('nome_imagem_cropada'),'id' => $this->getPost('id') ));
	}
	private function deletimg2()
	{
		$this->Delegator('ConcreteHoteis', 'deletimg2', array('nome_imagem_original' => $this->getPost('nome_imagem_original'), 'nome_imagem_cropada' => $this->getPost('nome_imagem_cropada'),'id' => $this->getPost('id') ));
	}


	//Esse método é responsável pela edição dos campos referentes as imagens
	private function inserirImagem(){
		$this->Delegator('ConcreteHoteis', 'trocaImagem', array('nome_imagem_original' => $this->getPost('campo_imagem_original'), 'nome_imagem_cropada' => $this->getPost('campo_imagem_cropada'),'id' => $this->getPost('id') ));
	}

	private function inserirImagem2(){
		$this->Delegator('ConcreteHoteis', 'trocaImagem2', array('nome_imagem_original' => $this->getPost('campo_imagem_original'), 'nome_imagem_cropada' => $this->getPost('campo_imagem_cropada'),'id' => $this->getPost('id') ));
	}





}