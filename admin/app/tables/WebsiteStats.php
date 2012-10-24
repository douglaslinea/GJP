<?php
class WebsiteStats extends BaseWebsiteStats
{
	private $table_alias = "websiteStats ws";
	
	public function SelecionaTudo()
	{
		try
		{		
			//Monta a Query
			$query = Doctrine_Query::create()
			->select("*, MONTHNAME(data) mes, YEAR(data) ano")
			->from($this->table_alias)
			->orderBy("data ASC")
			->offset(1)
			->limit(6)
			->execute()
			->toArray();
			
			return $query;	
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelecionaData($data)
	{
		try
		{			
			$query = HelperFactory::getInstance()->getPDOInstance();
			$sth = $query->prepare("call procedureData('$data')");
			$sth->execute();
			$resultado = $sth->fetchAll();
			
			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}