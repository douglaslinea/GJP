<?php

class GjpAcoesSociais extends BaseGjpAcoesSociais
{
	private $table_alias = "gjpAcoesSociais as";


	public function SelectAcaoSocial()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('as.*,wi.txt_idioma')
			->from($this->table_alias)
			->innerJoin("as.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelectBuscaAcaoSocial()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('as.*,wi.txt_idioma')
			->from($this->table_alias)
			->innerJoin("as.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelecionaAcaoSocialID($cod_relacao_idioma)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('as.*,wi.txt_idioma')
			->from($this->table_alias)
			->where('as.cod_relacao_idioma = ?',$cod_relacao_idioma)
			->innerJoin("as.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExcluirAcaoSocialId($cod_relacao_idioma)
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

	public function ExecuteEditaAcaoSocial($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			if($tabela)
			{
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_titulo = $parametros['txt_titulo'.$total];
				$tabela->txt_historico = $parametros['txt_historico'.$total];

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

	public function IncluirAcaoSocial($parametros,$total)
	{
		try
		{
			$this->cod_idioma = $parametros['cod_idioma'.$total];
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma'];
			$this->txt_titulo = $parametros['txt_titulo'.$total];
			$this->txt_historico = $parametros['txt_historico'.$total];

			$this->save();
			
			$Helper = HelperFactory::getInstance();
			$registro = $this->getTable()->find($this->getIncremented());
			$parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_titulo'.$total],$this->getIncremented());
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