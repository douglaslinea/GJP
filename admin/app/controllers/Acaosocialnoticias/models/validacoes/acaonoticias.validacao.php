<?
class acaosocialNoticias
{
	public function ConteudoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation
			
			->set($PostData['dat_inicio'],$erro[28],'dat_inicio', 'msg_erro_inicio')->obrigatorio()
			->set($PostData['dat_termino'],$erro[29],'dat_termino', 'msg_erro_termino')->obrigatorio()
			->set($PostData['dat_data'],$erro[30],'dat_data', 'msg_erro_data')->obrigatorio()
			->set($PostData['txt_texto'.$a],$erro[31],'txt_texto'.$a, 'msg_erro_descricao'.$a)->obrigatorio()
			->set($PostData['txt_titulo'.$a],$erro[5],'txt_titulo'.$a, 'msg_txt_texto'.$a)->obrigatorio();
		}
		return $Validation->getErrors();
	}
}
?>
