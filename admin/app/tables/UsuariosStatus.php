<?php
class UsuariosStatus extends BaseUsuariosStatus
{
	private $table_alias = "usuariosStatus us";

	/*public function getStatus()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->execute();

			return $query;

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}*/
	
	public function SelectStatus()
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
	    catch (Doctrine_Exception $e)
	    {
	    	echo $e->getMessage();
	    }
	}
}