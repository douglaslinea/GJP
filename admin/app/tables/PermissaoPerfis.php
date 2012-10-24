<?php
class PermissaoPerfis extends BasePermissaoPerfis
{
	private $table_alias = "permissaoPerfis pp";
	
	public function MontaComboPerfisUsuarios()
	{
		try
		{
	    	return $this->getTable($this->table_alias)->findAll();	      	
	    }  
	    catch (Doctrine_Exception $e)
	    {
	    	echo $e->getMessage();
	    }
	}
	
	public function getPerfilById($id)
	{
	     //Retorna os dados do perfil
	     return $this->getTable($this->table_alias)->find($id);
	}
	
	public function IncluirPermissaoPerfil($parametros)
	{
		try
		{
			$this->txt_perfil = $parametros['txt_perfil'];
			$this->save();
			
			return $this->getIncremented();
		}
		catch (Doctrine_Exception $e)
	    {
	    	echo $e->getMessage();
	    }
	}
	
	public function SelectPermissaoPerfil()
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
}