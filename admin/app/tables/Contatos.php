<?php
class Contatos extends BaseContatos
{
	private $table_alias = "contatos co";

	public function SelectContatos()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('co.*, cc.txt_cidade, cu.txt_uf, wi.txt_idioma')
			->from($this->table_alias)
			->innerJoin("co.CepCidades cc")
			->innerJoin("co.CepUf cu")
			->innerJoin("co.WebsiteIdiomas wi")
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
	
	public function ExecuteEditaContatos($parametros, $total)
	{
		try
		{
			//Pesquisa o id
			$tabela = $this->getTable()->find($parametros['cod_id'.$total]);

			//Verifica se o registro foi localizado
			if($tabela)
			{
				//Trata os dados antes de gravar no banco de dados
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
				
				$tabela->cod_idioma = $parametros['cod_idioma'.$total];
				$tabela->razao_social = $parametros['razao_social'.$total];
				$tabela->cnpj = $parametros['cnpj'.$total];
				$tabela->endereco = $parametros['endereco'.$total];
				$tabela->numero = $parametros['numero'.$total];
				$tabela->complemento = $parametros['complemento'.$total];
				$tabela->cep = $parametros['cep'.$total];
				$tabela->bairro = $parametros['bairro'.$total];
				$tabela->cod_estado = $parametros['cod_estado'.$total];
				$tabela->cod_cidade = $parametros['cod_cidade'.$total];
				$tabela->telefone = $parametros['telefone'.$total];
				$tabela->pais = $parametros['pais'.$total];
				$tabela->cod_latitude = $parametros['cod_latitude'.$total];
				$tabela->cod_longitude = $parametros['cod_longitude'.$total];

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