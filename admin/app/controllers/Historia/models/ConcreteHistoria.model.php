<?php
class ConcreteHistoria
{
	public function BuscarTextos()
	{
		$cod_opt_cat = "5";
		return TableFactory::getInstance('Textos')->BuscarTextosDestinos($cod_opt_cat);
	}

	public function IncluirHistoria($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$ComponenteValidacao = getComponent('validacoes/historia.validacao','historiaValidacao');
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('Textos')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma_textos'] = $cod_relacao_idioma['cod_relacao_idioma']+1;
			$parametros['cod_optCategoria'] = "5";
			$parametros['cod_categoria'] = TableFactory::getInstance('TextoscCategoria')->SelectCodigo($parametros);

			//print_r($parametros);
			//exit();

			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('Textos')->IncluirTextos($parametros, $i);
			}

			//Busca os textos de erro
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36]);

			//Retorna true em caso de sucesso
			echo Zend_Json::encode(array('1'));
		}
		else
		{
			//Resposta do JSON
			echo Zend_Json::encode($resultado_validacao);
		}
	}


	public function ExcluirHistoria($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		//faz o select
		$dados = TableFactory::getInstance('Textos')->ExcluirTextosId($parametros['id_relacao_idioma']);

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

		$ComponenteValidacao = getComponent('validacoes/historia.validacao','historiaValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		$parametros['cod_optCategoria'] = "5";
		$parametros['cod_categoria'] = TableFactory::getInstance('TextoscCategoria')->SelectCodigo($parametros);
			
		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('Textos')->ExecuteEditaTextoParametros($parametros, $i);
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

	public function SelectHistoriaId($parametros)
	{
		return TableFactory::getInstance('Textos')->SelectTextoParametrosDestinos($parametros['id_relacao_idioma']);
	}

	public function SelectCatId($parametros)
	{
		return TableFactory::getInstance('TextoscCategoria')->SelectCategoriaParametrosDestinos($parametros['id_relacao_idioma']);
	}

	public function getIdiomas()
	{
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function SelectDestino()
	{
		return TableFactory::getInstance('Destinos')-> SelecionaDestinos();
	}

}