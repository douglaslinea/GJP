<?php
class ConcreteLazer
{
	public function BuscarTextos()
	{
		$cod_opt_cat = "4";
		return TableFactory::getInstance('Textos')->BuscarTextosEsp($cod_opt_cat);
	}

	public function IncluirLazer($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		list($parametros['cod_hotel'], $parametros['cod_marca']) =  explode("|", $parametros['cod_hotel']);

		$ComponenteValidacao = getComponent('validacoes/lazer.validacao','lazerValidacao');

		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('Textos')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma_textos'] = $cod_relacao_idioma['cod_relacao_idioma']+1;
			$parametros['cod_optCategoria'] = "4";
			$parametros['cod_categoria'] = TableFactory::getInstance('TextoscCategoria')->SelectCodigo($parametros);
			
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('Textos')->IncluirTextos($parametros, $i);
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

	public function ExcluirLazer($parametros)
	{

		LibFactory::getInstance(null,null,'Zend/Json.php');
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

		$ComponenteValidacao = getComponent('validacoes/lazer.validacao','lazerValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		list($parametros['cod_hotel'], $parametros['cod_marca']) =  explode("|", $parametros['cod_hotel']);
		
		$parametros['cod_optCategoria'] = "4";
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

	public function SelectLazerId($parametros)
	{
		return TableFactory::getInstance('Textos')->SelectTextoParametros($parametros['id_relacao_idioma']);
	}

	public function SelectCatId($parametros)
	{
		return TableFactory::getInstance('TextoscCategoria')->SelectCategoriaParametros($parametros['id_relacao_idioma']);
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
?>