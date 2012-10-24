<?php
class Usuarios extends BaseUsuarios
{
	private $table_alias = 'usuarios us';
	
	public function SelectUsuario($txt_login, $txt_senha)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("us.txt_login = ?", $txt_login)
			->andWhere("us.txt_senha = ?", md5($txt_senha))
			->andWhere('us.cod_status = ?','2')
			->limit(1);

			//Verifica se o usuario tem acesso
			if($query->count() > 0)
			{
				$recordset = $query->execute()->toArray();
				$SessionHelper = HelperFactory::getInstance('session');
				$SessionHelper->createSession("UserId",$recordset[0]['cod_id']);
				$SessionHelper->createSession("UserName",$recordset[0]['txt_nome']);
				$SessionHelper->createSession("UserPerfil",$recordset[0]['cod_perfil']);
				
				return $query->execute()->toArray();
			}
			else
			{	
				return false;
			}
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SalvaLogUsuario($id_usuario,$data_hora,$ip_maquina)
	{
		//Instancia a tabela
		$TabelaLogsLogin = TableFactory::getInstance('LogsLogin');

		//Salva o log do usuário
		if($TabelaLogsLogin->SalvaLog($id_usuario,$data_hora,$ip_maquina))
   	    {
   	    	//Retorna Verdadeiro em caso de Sucesso
	   	    return true;
	   	}
	   	else
	   	{
	   		//Retorna falso em caso de erro
   	       	return false;
   	    }
   	}
	
	public function SelectUsuarios()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->execute()
			->toArray();
			
			return $query;
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function ExcluirUsuario($cod_id)
	{
		try
		{
			//Localiza o registro solicitado
			$tabela = $this->getTable($this->table_alias)->find($cod_id);

			//Verifica se o registro foi encontrado
			if($tabela)
			{
				//Remove o registro
				$tabela->delete();
				
				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $cod_id , 'X');

				//Retorna verdadeiro em caso de sucesso
				return true;
			}
			else
			{		
				//Retorna falso, não foi encontrado
				return false;
			}
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelectUsuarioId($cod_id)
	{
		try
		{
			//Localiza o registro solicitado
			$tabela = $this->getTable($this->table_alias)->find($cod_id);

			//Verifica se o registro foi encontrado
			if($tabela)
			{
				return $tabela;
			}
			else
			{		
				//Retorna falso, não foi encontrado
				return false;
			}
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function EditarUsuarioId($parametros)
	{
		try
		{
			//Pesquisa o id
			$tabela = $this->getTable()->find($parametros['cod_id']);

			//Verifica se o registro foi localizado
			if($tabela)
			{
				//Recebe os campos da tabela preenchidos
				$campos_tabela = $this->setValues($tabela, $parametros, UPDATE);

				//Percorre os campos da tabela
				foreach($campos_tabela as $chave => $valor)
				{
					//Atribui os valores resgatados para a tabela em questão
					$this->$chave = $campos_tabela->$chave;
				}

				//Atualiza o banco de dados
				$tabela->save();

				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'] , 'E');

				//Retorna true em caso de sucesso
				return true;
			}
			else
			{
				return false;
			}
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	/*public function getTableAlias()
	{
		//Retorna o alias da tabela
		return $this->table_alias;
	}*/

	/*public function SelectUsuario($txt_login, $txt_senha)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("us.txt_login = ?", $txt_login)
			->andWhere("us.txt_senha = ?", md5($txt_senha))
			->andWhere('us.cod_status = ?','2')
			->limit(1);

			//Verifica se o usuario tem acesso
			if($query->count() > 0)
			{
				$recordset = $query->execute()->toArray();
				$SessionHelper = HelperFactory::getInstance('session');
				$SessionHelper->createSession("UserId",$recordset[0]['cod_id']);
				$SessionHelper->createSession("UserName",$recordset[0]['txt_nome']);
				$SessionHelper->createSession("UserPerfil",$recordset[0]['cod_perfil']);

				return $query->execute()->toArray();
			}
			else
			{
				return false;
			}
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectUsuarioLogin($txt_login)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("us.txt_login = ?", $txt_login)
			->andWhere('us.cod_status = ?','2')
			->limit(1);

			//Verifica se o usuario tem acesso
			if($query->count() > 0)
			{
				return $query->execute()->toArray();
			}
			else
			{
				return false;
			}
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function EditarUsuario($parametros)
	{
		try
		{
			$tabela_logs_alteeracoes = TableFactory::getInstance('LogsAlteracoes');
			$tabela_logs_alteeracoes->logAlteracoes('usuarios', $parametros['cod_id'], 'A');
				
			//Pega a instancia da tabela
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id']);
			//Seta os campos da tabela
			$this->setValues($tabela , $parametros, UPDATE);

			//Salva as alterações
			$tabela->save();
				
			return true;
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function desbloquearUsuario($id)
	{
		try
		{
			//Localiza o usuario pelo id
			$tabela_usuarios = $this->getTable($this->table_alias)->find($id);
		  
			//************* Zera as tentativas do usuario ************

			//Instancia a Tabela
			$tabela_logs_tentativas = TableFactory::getInstance('LogsTentativas');
			//Zera as tentativas
			$tabela_logs_tentativas->ZerarTentativas($tabela_usuarios->txt_login);
		  
			//********************************************************
		  
			//Libera o usuario
			$tabela_usuarios->cod_status = 2;
			//Atualiza o registro na base de dados
			$tabela_usuarios->save();
			//Retorna true em caso de sucesso
			return true;
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}*/
}