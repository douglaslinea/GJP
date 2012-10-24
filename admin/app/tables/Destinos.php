<?php

class Destinos extends BaseDestinos
{
	private $table_alias = "destinos d";

	public function SelectDestinos()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select("d.* ,cc.txt_cidade, cu.txt_uf, wi.txt_idioma")
			->from($this->table_alias)
			->innerJoin("d.CepCidades cc")
			->innerJoin("d.CepUf cu")
			->innerJoin("d.WebsiteIdiomas wi")
			->execute()
			->toArray();

			//Retorna o resultado
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelecionaDestinos()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select("d.* ,cc.txt_cidade, cu.txt_uf, wi.txt_idioma")
			->from($this->table_alias)
			->innerJoin("d.CepCidades cc")
			->innerJoin("d.CepUf cu")
			->innerJoin("d.WebsiteIdiomas wi")
			->groupBy("d.txt_destinos")
			->execute()
			->toArray();

			//Retorna o resultado
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectDestinoID($cod_relacao_idioma)
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select("d.* ,cc.txt_cidade, cu.txt_uf, wi.txt_idioma")
			->from($this->table_alias)
			->where('d.cod_relacao_idioma = ?',$cod_relacao_idioma)
			->innerJoin("d.CepCidades cc")
			->innerJoin("d.CepUf cu")
			->innerJoin("d.WebsiteIdiomas wi")
			->execute()
			->toArray();

			//Retorna o resultado
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExcluirDestinosId($cod_relacao_idioma)
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

	public function ExecuteEditaDestino($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			if($tabela)
			{
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_destinos = $parametros['txt_destinos'.$total];
				$tabela->cod_clima = $parametros['cod_clima'.$total];
				$tabela->cod_estado = $parametros['cod_estado'.$total];
				$tabela->cod_cidade = $parametros['cod_cidade'.$total];
				$tabela->txt_informacao = $parametros['txt_informacao'.$total];

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

	public function InserirDestinos($parametros,$total)
	{
		try
		{
			$this->txt_destinos = $parametros['txt_destinos'.$total];
			$this->cod_relacao_idioma = $parametros ['cod_relacao_idioma'];
			$this->cod_cidade = $parametros['cod_cidade'.$total];
			$this->cod_estado = $parametros['cod_estado'.$total];
			$this->cod_clima = $parametros['cod_clima'.$total];
			$this->txt_informacao= $parametros['txt_informacao'.$total];
			$this->cod_idioma = $parametros['cod_idioma'.$total];

			$this->save();

			$Helper = HelperFactory::getInstance();

			$registro = $this->getTable()->find($this->getIncremented());

			$parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_destinos'.$total],$this->getIncremented());

			$registro->txt_permalink = $parametros['txt_permalink'];

			$registro->save();
		
			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			return true;

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