<?php
class WebsiteIdiomas extends BaseWebsiteIdiomas
{
	private $table_alias = "websiteIdiomas wi";

	public function getIdiomas()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->execute()
			->toArray();
			
			return $query;
			//Retorna os dados dos idiomas cadastrados no banco de dados
			//return $this->getTable($this->table_alias)->findAll();
				
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function ExcluirIdiomaId($cod_id)
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
	
	public function SelectIdiomaById($cod_id)
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
	
	public function EditarIdiomaId($parametros)
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
	
	public function incluirIdioma($parametros)
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
}