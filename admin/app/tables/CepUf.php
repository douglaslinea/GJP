<?php
class CepUf extends BaseCepUf
{
	public function getEstados()
	{
		try
		{	
			//Prepara a query
			$query = DOCTRINE_QUERY::create()
			->from('cepUf');
				
			//Executa a query
			$recordset = $query->execute();

			//Retorna os dados conforme o idioma
			return $recordset;
				
		}
		catch (Doctrine_Exception $e)
		{	
			echo $e->getMessage();
		}
	}
}