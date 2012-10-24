<?php
class distanciaValidacao
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

			->set($PostData['cod_hotel'], $erro[62],'cod_hotel', 'msg_erro_hotel')->obrigatorio()
			->set($PostData['txt_descricao'.$a], $erro[31],'txt_descricao'.$a, 'msg_erro_distancia'.$a)->obrigatorio();
		}

		//Retorna o array de erros
		return $Validation->getErrors();
	}
}