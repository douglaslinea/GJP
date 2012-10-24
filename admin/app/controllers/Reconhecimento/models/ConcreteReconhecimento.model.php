<?php
class ConcreteReconhecimento
{
	public function selectReconhecimento()
	{
		$parametros = TableFactory::getInstance('GjpReconhecimento')->PegaHotelMarca();

		$array = array();
		foreach($parametros as $key => $par)
		{
			$array[$key] = TableFactory::getInstance('GjpReconhecimento')->SelectReconhecimento($par);
		}
		return $array;
	}

	public function EditaReconhecimentos($parametros)
	{

		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/reconhecimento.validacao','reconhecimentoValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('GjpReconhecimento')->EditaReconhecimentos($parametros, $i);
			}
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			echo Zend_Json::encode(array("1"));
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function IncluirReconhecimentos($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/reconhecimento.validacao','reconhecimentoValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('GjpReconhecimento')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;

			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('GjpReconhecimento')->InserirReconhecimentos($parametros,$i);
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

	public function ExcluirReconhecimentos($parametros)
	{

		LibFactory::getInstance(null,null,'Zend/Json.php');
		$dados = TableFactory::getInstance('GjpReconhecimento')->ExcluirReconhecimentosId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);
			echo Zend_Json::encode(array("1"));
		}
	}

	public function SelectHoteis()
	{
		return TableFactory::getInstance('Hoteis')->SelectHoteis();
	}

	public function SelectMarca()
	{
		return TableFactory::getInstance('MarcaGJP')->selectGrupo();
	}

	public function SelectReconhecimentoId($parametros)
	{
		$valores = TableFactory::getInstance('GjpReconhecimento')->PegaHotelMarcaID($parametros);

		return TableFactory::getInstance('GjpReconhecimento')->selectReconhecimentosID($valores, $parametros);

	}




	public function getIdiomas()
	{
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}


}