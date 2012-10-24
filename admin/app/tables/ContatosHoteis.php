<?php

class ContatosHoteis extends BaseContatosHoteis
{

	private $table_alias = "contatosHoteis ch";

	public function SelectContatos()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('ch.*, cc.txt_cidade, cu.txt_uf, wi.txt_idioma')
			->from($this->table_alias)
			->innerJoin("ch.CepCidades cc")
			->innerJoin("ch.CepUf cu")
			->innerJoin("ch.WebsiteIdiomas wi")
			->groupBy("ch.txt_titulo")
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

	public function SelectContatosId($cod_relacao_idioma)
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('ch.*, cc.txt_cidade, ht.txt_razaoSocial ,cu.txt_uf, wi.txt_idioma')
			->from($this->table_alias)
			->where('ch.cod_relacao_idioma= ? ',$cod_relacao_idioma)
			->innerJoin("ch.CepCidades cc")
			->innerJoin("ch.CepUf cu")
			->innerJoin("ch.WebsiteIdiomas wi")
			->innerJoin("ch.Hoteis ht")
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

	public function ExcluirContatosId($cod_relacao_idioma)
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

	public function InsereContatosHoteis($parametros,$total)
	{
		try
		{
			$this->txt_titulo = $parametros['txt_titulo'];
			$this->cod_relacao_idioma = $parametros ['cod_relacao_idioma'];
			$this->txt_email = $parametros['txt_email'];
			$this->txt_pais = $parametros['txt_pais'];
			$this->cod_cidade = $parametros['cod_cidade'];
			$this->cod_estado = $parametros['cod_estado'];
			$this->cod_hotel = $parametros['cod_hotel'];
			$this->txt_telefone = $parametros['txt_telefone'];
				
			$this->txt_texto= $parametros['txt_texto'.$total];
			$this->cod_idioma = $parametros['cod_idioma'.$total];
				
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


	public function ExecuteEditaContatos($parametros, $total)
	{
		try
		{
			//Pesquisa o id
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			//Verifica se o registro foi localizado
			if($tabela)
			{
				//Trata os dados antes de gravar no banco de dados
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_titulo = $parametros['txt_titulo'.$total];
				$tabela->cod_estado = $parametros['cod_estado'.$total];
				$tabela->txt_telefone = $parametros['txt_telefone'.$total];
				$tabela->cod_cidade = $parametros['cod_cidade'.$total];
				$tabela->txt_pais =  $parametros['txt_pais'.$total];
				$tabela->txt_email = $parametros['txt_email'.$total];
				$tabela->cod_hotel = $parametros['cod_hotel'.$total];
				$tabela->txt_texto = $parametros['txt_texto'.$total];

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
}
