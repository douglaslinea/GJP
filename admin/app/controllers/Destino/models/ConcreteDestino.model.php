<?php
class ConcreteDestino
{
	public function SelectDestino()
	{
		return TableFactory::getInstance('Destinos')->SelecionaDestinos();
	}

	public function SelectDestinoId($parametros)
	{
		return TableFactory::getInstance('Destinos')->SelectDestinoID($parametros['id_relacao_idioma']);
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

	public function getIdiomas()
	{
		//Retorna os dados dos Contatoss
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function EditaDestino($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/Destino.validacao','DestinoValidacao');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('Destinos')->ExecuteEditaDestino($parametros, $i);
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

	public function IncluirDestinos($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/Destino.validacao','DestinoValidacao');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('Destinos')->SelectUltimoRelacionamentoIdioma();
			
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;

			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('Destinos')->InserirDestinos($parametros, $i);
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

	public function ExcluirDestinos($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		//faz o select
		$dados = TableFactory::getInstance('Destinos')->ExcluirDestinosId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);

			echo Zend_Json::encode(array("1"));
		}
	}
}


