<?
class WebsiteInfo extends BaseWebsiteInfo
{
	//Tabela do banco de dados
	private $table_alias = "websiteInfo wi";

	//Retorna as informações do Sistema
	public function getWebSiteInfo()
	{
		try
		{
			//Retorna os dados da tabela
			return $this->getTable($this->table_alias)->findAll();
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectConfiguracoes($id)
	{
		try
		{
			//Prepara a query
			$query = Doctrine_Query::create()
			->select("wi.*, wid.*")
			->from($this->table_alias)
			->innerJoin("wi.WebsiteIdiomas wid")
			->where("wi.id = ?", $id)
			->limit('1')
			->execute()
			->toArray();
				
			return $query[0];

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExecuteEditaConfiguracoes($parametros)
	{
		try
		{
			//Pesquisa o id
			$tabela = $this->getTable()->find($parametros['id']);

			//Verifica se o registro foi localizado
			if($tabela)
			{
				//Recebe os campos da tabela preenchidos
				$campos_tabela = $this->setValues($tabela, $parametros, UPDATE);

				//Percorre os campos da tabela
				foreach($campos_tabela as $chave => $valor)
				{
					//Atribui os valores resgatados para a tabela em questão
					$this->$chave = $campos_tabela->$chave;
				}

				//Atualiza o banco de dados
				$tabela->save();

				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['id'] , 'E');

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