var image_handling_file  = window.parent.image_handling_file;
var url_padrao = window.parent.url_padrao;
var altura_crop = window.parent.altura_crop;
var largura_crop = window.parent.largura_crop;

//quando faz a seleção da imagem cai aqui

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

$(document).ready(function ()
{
	$('#loader2').hide();
	$('#progress2').hide();
	var myUpload = $('#upload_link2').upload({
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
				var current_width = response[2];
				var current_height = response[3];
				var nome_da_imagem2 = response[4];
				
				$('#nome_img2').val(nome_da_imagem2);
				//coloca a imagem na div
				//TAMANHO DO VISUALIZADOR
				$('#uploaded_image2').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail2" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview2" alt="Thumbnail Preview" /></div>')
					
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
		/*alert(x12);
		alert(y12);
		alert(x12);
		alert(x22);
		alert(y22);
		alert(w2);
		alert(h2);*/
		
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
						$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview }); 
						$('#thumbnail_form2').show();
					}
				}
			});
			
			return false;
		}
	});
}); 