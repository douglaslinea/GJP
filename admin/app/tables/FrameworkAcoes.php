<?php
class FrameworkAcoes extends BaseFrameworkAcoes
{
	private $table_alias = 'frameworkAcoes fa';

	public function getAction($action)
	{
		//Padroniza o nome da action
		$action = strtolower($action);
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where('fa.txt_nome = ?',$action);

			$recordset = $query->execute();
			return $recordset[0];

		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}