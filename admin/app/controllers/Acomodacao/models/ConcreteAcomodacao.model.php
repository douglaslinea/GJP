<?php
class ConcreteAcomodacao
{

	public function IncluirAcomodacao($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		$ComponenteValidacao = getComponent('validacoes/Acomodacao.validacao','AcomodacaoValidacao');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//seleciona o último valor do campo cod_relacao_idioma da tabela noticias
			$cod_relacao_idioma = TableFactory::getInstance('HoteisAcomodacoes')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;
			
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('HoteisAcomodacoes')->IncluirAcomodacao($parametros, $i);
			}

			//Busca os textos de erro
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36]);

			//Retorna true em caso de sucesso
			echo Zend_Json::encode(array('1'));
		}
		else
		{
			//Resposta do JSON
			echo Zend_Json::encode($resultado_validacao);
		}
	}


	public function ExcluirAcomodacao($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		//faz o select
		$dados = TableFactory::getInstance('HoteisAcomodacoes')->ExcluirAcomodacaoId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);

			echo Zend_Json::encode(array("1"));
		}
	}
	
	
	public function EditaAcomodacao($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/Acomodacao.validacao','AcomodacaoValidacao');

		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		//Executa a Validação

		$resultado_validacao = $ComponenteValidacao->ConteudoValidacao($parametros, $total_idiomas);
		//Verifica o resultado da validação

		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('HoteisAcomodacoes')->ExecuteEditaAcomodacao($parametros, $i);
			}
			//Instanciando a tabela de TextosLayouAdmin
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35]);

			//Retorna true em caso de sucesso
			echo Zend_Json::encode(array("1"));
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}


	public function getIdiomas()
	{
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function SelectHoteis()
	{
		return TableFactory::getInstance('Hoteis')->SelectHoteis();
	}

	public function SelectAcomodacao()
	{
		return TableFactory::getInstance('HoteisAcomodacoes')->SelectAcomodacoes();
	}

	public function SelectAcomodacaoId($parametros)
	{
		return TableFactory::getInstance('HoteisAcomodacoes')->SelecionaAcomodacaoID($parametros['id_relacao_idioma']);
	}

	public function getHoteis()
	{
		return TableFactory::getInstance('Hoteis')->SelectHoteis();
	}

}