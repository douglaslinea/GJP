<?php
class Image_handling
{
	public $upload_dir  		;  // The directory for the images to be saved in			// The path to where the image will be saved
	public $image_handling_file ;  // The location of the file that will handle the upload and resizing (RELATIVE PATH ONLY!)
	public $large_image_prefix  ;  // The prefix name to large image
	public $thumb_image_prefix  ;			// The prefix name to the thumb image
	public $large_image_name 	;     // New name of the large image (append the timestamp to the filename)
	public $thumb_image_name 	;     // New name of the thumbnail image (append the timestamp to the filename)
	public $max_file  			; 							// Maximum file size in MB
	public $max_width  			;							// Max width allowed for the large image
	public $thumb_width 		;						// Width of thumbnail image
	public $thumb_height 		;

	//$escala_da_imagem = "100/200"; // Tamanho da imagem salva - em escala

	public $altura_quadrado  	;    // Altura  do cropper
	public $largura_quadrado 	; 	  // Largura do cropper

	public $altura_visualizador ; // Altura do visualizador da imagem cropada
	public $largura_visualizador; // Largura do visualizador da imagem cropada
	public $allowed_image_types;
	public $allowed_image_ext    ;
	public $image_ext            ;
	public $large_image_location ;
	public $thumb_image_location ;
	public $ext_arquivo;  // Irá guardar a extensão para a imagem cropada


	function __construct()
	{
		session_start(); //Do not remove this
		if (!isset($_SESSION['random_key']) || strlen($_SESSION['random_key'])==0)
		{
			$_SESSION['random_key'] = strtotime(date('Y-m-d H:i:s')); //assign the timestamp to the session variable
			$_SESSION['user_file_ext']= "";
		}
	}
	public function setDados($diretorio, $max_file, $max_width, $altura_crop, $largura_crop)
	{
		$this->upload_dir  		   = $diretorio; 				// The directory for the images to be saved in			// The path to where the image will be saved
		//$this->upload_dir  		   = "imagens/";
		//$this->image_handling_file = "image_handling.php"; // The location of the file that will handle the upload and resizing (RELATIVE PATH ONLY!)
		$this->large_image_prefix  = "original_"; 			// The prefix name to large image
		$this->thumb_image_prefix  = "cropado_";			// The prefix name to the thumb image
		$this->large_image_name    = $this->large_image_prefix.$_SESSION['random_key'];     // New name of the large image (append the timestamp to the filename)
		$this->thumb_image_name    = $this->thumb_image_prefix.$_SESSION['random_key'];     // New name of the thumbnail image (append the timestamp to the filename)
		$this->max_file 		   = $max_file; 							// Maximum file size in MB
		$this->max_width           = $max_width;							// Max width allowed for the large image
		//$this->thumb_width 		   = $thumb_width;						// Width of thumbnail image
		//$this->thumb_height 	   = $thumb_height;

		//$escala_da_imagem = "100/200"; // Tamanho da imagem salva - em escala
		$this->altura_quadrado  = $altura_crop;    // Altura  do cropper
		$this->largura_quadrado = $largura_crop; 	  // Largura do cropper

		$this->altura_visualizador  = $altura_crop; // Altura do visualizador da imagem cropada
		$this->largura_visualizador = $largura_crop; // Largura do visualizador da imagem cropada

		$this->allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
		$this->allowed_image_ext = array_unique($this->allowed_image_types); // Do not change this
		$this->image_ext = "";

		$this->large_image_location = $this->upload_dir.$this->large_image_name;
		$this->thumb_image_location = $this->upload_dir.$this->thumb_image_name;

		foreach ($this->allowed_image_ext as $mime_type => $ext)
		{
			$this->image_ext.= strtoupper($ext)." ";
		}

	}

