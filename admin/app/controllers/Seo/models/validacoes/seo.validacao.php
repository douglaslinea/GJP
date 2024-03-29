<?php
class SeoValidacao
{
	public function validar($dados)
	{
		//Instancia a biblioteca de valida��o
		$ValidationLib = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');
		
		//Busca os textos de idiomas
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
		
		//Executa a valida��o dos campos
		$ValidationLib->set($dados['url_caminho'],$erro[26],'url_caminho','msg_url_caminho')->obrigatorio()
					  ->set($dados['txt_title'],$erro[5],'txt_title','msg_txt_title')->obrigatorio()
					  ->set($dados['txt_keywords'],$erro[27],'txt_keywords','msg_txt_keywords')->obrigatorio()
					  ->set($dados['txt_description'],$erro[7],'txt_description','msg_txt_description')->obrigatorio();
					  		
		//Retorna os erros de valida��o
		return $ValidationLib->getErrors();		
	}	
}
?>