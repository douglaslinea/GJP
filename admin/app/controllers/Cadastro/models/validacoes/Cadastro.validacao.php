<?php
class TextosValidacao
{
	public function validar($dados, $total=null)
	{
		//Instancia a biblioteca de validação
		$ValidationLib = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');
		
		//Busca os textos de idiomas
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
		
		for($a = 1; $a<=$total; $a++)
		{
			//Executa a validação dos campos
			$ValidationLib->set($dados['txt_titulo'.$a],$erro[5],'txt_titulo'.$a, 'msg_txt_titulo'.$a)->obrigatorio()
						  ->set($dados['txt_texto'.$a],$erro[31],'txt_texto'.$a, 'msg_txt_texto'.$a)->obrigatorio();
		}		  
					  					  
		//Retorna os erros de validação
		return $ValidationLib->getErrors();
	}
}
?>