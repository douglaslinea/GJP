<?php
class Textos extends BaseTextos
{
	private $table_alias = 'textos te';
	//private $table_alias1 = 'textoscCategoria tccc';

	public function SelectTexto()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("te.cod_idioma = ?", LANGUAGE)
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectTextoId($cod_id)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("te.cod_id = ?",$cod_id)
			->andWhere("te.cod_idioma = ?", LANGUAGE)
			->execute();

			//Verifica se houve resultado
			if($query->count() > 0)
			{
				$dados = $query->toArray();
				return $dados[0];
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

	public function getTexto($ids=null)
	{
		try
		{
			//Monta a Query
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->andWhere('te.cod_idioma = ?',LANGUAGE);

			//Verifica se pelo menos um id foi especificado, caso contrário todos os textos serão resgatados
			if(!is_null($ids)){

				//Filtra pelos ids informados
				$query->whereIn('te.cod_texto',$ids);
			}

			//Executa a Query
			$recordset = $query->execute();

			//Armazena os textos em um array indexado pelo Id do texto
			$ArrayTextos = array();

			//Percorre os textos e atribui ao Array resultante
			foreach($recordset as $dado)
			{
				$ArrayTextos[$dado['cod_texto']] = array('txt_titulo' => $dado['txt_titulo'], 'texto' => $dado['txt_texto'], 'img' => $dado['img_texto']);
			}

			return $ArrayTextos;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExecuteBuscarTextos()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("*, wi.txt_idioma ")
			->from($this->table_alias)
			->innerJoin("te.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function IncluirTextos($parametros,$total)
	{
		try
		{
			$this->cod_idioma = $parametros['cod_idioma'.$total];
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma_textos'];
			$this->cod_ordem = $parametros['cod_ordem'.$total];
			$this->txt_titulo = $parametros['txt_titulo'.$total];
			$this->txt_descricao = $parametros['txt_descricao'.$total];
			$this->cod_categoria = $parametros['cod_categoria'];

			$this->save();

			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			return true;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}


	public function ExcluirTextosId($cod_relacao_idioma)
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

	public function BuscarTextosEsp($cod_opt_cat)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT te.*,tc.txt_categoria ,wi.txt_idioma,  ht.txt_razaoSocial FROM ".$this->table_alias.", textoscCategoria tc, websiteIdiomas wi, hoteis ht WHERE te.cod_categoria = tc.cod_relacao_idioma AND te.cod_idioma = wi.cod_id AND tc.cod_hotel_destino = ht.cod_relacao_idioma AND te.cod_categoria = tc.cod_relacao_idioma AND tc.cod_optCategoria = $cod_opt_cat group by te.cod_id");
			$resultado = $sth->fetchAll();

			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectTextoParametros($id_relacao_idioma)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT te.*,tc.txt_categoria ,wi.txt_idioma,  ht.txt_razaoSocial FROM ".$this->table_alias.", textoscCategoria tc, websiteIdiomas wi, hoteis ht WHERE te.cod_categoria = tc.cod_relacao_idioma AND te.cod_idioma = wi.cod_id AND tc.cod_hotel_destino = ht.cod_relacao_idioma AND te.cod_categoria = tc.cod_relacao_idioma AND te.cod_relacao_idioma =  $id_relacao_idioma  group by te.cod_id ");
			$resultado = $sth->fetchAll();

			return $resultado;
				
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function BuscarTextosDestinos($cod_opt_cat)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT te.*,tc.txt_categoria ,wi.txt_idioma,  de.txt_destinos FROM ".$this->table_alias.", textoscCategoria tc, websiteIdiomas wi, destinos de WHERE te.cod_categoria = tc.cod_relacao_idioma AND te.cod_idioma = wi.cod_id AND tc.cod_hotel_destino = de.cod_relacao_idioma AND te.cod_categoria = tc.cod_relacao_idioma AND tc.cod_optCategoria = $cod_opt_cat group by te.cod_id");
			$resultado = $sth->fetchAll();

			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectTextoParametrosDestinos($id_relacao_idioma)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT te.*,tc.txt_categoria ,wi.txt_idioma,  de.txt_destinos FROM ".$this->table_alias.", textoscCategoria tc, websiteIdiomas wi, destinos de WHERE te.cod_categoria = tc.cod_relacao_idioma AND te.cod_idioma = wi.cod_id AND tc.cod_hotel_destino = de.cod_relacao_idioma AND te.cod_categoria = tc.cod_relacao_idioma AND te.cod_relacao_idioma =  $id_relacao_idioma  group by te.cod_id ");
			$resultado = $sth->fetchAll();

			return $resultado;
				
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExecuteEditaTextoParametros($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);


			if($tabela)
			{
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_titulo = $parametros['txt_titulo'.$total];
				$tabela->txt_descricao = $parametros['txt_descricao'.$total];
				$tabela->cod_ordem = $parametros['cod_ordem'.$total];
				$tabela->cod_categoria = $parametros['cod_categoria'];
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

	public function ExecutegetTexto($cod_texto)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*, wi.txt_idioma')
			->from($this->table_alias)
			->innerJoin("te.WebsiteIdiomas wi")
			->where('te.cod_texto = ?',$cod_texto);

			//Verifica se houve resultado
			if($query->count() > 0)
			{
				//Executa a query
				$recordset = $query->execute()->toArray();

				//Retorna os dados resgatados
				return $recordset;
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
}