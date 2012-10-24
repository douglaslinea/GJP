<?php
class HoteisDistancias extends BaseHoteisDistancias
{
	private $table_alias = 'hoteisDistancias hd';

	public function BuscarDistancias()
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT hd.* ,wi.txt_idioma,  ht.txt_razaoSocial FROM ".$this->table_alias.", websiteIdiomas wi, hoteis ht WHERE hd.cod_idioma = wi.cod_id AND hd.cod_hotel = ht.cod_relacao_idioma  group by hd.cod_id");
			$resultado = $sth->fetchAll();

			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectDistanciasParametros($id_relacao_idioma)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT hd.* ,wi.txt_idioma,  ht.txt_razaoSocial FROM  ".$this->table_alias.", websiteIdiomas wi, hoteis ht WHERE hd.cod_idioma = wi.cod_id AND hd.cod_hotel = ht.cod_relacao_idioma AND hd.cod_relacao_idioma =  $id_relacao_idioma  group by hd.cod_id ");
			$resultado = $sth->fetchAll();

			return $resultado;

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function IncluirDistancias($parametros,$total)
	{
		try
		{
			$this->cod_idioma = $parametros['cod_idioma'.$total];
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma'];
			$this->txt_descricao = $parametros['txt_descricao'.$total];
			$this->cod_hotel = $parametros['cod_hotel'];

			$this->save();

			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			return true;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExecuteEditaDistancias($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);


			if($tabela)
			{
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_descricao = $parametros['txt_descricao'.$total];
				$tabela->cod_hotel = $parametros['cod_hotel'];
				$tabela->save();

				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'.$total] , 'E');

				return true;
			}
			else
			{
				return false;
			}
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExcluirDistanciasId($cod_relacao_idioma)
	{
		try
		{
			$tabela = $this->getTable($table_alias)->findBySql("cod_relacao_idioma = ?", array($cod_relacao_idioma));

			if($tabela)
			{
				$tabela->delete();
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $cod_relacao_idioma , 'X');
				return true;
			}
			else
			{
				return false;
			}
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectUltimoRelacionamentoIdioma()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("*")
			->from($this->table_alias)
			->orderBy("cod_relacao_idioma DESC")
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