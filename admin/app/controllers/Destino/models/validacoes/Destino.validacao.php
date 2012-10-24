<?php
class DestinoValidacao
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

			->set($PostData['txt_destinos'.$a], $erro[65],'txt_destinos'.$a, 'msg_erro_destino'.$a)->obrigatorio()
			->set($PostData['cod_clima'.$a], $erro[66],'cod_clima'.$a, 'msg_erro_clima'.$a)->obrigatorio()
			->set($PostData['cod_estado'.$a], $erro[21], 'cod_estado'.$a, 'msg_erro_estado'.$a)->obrigatorio()
			->set($PostData['cod_cidade'.$a], $erro[22],'cod_cidade'.$a, 'msg_erro_cidade'.$a)->obrigatorio()
			->set($PostData['txt_informacao'.$a], $erro[31],'txt_informacao'.$a, 'msg_erro_informacao'.$a)->obrigatorio();
		}

		//Retorna o array de erros
		return $Validation->getErrors();
	}
}