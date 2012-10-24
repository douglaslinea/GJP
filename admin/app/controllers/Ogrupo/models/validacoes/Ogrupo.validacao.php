<?php
class OgrupoValidacao
{
	public function ConteudoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation
			->set($PostData['txt_nomeMarca'.$a], $erro[67],'txt_nomeMarca'.$a, 'msg_erro_marca'.$a)->obrigatorio()
			->set($PostData['txt_link'.$a], $erro[68],'txt_link'.$a, 'msg_erro_link'.$a)->obrigatorio()
			->set($PostData['txt_tel_vendas'.$a], $erro[23],'txt_tel_vendas'.$a, 'msg_erro_telefone'.$a)->obrigatorio()
			->set($PostData['arq_video_marca'.$a], $erro[58],'arq_video_marca'.$a, 'msg_erro_video'.$a)->obrigatorio()
			->set($PostData['txt_texto_marca'.$a], $erro[31],'txt_texto_marca'.$a, 'msg_erro_informacao'.$a)->obrigatorio();

		}
		return $Validation->getErrors();
	}

	public function ConteudoInserirValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation
			->set($PostData['txt_nomeMarca'.$a], $erro[67],'txt_nomeMarca'.$a, 'msg_erro_marca'.$a)->obrigatorio()
			->set($PostData['txt_link'.$a], $erro[68],'txt_link'.$a, 'msg_erro_link'.$a)->obrigatorio()
			->set($PostData['txt_ordem'.$a], $erro[64], 'txt_ordem'.$a, 'msg_erro_ordem'.$a)->obrigatorio()
			->set($PostData['txt_tel_vendas'.$a], $erro[23],'txt_tel_vendas'.$a, 'msg_erro_telefone'.$a)->obrigatorio()
			->set($PostData['arq_video_marca'.$a], $erro[58],'arq_video_marca'.$a, 'msg_erro_video'.$a)->obrigatorio()
			->set($PostData['txt_texto_marca'.$a], $erro[31],'txt_texto_marca'.$a, 'msg_erro_informacao'.$a)->obrigatorio()
			->set($PostData['nome_img_cropada'.$a], $erro[57],'nome_img_cropada'.$a, 'msg_erro_foto'.$a)->obrigatorio();
			
		}
		return $Validation->getErrors();
	}
}