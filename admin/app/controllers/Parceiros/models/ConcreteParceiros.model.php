<?php
class ConcreteParceiros
{
	public function selectParceiros()
	{
		return TableFactory::getInstance('GjpParceiros')->selectParceiros();
	}

	public function IncluirParceiros($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/parceiros.validacao','ParceirosValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('GjpParceiros')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;

			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('GjpParceiros')->InsereParceiros($parametros,$i);
			}

			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36]);
			echo Zend_Json::encode(array('1'));
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function ExcluirParceiros($parametros)
	{

		LibFactory::getInstance(null,null,'Zend/Json.php');
		$dados = TableFactory::getInstance('GjpParceiros')->ExcluirParceirosId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);
			echo Zend_Json::encode(array("1"));
		}
	}

	public function EditaParceiros($parametros)
	{

		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/parceiros.validacao','ParceirosValidacao');
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		$resultado_validacao = $ComponenteValidacao->ConteudoEdicaoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('GjpParceiros')->EditaParceiros($parametros, $i);
			}
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			echo Zend_Json::encode(array("1"));
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function SelectParceirosId($parametros)
	{
		return TableFactory::getInstance('GjpParceiros')->selectParceirosID($parametros['id_relacao_idioma']);
	}


	public function getIdiomas()
	{
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}


	public function SelectImagem($parametros)
	{
		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setFazTudo($parametros['altura_crop'], $parametros['largura_crop'], $parametros['diretorio'], $parametros['tamanho_maximo'], $parametros['largura_maxima']);
	}

	public function deletimg($parametros)
	{
		unlink('../web_files/arq_din/'.$parametros['nome_imagem_original']);
		unlink('../web_files/arq_din/'.$parametros['nome_imagem_cropada']);
		$exclusao = TableFactory::getInstance('GjpParceiros')->DeletarImagemBanco($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
		
		if($exclusao == true)
		{
			echo "Dados excluidos com sucesso do banco de dados";
		}else{
			echo "Ocorreu um erro na exclusao do banco de dados";
		}

	}

	public function trocaImagem($parametros){
		$edicao_imagem = TableFactory::getInstance('GjpParceiros')->AlteraImagem($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
	}



}