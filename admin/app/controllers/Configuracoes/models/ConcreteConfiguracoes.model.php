<?php
class ConcreteConfiguracoes extends WebsiteInfo
{
	public function SelectConfiguracoes($parametros)
	{
		return parent::SelectConfiguracoes($parametros['id']);
	}

	public function EditaConfiguracoes($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de valida��o
		$ComponenteValidacao = getComponent('validacoes/configuracoes.validacao','ConfiguracoesValidacao');
			
		//Executa a Valida��o
		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros);
			
		//Verifica o resultado da valida��o
		if(count($resultado_validacao) == 0)
		{
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			//Edita as configura��es
			if($this->ExecuteEditaConfiguracoes($parametros))
			{		
				//Mensagem de confirma��o via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => 'Edi��o feita com sucesso');
				
				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1"));
					
			}else{
					
				//Erro ao cadastrar o Conteudo
				return false;
			}

		}else{

			//Resposta do JSON
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function getIdiomas()
	{
		//Retorna os dados dos Contatoss
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}
}
?>