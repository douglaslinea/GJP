<?
class WebsitePages extends BaseWebsitePages
{
	//Tabela do Banco de dados
	private $table_alias = "websitePages wp";

	public function getPageInfo($request)
	{
		try{
			//Retorna os dados da tabela
			return $this->getTable($this->table_alias)->findByurl_caminho($request);
				
		}catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelectDados()
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
	
	public function ExcluirSeoId($cod_id)
	{
		try
		{
			//Localiza o registro
			$tabela = $this->getTable($table_alias)->find($cod_id);

			//Verifica se o registro foi encontrado
			if($tabela)
			{
				//Removendo o registro
				$tabela->delete();
				
				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $cod_id , 'X');
				
				//Retorna verdadeiro em caso de sucesso
				return true;
			}
			else
			{
				//Não foi possivel remover o registro então retorna falso
				return false;
			}
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelectDetalhes($cod_id)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("wp.cod_id = ?", $cod_id)
			->execute();
			
			if($query->count() > 0)
			{
				$query = $query->toArray();
				return $query[0];
			}
			else
			{
				return false;
			}
			
			return $query[0];
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function InserirSeo($parametros)
	{
		try
		{
			//Recebe os campos da tabela preenchidos
			$campos_tabela = $this->setValues($this, $parametros, INSERT);

			//Percorre os campos da tabela
			foreach($campos_tabela as $chave => $valor)
			{
				//Atribui os valores resgatados para a tabela em questão
				$this->$chave = $campos_tabela->$chave;
			}

			//Salva o registro no banco de dados
			$this->save();
			
			//Salva no log de alterações
			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			//Returna true em caso de sucesso
			return true;

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function EditarSeo($parametros)
	{
		try
		{
			//Pesquisa o codigo
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
}