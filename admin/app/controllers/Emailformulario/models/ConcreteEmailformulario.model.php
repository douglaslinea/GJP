<?php
class ConcreteEmailformulario
{	
	public function BuscarCadastro()
	{
		//Retorna os dados ao Controller
		return TableFactory::getInstance('EmailsFormularios')->incluirCadastro();
	}
	
	public function editaEmailFormulario($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de valida��o
		$ComponenteValidacao = getComponent('validacoes/Emailformulario.validacao','EmailValidacao');

		//Executa a Valida��o
		$resultado_validacao = $ComponenteValidacao->validar($parametros);
		
		//Verifica o resultado da valida��o
		if(count($resultado_validacao) == 0)
		{
			if(TableFactory::getInstance('EmailsFormularios')->editaEmailFormulario($parametros))
			{
				//Busca os textos da tabela TextoLayoutAdmin
				$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
				//Mensagem de confirma��o via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35]);
				
				//Retorna o resultado da atualiza��o do texto
				echo Zend_Json::encode(array("1"));
			}
		}
		else
		{
			//Retorna os erros da valida��o
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function SelectEmailFormularioId($parametros)
	{
		return TableFactory::getInstance('EmailsFormularios')->SelectEmailFormularioId($parametros['cod_id']);
	}
}
?>