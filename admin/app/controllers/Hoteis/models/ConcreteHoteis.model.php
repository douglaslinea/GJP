<?php
class ConcreteHoteis
{
	public function IncluirHoteis($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$ComponenteValidacao = getComponent('validacoes/hoteis.validacao','HoteisValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudocInclusaoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('Hoteis')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma_hotel'] = $cod_relacao_idioma['cod_relacao_idioma']+1;

			$cod_rel_dow = TableFactory::getInstance('DownloadCategoria')->SelectUltimoRelacionamentoIdioma();
			$cod_rel_img = TableFactory::getInstance('ImagemCategoria')->SelectUltimoRelacionamentoIdioma();
			$cod_rel_imp = TableFactory::getInstance('ImprensaCategoria')->SelectUltimoRelacionamentoIdioma();

			$parametros['cod_relacao_idioma_Download'] = $cod_rel_dow['cod_relacao_idioma']+1;
			$parametros['cod_relacao_idioma_Imagem'] = $cod_rel_img['cod_relacao_idioma']+1;
			$parametros['cod_relacao_idioma_Imprensa'] = $cod_rel_imp['cod_relacao_idioma']+1;


			for($i = 1; $i <= $total_idiomas; $i++)
			{
				$parametros['cod_categoria_download'] = TableFactory::getInstance('DownloadCategoria')->InsereCategoriaHotel($parametros,$i);
				$parametros['cod_categoria_imagem'] = TableFactory::getInstance('ImagemCategoria')->InsereCategoriaHotel($parametros,$i);
				$parametros['cod_imprensa'] = TableFactory::getInstance('ImprensaCategoria')->InsereCategoriaHotel($parametros,$i);
				TableFactory::getInstance('Hoteis')->InsereHotel($parametros, $i);
			}
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36]);
			echo Zend_Json::encode(array('1'));
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function EditaHoteis($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$ComponenteValidacao = getComponent('validacoes/hoteis.validacao','HoteisValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('Hoteis')->ExecuteEditaHoteis($parametros, $i);
			}
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35]);
			echo Zend_Json::encode(array("1"));
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function ExcluirHotel($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$dados = TableFactory::getInstance('Hoteis')->ExcluirHotelId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);
			echo Zend_Json::encode(array("1"));
		}
	}


	#######  Começo das Funções de Busca #############
	public function SelectHoteis()
	{
		return TableFactory::getInstance('Hoteis')->SelectHoteis();
	}

	public function SelectDestino()
	{
		return TableFactory::getInstance('Destinos')-> SelecionaDestinos();
	}

	public function getIdiomas()
	{
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function getEstados()
	{
		return TableFactory::getInstance('CepUf')->getEstados();
	}

	public function buscaCidades($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$recordset = TableFactory::getInstance('CepCidades')->getCidades($parametros['data']['cod_uf']);

		if(isset($parametros['json_data']))
		{
			echo Zend_Json::encode($recordset);
		}
		else
		{
			return $recordset;
		}
	}

	public function SelectHoteisId($parametros)
	{
		return TableFactory::getInstance('Hoteis')->SelecionaHoteisID($parametros['id_relacao_idioma']);
	}

	public function SelecionaHoteisEditID($parametros)
	{
		return TableFactory::getInstance('Hoteis')->SelecionaHoteisEditID($parametros['id_relacao_idioma']);
	}


	public function SelectMarca()
	{
		return TableFactory::getInstance('MarcaGJP')->selectGrupo();
	}

	#######  Começo das Funções das Imagens #############


	public function SelectImagem($parametros)
	{
		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setFazTudo($parametros['altura_crop'], $parametros['largura_crop'], $parametros['diretorio'], $parametros['tamanho_maximo'], $parametros['largura_maxima']);
	}

	public function deletimg($parametros)
	{	
		unlink('../web_files/arq_din/'.$parametros['nome_imagem_original']);
		unlink('../web_files/arq_din/'.$parametros['nome_imagem_cropada']);
		
		$exclusao = TableFactory::getInstance('Hoteis')->DeletarImagemBanco($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
		
		if($exclusao == true)
		{
			echo "Dados excluidos com sucesso do banco de dados";
		}else{
			echo "Ocorreu um erro na exclusao do banco de dados";
		}

	}

	public function trocaImagem($parametros){
		$edicao_imagem = TableFactory::getInstance('Hoteis')->AlteraImagem($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
	}
	
	public function deletimg2($parametros)
	{
		unlink('../web_files/arq_din/'.$parametros['nome_imagem_original']);
		unlink('../web_files/arq_din/'.$parametros['nome_imagem_cropada']);
		
		$exclusao = TableFactory::getInstance('Hoteis')->DeletarImagemBanco2($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
		if($exclusao == true)
		{
			echo "Dados excluidos com sucesso do banco de dados";
		}else{
			echo "Ocorreu um erro na exclusao do banco de dados";
		}

	}

	public function trocaImagem2($parametros){
		$edicao_imagem = TableFactory::getInstance('Hoteis')->AlteraImagem2($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
	}


}
?>