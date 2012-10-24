<?php
/**
 * Model de Exemplo do Controller Index
 * O objetivo desta classe � conectar O Controller com o seu Modelo de Abstra��o
 * Que por sua vez conectar� o Controller com a base de dados (Vide Classe Database)
 * @author Arilson Gon�alves da Rosa
 *
 */
class IndexModel
{
	/**
	 * Retorna os banners
	 */
	public function getBanners()
	{
		return TableFactory::getInstance('Banners')->getBanners();
		
	}	
	
	/**
	 * Retorna os textos da index
	 */
	public function getTextos()
	{
		return TableFactory::getInstance('Textos')->getTexto(array('3','4'));
	}
	
	/**
	 * Retorna as vagas mais recentes
	 */
	public function getVagas()
	{
		return TableFactory::getInstance('Vagas')->getVagas(null,null,'5','v.dat_inicio_publicacao DESC');
	}
	
	/**
	 * Desbloqueia o usu�rio
	 * @param unknown_type $parametros
	 */
	public function desbloquear($parametros)
	{
		 //Efetua o desbloqueio do Usu�rio
		 return $this->desbloquearUsuario($parametros->id);
	}
}
?>