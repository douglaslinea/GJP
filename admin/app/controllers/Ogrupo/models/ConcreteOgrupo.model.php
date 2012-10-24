<?php
class ConcreteOgrupo
{
	public function EditaGrupo($parametros)
	{

		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/Ogrupo.validacao','OgrupoValidacao');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('MarcaGJP')->EditaMarcas($parametros, $i);
			}
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

			echo Zend_Json::encode(array("1"));
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function IncluirMarca($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/Ogrupo.validacao','OgrupoValidacao');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		$resultado_validacao = $ComponenteValidacao->ConteudoInserirValidacao($parametros, $total_idiomas);

		if(count($resultado_validacao) == 0)
		{
			$cod_relacao_idioma = TableFactory::getInstance('MarcaGJP')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma_marca'] = $cod_relacao_idioma['cod_relacao_idioma']+1;

			$cod_relacao = TableFactory::getInstance('ImprensaCategoria')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma_categoria'] = $cod_relacao['cod_relacao_idioma']+1;

			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('ImprensaCategoria')->InsereCategoriaMarca($parametros,$i);
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

	####### Funções de Busca  ##########
	public function selectGrupo()
	{
		return TableFactory::getInstance('MarcaGJP')->selectGrupo();
	}

	public function getImprensa()
	{
		return TableFactory::getInstance('ImprensaCategoria')->getImprensa();
	}

	public function getIdiomas()
	{
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function SelectMarcaId($parametros)
	{
		return TableFactory::getInstance('MarcaGJP')->SelecionaMarcaID($parametros['id_relacao_idioma']);
	}

	#######  Começo das funções de Imagem  ######
	public function SelectImagem($parametros)
	{
		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setFazTudo($parametros['altura_crop'], $parametros['largura_crop'], $parametros['diretorio'], $parametros['tamanho_maximo'], $parametros['largura_maxima']);
	}


	public function deletimg($parametros)
	{
		$exclusao = TableFactory::getInstance('MarcaGJP')->DeletarImagemBanco($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);


		if($exclusao == true)
		{
			echo "Dados excluidos com sucesso do banco de dados";
		}else{
			echo "Ocorreu um erro na exclusao do banco de dados";
		}

	}

	public function trocaImagem($parametros){
		$edicao_imagem = TableFactory::getInstance('MarcaGJP')->AlteraImagem($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
	}


}
