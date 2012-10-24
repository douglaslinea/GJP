<?
class ValidacaoPermissao
{	
	public function Validar($dados)
  	{
  		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
  		
  		//Instanciando a tabela de TextosLayou
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

  		$Validation	->set($dados['txt_perfil'], $erro[37], 'txt_perfil', 'msg_txt_perfil')->obrigatorio();
					
		//Retorna o array de erros
	   	return $Validation->getErrors();
	} 
}
?>