	public function resizeImage($image,$width,$height) {
		$image_data = getimagesize($image);
		$imageType = image_type_to_mime_type($image_data[2]);
		$newImageWidth = ceil(300) ;
		$newImageHeight = ceil(300);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image);
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image);
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image);
				break;
		}
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);

		switch($imageType) {
			case "image/gif":
				imagegif($newImage,$image);
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$image,90);
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$image);
				break;
		}

		chmod($image, 0777);
		return $image;
	}


	//You do not need to alter these functions
	public function resizeThumbnailImageEdit($width, $height, $start_width, $start_height, $novaAltura, $novaLargura, $imagem_original_banco, $imagem_crop_banco)
	{
	
		
		list($imagewidth, $imageheight, $imageType) = getimagesize($imagem_original_banco);
		$imageType = image_type_to_mime_type($imageType);

		$newImageWidth = $novaAltura;
		$newImageHeight = $novaLargura;
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($imagem_original_banco);
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($imagem_original_banco);
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($imagem_original_banco);
				break;
		}
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
		switch($imageType) {
			case "image/gif":
				imagegif($newImage,$imagem_crop_banco);
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$imagem_crop_banco,90);
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$imagem_crop_banco);
				break;
		}
		chmod($imagem_crop_banco, 0777);
		return $imagem_crop_banco;

	}





	public function resizeThumbnailImageInc($thumb_image_name, $image, $width, $height, $start_width, $start_height, $novaAltura, $novaLargura)
	{
		
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$imageType = image_type_to_mime_type($imageType);

		$newImageWidth = $novaAltura;
		$newImageHeight =$novaLargura;
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image);
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image);
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image);
				break;
		}

		/*	echo "<script>alert('source".$source."')</script>";
		 exit();*/
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);

		switch($imageType) {
			case "image/gif":
				imagegif($newImage,$thumb_image_name);
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$thumb_image_name,90);
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$thumb_image_name);
				break;
		}
		chmod($thumb_image_name, 0777);
		return $thumb_image_name;


	}



	//You do not need to alter these functions
	public function getHeight($image) {
		$size = getimagesize($image);
		$height = $size[1];
		return $height;
	}


	//You do not need to alter these functions
	public function getWidth($image) {
		$size = getimagesize($image);
		$width = $size[0];
		return $width;
	}


	public function fazTudo($altura_crop, $largura_crop, $diretorioo, $tamanho_maximo, $largura_maxima)
	{

		$this->setDados($diretorioo, $tamanho_maximo, $largura_maxima, $altura_crop, $largura_crop);


		if($_POST['deletar'] == "Deletar"){

			$nome_imagem_original = $_POST['nome_imagem_original'];
			$nome_imagem_cropada  = $_POST['nome_imagem_cropada'];

			$endereco_total_delete_original = $this->upload_dir.$nome_imagem_original;
			$endereco_total_delete_cropada = $this->upload_dir.$nome_imagem_cropada;

			//Essa estrutura é responsável por deletar a imagem original do FTP
			if(unlink($endereco_total_delete_original)){
				$mensagem_original =  "A imagem original foi excluida com sucesso";
			}
			else{
				$mensagem_original = "A imagem original não foi excluida com sucesso";
			}

			//Essa estrutura é responsável por deletar a imagem cropada do FTP
			if(unlink($endereco_total_delete_cropada)){
				$mensagem_cropada =  "A imagem cropada foi excluida com sucesso";
			}
			else{
				$mensagem_cropada = "A imagem cropada não foi excluida com sucesso";
			}

			echo $mensagem_original."|".$mensagem_cropada;


			//echo $endereco_total_delete_original."|".$endereco_total_delete_cropada;



		}


		if ($_POST["upload"]=="Upload")
		{

			$flag = false;
			//Get the file information
			$userfile_name = $_FILES['image']['name'];
			$userfile_tmp = $_FILES['image']['tmp_name'];
			$userfile_size = $_FILES['image']['size'];
			$userfile_type = $_FILES['image']['type'];
			$filename = basename($_FILES['image']['name']);
			$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));

			$this->ext_arquivo = $userfile_type;


			//Only process if the file is a JPG and below the allowed limit
			if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0))
			{
				foreach ($this->allowed_image_types as $mime_type => $ext)
				{
					//loop through the specified image types and if they match the extension then break out
					//everything is ok so go and check file size
					if($file_ext==$ext && $userfile_type==$mime_type)
					{
						$error = "";
						break;
					}else{
						$error = "Apenas <strong>".$image_ext."</strong> é aceito para upload<br />";
					}
				}
				//check if the file size is above the allowed limit
				if ($userfile_size > ($this->max_file*1048576))
				{
					$error.= "A imagem deve estar sob ".$this->max_file."MB de tamanho";
				}

			}else{
				$error= "Por favor, selecione uma imagem para upload";
			}
			//Tudo esta ok então faz o upload da imagem.
			if (strlen($error)==0)
			{
				if (isset($_FILES['image']['name']))
				{
					//this file could now has an unknown file extension (we hope it's one of the ones set above!)



					$this->large_image_location = $this->large_image_location.".".$file_ext;
					$this->thumb_image_location = $this->thumb_image_location.".".$file_ext;









					//put the file ext in the session so we know what file to look for once its uploaded
					if($_SESSION['user_file_ext']!=$file_ext)
					{
						$_SESSION['user_file_ext']="";
						$_SESSION['user_file_ext']=".".$file_ext;
					}


					/*echo "<script>alert('".$this->large_image_location."')</script>";
					 exit();*/


					move_uploaded_file($userfile_tmp, $this->large_image_location);

					chmod($this->large_image_location, 0777);


					$width = $this->getWidth($this->large_image_location);
					$height = $this->getHeight($this->large_image_location);

					//Scale the image if it is greater than the width set above
					if ($width > $this->max_width)
					{
						$scale = $this->max_width/$width;
						$uploaded = $this->resizeImage($this->large_image_location,$width,$height);
					}else{
						$scale = 1;
						$uploaded = $this->resizeImage($this->large_image_location,$width,$height);
					}
					//Delete the thumbnail file so the user can create a new one
					if (file_exists($this->thumb_image_location))
					{
						unlink($this->thumb_image_location);
					}


					if($flag == false){
						$nome_imagem_campo = $this->large_image_name.".".$file_ext;

					}

					echo "success|".$this->large_image_location."|".$this->getWidth($this->large_image_location)."|".$this->getHeight($this->large_image_location)."|".$nome_imagem_campo;
				}
			}else{
				echo "error|".$error;
			}

		}


		//inicia o salvamento da imagem editada croapada

		if ($_POST["save_thumb_edt"]=="Save Thumbnail" ) {


			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$x2 = $_POST["x2"];
			$y2 = $_POST["y2"];
			$w = $_POST["w"];
			$h = $_POST["h"];
			$nome = $_POST['img_name'];
			$diretorio_original = $this->upload_dir;

			$imagem_original_banco = $_POST['imagem_original_banco'];
			$imagem_cropada_banco  = $_POST['imagem_cropada_banco'];

			$original_explodida = explode("_", $imagem_original_banco);
			$numero_random = $original_explodida[1];
             
			$cropado_final = "cropado_".$numero_random;
            
			$alturaCropada = $_POST['altura_cropada'];
			$larguraCropada = $_POST['largura_cropada'];
            
			$cropped = $this->resizeThumbnailImageEdit($w, $h ,$x1 ,$y1, $alturaCropada, $larguraCropada, $diretorio_original.$imagem_original_banco, $diretorio_original.$cropado_final);
            
			echo "success|".$diretorio_original.$imagem_original_banco."|".$diretorio_original.$cropado_final."|".$cropado_final;
			$_SESSION['random_key']= "";
			$_SESSION['user_file_ext']= "";


		}




		if ($_POST["save_thumb_inc"]=="Save Thumbnail" ){

			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$x2 = $_POST["x2"];
			$y2 = $_POST["y2"];
			$w = $_POST["w"];
			$h = $_POST["h"];

			//Scale the image to the thumb_width set above
			$this->large_image_location = $this->large_image_location.$_SESSION['user_file_ext'];
			$this->thumb_image_location = $this->thumb_image_location.$_SESSION['user_file_ext'];

			
			$alturaCropada = $_POST['altura_cropada'];
			$larguraCropada = $_POST['largura_cropada'];
			
			$parametro1 = $this->thumb_image_location;
			$parametro2 = $this->large_image_location;
	
			$croped = $this->resizeThumbnailImageInc($parametro1, $parametro2,$w,$h,$x1,$y1,$alturaCropada, $larguraCropada);

			$this->ext_arquivo = $_SESSION['user_file_ext'];
			echo "success|".$this->large_image_location."|".$this->thumb_image_location."|".$this->thumb_image_name.$this->ext_arquivo;
			$_SESSION['random_key']= "";
			$_SESSION['user_file_ext']= "";



		}
			



		//Método que deleta a imagem

		if ($_POST['a']=="delete" && strlen($_POST['large_image'])>0 && strlen($_POST['thumbnail_image'])>0){
			//get the file locations
			$this->large_image_location = $_POST['large_image'];
			$this->thumb_image_location = $_POST['thumbnail_image'];
			if (file_exists($this->large_image_location))
			{
				unlink($this->large_image_location);
			}
			if (file_exists($this->thumb_image_location))
			{
				unlink($this->thumb_image_location);
			}
			echo "sucesso|A imagem foi deletada com sucesso";
		}

	}


}
?>
