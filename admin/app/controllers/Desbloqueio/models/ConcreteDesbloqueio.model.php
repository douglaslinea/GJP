<?
class ConcreteDesbloqueio
{	
	public function Desbloquear($parametros)
	{
		return TableFactory::getInstance('Usuarios')->desbloquearUsuario($parametros['id']);
	}
} 
?>