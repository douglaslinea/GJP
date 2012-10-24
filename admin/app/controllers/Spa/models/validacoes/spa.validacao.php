<?php
class spaValidacao
{
	public function ConteudoValidacao($PostData, $total_idiomas=null)
	{
		//Instancia a biblioteca de validação
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		//Instanciando a tabela de TextosLayouAdmin
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{

			$Validation
			->set($PostData['txt_titulo'.$a], $erro[10],'txt_titulo'.$a, 'msg_erro_titulo'.$a)->obrigatorio()
			->set($PostData['cod_ordem'.$a], $erro[64], 'cod_ordem'.$a, 'msg_erro_ordem'.$a)->obrigatorio()
			->set($PostData['cod_hotel'], $erro[62], 'cod_hotel', 'msg_erro_hotel')->obrigatorio()
			->set($PostData['txt_descricao'.$a], $erro[7],'txt_descricao'.$a, 'msg_erro_descricao'.$a)->obrigatorio();
		}

		//Retorna o array de erros
		return $Validation->getErrors();
	}
}
?>
