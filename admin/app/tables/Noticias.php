<?php
class Noticias extends BaseNoticias
{
	private $table_alias = "noticias n";

	public function SelectNoticias()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select("n.*")
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

	public function ExcluirNoticiaId($cod_relacao_idioma)
	{
		try
		{
			//Localiza o registro
			$tabela = $this->getTable($table_alias)->findBySql("cod_relacao_idioma = ?", array($cod_relacao_idioma));

			//Verifica se o registro foi encontrado
			if($tabela)
			{
				//Removendo o registro
				$tabela->delete();

				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $cod_relacao_idioma , 'X');

				//Retorna verdadeiro em caso de sucesso
				return true;
			}
			else
			{
				//Não foi possivel remover o registro então retorna falso
				return false;
			}
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectNoticiaRelacaoId($cod_relacao_idioma)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("n.*, DATE_FORMAT(n.dat_data, '%d/%m/%Y') dat_data, wi.*")
			->from($this->table_alias)
			->innerJoin("n.WebsiteIdiomas wi")
			->where("n.cod_relacao_idioma =?", $cod_relacao_idioma)
			->execute();

			//Verifica se houve resultado
			if($query->count() > 0)
			{
				$dados = $query->toArray();

				return $dados;
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

	public function EditaNoticia($parametros, $total)
	{
		try
		{
			//Pesquisa o id
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			//Verifica se o registro foi localizado
			if($tabela)
			{
				$tabela->cod_publicado = $parametros['cod_publicado'.$total];
				$tabela->dat_inicio_publicacao = $parametros['dat_inicio_publicacao'.$total];
				$tabela->dat_termino_publicacao = $parametros['dat_termino_publicacao'.$total];
				$tabela->dat_data = $parametros['dat_data'.$total];
				$tabela->txt_titulo = $parametros['txt_titulo'.$total];
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

	public function IncluirNoticia($parametros, $total)
	{

		try
		{


			$numero_idiomas = $query[0];

			$query = Doctrine_Query::create()
			->select("*")
			->from($this->table_alias)
			->orderBy('cod_relacao_idioma DESC')
			->execute()
			->toArray();


			$ultimo_cod_rel_idioma = $query[$total-1]['cod_relacao_idioma'];


			$cod_relacao_idioma = $ultimo_cod_rel_idioma + 1;


			/*print_r($parametros);
			 exit();*/
			$this->cod_idioma = $parametros['cod_idioma'.$total];
			$this->cod_publicado = $parametros['cod_publicado'.$total];
			$this->cod_relacao_idioma = $cod_relacao_idioma;
			$this->dat_inicio_publicacao = $parametros['dat_inicio_publicacao'.$total];
			$this->dat_termino_publicacao = $parametros['dat_termino_publicacao'.$total];
			$this->dat_data = $parametros['dat_data'.$total];
			$this->txt_titulo = $parametros['txt_titulo'.$total];
			$this->txt_texto = $parametros['txt_texto'.$total];
			$this->img_original = $parametros['nome_img'.$total];
			$this->img_cropada = $parametros['nome_img_cropada'.$total];


			//Salva o registro no banco de dados
			$this->save();

			################ GERANDO PERMALINK ###################

			//Instancia o Helper
			$Helper = HelperFactory::getInstance();

			//Instancia o registro inserido anteriormente
			$registro = $this->getTable()->find($this->getIncremented());

			//Gera o permalink
			$parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_titulo'.$total],$this->getIncremented());

			//Atribui o permalink gerado
			$registro->txt_permalink = $parametros['txt_permalink'];

			//Salva o registro no banco de dados
			$registro->save();
			#######################################################

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


	public function DeletarImagemBanco($imagem_original, $imagem_cropada, $id){
		try {
				
				
			$tabela = $this->getTable($this->table_alias)->find($id);
				
			if($tabela){
					
				$tabela->img_original = "";
				$tabela->img_cropada  = "";


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
			
				$tabela->img_original = $imagem_original;
				$tabela->img_cropada  = $imagem_cropada;
				
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