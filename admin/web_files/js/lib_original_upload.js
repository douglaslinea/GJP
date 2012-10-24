
var image_handling_file  = window.parent.image_handling_file;
var url_padrao   = window.parent.url_padrao;
var altura_crop  = window.parent.altura_crop;
var largura_crop = window.parent.largura_crop;
var acao_deletar = window.parent.acao_deletar;
var acao_edicao_incluir = window.parent.acao_edicao_incluir;

//quando faz a seleção da imagem cai aqui
function preview1(img, selection)
{  
	var current_width = $('#uploaded_image1').find('#thumbnail1').width();
	var current_height = $('#uploaded_image1').find('#thumbnail1').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image1').find('#thumbnail_preview1').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x11').val(selection.x1);
	$('#y11').val(selection.y1);
	$('#x21').val(selection.x2);
	$('#y21').val(selection.y2);
	$('#w1').val(selection.width);
	$('#h1').val(selection.height);
} 

//show and hide the loading message
function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader1').show();
		$('#progress1').show().text(msg);
		$('#uploaded_image1').html('');
	}else if(show_hide=="hide"){
		$('#loader1').hide();
		$('#progress1').text('').hide();
	}else{
		$('#loader1').hide();
		$('#progress1').text('').hide();
		$('#uploaded_image1').html('');
	}
}

//exclui a imagem e o crop
function deleteimage1(large_image, thumbnail_image)
{
	
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada1').val('');
			$('#nome_img1').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="sucesso")
			{
				$('#upload_status1').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image1').html('');
			}
			else
			{
				$('#upload_status1').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}

//INICIO DA DECLARAÇÃO DA FUNÇÕES REFERENTES AO SEGUNDO IDIOMA

function preview2(img, selection)
{  
	var current_width = $('#uploaded_image2').find('#thumbnail2').width();
	var current_height = $('#uploaded_image2').find('#thumbnail2').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image2').find('#thumbnail_preview2').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x12').val(selection.x1);
	$('#y12').val(selection.y1);
	$('#x22').val(selection.x2);
	$('#y22').val(selection.y2);
	$('#w2').val(selection.width);
	$('#h2').val(selection.height);
} 

//show and hide the loading message
function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader2').show();
		$('#progress2').show().text(msg);
		$('#uploaded_image2').html('');
	}else if(show_hide=="hide"){
		$('#loader2').hide();
		$('#progress2').text('').hide();
	}else{
		$('#loader2').hide();
		$('#progress2').text('').hide();
		$('#uploaded_image2').html('');
	}
}

//exclui a imagem e o crop
function deleteimage2(large_image, thumbnail_image)
{
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada2').val('');
			$('#nome_img2').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="success")
			{
				$('#upload_status2').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image2').html('');
			}
			else
			{
				$('#upload_status2').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}

//FIM DA DECLARAÇÃO DAS FUNÇÕES REFERENTES AO SEGUNDO IDIOMA


//INICIO DAS DECLARAÇÕES DAS FUNÇÕES REFERENTES AO TERCEIRO IDIOMA
	
function preview3(img, selection)
{  
	var current_width = $('#uploaded_image3').find('#thumbnail3').width();
	var current_height = $('#uploaded_image3').find('#thumbnail3').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image3').find('#thumbnail_preview3').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x13').val(selection.x1);
	$('#y13').val(selection.y1);
	$('#x23').val(selection.x2);
	$('#y23').val(selection.y2);
	$('#w3').val(selection.width);
	$('#h3').val(selection.height);
} 

//show and hide the loading message
function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader3').show();
		$('#progress3').show().text(msg);
		$('#uploaded_image3').html('');
	}else if(show_hide=="hide"){
		$('#loader3').hide();
		$('#progress3').text('').hide();
	}else{
		$('#loader3').hide();
		$('#progress3').text('').hide();
		$('#uploaded_image3').html('');
	}
}

//exclui a imagem e o crop
function deleteimage3(large_image, thumbnail_image)
{
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada3').val('');
			$('#nome_img3').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="success")
			{
				$('#upload_status3').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image3').html('');
			}
			else
			{
				$('#upload_status3').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}



//FIM DAS DECLARAÇÕES DAS FUNÇÕES REFERENTES AO TERCEIRO IDIOMA



