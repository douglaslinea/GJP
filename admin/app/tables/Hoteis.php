<?php
class Hoteis extends BaseHoteis
{
	private $table_alias = "hoteis ht";
	public function SelectHoteis()
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT ht.*, mg.txt_nomeMarca, dt.txt_destinos, dt.cod_estado,cu.txt_uf ,mg.cod_id, wi.txt_idioma FROM  ".$this->table_alias.", destinos dt, cepUf cu, marcaGJP mg, websiteIdiomas wi WHERE dt.cod_id = ht.cod_destino AND cu.cod_id = dt.cod_estado AND ht.cod_marca = mg.cod_relacao_idioma AND wi.cod_id = ht.cod_idioma 	GROUP BY ht.txt_razaoSocial");
			$resultado = $sth->fetchAll();

			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}



	public function SelecionaHoteisID($cod_relacao_idioma)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT ht.*, mg.txt_nomeMarca, dt.txt_destinos, dt.cod_estado,cu.txt_uf ,mg.cod_id, wi.txt_idioma FROM  ".$this->table_alias.", destinos dt, cepUf cu, marcaGJP mg, websiteIdiomas wi WHERE dt.cod_id = ht.cod_destino AND cu.cod_id = dt.cod_estado AND ht.cod_marca = mg.cod_relacao_idioma AND wi.cod_id = ht.cod_idioma AND ht.cod_relacao_idioma = $cod_relacao_idioma	GROUP BY ht.txt_razaoSocial");
			$resultado = $sth->fetchAll();

			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}

	}

	public function SelecionaHoteisEditID($cod_relacao_idioma)
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT ht.*, mg.txt_nomeMarca, dt.txt_destinos, dt.cod_estado,cu.txt_uf ,mg.cod_id, wi.txt_idioma FROM  ".$this->table_alias.", destinos dt, cepUf cu, marcaGJP mg, websiteIdiomas wi WHERE dt.cod_id = ht.cod_destino AND cu.cod_id = dt.cod_estado AND ht.cod_marca = mg.cod_relacao_idioma AND wi.cod_id = ht.cod_idioma AND ht.cod_relacao_idioma = $cod_relacao_idioma GROUP BY ht.cod_id");
			$resultado = $sth->fetchAll();

			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}

	}

	public function pegaHotel()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('ht.*')
			->from($this->table_alias)
			->groupBy("ht.txt_razaoSocial")
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

	public function InsereHotel($parametros,$total)
	{
		try
		{
			$this->txt_razaoSocial = $parametros['txt_razaoSocial'];
			$this->txt_nomeFantasia = $parametros['txt_nomeFantasia'];
			$this->cod_relacao_idioma =$parametros ['cod_relacao_idioma_hotel'];
			$this->txt_email = $parametros['txt_email'];
			$this->char_evento = $parametros['char_evento'];
			$this->num_cnpj = $parametros['num_cnpj'];
			$this->cod_marca = $parametros['cod_marca'];
			$this->txt_endereco = $parametros['txt_endereco'];
			$this->txt_cadastroMTUR = $parametros['txt_cadastroMTUR'];
			$this->txt_cep = $parametros['txt_cep'];
			$this->txt_bairro = $parametros['txt_bairro'];
			$this->cod_latitude = $parametros['cod_latitude'];
			$this->cod_longitude = $parametros['cod_longitude'];
			$this->img_capa_original = $parametros['nome_img1'];
			$this->img_capa_cropada = $parametros['nome_img_cropada1'];
			$this->img_capa2_original = $parametros['nome_img2'];
			$this->img_capa2_cropada = $parametros['nome_img_cropada2'];
			$this->cod_categoria_download = $parametros['cod_categoria_download'];
			$this->cod_categoria_imagem = $parametros['cod_categoria_imagem'];
			$this->cod_imprensa = $parametros['cod_imprensa'];
			$this->cod_destino = $parametros['cod_destino'];

			$this->cod_idioma = $parametros['cod_idioma'.$total];
			$this->txt_telefone = $parametros['txt_telefone'.$total];
			$this->txt_info = $parametros['txt_info'.$total];
			$this->vid_video = $parametros['vid_video'.$total];


			//Salva o registro no banco de dados
			$this->save();

			################ GERANDO PERMALINK ###################

			//Instancia o Helper
			$Helper = HelperFactory::getInstance();

			//Instancia o registro inserido anteriormente
			$registro = $this->getTable()->find($this->getIncremented());

			//Gera o permalink
			$parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_razaoSocial'],$this->getIncremented());

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


	public function ExecuteEditaHoteis($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			//Verifica se o registro foi localizado
			if($tabela)
			{
				//Trata os dados antes de gravar no banco de dados
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_razaoSocial = $parametros['txt_razaoSocial'.$total];
				$tabela->txt_nomeFantasia = $parametros['txt_nomeFantasia'.$total];
				$tabela->num_cnpj = $parametros['num_cnpj'.$total];
				$tabela->txt_email = $parametros['txt_email'.$total];
				$tabela->char_evento = $parametros['char_evento'.$total];
				$tabela->txt_cadastroMTUR = $parametros['txt_cadastroMTUR'.$total];
				$tabela->txt_endereco = $parametros['txt_endereco'.$total];
				$tabela->txt_cep = $parametros['txt_cep'.$total];
				$tabela->txt_bairro = $parametros['txt_bairro'.$total];
				$tabela->cod_marca = $parametros['cod_marca'.$total];
				$tabela->cod_destino = $parametros['cod_destino'.$total];
				$tabela->txt_telefone = $parametros['txt_telefone'.$total];
				$tabela->cod_latitude = $parametros['cod_latitude'.$total];
				$tabela->cod_longitude = $parametros['cod_longitude'.$total];
				$tabela->txt_telefone = $parametros['txt_telefone'.$total];
				$tabela->txt_info = $parametros['txt_info'.$total];
				$tabela->vid_video = $parametros['vid_video'.$total];
				//Atualiza o banco de dados
				$tabela->save();

				################ GERANDO PERMALINK ###################

				//Instancia o Helper
				$Helper = HelperFactory::getInstance();

				//Instancia o registro inserido anteriormente
				$registro = $this->getTable()->find($this->getIncremented());

				//Gera o permalink
				$parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_razaoSocial'],$this->getIncremented());

				//Atribui o permalink gerado
				$registro->txt_permalink = $parametros['txt_permalink'];

				//Salva o registro no banco de dados
				$registro->save();
				#######################################################
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

	public function DeletarImagemBanco($imagem_original, $imagem_cropada, $id_relacao_idioma){
		try {
			$query = Doctrine_Query::create()
			->select("*")
			->from($this->table_alias)
			->where('cod_relacao_idioma = ?', $id_relacao_idioma)
			->execute()
			->toArray();

			foreach($query as $chave => $resultado){
				$id = $query[$chave]['cod_id'];
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
			->select("*")
			->from($this->table_alias)
			->where('cod_relacao_idioma = ?', $id_relacao_idioma)
			->execute()
			->toArray();

			foreach($query as $chave => $resultado){
				$id = $query[$chave]['cod_id'];
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


	public function DeletarImagemBanco2($imagem_original, $imagem_cropada, $id_relacao_idioma){
		try {
			$query = Doctrine_Query::create()
			->select("*")
			->from($this->table_alias)
			->where('cod_relacao_idioma = ?', $id_relacao_idioma)
			->execute()
			->toArray();

			foreach($query as $chave => $resultado){
				$id = $query[$chave]['cod_id'];
				$tabela = $this->getTable($this->table_alias)->find($id);
				if($tabela){
					$tabela->img_capa2_original = "";
					$tabela->img_capa2_cropada  = "";
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

	public function AlteraImagem2($imagem_original, $imagem_cropada, $id_relacao_idioma){
		try {

			$query = Doctrine_Query::create()
			->select("*")
			->from($this->table_alias)
			->where('cod_relacao_idioma = ?', $id_relacao_idioma)
			->execute()
			->toArray();

			foreach($query as $chave => $resultado){
				$id = $query[$chave]['cod_id'];
				$tabela = $this->getTable($this->table_alias)->find($id);

				if($tabela){
					$tabela->img_capa2_original = $imagem_original;
					$tabela->img_capa2_cropada  = $imagem_cropada;
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





	public function ExcluirHotelId($cod_relacao_idioma)
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

}

