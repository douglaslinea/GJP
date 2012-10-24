<?php
class EmailsFormularios extends BaseEmailsFormularios
{
	private $table_alias = "emailsFormularios ef";

	public function SelectEmailFormularioId($cod_id)
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("ef.cod_id = ?", $cod_id)
			->limit(1)
			->execute()
			->toArray();

			//Retorna o resultado
			return $query[0];
			 
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function editaEmailFormulario($parametros)
	{
		try
		{
			//Pesquisa o id
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id']);
			
			//Verifica se o registro foi localizado
			if($tabela)
			{
				$tabela->txt_email = $parametros['txt_email'];
				$tabela->save();
				
				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'] , 'E');
				
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
	
	public function incluirCadastro()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('ef.cod_id, ef.txt_email, ef.txt_formulario')
			->from($this->table_alias)
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}