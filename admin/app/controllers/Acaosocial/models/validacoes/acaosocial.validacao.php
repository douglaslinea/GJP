<?
class acaosocial
{
	public function ConteudoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
		
		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation
			->set($PostData['txt_titulo'.$a], $erro[10],'txt_titulo'.$a, 'msg_erro_titulo'.$a)->obrigatorio()
			->set($PostData['txt_historico'.$a], $erro[7],'txt_historico'.$a, 'msg_erro_descricao'.$a)->obrigatorio();
		}
		return $Validation->getErrors();
	}
}
?>
