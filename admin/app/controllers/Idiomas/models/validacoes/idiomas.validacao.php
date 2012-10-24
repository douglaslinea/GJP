<?
class ValidacaoIdiomas
{
	public function Validar($dados)
	{	
		//Instancia a biblioteca de valida��o
		$ValidationLib = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');

		//Busca os textos de erro
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
		//Executa a valida��o dos campos
		$ValidationLib->set($dados['txt_idioma'],$erro[32],'txt_idioma', 'msg_txt_idioma')->obrigatorio();
		$ValidationLib->set($dados['txt_meta'],$erro[33],'txt_meta', 'msg_txt_meta')->obrigatorio();
					  		
		//Retorna os erros de valida��o
		return $ValidationLib->getErrors();			
	}	
}
?>