<?php
class ConcreteContatos
{
	public function SelectContatos()
	{
		//Retorna os dados
		return TableFactory::getInstance('ContatosHoteis')->SelectContatos();
	}

	public function getIdiomas()
	{
		//Retorna os dados dos Contatoss
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	/**
	 * Retorna os dados dos estados
	 */
	public function getEstados()
	{
		//Retorna os dados dos Contatoss
		return TableFactory::getInstance('CepUf')->getEstados();
	}

	public function getHoteis()
	{
		return TableFactory::getInstance('Hoteis')->SelectHoteis();
	}

	public function buscaCidades($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Busco o endereço pelo CEP
		$recordset = TableFactory::getInstance('CepCidades')->getCidades($parametros['data']['cod_uf']);

		//Verifica se a requisição esta sendo feita via JSON
		if(isset($parametros['json_data']))
		{
			//Resposta do JSON
			echo Zend_Json::encode($recordset);
		}
		else
		{
			//Caso contrário então apenas retorna o resultado da consulta
			return $recordset;
		}
	}

	public function IncluirContatos($parametros)
	{
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/contatos.validacao','ContatosValidacao');

		//total de idiomas
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->ValidarFormularioInclusao($parametros, $total_idiomas);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//seleciona o último valor do campo cod_relacao_idioma da tabela noticias
			$cod_relacao_idioma = TableFactory::getInstance('ContatosHoteis')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;

			for($i = 1; $i <= $total_idiomas; $i++)
			{
				TableFactory::getInstance('ContatosHoteis')->InsereContatosHoteis($parametros, $i);
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

	public function ExcluirContatos($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		//faz o select
		$dados = TableFactory::getInstance('ContatosHoteis')->ExcluirContatosId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);

			echo Zend_Json::encode(array("1"));
		}
	}


	public function SelectContatosId($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('ContatosHoteis')->SelectContatosId($parametros['id_relacao_idioma']);
	}

	public function EditaContatos($parametros)
	{
		//print_r($parametros);
		//exit();
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/contatos.validacao','ContatosValidacao');

		//total de idiomas
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);
			
		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				//Tenta Cadastrar o Contatos
				TableFactory::getInstance('ContatosHoteis')->ExecuteEditaContatos($parametros, $i);
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
			//Resposta do JSON
			echo Zend_Json::encode($resultado_validacao);
		}
	}
}
?>