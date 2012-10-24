<?php
class TextosLayout extends BaseTextosLayout
{
	private $table_alias = "textosLayout tl";

	public function getLayoutTexts()
	{
		try
		{
			//Query a ser executada
			$Query = Doctrine_Query::CREATE();
			$Query->select('tl.txt_texto,tl.cod_texto')
			->from($this->table_alias);
			 
			//Executa a query
			$recordset = $Query->execute();
			 
			//Cria um array para os resultados
			$array_textos_layout = array();

			//Atribui os textos resgatados ao array resultante
			foreach($recordset as $valor)
			{
				$array_textos_layout[$valor['cod_texto']] = $valor['txt_texto'];
			}

			//Executa a Query
			return $array_textos_layout;	
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	/**
	 * Busca os dados dos textos
	 * @param Integer $cod_id
	 */
	public function ExecutegetTexto($cod_texto)
	{
		try
		{
			//Monta a Query
			$query = Doctrine_Query::create()
			->select('tl.*, idioma.*')
			->from($this->table_alias)
			->innerJoin('tl.WebsiteIdiomas idioma')
			->where('tl.cod_texto = ?', $cod_texto)
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	/**
	 * Salva os dados da atualização do texto no banco de dados
	 * @param Array $parametros
	 */
	public function EditaTextoLayout($parametros, $total)
	{
		try
		{
			//Localiza o registro
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			//Verifica se o registro foi encontrado
			if($tabela)
			{
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
				//Retorn falso em caso de erro
				return false;
			}	
		} 
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	/**
	 * Busca textos na base de dados com base nos parâmetros informados
	 */
	public function ExecuteBuscarTextos()
	{
		try
		{
			//Instancia o objeto da Query
			$query = Doctrine_Query::create()
			->select('*,idioma.*')
			->from($this->table_alias)
			->leftJoin('tl.WebsiteIdiomas idioma')
			->execute()
			->toArray();

			return $query;
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