<?php
class UsuariosController extends ControllerBase
{
	/* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
	 * Params String Action -> A��o a ser Executada Pelo Controller
	 * Aten��o Demais M�todos do Controller Devem ser Privados
		*/
	public function UsuariosController($controller,$action,$urlparams)
	{
		//Inicializa os par�metros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	/**
	 * A��es Iniciais ao Entrar na Index deste Controller
	 */
	private function index_action($params=null)
	{
		//Seleciona os usu�rios
		$dados = $this->Delegator('ConcreteUsuarios', 'SelectUsuarios');
		
		//Dados do Usuario
		$this->View()->assign('dados_usuario',$dados);

		//Verifica se h� dados extras a serem adicionados na view(via parametro)
		if(!is_null($params))
		{
			//Adiciona os dados extras na view
			$this->View()->assign('params',$params);
		}
		//Verifica se h� dados extras a serem adicionados na view(via SESS�O)
		elseif(isset($_SESSION['view_data']))
		{
			//Adiciona os dados extras na view
			$this->View()->assign('params',$_SESSION['view_data']);
			//Elimina a sess�o
			unset($_SESSION['view_data']);
		}
		
		$this->View()->display('index.php');
	}
	
	private function excluir()
	{  
		//Verifica se o usu�rio enviou uma requisi��o POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{	 
			//Localiza o Servico
			$resultado = $this->Delegator('ConcreteUsuarios', 'ExcluirUsuario', array("cod_id" => $this->getParam('id')));
		}
	}
	
	/**
	 * Solicita a edi��o do registro
	 */
	private function editar()
	{
		//Verifica se o usu�rio enviou uma requisi��o POST
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita a inclus�o do registro
			$this->Delegator('ConcreteUsuarios', 'Editar',$this->getPost());
		}
		else
		{
			//Valida o id informado
			if($this->getParam('id') !== false && is_numeric($this->getParam('id')))
			{					
				//Solicita os dados do usu�rio
				$dados = $this->Delegator('ConcreteUsuarios', 'SelectUsuarioId', array('cod_id' => $this->getParam('id')));

				//Verifica se o registro foi encontrado
				if($dados !== false)
				{
					//Envia os dados recuperados para a view
					$this->View()->assign('dados_usuario',$dados);
					
					//Solicita os dados do usu�rio
					$status = $this->Delegator('ConcreteUsuarios', 'SelectStatus');
				
					//Envia o status para a view
					$this->View()->assign('array_status',$status);
				}
				else
				{
					die("Ocorreu um erro ao tentar localizar o registro solicitado");
				}
				//Exibe a view
				$this->View()->display('editar.php');
			}
		}
	}

	private function incluir()
	{
		//Verifica se o formul�rio foi postado
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Solicita o cadastramento do Servico
			$resultado = $this->Delegator('ConcreteUsuarios', 'cadastraUsuario',$this->getPost());
		}
		else
		{
			//Solicita a lista de status de usuarios
			//$this->getStatus();
			//Solicita a lista de pefis de usuarios
			//$this->getPerfis();
			//Solicita a lista de pefis de Empresas
			//$this->getClientes();
			
			//Solicita o cadastramento do Servico
			$controller_acao = $this->Delegator('ConcreteUsuarios', 'SelectControlerAcao');
			
			//Leva a $cont_cao para a view
			$this->View()->assign('controller_acao',$controller_acao);
			
			//Exibe a view
			$this->View()->display('incluir.php');
		}
	}

	/*
	private function listar($params=null){
	  
		//Solicita os filtros
		$this->getStatus();
		$this->getPerfis();
		$this->getClientes();
		//Verifica os par�metros adicionais
		$this->getIndexParams($params);

		//Parametros a serem enviados
		$parametros = ($this->getRequestParam() !== false ? $this->getRequestParam() : array());
	  
		//Solicita os dados dos textos
		$resultado = $this->Delegator('ConcreteUsuarios', 'ExecutegetUsuarios',$parametros);
			
		//Leva os dados para a view
		$this->View()->assign('dados_usuarios',$resultado['recordset']);
		//Leva a pagina��o para a view
		$this->View()->assign('pagination',$resultado['pagination']);
		//Exibe a view
		$this->View()->display('listar.php');
	}


	private function getIndexParams($params=null){

		//Verifica se h� dados extras a serem adicionados na view(via parametro)
		if(!is_null($params)){
				
			//Adiciona os dados extras na view
			$this->View()->assign('params',$params);
		}
		//Verifica se h� dados extras a serem adicionados na view(via SESS�O)
		else if(isset($_SESSION['view_data'])){
				
			//Adiciona os dados extras na view
			$this->View()->assign('params',$_SESSION['view_data']);
			//Elimina a sess�o
			unset($_SESSION['view_data']);
		}
	}

	private function detalhes(){
	  
		//Valida o id
		if($this->getParam('id') !== false && is_numeric($this->getParam('id'))){
			 
			//Cria um Objeto
			$DataObject = $this->CreateObject();
				
			//Seta o id da Vaga Selecionada
			$DataObject->cod_id = $this->getParam('id');

			//Solicita os dados da Vaga
			$recordset = $this->Delegator('ConcreteUsuarios', 'getUsuarioById',$DataObject);
				
			//Verifica o resultado da busca
			if($recordset !== false){
				 
				//Coloca os dados da vaga na View
				$this->View()->assign('dados_usuario',$recordset);

			}else{
				//Envia uma flag para a view indicando que a vaga n�o foi encontrada
				$this->View()->assign('usuario_nao_encontrado',true);
			}

			//Apresenta a view
			$this->View()->display('detalhes.php');
		}
	}


	private function getStatus(){
			
		$recordset = $this->Delegator('ConcreteUsuarios', 'getStatus');
		$this->View()->assign('dados_status',$recordset);
	}


	private function getPerfis(){
			
		$recordset = $this->Delegator('ConcreteUsuarios', 'getPerfis');
		//Elimina o perfil de candidato, pois este � cadastrado pelo site
		unset($recordset[2]);
		$this->View()->assign('dados_perfis',$recordset);
	}


	private function getClientes(){

		$recordset = $this->Delegator('ConcreteUsuarios', 'getClientes');
		$this->View()->assign('dados_clientes',$recordset);
	}
	*/
}