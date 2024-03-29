<?
class ValidacaoUsuario
{	
	public function Validar($dados)
  	{
  		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
  		
  		//Instanciando a tabela de TextosLayou
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

  		$Validation	->set($dados['txt_nome'], $erro[10], 'txt_nome', 'msg_txt_nome')->obrigatorio()
  					->set($dados['txt_email'],$erro[8],'txt_email', 'msg_txt_email')->obrigatorio()
  					->set($dados['txt_email'],$erro[13],'txt_email','msg_txt_email')->email()
  					->set($dados['txt_login'],$erro[11],'txt_login', 'msg_txt_login')->obrigatorio()
  					->set($dados['cod_status'],$erro[12],'cod_status', 'msg_txt_status')->obrigatorio();
  					
  					if($dados["check_senha"] == "S")
  					{
  						$Validation	->set($dados['txt_senha'], $erro[14], 'txt_senha', 'msg_txt_senha')->obrigatorio()
  									->set($dados['txt_confirma_senha'],$erro[15],'txt_confirma_senha','msg_txt_confirma_senha')->obrigatorio()
  									->set($dados['txt_confirma_senha'],$erro[16],'txt_confirma_senha','msg_txt_confirma_senha')->CompararSenha($dados['txt_senha'],$dados['txt_confirma_senha']);
  					}
					
		//Retorna o array de erros
	   	return $Validation->getErrors();
	} 
}
?>