<?php

class ImagemCategoria extends BaseImagemCategoria
{
	private $table_alias = "imagemCategoria imc";

	public function InsereCategoriaHotel($parametros,$i)
	{
		try
		{
			$this->txt_categoria = $parametros['txt_razaoSocial'];
			$this->cod_idioma = $i;
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma_Imagem'];

			//Salva o registro no banco de dados
			$this->save();

			//Salva no log de alterações
			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			//Returna true em caso de sucesso
			return $this->getIncremented();

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