<?
class ConcreteLogado
{	
	public function SelectWebsiteStatus()
	{
		return TableFactory::getInstance('WebsiteStats')->SelecionaTudo();
	}
} 
?>