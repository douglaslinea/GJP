<?php

/**
 * Cadastro
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Cadastro extends BaseCadastro
{

	private $table_alias = "cadastro cad";

	public function ExecuteCadastrar($parametros)
	{
		try {

			$this->setValues($this, $parametros, INSERT);
			$this->save();
			return true;

		} catch (Doctrine_Exception $e) {
			echo $e->getMessage();
		}


	}

	public function incluirCadastro()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('cad.dat_cadastro, cad.txt_nome, cad.txt_email, cad.txt_telefone, cad.txt_comentario')
			->from($this->table_alias)
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectCadastro()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y') dat_cadastro, cad.txt_nome, cad.txt_telefone, cad.txt_email, cad.txt_comentario")
			->from($this->table_alias)
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectCadastrofiltro($de, $ate)
	{
		try
		{
			$de = implode("-",array_reverse(explode("/",$de)));
			$ate = implode("-",array_reverse(explode("/",$ate)));

			$query = Doctrine_Query::create()
			->select("DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y') dat_cadastro, cad.txt_nome, cad.txt_telefone, cad.txt_comentario")
			->from($this->table_alias)
			->where("cad.dat_cadastro >= ?",$de)
			->andWhere("cad.dat_cadastro<= ?",$ate)
			->andWhere("cad.dat_cadastro <= ?",$ate)
			->orderBy("cad.dat_cadastro DESC")
			->execute()
			->toArray();


			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectCadastroExportar()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("cad.cod_id, DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y') dat_cadastro, cad.txt_nome, IF(cad.cha_sexo = 1, 'Masculino','Feminino') sexo, cad.txt_profissao, DATE_FORMAT(cad.dat_nascimento, '%d/%m/%Y') dat_nascimento, cad.txt_endereco, cad.txt_bairro, cad.txt_cep, ccidade.txt_cidade, cuf.txt_uf, cad.txt_telefone, cad.txt_email, cad.txt_comentario, IF(cad.chk_newsletter = 1 , 'N�o','Sim') news")
			->from($this->table_alias)
			->innerJoin('cad.CepUf cuf')
			->innerJoin('cad.CepCidades ccidade')
			->execute()
			->toArray();

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectFaleconoscofiltro($de, $ate)
	{
		try
		{
			$de = implode("-",array_reverse(explode("/",$de)));
			$ate = implode("-",array_reverse(explode("/",$ate)));
				
			$query = Doctrine_Query::create()
			->select("cad.cod_id, DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y') dat_cadastro, cad.txt_nome, IF(cad.cha_sexo = 1, 'Masculino','Feminino') sexo, cad.txt_profissao, DATE_FORMAT(cad.dat_nascimento, '%d/%m/%Y') dat_nascimento, cad.txt_endereco, cad.txt_bairro, cad.txt_cep, ccidade.txt_cidade, cuf.txt_uf, cad.txt_telefone, cad.txt_email, cad.txt_comentario, IF(cad.chk_newsletter = 1 , 'N�o','Sim') news")
			->from($this->table_alias)
			->innerJoin('cad.CepUf cuf')
			->innerJoin('cad.CepCidades ccidade')
			->where("cad.dat_cadastro >= ?",$de)
			->andWhere("cad.dat_cadastro <= ?",$ate)
			->andWhere("cad.dat_cadastro <= ?",$ate)
			->orderBy("cad.dat_cadastro DESC")
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