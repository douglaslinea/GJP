<?php
class ConcreteNoticias
{
	/**
	 * Caminho do upload das imagens
	 * @var String
	 */
	//private $upload_img_path = "../web_files/img_din/";
		
	public function getIdiomas()
	{
		//Retorna os dados dos Conteudos
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	public function SelectConteudos()
	{
		return TableFactory::getInstance('ImprensaNoticias')->SelectNoticias();
	}

	//##############################

	/**
	 * Retorna os dados dos conteudos exclusivos
	 */
	public function BuscarConteudos()
	{
		return $this->getConteudos();
	}

	/**
	 * Retorna os dados do conteudo pelo ID
	 */
	public function SelectNoticiaRelacaoId($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('Noticias')->SelectNoticiaRelacaoId($parametros['cod_relacao_idioma']);
	}

	/**
	 * Cadastra o Conteudo
	 */
	public function IncluirNoticia($parametros)
	{
	
		
		
	/*	//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o Helper
		$Helper = HelperFactory::getInstance();

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/conteudo.validacao','ConteudoValidacao');

		//total de idiomas
		 */
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		/*//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total_idiomas);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
		//seleciona o último valor do campo cod_relacao_idioma da tabela noticias
		$cod_relacao_idioma = TableFactory::getInstance('Noticias')->SelectUltimoRelacionamentoIdioma();
		$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;*/
			
		
		for($i = 1; $i <= $total_idiomas; $i++)
		{

			//Formata os dados para gravar no banco
			$parametros['dat_data'.$i] = HelperFactory::getInstance()->FormataData($parametros['dat_data'.$i],'usa');
			$parametros['dat_inicio_publicacao'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_inicio_publicacao'.$i],'usa');
			$parametros['dat_termino_publicacao'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_termino_publicacao'.$i],'usa');

			//TableFactory::getInstance('Noticias')->TesteInclusao($parametros, $i);
			TableFactory::getInstance('ImprensaNoticias')->IncluirNoticia($parametros, $i);
		}
			
		/*//Busca os textos de erro
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
			}*/
	}

	public function EditaNoticia($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/conteudo.validacao','ConteudoValidacao');

		//total de idiomas
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total_idiomas);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				//Formata os dados para gravar no banco
				$parametros['dat_data'.$i] = HelperFactory::getInstance()->FormataData($parametros['dat_data'.$i],'usa');
				$parametros['dat_inicio_publicacao'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_inicio_publicacao'.$i],'usa');
				$parametros['dat_termino_publicacao'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_termino_publicacao'.$i],'usa');

				TableFactory::getInstance('ImprensaNoticias')->EditaNoticia($parametros, $i);
			}
				
			//Busca os textos de erro
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35]);
				
			//Retorna true em caso de sucesso
			echo Zend_Json::encode(array("1"));
		}
		else
		{
			//Retorna falso em caso de erro
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function ExcluirNoticia($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//faz o select
		$dados = TableFactory::getInstance('ImprensaNoticias')->ExcluirNoticiaId($parametros['id_relacao_idioma']);

		if($dados == true)
		{
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34]);
				
			echo Zend_Json::encode(array("1"));
		}
	}

	/**
	 * Enter description here ...
	 
	public function ExcluirImagem($parametros){

		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instance o Helper de Upload
		$UploadHelper = HelperFactory::getInstance('upload');

		//Verifica se o arquivo foi removido
		if($UploadHelper->deleteFile($this->upload_img_path.$parametros['arquivo_gravado'])){
				
			//Deleta a referencia no banco de dados
			$this->deletarImagem($parametros['id']);
				
			//Envia sinal de sucesso ao JSON
			$json_response = Zend_Json::encode(array('1'));
				
		}else{

			//Envia sinal de sucesso ao JSON
			$json_response = Zend_Json::encode(array('0'));
		}

		//Envia a resposta ao JSON
		echo $json_response;
	}

	public function SelectImagem($parametros)
	{
		
		
		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setFazTudo($parametros['altura_crop'], $parametros['largura_crop'], $parametros['diretorio'], $parametros['tamanho_maximo'], $parametros['largura_maxima']);
	}
	
	public function deletimg($parametros)
	{
				
		//LibFactory::getInstance(null,null,'Zend/Json.php');
	
		
		
		$exclusao = TableFactory::getInstance('Noticias')->DeletarImagemBanco($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
		
		
		if($exclusao == true)
		{		
			echo "Dados excluidos com sucesso do banco de dados";		
		}else{
			echo "Ocorreu um erro na exclusao do banco de dados";
		}
		/*if($dados)
		{
			echo Zend_Json::encode(array("1"));
		}
	}
	
	public function trocaImagem($parametros){
		
	
		
		$edicao_imagem = TableFactory::getInstance('Noticias')->AlteraImagem($parametros['nome_imagem_original'], $parametros['nome_imagem_cropada'], $parametros['id']);
	}
	*/
}
?>