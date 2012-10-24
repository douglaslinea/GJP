<?php
class ParceirosValidacao
{
	public function ConteudoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation
			->set($PostData['txt_titulo'.$a], $erro[5],'txt_titulo'.$a, 'msg_erro_titulo'.$a)->obrigatorio()
			->set($PostData['nome_img1'], $erro[57], 'nome_img1', 'msg_erro_img')->obrigatorio()
			->set($PostData['txt_apresentacao'.$a], $erro[31],'txt_apresentacao'.$a, 'msg_erro_texto'.$a)->obrigatorio();
		}
		return $Validation->getErrors();
	}
	
	public function ConteudoEdicaoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation
			->set($PostData['txt_titulo'.$a], $erro[5],'txt_titulo'.$a, 'msg_erro_titulo'.$a)->obrigatorio()
			->set($PostData['txt_apresentacao'.$a], $erro[31],'txt_apresentacao'.$a, 'msg_erro_texto'.$a)->obrigatorio();
		}
		return $Validation->getErrors();
	}
}
