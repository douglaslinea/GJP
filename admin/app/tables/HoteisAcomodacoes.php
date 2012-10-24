<?php

class HoteisAcomodacoes extends BaseHoteisAcomodacoes
{
	private $table_alias = "hoteisAcomodacoes ha";

	public function SelectAcomodacoes()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('ha.*,wi.txt_idioma, ht.txt_razaoSocial')
			->from($this->table_alias)
			->innerJoin("ha.Hoteis ht")
			->innerJoin("ha.WebsiteIdiomas wi")
			->groupBy("ha.txt_titulo")
			->execute()
			->toArray();


			//	echo $query->getSqlQuery();
			//	exit();
			//Retorna o resultado
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelecionaAcomodacaoID($cod_relacao_idioma)
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('ha.*,wi.txt_idioma, ht.txt_razaoSocial')
			->from($this->table_alias)
			->where('ha.cod_relacao_idioma = ?',$cod_relacao_idioma)
			->innerJoin("ha.Hoteis ht")
			->innerJoin("ha.WebsiteIdiomas wi")
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

	public function IncluirAcomodacao($parametros,$total)
	{
		try
		{
			$this->cod_idioma = $parametros['cod_idioma'.$total];
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma'];
			$this->cod_hotel = $parametros['cod_hotel'];
			$this->txt_titulo = $parametros['txt_titulo'.$total];
			$this->txt_descricao = $parametros['txt_descricao'.$total];
			$this->txt_capacidade = $parametros['txt_capacidade'.$total];
			$this->txt_ordem = $parametros['txt_ordem'.$total];
			$this->txt_dimensao = $parametros['txt_dimensao'.$total];
				
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


	public function ExcluirAcomodacaoId($cod_relacao_idioma)
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

	public function ExecuteEditaAcomodacao($parametros, $total)
	{
		try
		{
			//Pesquisa o id
			//print_r($parametros);
			//exit();
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			//Verifica se o registro foi localizado
			if($tabela)
			{
				//Trata os dados antes de gravar no banco de dados
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_titulo = $parametros['txt_titulo'.$total];
				$tabela->cod_hotel = $parametros['cod_hotel'];
				$tabela->txt_descricao = $parametros['txt_descricao'.$total];
				$tabela->txt_capacidade = $parametros['txt_capacidade'.$total];
				$tabela->txt_ordem = $parametros['txt_ordem'.$total];
				$tabela->txt_dimensao = $parametros['txt_dimensao'.$total];

				//Atualiza o banco de dados
				$tabela->save();

				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'.$total] , 'E');

				//Retorna true em caso de sucesso
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