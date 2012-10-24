<?
class ContatosValidacao
{
	public function ValidarFormulario($PostData, $total_idiomas=null)
	{
		//Instancia a biblioteca de validação
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		//Instanciando a tabela de TextosLayouAdmin
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{

			$Validation

			->set($PostData['txt_titulo'.$a], $erro[10],'txt_titulo'.$a, 'msg_erro_titulo'.$a)->obrigatorio()
			->set($PostData['txt_telefone'.$a], $erro[23],'txt_telefone'.$a, 'msg_erro_telefone'.$a)->obrigatorio()
			->set($PostData['txt_email'.$a], $erro[8],'txt_email'.$a, 'msg_erro_email'.$a)->obrigatorio()
			->set($PostData['txt_pais'.$a], $erro[53],'txt_pais'.$a, 'msg_erro_pais'.$a)->obrigatorio()
			->set($PostData['cod_estado'.$a], $erro[21], 'cod_estado'.$a, 'msg_erro_estado'.$a)->obrigatorio()
			->set($PostData['cod_cidade'.$a], $erro[21],'cod_cidade'.$a, 'msg_erro_cidade'.$a)->obrigatorio()
			->set($PostData['cod_hotel'.$a], $erro[46],'cod_hotel'.$a, 'msg_erro_hotel'.$a)->obrigatorio()
			->set($PostData['txt_telefone'.$a], $erro[23],'txt_telefone'.$a, 'msg_erro_telefone'.$a)->obrigatorio()
			->set($PostData['txt_texto'.$a], $erro[31],'txt_texto'.$a, 'msg_erro_informacao'.$a)->obrigatorio();

		}

		//Retorna o array de erros
		return $Validation->getErrors();
	}
	
	
	public function ValidarFormularioInclusao($PostData, $total_idiomas=null)
	{
		//Instancia a biblioteca de validação
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		//Instanciando a tabela de TextosLayouAdmin
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		$Validation

			->set($PostData['txt_titulo'], $erro[10],'txt_titulo','msg_erro_titulo')->obrigatorio()
			->set($PostData['txt_telefone'], $erro[23],'txt_telefone','msg_erro_telefone')->obrigatorio()
			->set($PostData['txt_email'], $erro[8],'txt_email','msg_erro_email')->obrigatorio()
			->set($PostData['txt_pais'], $erro[53],'txt_pais','msg_erro_pais')->obrigatorio()
			->set($PostData['cod_estado'], $erro[21], 'cod_estado','msg_erro_estado')->obrigatorio()
			->set($PostData['cod_cidade'], $erro[21],'cod_cidade','msg_erro_cidade')->obrigatorio()
			->set($PostData['cod_hotel'], $erro[46],'cod_hotel','msg_erro_hotel')->obrigatorio()
			->set($PostData['txt_telefone'], $erro[23],'txt_telefone','msg_erro_telefone')->obrigatorio();

			for($a = 1; $a<=$total_idiomas; $a++)
			{
				$Validation
				->set($PostData['txt_texto'.$a], $erro[31],'txt_texto'.$a, 'msg_erro_informacao'.$a)->obrigatorio();

			}

		

		//Retorna o array de erros
		return $Validation->getErrors();
	}
}
?>
