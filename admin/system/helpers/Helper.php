<?php
/** Helper Principal, armazena as principais funcoµes auxiliares do sistema
 * @author Linea Comunicação com Design - http://www.lineacom.com.br
 */
class Helper {

	/**
	 * Trata Campo Vindo de uma RequisiÃ§Ã£o POST - Levando em conta os parÃ¢metros informados
	 * @param String $campo
	 * @param Boolean $slashes
	 * @param Boolean $trim
	 * @param Array $replace -> posicao 0 deverÃ¡ conter o que deve ser procurado na string -> posicao 1 o que deverÃ¡ ser substituido
	 * Exemplo -> str_replace(array(";"),array(","),variavel); onde variavel significa qual variavel receberÃ¡ a substituiÃ§Ã£o
	 * portanto o parÃ¢metro replace deverÃ¡ ser um array com duas posiÃ§Ãµes e ambas posiÃ§Ãµes devem ser arrays conforme exemplo.
	 * @return String
	 */
	public function TrataValor($campo,$slashes=null,$trim=null,$replace=null,$decode=null)
	{
		//Verifica se campo é um Array
		if(is_array($campo))
		{
			//Percorre o Array de campos
			foreach($campo as $chave => $valor)
			{
				//Trata os valores
				$campo[$chave] = ($slashes == true ? addslashes($campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($trim == true ? trim($campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($replace != null && is_array($replace) ? str_replace($replace[0],$replace[1],$campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($decode == true ? utf8_decode($campo[$chave]) : $campo[$chave]);
			}
			//Se cair aqui então foi passado um único campo
		}
		else
		{
			//Trata o campo
			$campo = ($slashes == true ? addslashes($campo) : $campo);
			$campo = ($trim == true ? trim($campo) : $campo);
			$campo = ($replace != null && is_array($replace) ? str_replace($replace[0],$replace[1],$campo) : $campo);
			$campo = ($utf8_decode == true ? utf8_decode($campo) : $campo);
		}

		//Retorna o parâmetro tratado
		return $campo;
	}

	/**
	 * Tratamento Contra SQL Injection
	 * @param multitype $var
	 * @param String $q
	 * @return string|multitype:
	 */
	public function antiInjection ($var,$q='') {
		//Verifica se o parâmetro é um array
		if (!is_array($var)) {
			//identifico o tipo da variável e trato a string
			switch (gettype($var)) {
				case 'double':
				case 'integer':
					$return = $var;
					break;
				case 'string':
					/*Verifico quantas vírgulas tem na string.
					 Se for mais de uma trato como string normal,
					 caso contrário trato como String Numérica*/
					$temp = (substr_count($var,',')==1) ? str_replace(',','*;*',$var) : $var;
					//aqui eu verifico se existe valor para não adicionar aspas desnecessariamente
					if (!empty($temp)) {
						if (is_numeric(str_replace('*;*','.',$temp))) {
							$temp = str_replace('*;*','.',$temp);
							$return = strstr($temp,'.') ? floatval($temp) : intval($temp);
						} elseif (get_magic_quotes_gpc()) {
							//aqui eu verifico o parametro q para o caso de ser necessário utilizar LIKE com %
							$return = (empty($q)) ? '\''.str_replace('*;*',',',$temp).'\'' : '\'%'.str_replace('*;*',',',$temp).'%\'';
						} else {
							//aqui eu verifico o parametro q para o caso de ser necessário utilizar LIKE com %
							$return = (empty($q)) ? '\''.addslashes(str_replace('*;*',',',$temp)).'\'' : '\'%'.addslashes(str_replace('*;*',',',$temp)).'%\'';
						}
					} else {
						$return = $temp;
					}
					break;
				default:
					/*Abaixo eu coloquei uma msg de erro para poder tratar
					 antes de realizar a query caso seja enviado um valor
					 que nao condiz com nenhum dos tipos tratatos desta
					 função. Porém você pode usar o retorno como preferir*/
					$return = 'Erro: O Tipo da Variável é Inválido!';
			}
			//Retorna o valor tipado
			return $return;
		} else {
			//Retorna os valores tipados de um array
			return array_map('antiInjection',$var);
		}
	}

	/**
	 * Valida uma acao vinda de um campo hidden(via POST)
	 * @param String $action
	 * @return boolean
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function VerifyAction($action_name,$action_value)
	{
		if(strcmp($_POST[$action_name],$action_value) == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Retorna o permalink da URL
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function createPermalink($value,$id,$Remove_special_characters=true)
	{
		//Remove espaços em branco e coloca hifen
		$value = preg_replace('/\s/', '-', $value);
			
		//Valida o permalink
		$value = preg_replace('([^a-zA-Z0-9]+$)', '', $value);
			
		//Verifica se deve remover caracteres especiais
		if($Remove_special_characters)
		{
			//Remove os caracteres especiais
			$value = $this->RemoverAcentos($value);
		}
		//Retorna o permalink
		return trim($id."-".$value);
	}

	/**
	 * Retorna o permalink da URL
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	/*public function getPermalink()
	 {
		//Divide a URL
		$requested_permalink = explode('/', substr($_SERVER['REQUEST_URI'],URL_OFFSET),3);

		//Pega o permalink
		$requested_permalink = $requested_permalink[2];

		//Verifica a posição final da String
		$pos_final = strpos($requested_permalink,'/');
		$pos_final = ($pos_final != false ? $pos_final : strlen($requested_permalink));

		//Permalink
		$permalink = explode('-', substr($requested_permalink,0,$pos_final),2);

		//Retorna o id encontrado no permalink
		return (strlen(trim($permalink[0])) > 0 ? $permalink[0] : false);
		}*/

	public function getPermalink($full_permalink=false)
	{
		//Divide a URL
		$requested_permalink = explode('/', substr($_SERVER['REQUEST_URI'],URL_OFFSET),3);

		//Pega o permalink
		$requested_permalink = $requested_permalink[2];

		//Verifica a posição final da String
		$pos_final = strpos($requested_permalink,'/');
		$pos_final = ($pos_final != false ? $pos_final : strlen($requested_permalink));

		/*Verifica se é necessário pegar o Permalink inteiro ex: produtos/categoria/editar
		 ou somente o id
		 ex: produtos/categoria/1-categoria_teste
		 */
		if($full_permalink)
		{
			//Recebe o permalink
			$permalink = substr($requested_permalink,0,$pos_final);

			//Valida o permalink
			if($permalink !== false){

				//Retorna o permalink
				return $permalink;

			}else{

				//Invoca o erro 404
				$this->show404Error();
			}

			//Retorna todo o permalink
			return ($permalink !== false ? $permalink : false);

		}
		else
		{
			//Permalink
			$permalink = explode('-', substr($requested_permalink,0,$pos_final),2);

			//Valida o permalink
			if(strlen(trim($permalink[0])) > 0){

				//Retorna o id encontrado no permalink
				return $permalink[0];

			}else{

				//Invoca o erro 404
				$this->show404Error();
			}
		}
	}

	/**
	 * Remove os Acentos de uma String e converte para a realidade HTML
	 * @param String $str
	 * @return String
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function TirarAcentos($str){

		$acentos = array(
        'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
        'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
        'C' => '/&Ccedil;/',
        'c' => '/&ccedil;/',
        'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
        'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
        'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
        'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
        'N' => '/&Ntilde;/',
        'n' => '/&ntilde;/',
        'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
        'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
        'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
        'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
        'Y' => '/&Yacute;/',
        'y' => '/&yacute;|&yuml;/',
        'a.' => '/&ordf;/',
        'o.' => '/&ordm;/');    

		return preg_replace($acentos,array_keys($acentos),htmlentities($str,ENT_NOQUOTES,"UTF-8"));
	}

	/**
	 * Remove os Acentos de uma String
	 * @param String $str
	 * @return String
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function RemoverAcentos($var){

		$var = ereg_replace("[ÁÀÂÃ]","A",$var);
		$var = ereg_replace("[áàâãª]","a",$var);
		$var = ereg_replace("[ÉÈÊ]","E",$var);
		$var = ereg_replace("[éèê]","e",$var);
		$var = ereg_replace("[ÓÒÔÕ]","O",$var);
		$var = ereg_replace("[óòôõº]","o",$var);
		$var = ereg_replace("[ÚÙÛ]","U",$var);
		$var = ereg_replace("[úùû]","u",$var);
		$var = str_replace("Ç","C",$var);
		$var = str_replace("ç","c",$var);

		return $var;
	}

	/**
	 * Gera uma Senha com base em uma forca
	 * @param int $tamanho
	 * @param int $forca
	 * @return string
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function gerarSenha($tamanho=9, $forca=0)
	{
		$vogais = 'aeuy';

		$consoantes = 'bdghjmnpqrstvz';

		if ($forca >= 1)
		{
			$consoantes .= 'BDGHJLMNPQRSTVWXZ';
		}

		if ($forca >= 2)
		{
			$vogais .= "AEUY";
		}

		if ($forca >= 4)
		{
			$consoantes .= '23456789';
		}

		if ($forca >= 8 )
		{
			$vogais .= '@#$%';
		}

		$senha = '';
		$alt = time() % 2;

		for ($i = 0; $i < $tamanho; $i++)
		{
			if ($alt == 1)
			{
				$senha .= $consoantes[(rand() % strlen($consoantes))];
				$alt = 0;
			}
			else
			{
				$senha .= $vogais[(rand() % strlen($vogais))];
				$alt = 1;
			}
		}
		return $senha;
	}

	/**
	 * Retorna a data formatada de acordo com o tipo informado
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 * @return string
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function FormataData($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = implode("-",array_reverse(explode("/",$data)));
		}
		else if($tipo == "br")
		{
			$data = implode("/",array_reverse(explode("-",$data)));
		}
		else
		{
			throw new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}
		return $data;
	}

	/**
	 * Retorna a data formatada de acordo com o tipo informado
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 * @return string
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function FormataDataHora($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);
		//Remove os espacos em branco da data
		$data_hora = trim($data);
		//Extrai a data
		$data = substr($data, 0,10);
		//Extrai a hora
		$hora = substr($data_hora,10);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = implode("-",array_reverse(explode("/",$data)));
		}
		else if($tipo == "br")
		{
			$data = implode("/",array_reverse(explode("-",$data)));
		}
		else
		{
			throw  new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}
		return $data." ".$hora;
	}


	/**
	 * Verifica se uma Data e valida de acordo com o formato especificado
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 * @return boolean
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function ChecarData($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = explode("-",$data);
			$month = $data[1];
			$day = $data[2];
			$year = $data[0];
		}
		else if($tipo == "br")
		{
			$data = explode("/",$data);
			$month = $data[1];
			$day = $data[0];
			$year = $data[2];
		}
		else
		{
			throw  new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}

		//Verificamos se a data e valida
		if(@checkdate($month, $day, $year))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 *  Verifica se um horário é válido
	 *  @param String $horario
	 *  @return boolean
	 *  @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function ChecarHora($horario)
	{
		//Verifica se o horário é válido
		if(strtotime($horario))
		{
			//Retorna true em caso de sucesso
			return true;

		}
		else
		{
			//Retorna false em caso de erro
			return false;
		}
	}

	/**
	 *  Verifica se um datetime é válido
	 *  @param String $horario
	 *  @return boolean
	 *  @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function ChecarDataHora($timestamp)
	{
		//Remove os espacos em branco da data
		$datahora = trim($timestamp);
		//Extrai a data
		$data = substr($datahora, 0,10);
		//Extrai a hora
		$hora = substr($datahora,10);

		//Valida o timestamp
		if($this->ChecarData($data, 'br') && $this->ChecarHora($hora))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Formata o cep vindo do banco por exemplo
	 * @param int $cep
	 * @return string
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function FormataCEP($cep)
	{
		$cep = preg_replace('/\D/', "", $cep);
		if (strlen($cep) == 8)
		{
			return $cep[0].$cep[1].$cep[2].$cep[3].$cep[4].'-'.$cep[5].$cep[6].$cep[7];
		}
	}

	/**
	 * Coloca um numero no formato R$ 0,00
	 * @param Double/Float $valor
	 * @return Float
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function formatoMoeda($valor)
	{
		//Procuramos se o valor monetÃ¡rio tem casa de milhar
		if(strstr($valor,"."))
		{
			$ponto_milhar = "";
		}
		else
		{
			$ponto_milhar = ".";
		}

		$retorno = "R$ ".number_format($valor,"2",",",$ponto_milhar);
		return $retorno;
	}

	/**
	 * Verifica se uma requisicao foi Realizada via AJAX
	 * @return boolean
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function isAjax()
	{
		if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest")
		{
			return true;
		}
	}

	/**
	 * Retorna uma Instancia da Classe PDO
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function getPDOInstance()
	{
		return new PDO(SGBD.":host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASS );
	}

	/**
	 * Remove tudo que não é número
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function soNumero($parametro)
	{
		//Remove o que não é digito
		$parametro = preg_replace('/\D/', "", $parametro);

		//Retorna o resultado
		return $parametro;
	}

	/**
	 * Formato um numero para ser gravado no banco de dados
	 * @param Double/Int/Float $number
	 * @return mixed
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function SqlNumero($number)
	{
		//Verificamos se existe R$ no parametro
		if(strstr($number,"R$") != FALSE)
		{
			$number = trim(str_replace("R$","",$number));
		}
			
		$number = str_replace(".","",$number);
		$number = str_replace(",",".",$number);
		return $number;
	}

	/**
	 * Coloca um numero no formato 0,00
	 * @param Double/Float $number
	 * @return Double/Float
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function Number($number)
	{
		//Verificamos se existe R$ no parametro
		if(strstr($number,"R$") != FALSE)
		{
			$number = trim(str_replace("R$","",$number));
		}
			
		$number = number_format($number,2,",","");
		return $number;
	}

	/**
	 * @param $string: string
	 * @param $fim: int
	 * @return string|unknown
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	function reduzir_string($string, $fim)
	{
		if(strlen($string) > $fim)
		{
			$aux = substr($string, 0,$fim);
			$val = strrpos($aux," "); //busca o ultimo caracter com vazio
			$stringlimitada = substr($string,0,$val).'...';
			return $stringlimitada;
		}
		else
		{
			return $string;
		}
	}

	/**
	 * Retorna uma mascara de acordo com o parâmetro informado
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function mask($val,$mask){

		$maskared = '';
		$k = 0;

		for($i = 0; $i<=strlen($mask)-1; $i++)

		{

		 if($mask[$i] == '#')

		 {

		 	if(isset($val[$k]))
		 	$maskared .= $val[$k++];
		 }
		 else
		 {
		 	if(isset($mask[$i]))

		 	$maskared .= $mask[$i];
		 }
		}
		return $maskared;
	}

	/**
	 * Extrai o valor do atributo SRC do Iframe do google MAPS
	 * @param unknown_type $mapIframe
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	public function getMapSRC($mapIframe)
	{
		//Pos inicial
		$initialpos = strpos($mapIframe,'src="')+5;

		//Extrai o src
		$mapIframe = substr($mapIframe,$initialpos);

		//pos final
		$finalpos =   strpos($mapIframe,'">');

		//Extrai o src
		$mapIframe = substr($mapIframe,0,$finalpos);

		//Retorna o SRC
		return htmlentities($mapIframe);
	}

	function mesPorExtenso($month)
	{
		switch ($month)
		{
			case "January":		$mes = 'Janeiro';     break;
			case "February":	$mes = 'Fevereiro';   break;
			case "March":		$mes = 'Março';       break;
			case "April":		$mes = 'Abril';       break;
			case "May":			$mes = 'Maio';        break;
			case "June":		$mes = 'Junho';       break;
			case "July":		$mes = 'Julho';       break;
			case "August":		$mes = 'Agosto';      break;
			case "September":	$mes = 'Setembro';    break;
			case "October":		$mes = 'Outubro';     break;
			case "November":	$mes = 'Novembro';    break;
			case "December":	$mes = 'Dezembro';    break;
		}
		return $mes;
	}

	function mesPorNumero($month)
	{
		switch ($month)
		{
			case "1":	$mes = 'Janeiro';     break;
			case "2":	$mes = 'Fevereiro';   break;
			case "3":	$mes = 'Março';       break;
			case "4":	$mes = 'Abril';       break;
			case "5":	$mes = 'Maio';        break;
			case "6":	$mes = 'Junho';       break;
			case "7":	$mes = 'Julho';       break;
			case "8":	$mes = 'Agosto';      break;
			case "9":	$mes = 'Setembro';    break;
			case "10":	$mes = 'Outubro';     break;
			case "11":	$mes = 'Novembro';    break;
			case "12":	$mes = 'Dezembro';    break;
		}
		return $mes;
	}

	function exportaCsv($resultado, $campos)
	{

		//MONTA CABEÇALHO DO PHP COM OS CAMPOS
		$data.= join(';', $campos)."\n";

		//POPULA
		foreach($resultado as $result)
		{
			$data.= join(';', $result)."\n";
		}

		//CABEÇALHOS
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=Registros.csv");
		header("Pragma: no-cache");
		header("Expires: 0");

		//OUPUT HEADERS
		echo $data;
	}


	function escape_csv_value($value)
	{
		echo $value;
		exit();
		$value = str_replace('"', '""', $value); // First off escape all " and make them ""
		if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value)) { // Check if I have any commas or new lines
			return '"'.$value.'"'; // If I have new lines or commas escape them
		} else {
			return $value; // If no new lines or commas just return the value
		}
	}
}
?>