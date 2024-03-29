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

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/Emailformulario.validacao','EmailValidacao');

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros);
		
		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			if(TableFactory::getInstance('EmailsFormularios')->editaEmailFormulario($parametros))
			{
				//Busca os textos da tabela TextoLayoutAdmin
				$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
				//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35]);
				
				//Retorna o resultado da atualização do texto
				echo Zend_Json::encode(array("1"));
			}
		}
		else
		{
			//Retorna os erros da validação
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function SelectEmailFormularioId($parametros)
	{
		return TableFactory::getInstance('EmailsFormularios')->SelectEmailFormularioId($parametros['cod_id']);
	}
}
?>