<?php
/**
 * Plugin para a Gera��o de Captcha
 * @author Arilson Gon�alves da Rosa
 * Desenvolvedor Web/Mobile
 *
 */
class captchaHelper
{
	//Captcha.png - bellerose.ttf
	public function CreateCaptcha($imageFile, $fontname, $totalCaracter, $tamanhoFonte, $angulo)
	{
		// Inicializa os dados da session
		session_start();
			 
		// Definir o header como image/png para indicar que esta p�gina cont�m dados
		// do tipo image->PNG
		header("Content-type: image/png");

		// Criar um novo recurso de imagem a partir de um arquivo
		$imagemCaptcha = imagecreatefrompng($imageFile)
		or die("N�o foi poss�vel inicializar uma nova imagem");
		
		$alfabeto = "ABCDEFGHJKLMNPQRSTUVXYWZ23456789";
		for ($i = 0; $i < $totalCaracter; $i++)
		{
			$letras_aleatorias .= $alfabeto[(rand() % strlen($alfabeto))];
		}
		
		// Criar o texto para o captcha
		$textoCaptcha = substr($letras_aleatorias,-$totalCaracter,$totalCaracter);		

		// Guardar o texto numa vari�vel session
		$_SESSION['captcha'] = $textoCaptcha;

		// Indicar a cor para o texto
		$corCaptcha = imagecolorallocate($imagemCaptcha,0,0,0);
		
		//Coloca o texto na imagem (imagem, tamanho, angulo, x, y, cor, fonte, texto)
		imagettftext($imagemCaptcha, $tamanhoFonte, $angulo, 50, 35, $corCaptcha, $fontname,$textoCaptcha);
		
		// Mostrar a imagem captha no formato PNG.
		// Outros formatos podem ser usados com imagejpeg, imagegif, imagewbmp, etc.
		imagepng($imagemCaptcha);
			 
		// Liberar mem�ria
		imagedestroy($imagemCaptcha);
	}
}
?>