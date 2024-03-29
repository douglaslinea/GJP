<?php

/**
 * CepRuas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CepRuas extends BaseCepRuas
{
	private $table_alias = "cepRuas cr";
	
	public function SelectCep($campo_cep)
	{
		try
		{
			$query = Doctrine_Query::create()
					->select("cepU.cha_sigla, cepU.txt_uf, cepC.txt_cidade, cr.cod_cep, cr.txt_rua, cepB.txt_bairro")
					->from($this->table_alias)
					->leftJoin('cr.CepBairros as cepB')
					->leftJoin('cepB.CepCidades as cepC')
					->leftJoin('cepC.CepUf as cepU')
					->where('cr.cod_cep = ?', $campo_cep);
                    
			//Verifica se houve resultado
			if($query->count() > 0){
				
				return $query->execute();
				
			}else{
			
				return false;
			}
					
		} catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}