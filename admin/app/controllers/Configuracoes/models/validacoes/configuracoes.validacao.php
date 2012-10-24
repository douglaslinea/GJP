<?
/**
 * Classe para validação do formulário de Newsletter
 * @author Guilherme W.Tutilo
 *
 */
class ConfiguracoesValidacao
{
	public function ValidarFormulario($PostData)
  	{
  		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
  		
  		//Instanciando a tabela de TextosLayou
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

  		$Validation	->set($PostData['cod_idioma'], $erro[3], 'cod_idioma', 'msg_idioma')->obrigatorio()
  					->set($PostData['txt_cliente'],$erro[4],'txt_cliente', 'msg_txt_cliente')->obrigatorio()
  					->set($PostData['txt_default_title'],$erro[5],'txt_default_title', 'msg_txt_default_title')->obrigatorio()
  					->set($PostData['txt_default_key'],$erro[6],'txt_default_key', 'msg_txt_default_key')->obrigatorio()
					->set($PostData['txt_default_desc'],$erro[7],'txt_default_desc', 'msg_txt_default_desc')->obrigatorio()
					->set($PostData['txt_email_webmaster'],$erro[8],'txt_email_webmaster', 'msg_txt_email_webmaster')->obrigatorio();

		//Retorna o array de erros
	   	return $Validation->getErrors();
	} 
}
?>
