<?php

class GjpParceiros extends BaseGjpParceiros
{
	private $table_alias = "gjpParceiros pr";

	public function selectParceiros()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("pr.* , wi.txt_idioma")
			->from($this->table_alias)
			->innerJoin("pr.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function selectParceirosID($cod_relacao_idioma)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("pr.* , wi.txt_idioma")
			->from($this->table_alias)
			->innerJoin("pr.WebsiteIdiomas wi")
			->where("pr.cod_relacao_idioma = ?", $cod_relacao_idioma)
			->execute()
			->toArray();

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
	public function InsereParceiros($parametros,$i)
	{
		try
		{
			$this->txt_titulo = $parametros['txt_titulo'.$i];
			$this->txt_apresentacao = $parametros['txt_apresentacao'.$i];
			$this->cod_relacao_idioma =$parametros['cod_relacao_idioma'];
			$this->cod_idioma = $parametros['cod_idioma'.$i];
			$this->img_capa_original = $parametros['nome_img1'];
			$this->img_capa_cropada = $parametros['nome_img_cropada1'];

			$this->save();

			$Helper = HelperFactory::getInstance();

			$registro = $this->getTable()->find($this->getIncremented());

			$parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_titulo'.$i],$this->getIncremented());

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

	public function EditaParceiros($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			if($tabela)
			{
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_apresentacao = $parametros['txt_apresentacao'.$total];
				$tabela->txt_titulo= $parametros['txt_titulo'.$total];
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

	public function ExcluirParceirosId($cod_relacao_idioma)
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

	public function DeletarImagemBanco($imagem_original, $imagem_cropada, $id_relacao_idioma){
		try {
			$query = Doctrine_Query::create()
			->select("pr.*")
			->from($this->table_alias)
			->where('cod_relacao_idioma = ?',$id_relacao_idioma)
			->execute()
			->toArray();


			foreach($query as $resultado){
				$id = $resultado['cod_id'];
				$tabela = $this->getTable($this->table_alias)->find($id);
			
				if($tabela){
					
					$tabela->img_capa_original = "";
					$tabela->img_capa_cropada  = "";
					$tabela->save();

					TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id , 'E');

				}
			}
			return true;


		} catch (Doctrine_Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function AlteraImagem($imagem_original, $imagem_cropada, $id_relacao_idioma){
		try {
			$query = Doctrine_Query::create()
			->select("pr.*")
			->from($this->table_alias)
			->where('cod_relacao_idioma = ?',$id_relacao_idioma)
			->execute()
			->toArray();

			foreach($query as $resultado){
				$id = $resultado['cod_id'];
				$tabela = $this->getTable($this->table_alias)->find($id);

				if($tabela){
					$tabela->img_capa_original = $imagem_original;
					$tabela->img_capa_cropada  = $imagem_cropada;

					$tabela->save();
					TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id , 'E');
				}
			}
			return true;
		} catch (Doctrine_Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}






}