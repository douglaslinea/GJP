<?php
class faleconosco extends BaseFaleConosco
{
	private $table_alias = "faleConosco fc";
		
	public function incluirFaleConosco()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('fc.dat_datahora, fc.txt_nome, fc.txt_email, fc.txt_assunto')
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
			->select('fc.num_ip, fc.cod_id, fc.dat_datahora, fc.txt_nome, fc.txt_email, fc.txt_telefone, fc.txt_assunto, fc.txt_mensagem')
			->from($this->table_alias)
			->where('fc.cod_id = ?', $cod_id)
			->execute()
			->toArray();
				
			return $query[0];
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	
	public function SelectFaleconoscofiltro($de, $ate)
	{
		try
		{
			$de = implode("-",array_reverse(explode("/",$de)));
			$ate = implode("-",array_reverse(explode("/",$ate)));
			
			$query = Doctrine_Query::create()
			->select("fc.cod_id, wsi.txt_idioma, fc.num_ip, DATE_FORMAT(fc.dat_datahora, '%d/%m/%Y') dat_datahora, fc.txt_nome, fc.txt_email, fc.txt_telefone, fc.txt_assunto, fc.txt_mensagem ")
			->from($this->table_alias)
			->innerJoin('fc.WebsiteIdiomas wsi')
			->where("fc.dat_datahora >= ?",$de)
			->andWhere("fc.dat_datahora <= ?",$ate)
			->andWhere("fc.dat_datahora <= ?",$ate)
			->orderBy("fc.dat_datahora DESC")
			->execute()
			->toArray();
			
			
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelectFaleconoscoExportar()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("fc.cod_id, wsi.txt_idioma, fc.num_ip, DATE_FORMAT(fc.dat_datahora, '%d/%m/%Y') dat_datahora, fc.txt_nome, fc.txt_email, fc.txt_telefone, fc.txt_assunto, fc.txt_mensagem ")
			->from($this->table_alias)
			->innerJoin('fc.WebsiteIdiomas wsi')
			->execute()
			->toArray();
	
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	/*public function incluirFaleConosco($parametros)
	{
		try
		{
			//Recebe os campos da tabela preenchidos
			$campos_tabela = $this->setValues($this, $parametros, INSERT);

			//Percorre os campos da tabela
			foreach($campos_tabela as $chave => $valor)
			{
				//Atribui os valores resgatados para a tabela em questão
				$this->$chave = $campos_tabela->$chave;
			}
			
			$this->cod_idioma = LANGUAGE;
			$this->dat_datahora = date("Y-m-d H-i-s");
			$this->num_ip = $_SERVER['REMOTE_ADDR'];
			
			//Salva o registro no banco de dados
			$this->save();
			
			//Salva no log de alterações
			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');
						
			//Returna true em caso de sucesso
			return true;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	*/
}