<?
class HoteisValidacao
{
	public function ConteudoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();


		$Validation
		->set($PostData['txt_razaoSocial'], $erro[55],'txt_razaoSocial', 'msg_erro_razaoSocial')->obrigatorio()
		->set($PostData['txt_nomeFantasia'], $erro[54],'txt_nomeFantasia' , 'msg_erro_nomeFantasia' )->obrigatorio()
		->set($PostData['txt_email' ], $erro[8],'txt_email' , 'msg_erro_email' )->obrigatorio()
		->set($PostData['num_cnpj' ], $erro[18],'num_cnpj' , 'msg_erro_numero' )->obrigatorio()
		->set($PostData['txt_cadastroMTUR' ], $erro[56],'txt_cadastroMTUR' , 'msg_erro_casdastroMTUR' )->obrigatorio()
		->set($PostData['cod_marca' ], $erro[46], 'cod_marca' , 'msg_erro_marca' )->obrigatorio()
		->set($PostData['txt_endereco' ], $erro[17],'txt_endereco' , 'msg_erro_endereco' )->obrigatorio()
		->set($PostData['txt_cep' ], $erro[19],'txt_cep' , 'msg_erro_cep' )->obrigatorio()
		->set($PostData['txt_bairro' ], $erro[20],'txt_bairro' , 'msg_erro_bairro' )->obrigatorio()
		->set($PostData['cod_destino' ], $erro[46], 'cod_destino' , 'msg_erro_destino' )->obrigatorio()
		->set($PostData['cod_latitude' ], $erro[24],'cod_latitude' , 'msg_erro_latitude' )->obrigatorio()
		->set($PostData['cod_longitude' ], $erro[25],'cod_longitude' , 'msg_erro_longitude' )->obrigatorio()
	;
		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation	->set($PostData['txt_telefone'.$a ], $erro[23],'txt_telefone'.$a, 'msg_erro_telefone'.$a)->obrigatorio()
			->set($PostData['vid_video'.$a], $erro[58],'vid_video'.$a, 'msg_erro_video'.$a)->obrigatorio()
			->set($PostData['txt_info'.$a], $erro[31],'txt_info'.$a, 'msg_erro_informacao'.$a)->obrigatorio();
		}
		return $Validation->getErrors();
	}
	
	public function ConteudocInclusaoValidacao($PostData, $total_idiomas=null)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		$Validation
		->set($PostData['txt_razaoSocial'], $erro[55],'txt_razaoSocial', 'msg_erro_razaoSocial')->obrigatorio()
		->set($PostData['txt_nomeFantasia'], $erro[54],'txt_nomeFantasia' , 'msg_erro_nomeFantasia' )->obrigatorio()
		->set($PostData['txt_email' ], $erro[8],'txt_email' , 'msg_erro_email' )->obrigatorio()
		->set($PostData['num_cnpj' ], $erro[18],'num_cnpj' , 'msg_erro_numero' )->obrigatorio()
		->set($PostData['txt_cadastroMTUR' ], $erro[56],'txt_cadastroMTUR' , 'msg_erro_casdastroMTUR' )->obrigatorio()
		->set($PostData['cod_marca' ], $erro[46], 'cod_marca' , 'msg_erro_marca' )->obrigatorio()
		->set($PostData['txt_endereco' ], $erro[17],'txt_endereco' , 'msg_erro_endereco' )->obrigatorio()
		->set($PostData['txt_cep' ], $erro[19],'txt_cep' , 'msg_erro_cep' )->obrigatorio()
		->set($PostData['txt_bairro' ], $erro[20],'txt_bairro' , 'msg_erro_bairro' )->obrigatorio()
		->set($PostData['cod_destino' ], $erro[46], 'cod_destino' , 'msg_erro_destino' )->obrigatorio()
		->set($PostData['cod_latitude' ], $erro[24],'cod_latitude' , 'msg_erro_latitude' )->obrigatorio()
		->set($PostData['cod_longitude' ], $erro[25],'cod_longitude' , 'msg_erro_longitude' )->obrigatorio()
		->set($PostData['nome_img_cropada1' ], $erro[57],'nome_img_cropada1' , 'msg_erro_imagem')->obrigatorio();

		for($a = 1; $a<=$total_idiomas; $a++)
		{
			$Validation	->set($PostData['txt_telefone'.$a ], $erro[23],'txt_telefone'.$a, 'msg_erro_telefone'.$a)->obrigatorio()
			->set($PostData['vid_video'.$a], $erro[58],'vid_video'.$a, 'msg_erro_video'.$a)->obrigatorio()
			->set($PostData['txt_info'.$a], $erro[31],'txt_info'.$a, 'msg_erro_informacao'.$a)->obrigatorio();
		}
		return $Validation->getErrors();
	}
}
?>
