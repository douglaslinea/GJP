<?php
class GjpReconhecimento extends BaseGjpReconhecimento
{
	private $table_alias = "gjpReconhecimento gr";

	public function PegaHotelMarca()
	{
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT cod_relacao_idioma, cod_marca, cod_hotel FROM  gjpReconhecimento GROUP BY cod_relacao_idioma");
			$resultado = $sth->fetchAll();

			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function PegaHotelMarcaID($parametros)
	{
		$id_relacao	 = $parametros['id_relacao_idioma'];
		try
		{
			$con = Doctrine_Manager::getInstance()->connection();
			$sth = $con->execute("SELECT cod_relacao_idioma, cod_marca, cod_hotel FROM  gjpReconhecimento WHERE cod_relacao_idioma = $id_relacao GROUP BY cod_relacao_idioma");
			$resultado = $sth->fetchAll();
			return $resultado;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectReconhecimento($parametros)
	{
		try
		{
			if (($parametros['cod_marca'] != "") && ($parametros['cod_marca'] != 0) && ($parametros['cod_hotel'] != "" ) &&($parametros['cod_hotel']!= 0))
			{
				$con = Doctrine_Manager::getInstance()->connection();
				$sth = $con->execute("SELECT gr.*, mg.txt_nomeMarca, mg.cod_id as cod_id_marca, wi.txt_idioma, ht.txt_razaoSocial, ht.cod_id as cod_id_hotel
									FROM  ".$this->table_alias.", marcaGJP mg, websiteIdiomas wi, hoteis ht 
									WHERE wi.cod_id = gr.cod_idioma AND gr.cod_marca = mg.cod_relacao_idioma AND gr.cod_hotel = ht.cod_relacao_idioma 
									AND gr.cod_relacao_idioma = $parametros[cod_relacao_idioma] GROUP BY gr.cod_relacao_idioma");
			}

			elseif (($parametros['cod_marca'] != "") && ($parametros['cod_marca'] != 0) )
			{
				$con = Doctrine_Manager::getInstance()->connection();
				$sth = $con->execute("SELECT gr.*, mg.txt_nomeMarca, mg.cod_id as cod_id_marca, wi.txt_idioma, ht.txt_razaoSocial, ht.cod_id as cod_id_hotel
									FROM  ".$this->table_alias.", marcaGJP mg, websiteIdiomas wi, hoteis ht 
									WHERE wi.cod_id = gr.cod_idioma AND gr.cod_marca = mg.cod_relacao_idioma AND gr.cod_relacao_idioma = $parametros[cod_relacao_idioma] 
									GROUP BY gr.cod_relacao_idioma");
			}

			elseif (($parametros['cod_hotel'] != "" ) && ($parametros['cod_hotel']!= 0) )
			{
				$con = Doctrine_Manager::getInstance()->connection();
				$sth = $con->execute("SELECT gr.*, mg.txt_nomeMarca, mg.cod_id as cod_id_marca, wi.txt_idioma, ht.txt_razaoSocial, ht.cod_id as cod_id_hotel
									FROM  ".$this->table_alias.", marcaGJP mg, websiteIdiomas wi, hoteis ht 
									WHERE wi.cod_id = gr.cod_idioma AND gr.cod_hotel = ht.cod_relacao_idioma  AND gr.cod_relacao_idioma = $parametros[cod_relacao_idioma]
									GROUP BY gr.cod_relacao_idioma");		
			}

			else
			{
				$con = Doctrine_Manager::getInstance()->connection();
				$sth = $con->execute("SELECT gr.*, mg.txt_nomeMarca, mg.cod_id as cod_id_marca, wi.txt_idioma, ht.txt_razaoSocial, ht.cod_id as cod_id_hotel
									FROM  ".$this->table_alias.", marcaGJP mg, websiteIdiomas wi, hoteis ht 
									WHERE wi.cod_id = gr.cod_idioma AND gr.cod_relacao_idioma = $parametros[cod_relacao_idioma] GROUP BY gr.cod_relacao_idioma");
			}
			$resultado = $sth->fetchAll();
			return $resultado;

		}

		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function selectReconhecimentosID($valores, $parametros)
	{
		$id_relacao	 = $parametros['id_relacao_idioma'];

		try
		{
			if (($valores['cod_marca'] != "") && ($valores['cod_marca'] != 0) && ($valores['cod_hotel'] != "" ) &&($valores['cod_hotel']!= 0))
			{

				$con = Doctrine_Manager::getInstance()->connection();
				$sth = $con->execute("SELECT gr.*, mg.txt_nomeMarca, mg.cod_id as cod_id_marca, wi.txt_idioma, ht.txt_razaoSocial, ht.cod_id as cod_id_hotel
							FROM  ".$this->table_alias.", marcaGJP mg, websiteIdiomas wi, hoteis ht 
							WHERE wi.cod_id = gr.cod_idioma AND gr.cod_marca = mg.cod_relacao_idioma AND gr.cod_hotel = ht.cod_relacao_idioma 
							AND gr.cod_hotel = ht.cod_relacao_idioma AND gr.cod_relacao_idioma = $id_relacao GROUP BY gr.cod_id");
			}

			elseif (($valores['cod_marca'] != "") && ($valores['cod_marca'] != 0) )
			{
				$con = Doctrine_Manager::getInstance()->connection();
				$sth = $con->execute("SELECT gr.*, mg.txt_nomeMarca, mg.cod_id as cod_id_marca, wi.txt_idioma, ht.txt_razaoSocial, ht.cod_id as cod_id_hotel
							FROM  ".$this->table_alias.", marcaGJP mg, websiteIdiomas wi, hoteis ht 
							WHERE wi.cod_id = gr.cod_idioma AND gr.cod_marca = mg.cod_relacao_idioma  AND gr.cod_relacao_idioma = $id_relacao GROUP BY gr.cod_id");					
			}

			elseif (($valores['cod_hotel'] != "" ) && ($valores['cod_hotel']!= 0) )
			{
				$con = Doctrine_Manager::getInstance()->connection();
				$sth = $con->execute("SELECT gr.*, mg.txt_nomeMarca, mg.cod_id as cod_id_marca, wi.txt_idioma, ht.txt_razaoSocial, ht.cod_id as cod_id_hotel
							FROM  ".$this->table_alias.", marcaGJP mg, websiteIdiomas wi, hoteis ht 
							WHERE wi.cod_id = gr.cod_idioma  AND gr.cod_hotel = ht.cod_relacao_idioma AND gr.cod_relacao_idioma = $id_relacao GROUP BY gr.cod_id");
					
			}

			else
			{
				$con = Doctrine_Manager::getInstance()->connection();
				$sth = $con->execute("SELECT gr.*, mg.txt_nomeMarca, mg.cod_id as cod_id_marca, wi.txt_idioma, ht.txt_razaoSocial, ht.cod_id as cod_id_hotel
							FROM  ".$this->table_alias.", marcaGJP mg, websiteIdiomas wi, hoteis ht 
							WHERE wi.cod_id = gr.cod_idioma AND gr.cod_relacao_idioma = $id_relacao GROUP BY gr.cod_id");
					
			}
			$resultado = $sth->fetchAll();
			return $resultado;
		}

		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function InserirReconhecimentos($parametros,$i)
	{
		try
		{
			$this->txt_titulo = $parametros['txt_titulo'.$i];
			$this->txt_reconhecimento = $parametros['txt_reconhecimento'.$i];
			$this->cod_relacao_idioma = $parametros['cod_relacao_idioma'];
			$this->cod_idioma = $parametros['cod_idioma'.$i];
			$this->txt_ano = $parametros['txt_ano'];
			$this->cod_marca = $parametros['cod_marca'];
			$this->cod_hotel = $parametros['cod_hotel'];
			$this->save();

			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

			return true;

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function EditaReconhecimentos($parametros, $total)
	{
		try
		{
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

			if($tabela)
			{
				$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

				$tabela->txt_reconhecimento = $parametros['txt_reconhecimento'.$total];
				$tabela->txt_titulo= $parametros['txt_titulo'.$total];
				$tabela->txt_ano = $parametros['txt_ano'];
				$tabela->cod_marca = $parametros['cod_marca'];
				$tabela->cod_hotel = $parametros['cod_hotel'];
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

	public function ExcluirReconhecimentosId($cod_relacao_idioma)
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