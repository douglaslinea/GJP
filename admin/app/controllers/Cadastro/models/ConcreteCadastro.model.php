<?php
class ConcreteCadastro
{
	public function getIdiomas()
	{
		//Retorna os dados dos banners
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function getTextos($parametros)
	{
		//Retorna o resultado da consulta
		return TableFactory::getInstance('Textos')->ExecutegetTexto($parametros['cod_texto']);
	}

	public function BuscarCadastro()
	{
		//Retorna os dados ao Controller
		return TableFactory::getInstance('Cadastro')->incluirCadastro();
	}

	public function BuscarDetalhesFaleConosco($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('FaleConosco')->ExecutegetFaleConosco($parametros['cod_id']);
	}

	public function editaTexto($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/textos.validacao','TextosValidacao');

		//total de idiomas
		$total = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
				
			for($i = 1; $i <= $total; $i++)
			{
				//salva os dados atualizados
				TableFactory::getInstance('Textos')->ExecuteEditaTexto($parametros, $i);
			}
				
			//Busca os textos de erro
			$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[35]);

			//Retorna o resultado da atualização do texto
			echo Zend_Json::encode(array("1"));
		}
		else
		{
			//Retorna os erros da validação
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function SelectCadastroFiltrar($parametros)
	{
		return  TableFactory::getInstance('Cadastro')->SelectCadastrofiltro($parametros['data_de'], $parametros['data_ate']);
	}

	public function SelectFaleconoscofiltrado($parametros)
	{
		$resultados = TableFactory::getInstance('Cadastro')->SelectFaleconoscofiltro($parametros['data_de'], $parametros['data_ate']);

		$helper = HelperFactory::getInstance();
		
		$novo_array = array();
		
		foreach($resultados as $key=>$result)
		{
			$novo_array[$key]['cod_id'] = $result['cod_id'];
			$novo_array[$key]['dat_cadastro'] = $result['dat_cadastro'];
			$novo_array[$key]['txt_nome'] = $result['txt_nome'];
			$novo_array[$key]['cha_sexo'] = $result['sexo'];
			$novo_array[$key]['txt_profissao'] = $result['txt_profissao'];
			$novo_array[$key]['dat_nascimento'] = $result['dat_nascimento'];
			$novo_array[$key]['txt_endereco'] = $result['txt_endereco'];
			$novo_array[$key]['txt_bairro'] = $result['txt_bairro'];
			$novo_array[$key]['txt_cep'] = $helper->FormataCEP($result['txt_cep']);
			$novo_array[$key]['cod_cidade'] = $result['CepCidades']['txt_cidade'];
			$novo_array[$key]['cod_estado'] = $result['CepUf']['txt_uf'];
			$novo_array[$key]['txt_telefone'] = $result['txt_telefone'];
			$novo_array[$key]['txt_email'] = $result['txt_email'];
			$novo_array[$key]['txt_comentario'] = $result['txt_comentario'];
			$novo_array[$key]['chk_newsletter'] = $result['news'];
		}

		$campos = array('Id', 'Data Cadastro', 'Nome', 'Sexo', 'Profissao', 'Data Nascimento', 'Endereço', 'Bairro', 'Cep', 'Cidade', 'Estado', 'Telefone', 'E-mail', 'Comentario', 'Newsletter');

		$valores = $helper->exportaCsv($novo_array, $campos);
	}

	public function SelectFaleCadastro()
	{
		$resultados = TableFactory::getInstance('Cadastro')->SelectCadastroExportar();
		
		$helper = HelperFactory::getInstance();
		
		$novo_array = array();
		
		foreach($resultados as $key=>$result)
		{
			$novo_array[$key]['cod_id'] = $result['cod_id'];
			$novo_array[$key]['dat_cadastro'] = $result['dat_cadastro'];
			$novo_array[$key]['txt_nome'] = $result['txt_nome'];
			$novo_array[$key]['cha_sexo'] = $result['sexo'];
			$novo_array[$key]['txt_profissao'] = $result['txt_profissao'];
			$novo_array[$key]['dat_nascimento'] = $result['dat_nascimento'];
			$novo_array[$key]['txt_endereco'] = $result['txt_endereco'];
			$novo_array[$key]['txt_bairro'] = $result['txt_bairro'];
			$novo_array[$key]['txt_cep'] = $helper->FormataCEP($result['txt_cep']);
			$novo_array[$key]['cod_cidade'] = $result['CepCidades']['txt_cidade'];
			$novo_array[$key]['cod_estado'] = $result['CepUf']['txt_uf'];
			$novo_array[$key]['txt_telefone'] = $result['txt_telefone'];
			$novo_array[$key]['txt_email'] = $result['txt_email'];
			$novo_array[$key]['txt_comentario'] = $result['txt_comentario'];
			$novo_array[$key]['chk_newsletter'] = $result['news'];
			
		}


		$campos = array('Id', 'Data Cadastro', 'Nome', 'Sexo', 'Profissao', 'Data Nascimento', 'Endereço', 'Bairro', 'Cep', 'Cidade', 'Estado', 'Telefone', 'E-mail', 'Comentario', 'Newsletter');

		$valores = $helper->exportaCsv($novo_array, $campos);
	}

	public function SelectCadastro()
	{
		return TableFactory::getInstance('Cadastro')->SelectCadastro();
	}
}
?>