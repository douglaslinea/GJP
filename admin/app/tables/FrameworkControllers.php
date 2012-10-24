<?php
class FrameworkControllers extends BaseFrameworkControllers
{
	private $table_alias = 'frameworkControllers fc';

	public function getController($controller)
	{
		//Padroniza o nome do controller
		$controller = strtolower($controller);

		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where('fc.txt_nome = ?',$controller);

			$recordset = $query->execute();
			return $recordset[0];
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}