<?php
class GjpLinhaTempo extends BaseGjpLinhaTempo
{
	private $table_alias = "gjpLinhaTempo lt";

	public function selectLinhaTempo()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("lt.* , wi.txt_idioma")
			->from($this->table_alias)
			->innerJoin("lt.WebsiteIdiomas wi")
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

	public function InserirLinha($parametros,$i)
	{
		try
		{
			$this->txt_titulo = $parametros['txt_titulo'.$i];
			$this->cod_relacao_idioma =$parametros ['cod_relacao_idioma'];
			$this->txt_mes = $parametros['txt_mes'];
			$this->txt_ano = $parametros['txt_ano'];
			$this->cod_idioma = $parametros['cod_idioma'.$i];
			$this->img_foto_original = $parametros['nome_img1'];
			$this->img_foto_cropada = $parametros['nome_img_cropada1'];
			$this->txt_text = $parametros['txt_text'.$i];

			$this->save();

			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			return true;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function EditaLinhaTempo($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			if($tabela)
			{
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_mes = $parametros['txt_mes'];
				$tabela->txt_ano = $parametros['txt_ano'];
				$tabela->txt_text = $parametros['txt_text'.$total];
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

	public function SelecionaLinhaID($cod_relacao_idioma)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("lt.* , wi.txt_idioma")
			->from($this->table_alias)
			->where('lt.cod_relacao_idioma = ?', $cod_relacao_idioma)
			->innerJoin("lt.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExcluirLinhaTempoId($cod_relacao_idioma)
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
			->select("lt.*")
			->from($this->table_alias)
			->where('cod_relacao_idioma = ?',$id_relacao_idioma)
			->execute()
			->toArray();
			
			foreach($query as $resultado){
				$id = $resultado['cod_id'];
				$tabela = $this->getTable($this->table_alias)->find($id);
				if($tabela){
						
					$tabela->img_foto_original = "";
					$tabela->img_foto_cropada  = "";
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
			->select("lt.*")
			->from($this->table_alias)
			->where('cod_relacao_idioma = ?',$id_relacao_idioma)
			->execute()
			->toArray();

			foreach($query as $resultado){
				$id = $resultado['cod_id'];
				$tabela = $this->getTable($this->table_alias)->find($id);
				if($tabela){
					$tabela->img_foto_original = $imagem_original;
					$tabela->img_foto_cropada  = $imagem_cropada;
					$tabela->save();
					TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id , 'E');
				}
			}
			return true;

		}catch (Doctrine_Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}



}