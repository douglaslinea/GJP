<?php
class ConcreteAcaosocialnoticias
{
	public function IncluirAcaoNoticias($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$ComponenteValidacao = getComponent('validacoes/acaonoticias.validacao','acaosocialNoticias');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('GjpAcoesNoticias')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;

			$parametros['dat_data'] = HelperFactory::getInstance()->FormataData($parametros['dat_data'],'usa');
			$parametros['dat_inicio'] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_inicio'],'usa');
			$parametros['dat_termino'] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_termino'],'usa');
				
				
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('GjpAcoesNoticias')->IncluirAcaoNoticias($parametros, $i);
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

	public function ExcluirAcaoNoticias($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');
		$dados = TableFactory::getInstance('GjpAcoesNoticias')->ExcluirAcaoNoticiasId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);
			echo Zend_Json::encode(array("1"));
		}
	}

	public function EditaAcaoNoticias($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/acaonoticias.validacao','acaosocialNoticias');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$parametros['dat_data'] = HelperFactory::getInstance()->FormataData($parametros['dat_data'],'usa');
			$parametros['dat_inicio'] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_inicio'],'usa');
			$parametros['dat_termino'] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_termino'],'usa');
					
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('GjpAcoesNoticias')->ExecuteEditaAcaoNoticias($parametros, $i);
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

	public function getIdiomas()
	{
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function getAcao()
	{
		return TableFactory::getInstance('GjpAcoesSociais')->SelectBuscaAcaoSocial();
	}

	public function SelectAcaoNoticias()
	{
		return TableFactory::getInstance('GjpAcoesNoticias')->SelectAcaoNoticias();
	}

	public function SelectAcaoNoticiasId($parametros)
	{
		return TableFactory::getInstance('GjpAcoesNoticias')->SelecionaAcaoNoticiasID($parametros['id_relacao_idioma']);
	}
}
?>