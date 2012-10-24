<?php

class ImprensaCategoria extends BaseImprensaCategoria
{
	private $table_alias = "imprensaCategoria ic";

	public function InsereCategoriaHotel($parametros,$i)
	{
		try
		{
			$this->txt_categoria = $parametros['txt_razaoSocial'];
			$this->cod_idioma = $i;
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma_Imprensa'];

			$this->save();

			################ GERANDO PERMALINK ###################
			$Helper = HelperFactory::getInstance();
			$registro = $this->getTable()->find($this->getIncremented());
			$parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_razaoSocial'],$this->getIncremented());
			$registro->txt_permalink = $parametros['txt_permalink'];
			$registro->save();
			#######################################################

			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			return $this->getIncremented();
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function InsereCategoriaMarca($parametros, $i)
	{
		try
		{
			$this->txt_categoria = $parametros['txt_nomeMarca'.$i];
			$this->cod_idioma = $parametros['cod_idioma'.$i];
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma_categoria'];	
			$this->save();

			################ GERANDO PERMALINK ###################
			$Helper = HelperFactory::getInstance();
			$registro = $this->getTable()->find($this->getIncremented());
			$parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_nomeMarca'.$i],$this->getIncremented());
			$registro->txt_permalink = $parametros['txt_permalink'];
			$registro->save();
			#######################################################
					
			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			$parametros['cod_imprensa'] = $this->getIncremented();
			//insere na tabela MarcaGJP
			TableFactory::getInstance('MarcaGJP')->InserirMarca($parametros,$i);
			
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


	public function getImprensa()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select ('ic.*')
			->from($this->table_alias)
			->groupBy("ic.txt_categoria")
			->execute()
			->toArray();

			return $query;

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}