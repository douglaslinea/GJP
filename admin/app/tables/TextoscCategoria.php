<?php

class TextoscCategoria extends BaseTextoscCategoria
{
	private $table_alias = "textoscCategoria tc";

	public function InsereCategoria($parametros,$i)
	{
		try
		{
			$this->txt_categoria = $parametros['txt_categoria'];
			$this->cod_marca = $parametros['cod_marca'];
			$this->cod_idioma = $i;
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma_categoria'];
			$this->cod_hotel_destino = $parametros['cod_hotel'];
			$this->cod_optCategoria = $parametros['cod_optCategoria'];

			$this->save();

			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			$parametros['cod_categoria'] = $this->getIncremented();

			TableFactory::getInstance('Textos')->IncluirTextos($parametros, $i);

			return true;

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectCodigo($parametros)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('tc.cod_relacao_idioma')
			->from($this->table_alias)
			->where("tc.cod_hotel_destino = ?",$parametros['cod_hotel'])
			->andWhere("tc.cod_optCategoria = ?", $parametros['cod_optCategoria'])
			->groupBy("tc.cod_relacao_idioma")
			->execute()
			->toArray();
			
			return $query[0][cod_relacao_idioma];
		
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function EditaCategoria($parametros, $i)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id_categoria'.$i]);

			if($tabela)
			{
				$tabela->cod_hotel_destino = $parametros['cod_hotel'];
				$tabela->cod_marca = $parametros['cod_marca'];
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

	public function SelectCategoriaParametros($id_relacao_idioma)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT tc.* ,wi.txt_idioma,  ht.txt_razaoSocial FROM ".$this->table_alias.",textos te, websiteIdiomas wi, hoteis ht WHERE te.cod_categoria = tc.cod_relacao_idioma AND te.cod_idioma = wi.cod_id AND tc.cod_hotel_destino = ht.cod_id AND te.cod_categoria = tc.cod_relacao_idioma AND te.cod_relacao_idioma =  $id_relacao_idioma  group by tc.cod_id ");
			$resultado = $sth->fetchAll();

			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectCategoriaParametrosDestinos($id_relacao_idioma)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT tc.* ,wi.txt_idioma,  de.txt_destinos FROM ".$this->table_alias.",textos te, websiteIdiomas wi, destinos de WHERE te.cod_categoria = tc.cod_relacao_idioma AND te.cod_idioma = wi.cod_id AND tc.cod_hotel_destino = de.cod_id AND te.cod_categoria = tc.cod_relacao_idioma AND te.cod_relacao_idioma =  $id_relacao_idioma  group by tc.cod_id ");
			$resultado = $sth->fetchAll();

			return $resultado;
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