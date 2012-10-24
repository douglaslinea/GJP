<?php
class ConcreteTextos
{
	public function getIdiomas()
	{
		//Retorna os dados dos banners
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function getTextos($parametros)
	{
		//Retorna o resultado da consulta
		return TableFactory::getInstance('Textos')->ExecutegetTexto($parametros['cod_texto']);
	}

	public function BuscarTextos()
	{
		//Retorna os dados ao Controller
		return TableFactory::getInstance('Textos')->ExecuteBuscarTextos();
	}
	
	public function BuscarDetalhes($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('Textos')->ExecutegetTexto($parametros['id_rel_idioma']);
	}

	public function editaTexto($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/textos.validacao','TextosValidacao');

		//total de idiomas 
		$total = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		
		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			for($i = 1; $i <= $total; $i++)
			{
				//salva os dados atualizados
				TableFactory::getInstance('Textos')->ExecuteEditaTexto($parametros, $i);
			}
			
			//Busca os textos de erro
			$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[35]);

			//Retorna o resultado da atualização do texto
			echo Zend_Json::encode(array("1"));		
		}
		else
		{				
			//Retorna os erros da validação
			echo Zend_Json::encode($resultado_validacao);
		}
	}
}
?>