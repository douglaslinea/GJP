<?php

class Equipe extends BaseEquipe
{
	private $table_alias = "equipe eq";
	
	public function TodasEquipe()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('eq.cod_id, eq.cod_idioma, eq.txt_colaborador, eq.txt_curriculo, eq.img_foto')
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
	
	public function ExecutegetFaleConosco($cod_id)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*, wi.txt_idioma')
			->from($this->table_alias)
			->innerJoin("eq.websiteIdiomas wi")
			->where('eq.cod_id = ?', $cod_id)
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