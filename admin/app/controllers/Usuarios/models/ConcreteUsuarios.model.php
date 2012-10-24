<?php
class ConcreteUsuarios
{
	public function SelectUsuarios()
	{
		return TableFactory::getInstance('Usuarios')->SelectUsuarios();
	}
	
	public function ExcluirUsuario($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instanciando a tabela Usuarios e exclui
		$dados = TableFactory::getInstance('Usuarios')->ExcluirUsuario($parametros['cod_id']);

		if($dados == true)
		{
			//Busca os textos de erro
			$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[34]);
			
			echo Zend_Json::encode(array("1"));
		}
	}
	
	public function SelectControlerAcao()
	{
		//Instanciando a tabela Usuarios para listar o usuario selecionado
		return TableFactory::getInstance('PermissaoGeral')->SelectControlerAcao();
	}
	
	public function SelectUsuarioId($parametros)
	{
		//Instanciando a tabela Usuarios para listar o usuario selecionado
		return TableFactory::getInstance('Usuarios')->SelectUsuarioId($parametros['cod_id']);
	}
	
	public function SelectStatus()
	{
		//Instanciando a tabela usuarioStatus para listar os perfis
		return TableFactory::getInstance('UsuariosStatus')->SelectStatus();
	}
	
	public function Editar($parametros)
	{		
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instanciamos o componente de validaчуo
		$ComponenteValidacao = getComponent('validacoes/usuarios.validacao','ValidacaoUsuario');
			
		//Executamos a validaчуo dos dados
		$resultado_validacao = $ComponenteValidacao->Validar($parametros);
		
		//Verifica o resultado da validacao
		if(count($resultado_validacao) == 0)
		{
			if($parametros['check_senha'] == "S")
			{
				$parametros['txt_senha'] = md5($parametros['txt_senha']);
			}
			
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			//Edita o registro no banco de dados
			if(TableFactory::getInstance('Usuarios')->EditarUsuarioId($parametros))
			{
				//Mensagem de confirmaчуo via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => 'Registro alterado com sucesso!');
				
				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				//Erro ao cadastrar o Servicos
				return false;
			}
			
			//Retorna true em caso de sucesso
			echo Zend_Json::encode(array("1"));
		}
		else
		{
			//Retorna os erros de validaчуo
			echo Zend_Json::encode($resultado_validacao);
		}
	}
	
	//########################
	
	/**
	 * Cadastra o Conteudo
	 */
	public function cadastraUsuario($parametros){

		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validaчуo
		$ComponenteValidacao = getComponent('validacoes/usuarios.validacao','UsuariosValidacao');

		//Executa a Validaчуo
		$validacao_obj = $ComponenteValidacao->validar($parametros);

		//Recebe o resultado da validacao
		$resultado_validacao = $validacao_obj['validation_result'];

		//Atualiza os parтmetros da requisiчуo
		$parametros = $validacao_obj['parametros'];

		//Verifica o resultado da validaчуo
		if(count($resultado_validacao) == 0){
				
			//Tenta Cadastrar o Conteudo
			if($this->ExecuteCadastrarUsuario($parametros)){

				//Busca os textos de erro
				$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
				//Mensagem de confirmaчуo via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[36]);

				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1"));

			}else{

				//Erro ao cadastrar o Conteudo
				echo Zend_Json::encode(array("0"));
			}
				
		}else{

			//Retorna os erros de validaчуo
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	/**
	 * Retorna os dados do Usuario pelo ID
	 */
	public function getUsuarioById($parametros){
		 
		//Retorna os dados
		return $this->ExecutegetUsuarioById($parametros->cod_id);
	}

	/**
	 * Atualiza o Usuсrio no banco de dados
	 */
	public function editaUsuario($parametros){

		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validaчуo
		$ComponenteValidacao = getComponent('validacoes/usuarios.validacao','UsuariosValidacao');
			
		//Executa a Validaчуo
		$validacao_obj = $ComponenteValidacao->validar($parametros,true);
			
		//Recebe o resultado da validacao
		$resultado_validacao = $validacao_obj['validation_result'];
			
		//Atualiza os parтmetros da requisiчуo
		$parametros = $validacao_obj['parametros'];
			
		//Verifica o resultado da validaчуo
		if(count($resultado_validacao) == 0){

			//Tenta Cadastrar o Conteudo
			if($this->ExecuteEditaUsuario($parametros)){

				//Busca os textos de erro
				$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
				//Mensagem de confirmaчуo via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[35]);
					
				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1"));
					
			}else{
					
				//Erro ao cadastrar o Conteudo
				echo Zend_Json::encode(array("0"));
			}

		}else{

			//Resultado da validaчуo
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	/**
	 * Exclui um Usuсrio do banco de dados
	 */
	

	/**
	 * Enter description here ...
	 * @param Array $parametros
	 */
	public function ExecutegetUsuarios($parametros){

		//Retorna o resultado da consulta
		return $this->ExecuteBuscarUsuarios($parametros['perfil'],$parametros['status'],$parametros['cliente'],$parametros['pagina']);
	}

	/**
	 * Retorna os dados dos status do usuсrio
	 */
	public function getStatus(){
	  
		//Retorna os dados dos Conteudos
		return TableFactory::getInstance('UsuariosStatus')->getStatus();
	}

	/**
	 * Retorna os dados dos perfis de usuсrio
	 */
	public function getPerfis(){
	  
		//Retorna os dados dos Conteudos
		return TableFactory::getInstance('PermissaoPerfis')->MontaComboPerfisUsuarios();
	}

	  /**
	  * Retorna os dados dos clientes
	  */
	   public function getClientes(){
	   	
		   //Retorna os dados dos Conteudos
		   return TableFactory::getInstance('Clientes')->buscarClientes();
	   }
}
?>