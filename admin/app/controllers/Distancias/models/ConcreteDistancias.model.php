<?php
class ConcreteDistancias
{
	public function BuscarDistancias()
	{
		return TableFactory::getInstance('HoteisDistancias')->BuscarDistancias();
	}

	public function IncluirDistancias($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$ComponenteValidacao = getComponent('validacoes/distancias.validacao','distanciaValidacao');
		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('HoteisDistancias')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;
						
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('HoteisDistancias')->IncluirDistancias($parametros, $i);
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

	public function ExcluirDistancias($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$dados = TableFactory::getInstance('HoteisDistancias')->ExcluirDistanciasId($parametros['id_relacao_idioma']);

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

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$ComponenteValidacao = getComponent('validacoes/distancias.validacao','distanciaValidacao');
		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('HoteisDistancias')->ExecuteEditaDistancias($parametros, $i);
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

	public function SelectDistanciasId($parametros)
	{
		return TableFactory::getInstance('HoteisDistancias')->SelectDistanciasParametros($parametros['id_relacao_idioma']);
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