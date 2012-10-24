<?php
class EmailValidacao
{
	public function validar($dados)
	{
		//Instancia a biblioteca de valida��o
		$ValidationLib = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');
		
		//Busca os textos de idiomas
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
		
		//Executa a valida��o dos campos
		$ValidationLib->set($dados['txt_email'], $erro[13],'txt_email', 'msg_txt_email')->obrigatorio()->email();
					  					  
		//Retorna os erros de valida��o
		return $ValidationLib->getErrors();
	}
}
?>