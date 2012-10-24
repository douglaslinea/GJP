<?
class ValidacaoIdiomas
{
	public function Validar($dados)
	{	
		//Instancia a biblioteca de validaчуo
		$ValidationLib = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');

		//Busca os textos de erro
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
		//Executa a validaчуo dos campos
		$ValidationLib->set($dados['txt_idioma'],$erro[32],'txt_idioma', 'msg_txt_idioma')->obrigatorio();
		$ValidationLib->set($dados['txt_meta'],$erro[33],'txt_meta', 'msg_txt_meta')->obrigatorio();
					  		
		//Retorna os erros de validaчуo
		return $ValidationLib->getErrors();			
	}	
}
?>