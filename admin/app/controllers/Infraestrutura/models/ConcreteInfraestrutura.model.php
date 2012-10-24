<?php
class ConcreteInfraestrutura
{
	public function BuscarTextos()
	{
		$tipo = "2";
		return TableFactory::getInstance('HoteisFacilidades')->BuscarTextos($tipo);
	}

	public function IncluirInfraestrutura($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$ComponenteValidacao = getComponent('validacoes/infraestrutura.validacao','infraestruturaValidacao');
		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('HoteisFacilidades')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;
			$parametros['cod_tipo'] = "2";
			
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


	public function ExcluirInfraestrutura($parametros)
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

		$ComponenteValidacao = getComponent('validacoes/infraestrutura.validacao','infraestruturaValidacao');
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

	public function SelectInfraId($parametros)
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