<?php

class GjpAcoesNoticias extends BaseGjpAcoesNoticias
{
	private $table_alias = "gjpAcoesNoticias an";


	public function SelectAcaoNoticias()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('an.*,wi.txt_idioma')
			->from($this->table_alias)
			->innerJoin("an.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelecionaAcaoNoticiasID($cod_relacao_idioma)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('an.*,wi.txt_idioma')
			->from($this->table_alias)
			->where('an.cod_relacao_idioma = ?',$cod_relacao_idioma)
			->innerJoin("an.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExcluirAcaoNoticiasId($cod_relacao_idioma)
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

	public function ExecuteEditaAcaoNoticias($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			if($tabela)
			{
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->cod_acao_social = $parametros['cod_acaoSocial'];
				$tabela->cod_publicado = $parametros['cod_publicado'.$total];
				$tabela->dat_inicio = $parametros['dat_inicio'];
				$tabela->dat_termino = $parametros['dat_termino'];
				$tabela->dat_data = $parametros['dat_data'];
				$tabela->txt_titulo = $parametros['txt_titulo'.$total];
				$tabela->txt_texto = $parametros['txt_texto'.$total];
				
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

	public function IncluirAcaoNoticias($parametros,$total)
	{
		try
		{
			$this->cod_idioma = $parametros['cod_idioma'.$total];
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma'];
			$this->cod_acao_social = $parametros['cod_acaoSocial'];
			$this->cod_publicado = $parametros['cod_publicado'.$total];
			$this->dat_inicio = $parametros['dat_inicio'];
			$this->dat_termino = $parametros['dat_termino'];
			$this->dat_data = $parametros['dat_data'];
			$this->txt_titulo = $parametros['txt_titulo'.$total];
			$this->txt_texto = $parametros['txt_texto'.$total];
								
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
?>