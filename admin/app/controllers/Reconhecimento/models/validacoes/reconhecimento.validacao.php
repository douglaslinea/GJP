<?php
class reconhecimentoValidacao
{
	public function ConteudoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation
			->set($PostData['txt_titulo'.$a], $erro[5],'txt_titulo'.$a, 'msg_erro_titulo'.$a)->obrigatorio()
			->set($PostData['txt_ano'], $erro[72], 'txt_ano', 'msg_erro_ano')->obrigatorio()
			->set($PostData['txt_reconhecimento'.$a], $erro[7],'txt_reconhecimento'.$a, 'msg_erro_reconhecimento'.$a)->obrigatorio();
		}
		return $Validation->getErrors();
	}
}
