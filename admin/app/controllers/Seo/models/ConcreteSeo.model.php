<?
class ConcreteSeo extends WebsitePages
{
	public function SelectDados()
	{
		//Retorna os dados
		return parent::SelectDados();
	}
	
	public function ExcluirSeo($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//faz o select
		$dados = TableFactory::getInstance('WebsitePages')->ExcluirSeoId($parametros['cod_id']);

		if($dados == true)
		{
			//Busca os textos de erro
			$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[34]);
			
			echo Zend_Json::encode(array("1"));
		}
	}
	
	public function IncluiSeo($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de validaчуo
		$ComponenteValidacao = getComponent('validacoes/seo.validacao','SeoValidacao');

		//Executa a Validaчуo
		$resultado_validacao = $ComponenteValidacao->validar($parametros);

		//Verifica o resultado da validaчуo
		if(count($resultado_validacao) == 0)
		{
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			if(parent::InserirSeo($parametros))
			{
				//Busca os textos de erro
				$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
				//Mensagem de confirmaчуo via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[36]);
				
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				echo Zend_Json::encode(array("0"));
			}
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}
	
	public function SelectDetalhes($parametros)
	{
		//Detalhes do ID enviado
		return parent::SelectDetalhes($parametros['id']);
	}
	
	public function EditarSeo($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de validaчуo
		$ComponenteValidacao = getComponent('validacoes/seo.validacao','SeoValidacao');

		//Executa a Validaчуo
		$resultado_validacao = $ComponenteValidacao->validar($parametros);

		//Verifica o resultado da validaчуo
		if(count($resultado_validacao) == 0)
		{
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			if(parent::EditarSeo($parametros))
			{
				//Busca os textos de erro
				$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
				//Mensagem de confirmaчуo via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[35]);
				
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				echo Zend_Json::encode(array("0"));
			}
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}
}
?>