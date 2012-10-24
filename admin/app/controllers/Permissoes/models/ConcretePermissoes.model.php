<?php
class ConcretePermissoes
{
	public function SelectControlerAcao()
	{
		//Instanciando a tabela PermissaoGeral e seleciona os controllers e aчѕes
		return TableFactory::getInstance('PermissaoGeral')->SelectControlerAcao();
	}
	
	public function CadastraControlerAcao($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instanciamos o componente de validaчуo
		$ComponenteValidacao = getComponent('validacoes/permissoes.validacao','ValidacaoPermissao');
		
		//Executamos a validaчуo dos dados
		$resultado_validacao = $ComponenteValidacao->Validar($parametros);
		
		//Verifica o resultado da validacao
		if(count($resultado_validacao) == 0)
		{
			//Instanciando a tabela PermissaoPerfis e inclui
			$id_permissao = TableFactory::getInstance('PermissaoPerfis')->IncluirPermissaoPerfil($parametros);
			
			foreach($parametros['controller_acao'] as $ca)
			{
				TableFactory::getInstance('PermissaoVinculo')->IncluirPermissaoVinculo($ca, $id_permissao);
			}
			echo Zend_Json::encode(array("1"));	
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}
	
	public function SelectPermissaoPerfil()
	{
		return TableFactory::getInstance('PermissaoPerfis')->SelectPermissaoPerfil();
	}
	
	public function SelectPermissaoVinculoId($parametros)
	{
		return TableFactory::getInstance('PermissaoVinculo')->SelectPermissaoVinculoId($parametros['cod_perfil']);
	}
	
	public function EditarControlerAcao($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instanciamos o componente de validaчуo
		$ComponenteValidacao = getComponent('validacoes/permissoes.validacao','ValidacaoPermissao');
		
		//Executamos a validaчуo dos dados
		$resultado_validacao = $ComponenteValidacao->Validar($parametros);
		
		//Verifica o resultado da validacao
		if(count($resultado_validacao) == 0)
		{
			//apaga os valores da quele cod_perfil
			TableFactory::getInstance('PermissaoVinculo')->DeleteControlerAcao($parametros['cod_tipo']);
			
			//insere os valores checados no banco
			foreach($parametros['controller_acao'] as $controler_acao)
			{
				TableFactory::getInstance('PermissaoVinculo')->EditarControlerAcao($controler_acao, $parametros['cod_tipo']);
			}
			
			echo Zend_Json::encode(array("1"));	
		}
		else
		{
			echo Zend_Json::encode($resultado_validacao);
		}
	}
}
?>