$(document).ready(function ()
{
	

	
	if($('#flag').val() == 'inclusao'){
		//esse bloco de código é feito quando se tem uma inclusão
		$('#loader1').hide();
		$('#progress1').hide();	
		
		
		var myUpload1 = $('#upload_link1').upload({
			
			name: 'image',
			action: image_handling_file,
			enctype: 'multipart/form-data',
			params: {upload:'Upload'},
			autoSubmit: true,
			onSubmit: function()
			{
				$('#upload_status1').html('').hide();
				loadingmessage('Espere, carregando a imagem...', 'show');
			},
			onComplete: function(response)
			{
				
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseMsg = response[1];
				
				if(responseType=="success")
				{
					
					var current_width   = response[2];
					var current_height  = response[3];
					var nome_da_imagem1 = response[4];
					
					
					$('#nome_img1').val(nome_da_imagem1);
					//coloca a imagem na div
					//TAMANHO DO VISUALIZADOR
					$('#uploaded_image1').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail1" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview1" alt="Thumbnail Preview" /></div>');
						
						//find the image inserted above, and allow it to be cropped
						
						//TAMANHO DO QUADRADO
						$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 

						//display the hidden form
						$('#thumbnail_form1').show();
					}else if(responseType=="error"){
						$('#upload_status1').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
						$('#uploaded_image1').html('');
						$('#thumbnail_form1').hide();
					}else{
						$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
						$('#uploaded_image1').html('');
						$('#thumbnail_form1').hide();
					}
			   }
			});
		

		
		


		$('#save_thumb1').click(function() {
			
			var x11 = $('#x11').val();
			var y11 = $('#y11').val();
			var x21 = $('#x21').val();
			var y21 = $('#y21').val();
			var w1 = $('#w1').val();
			var h1 = $('#h1').val();
			
			if(x11=="" || y11=="" || x21=="" || y21=="" || w1=="" || h1==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
				
				
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ disable: true, hide: true }); 
				loadingmessage('Espere, salvando imagem....', 'show');

				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_inc=Save Thumbnail&x1='+x11+'&y1='+y11+'&x2='+x21+'&y2='+y21+'&w='+w1+'&h='+h1,
					cache: false,
					success: function(response){
						loadingmessage('', 'hide');
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nome_imagem_cropada = response[3];
						
						$("#nome_img_cropada1").val(nome_imagem_cropada);
						
						if(responseType=="success"){
							$('#upload_status1').show().html('<p>Imagem salva com sucesso!</p>');
							//load the new images
							
							$('#uploaded_image1').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  /><br /><a href="javascript:deleteimage1(\''+responseLargeImage+'\', \''+responseThumbImage+'\');">Delete Images</a>');
							//hide the thumbnail form
							$('#thumbnail_form1').hide();
						}else{
							$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 
							$('#thumbnail_form1').show();
						}
					}
				});
				
				return false;
			}
		
		});
		
		
		//COMEÇO DA INCLUSÃO REFERENTE AO SEGUNDO IDIOMA
		$('#loader2').hide();
		$('#progress2').hide();	
		
		
		var myUpload1 = $('#upload_link2').upload({
			
			name: 'image',
			action: image_handling_file,
			enctype: 'multipart/form-data',
			params: {upload:'Upload'},
			autoSubmit: true,
			onSubmit: function()
			{
				$('#upload_status2').html('').hide();
				loadingmessage('Espere, carregando a imagem...', 'show');
			},
			onComplete: function(response)
			{
				
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseMsg = response[1];
				
				if(responseType=="success")
				{
					
					var current_width   = response[2];
					var current_height  = response[3];
					var nome_da_imagem1 = response[4];
					
					
					$('#nome_img2').val(nome_da_imagem1);
					//coloca a imagem na div
					//TAMANHO DO VISUALIZADOR
					$('#uploaded_image2').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail2" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview2" alt="Thumbnail Preview" /></div>');
						
						//find the image inserted above, and allow it to be cropped
						
						//TAMANHO DO QUADRADO
						$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 

						//display the hidden form
						$('#thumbnail_form2').show();
					}else if(responseType=="error"){
						$('#upload_status2').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
						$('#uploaded_image2').html('');
						$('#thumbnail_form2').hide();
					}else{
						$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
						$('#uploaded_image2').html('');
						$('#thumbnail_form2').hide();
					}
			   }
			});
		

		
		


		$('#save_thumb2').click(function() {
			var x12 = $('#x12').val();
			var y12 = $('#y12').val();
			var x22 = $('#x22').val();
			var y22 = $('#y22').val();
			var w2 = $('#w2').val();
			var h2 = $('#h2').val();
			
			if(x12=="" || y12=="" || x22=="" || y22=="" || w2=="" || h2==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
				
				
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ disable: true, hide: true }); 
				loadingmessage('Espere, salvando imagem....', 'show');

				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_inc=Save Thumbnail&x1='+x12+'&y1='+y12+'&x2='+x22+'&y2='+y22+'&w='+w2+'&h='+h2,
					cache: false,
					success: function(response){
						loadingmessage('', 'hide');
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nome_imagem_cropada = response[3];
						
						$("#nome_img_cropada2").val(nome_imagem_cropada);
						
						if(responseType=="success"){
							$('#upload_status2').show().html('<p>Imagem salva com sucesso!</p>');
							//load the new images
							
							$('#uploaded_image2').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  /><br /><a href="javascript:deleteimage2(\''+responseLargeImage+'\', \''+responseThumbImage+'\');">Delete Images</a>');
							//hide the thumbnail form
							$('#thumbnail_form2').hide();
						}else{
							$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 
							$('#thumbnail_form2').show();
						}
					}
				});
				
				return false;
			}
		});
		
		
	//FIM DA INCLUSÃO REFERENTE AO SEGUNDO IDIOMA	
			
	
	//INICIO DA INCLUSÃO REFERENTE AO TERCEIRO IDIOMA
		$('#loader3').hide();
		$('#progress3').hide();	
		
		
		var myUpload1 = $('#upload_link3').upload({
			
			name: 'image',
			action: image_handling_file,
			enctype: 'multipart/form-data',
			params: {upload:'Upload'},
			autoSubmit: true,
			onSubmit: function()
			{
				$('#upload_status3').html('').hide();
				loadingmessage('Espere, carregando a imagem...', 'show');
			},
			onComplete: function(response)
			{
				
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseMsg = response[1];
				
				if(responseType=="success")
				{
					
					var current_width   = response[2];
					var current_height  = response[3];
					var nome_da_imagem1 = response[4];
					
					
					$('#nome_img3').val(nome_da_imagem1);
					//coloca a imagem na div
					//TAMANHO DO VISUALIZADOR
					$('#uploaded_image3').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail3" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview3" alt="Thumbnail Preview" /></div>');
						
						//find the image inserted above, and allow it to be cropped
						
						//TAMANHO DO QUADRADO
						$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 

						//display the hidden form
						$('#thumbnail_form3').show();
					}else if(responseType=="error"){
						$('#upload_status3').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
						$('#uploaded_image3').html('');
						$('#thumbnail_form3').hide();
					}else{
						$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
						$('#uploaded_image3').html('');
						$('#thumbnail_form3').hide();
					}
			   }
			});
		

		
		


		$('#save_thumb3').click(function() {
			var x13 = $('#x13').val();
			var y13 = $('#y13').val();
			var x23 = $('#x23').val();
			var y23 = $('#y23').val();
			var w3 = $('#w3').val();
			var h3 = $('#h3').val();
			
			if(x13=="" || y13=="" || x23=="" || y23=="" || w3=="" || h3==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
				
				
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ disable: true, hide: true }); 
				loadingmessage('Espere, salvando imagem....', 'show');

				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_inc=Save Thumbnail&x1='+x13+'&y1='+y13+'&x2='+x23+'&y2='+y23+'&w='+w3+'&h='+h3,
					cache: false,
					success: function(response){
						loadingmessage('', 'hide');
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nome_imagem_cropada = response[3];
						
						$("#nome_img_cropada3").val(nome_imagem_cropada);
						
						if(responseType=="success"){
							$('#upload_status3').show().html('<p>Imagem salva com sucesso!</p>');
							//load the new images
							
							$('#uploaded_image3').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  /><br /><a href="javascript:deleteimage3(\''+responseLargeImage+'\', \''+responseThumbImage+'\');">Delete Images</a>');
							//hide the thumbnail form
							$('#thumbnail_form3').hide();
						}else{
							$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 
							$('#thumbnail_form3').show();
						}
					}
				});
				
				return false;
			}
		});
		
		
		
	//FIM DA INCLUSÃO REFERENTE AO TERCEIRO IDIOMA	
	}else{
		
		
		
		
		//COMEÇO DA PARTE REFERENTE A EDIÇÃO
	
		
		
		
		$('#todo_conteudo1').hide();
		$('#upload_link1').hide();
		var imagem_cropada1  = $('#nome_img_cropada1').val();
		
		if(imagem_cropada1 != ""){
			$('#imagem_cropada_ftp1').html('<img src="'+arq_din+imagem_cropada1+'">');
		}
	
		//Ação do botão de troca
		$('#trocar1').click(function(){
			$('#todo_conteudo1').hide();
			$('#upload_link1').hide();
			
			if($('#nome_img1').val() == "" && $('#nome_img_cropada1').val() == ""){
				$('#todo_conteudo1').show();
				$('#upload_link1').show();
				$('#imagem_cropada_ftp1').hide();
				
				$('#todo_conteudo1').show();
				$('uploaded_image1').html('');
				//$('#todo_conteudo1').html('<div id="todo_conteudo1"><input type="text" name="nome_img1" id="nome_img1" value=""  /><input type="text" name="nome_img_cropada1" id="nome_img_cropada1" value=""  /><div id="upload_status1" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div><span id="loader1" style="display: none;"><img src="loader.gif" alt="Carregando..." /></span><span id="progress1"></span> <br /><div id="uploaded_image1"></div><div id="thumbnail_form1" style="display: none;"><input type="hidden" name="x1" value="" id="x11" /><input type="hidden" name="y1" value="" id="y11" /><input type="hidden" name="x2" value="" id="x21" /><input type="hidden" name="y2" value="" id="y21" /><input type="hidden" name="w" value="" id="w1" /><input type="hidden" name="h" value="" id="h1" /><input type="button" name="save_thumb1" value="Save Thumbnail" id="save_thumb1" /><input type="hidden" name="flag1" id="flag1" value="edicao1"></div></div>	');
				$('#upload_link1').show();
			}else{
				alert("Você precisa deletar a imagem atual primeiro!!");
			}
			
			
			
			
		});
		
		
		//Ação do botão de deletar
		$('#deletar1').click(function(){
			
			$('#todo_conteudo1').hide();
			$('#upload_link1').hide();
			var nome_imagem_original1 = $('#nome_img1').val();
			var nome_imagem_cropada1 = $('#nome_img_cropada1').val();		
			var id = $('#id1').val() ;
			
			if(nome_imagem_original1 == ""){
				alert("Não há imagem para ser deletada!!");
			}else{
				$.ajax({
					type: 'POST',
					url: acao_deletar,
					data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original1+'&nome_imagem_cropada='+nome_imagem_cropada1+'&id='+id,
					cache: false,
					success: function(response){
							alert("A imagem foi deletada com sucesso!!");
							$('#nome_img1').val('');
						    $('#nome_img_cropada1').val('');
						    $('#uploaded_image1').html('');
						    $('#imagem_cropada_ftp1').hide();
							
					}
				});
			}
			
		
		});
		
		//Ação do botão de editar
		$('#editar1').click( function (){
			
			
			$('#todo_conteudo1').hide();
			$('#upload_link1').hide();
			
			var valor_inicial_campo_original = $('#nome_img1').val();
			var valor_inicial_campo_cropada  = $('#nome_img_cropada1').val();
			
			
			if(valor_inicial_campo_original == ""){	
				
				alert("Não há imagem para editar!!");
				/*$('#todo_conteudo1').show();
				$('#upload_link1').show();
				$('#loader1').hide();
				$('#progress1').hide();*/
			
			}else{
				var imagem_original1 = $('#nome_img1').val();
				var imagem_cropada1  = $('#nome_img_cropada1').val();
				
					
					$('#todo_conteudo1').show();
					//$('#upload_link1').show();
					
					//coloca a imagem na div
					//TAMANHO DO VISUALIZADOR
					$('#uploaded_image1').html('<img src="'+arq_din+imagem_original1+'" style="float: left; margin-right: 10px;" id="thumbnail1" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original1+'" style="position: relative;" id="thumbnail_preview1" alt="Thumbnail Preview" /></div>');
							
					//find the image inserted above, and allow it to be cropped
							
					//TAMANHO DO QUADRADO
					$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 

					//display the hidden form
					$('#thumbnail_form1').show();
					
					$('#imagem_cropada_ftp1').hide();
					
			}
		});
		
		
		

		
		
		
		

		
		var myUpload1 = $('#upload_link1').upload({
			name: 'image',
			action: image_handling_file,
			enctype: 'multipart/form-data',
			params: {upload:'Upload' , nome_imagem_original: $('#nome_img1').val() },
			autoSubmit: true,
			onSubmit: function()
			{
				$('#upload_status1').html('').hide();
				loadingmessage('Espere, carregando a imagem...', 'show');
			},
			onComplete: function(response)
			{
			
				//alert('veio para parte de edição js, valor do campo: ' + $('#nome_img1').val() );
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseMsg = response[1];
				
				if(responseType=="success")
				{
					
					var current_width   = response[2];
					var current_height  = response[3];
					var nome_da_imagem1 = response[4];
					
						
						
						$('#nome_img1').val(nome_da_imagem1);
						//coloca a imagem na div
						//TAMANHO DO VISUALIZADOR
						$('#uploaded_image1').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail1" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview1" alt="Thumbnail Preview" /></div>');
						
						//find the image inserted above, and allow it to be cropped
						
						//TAMANHO DO QUADRADO
						$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 

						//display the hidden form
						$('#thumbnail_form1').show();
					}else if(responseType=="error"){
						$('#upload_status1').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
						$('#uploaded_image1').html('');
						$('#thumbnail_form1').hide();
					}else{
						$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
						$('#uploaded_image1').html('');
						$('#thumbnail_form1').hide();
					}
			   }
			});
			
		//botão de salvamento do crop na edição
		
		$('#save_thumb1').click(function(){
			
		
			var nome_img_original = $('#nome_img1').val();
			var nome_img_cropada = $('#nome_img_cropada1').val();
			
						
			var x11 = $('#x11').val();
			var y11 = $('#y11').val();
			var x21 = $('#x21').val();
			var y21 = $('#y21').val();
			var w1 = $('#w1').val();
			var h1 = $('#h1').val();
			
			if(x11=="" || y11=="" || x21=="" || y21=="" || w1=="" || h1==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
						
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ disable: true, hide: true }); 
				loadingmessage('Espere, salvando imagem....', 'show');

				//Insere no ftp a imagem cropada
				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_edt=Save Thumbnail&x1='+x11+'&y1='+y11+'&x2='+x21+'&y2='+y21+'&w='+w1+'&h='+h1+'&imagem_original_banco='+$('#nome_img1').val()+'&imagem_cropada_banco='+$('#nome_img_cropada1').val(),
					cache: false,
					success: function(response){
						
						loadingmessage('', 'hide');
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nomeImagem = response[3];
											
						$('#nome_img_cropada1').val(nomeImagem);
						if(responseType=="success"){
							
							$('#upload_status1').show().html('<p>Imagem salva com sucesso!</p>');
							//load the new images
							
							$('#uploaded_image1').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
							//hide the thumbnail form
							$('#thumbnail_form1').hide();
						
							var id = $('#id1').val() ;
							var  nome_img_original = $('#nome_img1').val();
							var  nome_img_cropada = $('#nome_img_cropada1').val();
							
							$.ajax({
								type: 'POST',
								url: acao_edicao_incluir,
								data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
								cache: false,
								success: function(response){
								
								}
							});
							
						}else{
							$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 
							$('#thumbnail_form1').show();
						}
					}
				});
				
				//Insere no banco o nome da imagem original e da imagem cropada 		
				
			return false;
			}		
			
		});
		
	//INICIO DA PARTE DA EDIÇÃO REFERENTE AO SEGUNDO IDIOMA

	
		
		
		
		$('#todo_conteudo2').hide();
		$('#upload_link2').hide();
		var imagem_cropada2  = $('#nome_img_cropada2').val();
		
		if(imagem_cropada2 != ""){
			$('#imagem_cropada_ftp2').html('<img src="'+arq_din+imagem_cropada2+'">');
		}
	
		//Ação do botão de troca
		$('#trocar2').click(function(){
			$('#todo_conteudo2').hide();
			$('#upload_link2').hide();
			
			if($('#nome_img2').val() == "" && $('#nome_img_cropada2').val() == ""){
				$('#todo_conteudo2').show();
				$('#upload_link2').show();
				$('#imagem_cropada_ftp2').hide();
				
				$('#todo_conteudo2').show();
				$('uploaded_image2').html('');
				//$('#todo_conteudo1').html('<div id="todo_conteudo2"><input type="text" name="nome_img1" id="nome_img2" value=""  /><input type="text" name="nome_img_cropada1" id="nome_img_cropada2" value=""  /><div id="upload_status2" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div><span id="loader2" style="display: none;"><img src="loader.gif" alt="Carregando..." /></span><span id="progress2"></span> <br /><div id="uploaded_image2"></div><div id="thumbnail_form2" style="display: none;"><input type="hidden" name="x1" value="" id="x12" /><input type="hidden" name="y1" value="" id="y12" /><input type="hidden" name="x2" value="" id="x22" /><input type="hidden" name="y2" value="" id="y22" /><input type="hidden" name="w" value="" id="w2" /><input type="hidden" name="h" value="" id="h2" /><input type="button" name="save_thumb1" value="Save Thumbnail" id="save_thumb2" /><input type="hidden" name="flag1" id="flag2" value="edicao2"></div></div>	');
				$('#upload_link2').show();
			}else{
				alert("Você precisa deletar a imagem atual primeiro!!");
			}
			
			
			
			
		});
		
		
		//Ação do botão de deletar
		$('#deletar2').click(function(){
			
			$('#todo_conteudo2').hide();
			$('#upload_link2').hide();
			var nome_imagem_original2 = $('#nome_img2').val();
			var nome_imagem_cropada2 = $('#nome_img_cropada2').val();
			
			var id = $('#id2').val() ;
		
			if(nome_imagem_original2 == ""){
				alert("Não há imagem para ser deletada!!");
			}else{
				
			$.ajax({
				type: 'POST',
				url: acao_deletar,
				data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original2+'&nome_imagem_cropada='+nome_imagem_cropada2+'&id='+id,
				cache: false,
				success: function(response){
						alert("A imagem foi deletada com sucesso!!");
						$('#nome_img2').val('');
					    $('#nome_img_cropada2').val('');
					    $('#uploaded_image2').html('');
					    $('#imagem_cropada_ftp2').hide();
						
				}
			});
			
			}		
		
		});
		
		
		//Ação do botão de editar
		$('#editar2').click( function (){
			
			
			$('#todo_conteudo2').hide();
			$('#upload_link2').hide();
			
			var valor_inicial_campo_original = $('#nome_img2').val();
			var valor_inicial_campo_cropada  = $('#nome_img_cropada2').val();
			
			
			if(valor_inicial_campo_original == ""){	
				
				alert("Não há imagem para editar!!");
				/*$('#todo_conteudo1').show();
				$('#upload_link1').show();
				$('#loader1').hide();
				$('#progress1').hide();*/
			
			}else{
				var imagem_original2 = $('#nome_img2').val();
				var imagem_cropada2  = $('#nome_img_cropada2').val();
				
					
					$('#todo_conteudo2').show();
					//$('#upload_link1').show();
					
					//coloca a imagem na div
					//TAMANHO DO VISUALIZADOR
					$('#uploaded_image2').html('<img src="'+arq_din+imagem_original2+'" style="float: left; margin-right: 10px;" id="thumbnail2" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original2+'" style="position: relative;" id="thumbnail_preview2" alt="Thumbnail Preview" /></div>');
							
					//find the image inserted above, and allow it to be cropped
							
					//TAMANHO DO QUADRADO
					$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 

					//display the hidden form
					$('#thumbnail_form2').show();
					
					$('#imagem_cropada_ftp2').hide();
					
			}
		});
		
		
		
	

		
		var myUpload2 = $('#upload_link2').upload({
			name: 'image',
			action: image_handling_file,
			enctype: 'multipart/form-data',
			params: {upload:'Upload' , nome_imagem_original: $('#nome_img2').val() },
			autoSubmit: true,
			onSubmit: function()
			{
				$('#upload_status2').html('').hide();
				loadingmessage('Espere, carregando a imagem...', 'show');
			},
			onComplete: function(response)
			{
			
				//alert('veio para parte de edição js, valor do campo: ' + $('#nome_img2').val() );
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseMsg = response[1];
				
				if(responseType=="success")
				{
					
					var current_width   = response[2];
					var current_height  = response[3];
					var nome_da_imagem2 = response[4];
					
						
						
						$('#nome_img2').val(nome_da_imagem2);
						//coloca a imagem na div
						//TAMANHO DO VISUALIZADOR
						$('#uploaded_image2').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail2" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview2" alt="Thumbnail Preview" /></div>');
						
						//find the image inserted above, and allow it to be cropped
						
						//TAMANHO DO QUADRADO
						$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 

						//display the hidden form
						$('#thumbnail_form2').show();
					}else if(responseType=="error"){
						$('#upload_status2').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
						$('#uploaded_image2').html('');
						$('#thumbnail_form2').hide();
					}else{
						$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
						$('#uploaded_image2').html('');
						$('#thumbnail_form2').hide();
					}
			   }
			});
		
		
	
		//botão de salvamento do crop na edição
	
		
	
		$('#save_thumb2').click(function(){
			
		
			var nome_img_original = $('#nome_img2').val();
			var nome_img_cropada = $('#nome_img_cropada2').val();
					
			var x12 = $('#x12').val();
			var y12 = $('#y12').val();
			var x21 = $('#x22').val();
			var y21 = $('#y22').val();
			var w2 = $('#w2').val();
			var h2 = $('#h2').val();
			
			if(x12=="" || y12=="" || x22=="" || y22=="" || w2=="" || h2==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
				
				
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ disable: true, hide: true }); 
				loadingmessage('Espere, salvando imagem....', 'show');

				//Insere no ftp a imagem cropada
				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_edt=Save Thumbnail&x1='+x12+'&y1='+y12+'&x2='+x22+'&y2='+y22+'&w='+w2+'&h='+h2+'&imagem_original_banco='+$('#nome_img2').val()+'&imagem_cropada_banco='+$('#nome_img_cropada2').val(),
					cache: false,
					success: function(response){
						loadingmessage('', 'hide');
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nomeImagem = response[3];
					
						
						
						$('#nome_img_cropada2').val(nomeImagem);
						if(responseType=="success"){
							
							$('#upload_status2').show().html('<p>Imagem salva com sucesso!</p>');
							//load the new images
							
							$('#uploaded_image2').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
							//hide the thumbnail form
							$('#thumbnail_form2').hide();
						
							var id = $('#id2').val() ;
							var  nome_img_original = $('#nome_img2').val();
							var  nome_img_cropada = $('#nome_img_cropada2').val();
							
							$.ajax({
								type: 'POST',
								url: acao_edicao_incluir,
								data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
								cache: false,
								success: function(response){
									
								}
							});
							
						}else{
							$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 
							$('#thumbnail_form2').show();
						}
					}
				});
				
				//Insere no banco o nome da imagem original e da imagem cropada 
				

			return false;
			}
							
			
			
			
		});
		
		//FIM DA PARTE DE EDIÇÃO REFERENTE AO SEGUNDO IDIOMA
		
		//INICIO DA PARTE DE EDIÇÃO REFERENTE AO TERCEIRO IDIOMA
		
		$('#todo_conteudo3').hide();
		$('#upload_link3').hide();
		var imagem_cropada3  = $('#nome_img_cropada3').val();
		
		if(imagem_cropada3 != ""){
			$('#imagem_cropada_ftp3').html('<img src="'+arq_din+imagem_cropada3+'">');
		}
	
		//Ação do botão de troca
		$('#trocar3').click(function(){
			$('#todo_conteudo3').hide();
			$('#upload_link3').hide();
			
			if($('#nome_img3').val() == "" && $('#nome_img_cropada3').val() == ""){
				$('#todo_conteudo3').show();
				$('#upload_link3').show();
				$('#imagem_cropada_ftp3').hide();
				
				$('#todo_conteudo3').show();
				$('uploaded_image3').html('');
				$('#upload_link3').show();
			}else{
				alert("Você precisa deletar a imagem atual primeiro!!");
			}
			
			
			
			
		});
		
		
		//Ação do botão de deletar
		$('#deletar3').click(function(){
			
			$('#todo_conteudo3').hide();
			$('#upload_link3').hide();
			var nome_imagem_original3 = $('#nome_img3').val();
			var nome_imagem_cropada3 = $('#nome_img_cropada3').val();
			
			var id = $('#id3').val() ;
		
			if(nome_imagem_original3 == ""){
				alert("Não há imagem para ser deletada!!");
			}else{
				
			$.ajax({
				type: 'POST',
				url: acao_deletar,
				data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original3+'&nome_imagem_cropada='+nome_imagem_cropada3+'&id='+id,
				cache: false,
				success: function(response){
						alert("A imagem foi deletada com sucesso!!");
						$('#nome_img3').val('');
					    $('#nome_img_cropada3').val('');
					    $('#uploaded_image3').html('');
					    $('#imagem_cropada_ftp3').hide();
						
				}
			});
			
				
		
			
			
			
				
				/*$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original2+'&nome_imagem_cropada='+nome_imagem_cropada2,
					cache: false,
					success: function(response){
						
							
					}
				});*/
			}
			
		
		});
		
		
		//Ação do botão de editar
		$('#editar3').click( function (){
			
			
			$('#todo_conteudo3').hide();
			$('#upload_link3').hide();
			
			var valor_inicial_campo_original = $('#nome_img3').val();
			var valor_inicial_campo_cropada  = $('#nome_img_cropada3').val();
			
			
			if(valor_inicial_campo_original == ""){	
				
				alert("Não há imagem para editar!!");
			
			
			}else{
				var imagem_original3 = $('#nome_img3').val();
				var imagem_cropada3  = $('#nome_img_cropada3').val();
				
					
					$('#todo_conteudo3').show();
					//$('#upload_link1').show();
					
					//coloca a imagem na div
					//TAMANHO DO VISUALIZADOR
					$('#uploaded_image3').html('<img src="'+arq_din+imagem_original3+'" style="float: left; margin-right: 10px;" id="thumbnail3" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original3+'" style="position: relative;" id="thumbnail_preview3" alt="Thumbnail Preview" /></div>');
							
					//find the image inserted above, and allow it to be cropped
							
					//TAMANHO DO QUADRADO
					$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 

					//display the hidden form
					$('#thumbnail_form3').show();
					
					$('#imagem_cropada_ftp3').hide();
					
			}
		});
		
		
		
		
		
		
		
		

		
		var myUpload3 = $('#upload_link3').upload({
			name: 'image',
			action: image_handling_file,
			enctype: 'multipart/form-data',
			params: {upload:'Upload' , nome_imagem_original: $('#nome_img3').val() },
			autoSubmit: true,
			onSubmit: function()
			{
				$('#upload_status3').html('').hide();
				loadingmessage('Espere, carregando a imagem...', 'show');
			},
			onComplete: function(response)
			{
			
	
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseMsg = response[1];
				
				if(responseType=="success")
				{
					
					var current_width   = response[2];
					var current_height  = response[3];
					var nome_da_imagem2 = response[4];
					
						
						
						$('#nome_img3').val(nome_da_imagem2);
						//coloca a imagem na div
						//TAMANHO DO VISUALIZADOR
						$('#uploaded_image3').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail3" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview3" alt="Thumbnail Preview" /></div>');
						
						//find the image inserted above, and allow it to be cropped
						
						//TAMANHO DO QUADRADO
						$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 

						//display the hidden form
						$('#thumbnail_form3').show();
					}else if(responseType=="error"){
						$('#upload_status3').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
						$('#uploaded_image3').html('');
						$('#thumbnail_form3').hide();
					}else{
						$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
						$('#uploaded_image3').html('');
						$('#thumbnail_form3').hide();
					}
			   }
			});
		
		
	
		//botão de salvamento do crop na edição
	
		
	
		$('#save_thumb3').click(function(){
			
		
			var nome_img_original = $('#nome_img3').val();
			var nome_img_cropada = $('#nome_img_cropada3').val();
					
			var x13 = $('#x13').val();
			var y13 = $('#y13').val();
			var x23 = $('#x23').val();
			var y23 = $('#y23').val();
			var w3 = $('#w3').val();
			var h3 = $('#h3').val();
			
			if(x13=="" || y13=="" || x23=="" || y23=="" || w3=="" || h3==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
				
				
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ disable: true, hide: true }); 
				loadingmessage('Espere, salvando imagem....', 'show');

				//Insere no ftp a imagem cropada
				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_edt=Save Thumbnail&x1='+x13+'&y1='+y13+'&x2='+x23+'&y2='+y23+'&w='+w3+'&h='+h3+'&imagem_original_banco='+$('#nome_img3').val()+'&imagem_cropada_banco='+$('#nome_img_cropada3').val(),
					cache: false,
					success: function(response){
						loadingmessage('', 'hide');
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nomeImagem = response[3];
					
						
						
						$('#nome_img_cropada3').val(nomeImagem);
						if(responseType=="success"){
							
							$('#upload_status3').show().html('<p>Imagem salva com sucesso!</p>');
							//load the new images
							
							$('#uploaded_image3').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
							//hide the thumbnail form
							$('#thumbnail_form3').hide();
						
							var id = $('#id3').val() ;
							var  nome_img_original = $('#nome_img3').val();
							var  nome_img_cropada = $('#nome_img_cropada3').val();
							
							$.ajax({
								type: 'POST',
								url: acao_edicao_incluir,
								data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
								cache: false,
								success: function(response){
									
								}
							});
							
						}else{
							$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 
							$('#thumbnail_form3').show();
						}
					}
				});
				
				//Insere no banco o nome da imagem original e da imagem cropada 
				

			return false;
			}
							
			
			
			
		});	
		
		
		//FIM DA PARTE DE EDIÇÃO REFERENTE AO TERCEIRO IDIOMA
		
	
}
	
	
	


});

