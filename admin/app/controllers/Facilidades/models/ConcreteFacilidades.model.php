<?php
class ConcreteFacilidades
{
	public function BuscarTextos()
	{
		$tipo = "1";
		return TableFactory::getInstance('HoteisFacilidades')->BuscarTextos($tipo);
	}

	public function IncluirFacilidades($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$ComponenteValidacao = getComponent('validacoes/facilidades.validacao','facilidadesValidacao');
		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('HoteisFacilidades')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;
			$parametros['cod_tipo'] = "1";
			
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('HoteisFacilidades')->IncluirTextos($parametros, $i);
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


	public function ExcluirFacilidades($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$dados = TableFactory::getInstance('HoteisFacilidades')->ExcluirTextosId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);
			echo Zend_Json::encode(array("1"));
		}
	}

	public function EditaTexto($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/facilidades.validacao','facilidadesValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('HoteisFacilidades')->ExecuteEditaTextoParametros($parametros, $i);
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

	public function SelectFacilidadesId($parametros)
	{
		return TableFactory::getInstance('HoteisFacilidades')->SelectTextoParametros($parametros['id_relacao_idioma']);
	}

	public function getIdiomas()
	{
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function getHoteis()
	{
		return TableFactory::getInstance('Hoteis')->pegaHotel();
	}
}