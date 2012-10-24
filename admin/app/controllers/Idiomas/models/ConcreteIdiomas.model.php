<?
/**
 * Concrete para a Categoria Profissional
 * @author Guilherme
 *
 */
class ConcreteIdiomas
{
	/**
	 * Retorna os dados da Area Profissional através do ID
	 * @param stdClass $object
	 */
	public function SelecionaIdioma()
	{
		//Retorna os dados
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}
	
	public function ExcluirIdioma($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//faz o select
		$dados = TableFactory::getInstance('WebsiteIdiomas')->ExcluirIdiomaId($parametros['cod_id']);

		if($dados == true)
		{
			//Busca os textos de erro
			$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[34]);
			
			echo Zend_Json::encode(array("1"));
		}
	}
	
	public function SelectIdiomaId($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('WebsiteIdiomas')->SelectIdiomaById($parametros['cod_id']);
	}
	
	public function Editar($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instanciamos o componente de validação
		$ComponenteValidacao = getComponent('validacoes/idiomas.validacao','ValidacaoIdiomas');
			
		//Executamos a validação dos dados
		$resultado_validacao = $ComponenteValidacao->Validar($parametros);
			
		//Verifica o resultado da validacao
		if(count($resultado_validacao) == 0)
		{
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			//Edita o registro no banco de dados
			if(TableFactory::getInstance('WebsiteIdiomas')->EditarIdiomaId($parametros))
			{
				//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => 'Registro alterado com sucesso!');
				
				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				//Erro ao cadastrar o Servicos
				return false;
			}	 
		}
		else
		{	
			//Resposta do JSON
			echo Zend_Json::encode($resultado_validacao);
		}
	}
	
	public function Incluir($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instanciamos o componente de validação
		$ComponenteValidacao = getComponent('validacoes/idiomas.validacao','ValidacaoIdiomas');
			
		//Executamos a validação dos dados
		$resultado_validacao = $ComponenteValidacao->Validar($parametros);
		
		//Verifica o resultado da validacao
		if(count($resultado_validacao) == 0)
		{
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			//Inclui o registro no banco de dados
			if(TableFactory::getInstance('WebsiteIdiomas')->incluirIdioma($parametros))
			{
				//Busca os textos de erro
				$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
				//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[36]);

				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				//Erro ao cadastrar o Servicos
				return false;
			}
			 
		}else{
				
			//Retorna os erros da validação
			echo Zend_Json::encode($resultado_validacao);
		}
	}
}