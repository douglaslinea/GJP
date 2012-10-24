<?php
class LinhatempoValidacao
{
	public function ConteudoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation
			->set($PostData['txt_titulo'.$a], $erro[5],'txt_titulo'.$a, 'msg_erro_titulo'.$a)->obrigatorio()
			->set($PostData['txt_mes'], $erro[71], 'txt_mes', 'msg_erro_mes')->obrigatorio()
			->set($PostData['txt_ano'], $erro[72], 'txt_ano', 'msg_erro_ano')->obrigatorio()
			->set($PostData['nome_img1'], $erro[57], 'nome_img1', 'msg_erro_img')->obrigatorio()
			->set($PostData['txt_text'.$a], $erro[31],'txt_text'.$a, 'msg_erro_texto'.$a)->obrigatorio();
		}
		return $Validation->getErrors();
	}
}
