<?php
class PermissaoGeral extends BasePermissaoGeral
{
	private $table_alias = 'permissaoGeral pg';

	private $table_name = "permissaoGeral";

	public function getTableName()
	{
		return $this->table_name;
	}

	public function getPermissaoId($ControllerId,$ActionId)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('cod_id')
			->from($this->table_alias)
			->where('pg.cod_controller = ?',$ControllerId)
			->andWhere('pg.cod_acao = ?',$ActionId);	
						
			$recordset = $query->execute();			
			return $recordset[0]['cod_id'];		
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelectControlerAcao()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('pg.*, pv.*, fc.*, fa.*')
			->from($this->table_alias)
			->innerJoin('pg.FrameworkControllers fc')
			->innerJoin('pg.FrameworkAcoes fa')
			->leftJoin('pg.PermissaoVinculo pv')
			->orderBy('fc.txt_nome_amigavel ASC, fa.txt_nome_amigavel ASC')
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