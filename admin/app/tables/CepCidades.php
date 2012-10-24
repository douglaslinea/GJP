<?php
class CepCidades extends BaseCepCidades
{
	private $table_alias = "cepCidades cc";
	
	public function getCidades($cod_uf)
	{
		try
		{	
			//Prepara a query
			$query = DOCTRINE_QUERY::create()
			->select('*')
			->from('cepCidades')
			->where('cod_uf = ?',$cod_uf)
			->execute()
			->toArray();
				
			//Retorna os dados conforme o idioma
			return $query;
			 
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function getCidadeId($cod_id)
	{
		try
		{
			$query = DOCTRINE_QUERY::create()
			->select('cc.*')
			->from($this->table_alias)
			->where('cc.cod_id = ?', $cod_id)
			->limit(1)
			->execute()
			->toArray();
			
			return $query[0];
		}
		catch (Doctrine_Exception $e)
		{		
			echo $e->getMessage();
		}
	}
}