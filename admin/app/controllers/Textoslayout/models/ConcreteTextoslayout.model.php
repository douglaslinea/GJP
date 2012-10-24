<?php
class ConcreteTextoslayout extends TextosLayout
{
	/**
	 * Retorna os dados dos idiomas
	 */
	public function getIdiomas()
	{
		//Retorna os dados dos banners
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}
	
	/**
	 * Retorna os textos com base nos parâmetros informados
	 */
	public function BuscarTextos($parametros=null)
	{
		//Retorna os dados ao Controller
		//return $this->ExecuteBuscarTextos($parametros['idioma'],$parametros['termo']);
		return $this->ExecuteBuscarTextos();
	}

	/**
	 * Retorna os dados dos textos
	 */
	public function getTextos($parametros)
	{
		//Retorna o resultado da consulta
		return $this->ExecutegetTexto($parametros['cod_texto']);
	}

	/**
	 * Retorna os dados de um texto especifico
	 * @param Stdclass $parametros
	 */
	public function BuscarDetalhes(stdClass $parametros)
	{
		//Retorna os dados
		return $this->ExecutegetTexto($parametros->id);
	}

	/**
	 * Retorna o resultado da atualização de textos
	 * @param $parametros
	 */
	public function editaTexto($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/textoslayout.validacao','TextoslayoutValidacao');

		//total de idiomas 
		$total = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		
		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			for($i = 1; $i <= $total; $i++)
			{
				//salva os dados atualizados
				TableFactory::getInstance('TextosLayout')->EditaTextoLayout($parametros, $i);
			}

			//Busca os textos de erro
			$confirmacao = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $confirmacao[35]);

			//Retorna true em caso de sucesso
			echo Zend_Json::encode(array("1"));
				
		}else{
				
			//Retorna os erros da validação
			echo Zend_Json::encode($resultado_validacao);
		}
	}
}
?>