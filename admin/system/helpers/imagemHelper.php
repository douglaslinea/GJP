<?php
LibFactory::getInstance(null,null,'imagem/class.imagem.php');

class imagemHelper extends Image_handling
{
	public function setSetDados($diretorio, $max_file, $max_width)
	{
		$this->setDados($diretorio, $max_file, $max_width);
	}
	
	public function setResizeImage($image,$width,$height,$scale)
	{
		$this->resizeImage($image, $width, $height, $scale);
	}
	
	public function setResizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale)
	{
		$this->resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale);
	}
	
	public function setGetHeight($image)
	{
		$this->getHeight($image);
	}
	
	public function setGetWidth($image)
	{
		$this->getWidth($image);
	}
	
	public function setFazTudo($altura_crop, $largura_crop, $diretorio, $tamanho_maximo, $largura_maxima)
	{
		$this->fazTudo($altura_crop, $largura_crop, $diretorio, $tamanho_maximo, $largura_maxima);
	}
}
?>