<?php

class MarcaGJP extends BaseMarcaGJP
{
	private $table_alias = "marcaGJP mg";

	public function SelecionaMarca()
	{
		try
		{	//Executa a Query
			$query = Doctrine_Query::create()
			->select('mg.*')
			->from($this->table_alias)
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

	public function selectGrupo()
	{
		try
		{	//Executa a Query
			$query = Doctrine_Query::create()
			->select('mg.*, ic.txt_categoria, wi.txt_idioma')
			->from($this->table_alias)
			->innerJoin('mg.ImprensaCategoria ic')
			->innerJoin("mg.WebsiteIdiomas wi")
			->groupBy("mg.txt_nomeMarca")
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

	public function EditaMarcas($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			//Verifica se o registro foi localizado
			if($tabela)
			{
				//Trata os dados antes de gravar no banco de dados
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_nomeMarca= $parametros['txt_nomeMarca'.$total];
				$tabela->txt_link = $parametros['txt_link'.$total];
				$tabela->cod_Imprensa = $parametros['cod_Imprensa'.$total];
				$tabela->txt_tel_vendas = $parametros['txt_tel_vendas'.$total];
				$tabela->txt_texto_marca = $parametros['txt_texto_marca'.$total];
				$tabela->arq_video_marca = $parametros['arq_video_marca'.$total];
				//Atualiza o banco de dados
				$tabela->save();

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

	public function InserirMarca($parametros,$i)
	{
		try
		{
			$this->txt_nomeMarca = $parametros['txt_nomeMarca'.$i];
			$this->txt_link = $parametros['txt_link'.$i];
			$this->cod_relacao_idioma =$parametros ['cod_relacao_idioma_marca'];
			$this->txt_tel_vendas = $parametros['txt_tel_vendas'.$i];
			$this->cod_Imprensa = $parametros['cod_imprensa'];
			$this->cod_idioma = $parametros['cod_idioma'.$i];
			$this->img_logo_original = $parametros['nome_img'.$i];
			$this->img_logo_cropada = $parametros['nome_img_cropada'.$i];
			$this->arq_video_marca = $parametros['arq_video_marca'.$i];
			$this->txt_texto_marca = $parametros['txt_texto_marca'.$i];
			$this->cod_ordem = $parametros['txt_ordem'.$i];

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

	public function SelecionaMarcaID($cod_relacao_idioma)
	{
		try
		{	//Executa a Query
			$query = Doctrine_Query::create()
			->select('mg.*, ic.txt_categoria, wi.txt_idioma')
			->from($this->table_alias)
			->where('mg.cod_relacao_idioma = ?', $cod_relacao_idioma)
			->innerJoin('mg.ImprensaCategoria ic')
			->innerJoin("mg.WebsiteIdiomas wi")
			->execute()
			->toArray();

			return $query;

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function DeletarImagemBanco($imagem_original, $imagem_cropada, $id){
		try {

			$tabela = $this->getTable($this->table_alias)->find($id);
			if($tabela){
					
				$tabela->img_logo_original = "";
				$tabela->img_logo_cropada  = "";
				$tabela->save();

				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id , 'E');
				return true;
			}
		} catch (Doctrine_Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function AlteraImagem($imagem_original, $imagem_cropada, $id){
		try {

			$tabela = $this->getTable($this->table_alias)->find($id);

			if($tabela){
					
				$tabela->img_logo_original = $imagem_original;
				$tabela->img_logo_cropada  = $imagem_cropada;

				$tabela->save();
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id , 'E');
			}

			return true;

		} catch (Doctrine_Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

}