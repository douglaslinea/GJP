<?php
class LogsLogin extends BaseLogsLogin
{
	private $table_alias = "logsLogin as log";

	public function SalvaLog($id_usuario,$data_hora,$ip_maquina)
	{
		try
		{
			//Recebe os dados
			$this->cod_user = $id_usuario;
			$this->dat_login = $data_hora;
			$this->num_ip = $ip_maquina;

			//Salva o log no banco de dados
			$this->save();
			//Retorna verdadeiro em caso de sucesso
			return true;

		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function ExibirUltimoLogin()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("DATE_FORMAT(log.dat_login, '%d/%m/%Y às %H:%i') as dat_login")
			->from('LogsLogin as log')
			->where('log.cod_user = ?', $_SESSION['UserId'])
			->orderBy('log.cod_int DESC')
			->offset(1)
			->limit(1);
				
			$recordset = $query->execute();

			//Retorna verdadeiro em caso de sucesso
			return $recordset[0]['dat_login'];

		} 
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectUltimosVinteAcessos()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("*, DATE_FORMAT(log.dat_login, '%d/%m/%Y às %H:%i') as dat_login, user.txt_nome, per.txt_perfil")
			->from($this->table_alias)
			->innerJoin("log.Usuarios as user")
			->innerJoin("user.PermissaoPerfis as per")
			->orderBy('log.dat_login DESC')
			->offset(1)
			->limit(20)
			->execute()
			->toArray();

			//Retorna verdadeiro em caso de sucesso
			return $query;

		} 
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}