var image_handling_file  = window.parent.image_handling_file;
var url_padrao   = window.parent.url_padrao;
var altura_crop  = window.parent.altura_crop;
var largura_crop = window.parent.largura_crop;
var acao_deletar = window.parent.acao_deletar;
var acao_deletar2 = window.parent.acao_deletar2;
var acao_edicao_incluir = window.parent.acao_edicao_incluir;
var acao_edicao_incluir2 = window.parent.acao_edicao_incluir2;

//Funções de upload para o primeiro idioma
function preview11(img, selection)
{  
	var current_width = $('#uploaded_image11').find('#thumbnail11').width();
	var current_height = $('#uploaded_image11').find('#thumbnail11').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image11').find('#thumbnail_preview11').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x111').val(selection.x1);
	$('#y111').val(selection.y1);
	$('#x211').val(selection.x2);
	$('#y211').val(selection.y2);
	$('#w11').val(selection.width);
	$('#h11').val(selection.height);
} 

//show and hide the loading message
function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader11').show();
		$('#progress11').show().text(msg);
		$('#uploaded_image11').html('');
	}else if(show_hide=="hide"){
		$('#loader11').hide();
		$('#progress11').text('').hide();
	}else{
		$('#loader11').hide();
		$('#progress11').text('').hide();
		$('#uploaded_image11').html('');
	}
}

//exclui a imagem e o crop
function deleteimage11(large_image, thumbnail_image)
{
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada11').val('');
			$('#nome_img11').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="success")
			{
				$('#upload_status11').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image11').html('');
			}
			else
			{
				$('#upload_status11').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}



function preview21(img, selection)
{  
	var current_width = $('#uploaded_image21').find('#thumbnail21').width();
	var current_height = $('#uploaded_image21').find('#thumbnail21').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image21').find('#thumbnail_preview21').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x121').val(selection.x1);
	$('#y121').val(selection.y1);
	$('#x221').val(selection.x2);
	$('#y221').val(selection.y2);
	$('#w21').val(selection.width);
	$('#h21').val(selection.height);
} 

//show and hide the loading message
function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader21').show();
		$('#progress21').show().text(msg);
		$('#uploaded_image21').html('');
	}else if(show_hide=="hide"){
		$('#loader21').hide();
		$('#progress21').text('').hide();
	}else{
		$('#loader21').hide();
		$('#progress21').text('').hide();
		$('#uploaded_image21').html('');
	}
}

//exclui a imagem e o crop
function deleteimage21(large_image, thumbnail_image)
{
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada21').val('');
			$('#nome_img21').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="success")
			{
				$('#upload_status21').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image21').html('');
			}
			else
			{
				$('#upload_status21').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}



//Fim das declarações de funções referentes ao primeiro idioma

//Inicio das declarações referentes ao segundo idioma
	
function preview12(img, selection)
{  
	var current_width = $('#uploaded_image12').find('#thumbnail12').width();
	var current_height = $('#uploaded_image12').find('#thumbnail12').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image12').find('#thumbnail_preview12').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x112').val(selection.x1);
	$('#y112').val(selection.y1);
	$('#x212').val(selection.x2);
	$('#y212').val(selection.y2);
	$('#w12').val(selection.width);
	$('#h12').val(selection.height);
} 

//show and hide the loading message
function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader12').show();
		$('#progress12').show().text(msg);
		$('#uploaded_image12').html('');
	}else if(show_hide=="hide"){
		$('#loader12').hide();
		$('#progress12').text('').hide();
	}else{
		$('#loader12').hide();
		$('#progress12').text('').hide();
		$('#uploaded_image12').html('');
	}
}

//exclui a imagem e o crop
function deleteimage12(large_image, thumbnail_image)
{
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada12').val('');
			$('#nome_img12').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="success")
			{
				$('#upload_status12').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image12').html('');
			}
			else
			{
				$('#upload_status12').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}


function preview22(img, selection)
{  
	var current_width = $('#uploaded_image22').find('#thumbnail22').width();
	var current_height = $('#uploaded_image22').find('#thumbnail22').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image22').find('#thumbnail_preview22').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x122').val(selection.x1);
	$('#y122').val(selection.y1);
	$('#x222').val(selection.x2);
	$('#y222').val(selection.y2);
	$('#w22').val(selection.width);
	$('#h22').val(selection.height);
} 


function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader22').show();
		$('#progress22').show().text(msg);
		$('#uploaded_image22').html('');
	}else if(show_hide=="hide"){
		$('#loader22').hide();
		$('#progress22').text('').hide();
	}else{
		$('#loader22').hide();
		$('#progress22').text('').hide();
		$('#uploaded_image22').html('');
	}
}


function deleteimage22(large_image, thumbnail_image)
{
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada22').val('');
			$('#nome_img22').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="success")
			{
				$('#upload_status22').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image22').html('');
			}
			else
			{
				$('#upload_status22').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}
//Fim das declarações referentes ao segundo idioma

//Inicio das declarações referentes ao terceiro idioma
function preview13(img, selection)
{  
	var current_width = $('#uploaded_image13').find('#thumbnail13').width();
	var current_height = $('#uploaded_image13').find('#thumbnail13').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image13').find('#thumbnail_preview13').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x113').val(selection.x1);
	$('#y113').val(selection.y1);
	$('#x213').val(selection.x2);
	$('#y213').val(selection.y2);
	$('#w13').val(selection.width);
	$('#h13').val(selection.height);
} 

//show and hide the loading message
function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader13').show();
		$('#progress13').show().text(msg);
		$('#uploaded_image13').html('');
	}else if(show_hide=="hide"){
		$('#loader13').hide();
		$('#progress13').text('').hide();
	}else{
		$('#loader13').hide();
		$('#progress13').text('').hide();
		$('#uploaded_image13').html('');
	}
}

//exclui a imagem e o crop
function deleteimage13(large_image, thumbnail_image)
{
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada13').val('');
			$('#nome_img13').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="success")
			{
				$('#upload_status13').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image13').html('');
			}
			else
			{
				$('#upload_status13').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}
//FIM DAS DECLARAÇÕES DE FUNÇÕES 5

//DECLARAÇÕES DE FUNÇÕES 6
function preview23(img, selection)
{  
	var current_width = $('#uploaded_image23').find('#thumbnail23').width();
	var current_height = $('#uploaded_image23').find('#thumbnail23').height();

	var scaleX = largura_crop / selection.width; 
	var scaleY = altura_crop / selection.height; 
	
	$('#uploaded_image23').find('#thumbnail_preview23').css({ 
		width: Math.round(scaleX * current_width) + 'px', 
		height: Math.round(scaleY * current_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x123').val(selection.x1);
	$('#y123').val(selection.y1);
	$('#x223').val(selection.x2);
	$('#y223').val(selection.y2);
	$('#w23').val(selection.width);
	$('#h23').val(selection.height);
} 

//show and hide the loading message
function loadingmessage(msg, show_hide){
	if(show_hide=="show"){
		$('#loader23').show();
		$('#progress23').show().text(msg);
		$('#uploaded_image23').html('');
	}else if(show_hide=="hide"){
		$('#loader23').hide();
		$('#progress23').text('').hide();
	}else{
		$('#loader23').hide();
		$('#progress23').text('').hide();
		$('#uploaded_image23').html('');
	}
}

//exclui a imagem e o crop
function deleteimage23(large_image, thumbnail_image)
{
	loadingmessage('Please wait, deleting images...', 'show');
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			$('#nome_img_cropada23').val('');
			$('#nome_img23').val('');
			loadingmessage('', 'hide');
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="success")
			{
				$('#upload_status23').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image23').html('');
			}
			else
			{
				$('#upload_status23').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
}
//Fim das declarações referentes ao terceiro idioma



//Inicio das declarações referentes a primeira imagem 1 do primeiro idioma
$(document).ready(function(){
	


$('#todo_conteudo11').hide();
$('#upload_link11').hide();
var imagem_cropada11  = $('#nome_img_cropada11').val();

if(imagem_cropada11 != ""){
	$('#imagem_cropada_ftp11').html('<img src="'+arq_din+imagem_cropada11+'">');
}

//Ação do botão de troca
$('#trocar11').click(function(){
	$('#todo_conteudo11').hide();
	$('#upload_link11').hide();
	
	if($('#nome_img11').val() == "" && $('#nome_img_cropada11').val() == ""){
		$('#todo_conteudo11').show();
		$('#upload_link11').show();
		$('#imagem_cropada_ftp11').hide();
		
		$('#todo_conteudo11').show();
		$('uploaded_image11').html('');
		$('#upload_link11').show();
	}else{
		alert("Você precisa deletar a imagem atual primeiro!!");
	}				
});

//Ação do botão de deletar
$('#deletar11').click(function(){
	
	$('#todo_conteudo11').hide();
	$('#upload_link11').hide();
	var nome_imagem_original11 = $('#nome_img11').val();
	var nome_imagem_cropada11 = $('#nome_img_cropada11').val();
	
	var id = $('#id11').val() ;
			
	$.ajax({
		type: 'POST',
		url: acao_deletar,
		data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original11+'&nome_imagem_cropada='+nome_imagem_cropada11+'&id='+id,
		cache: false,
		success: function(response){
				alert("A imagem foi deletada com sucesso!!");						
		}
	});
	
	if(nome_imagem_original11 == ""){
		alert("Não há imagem para ser deletada!!");
	}else{
		
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original11+'&nome_imagem_cropada='+nome_imagem_cropada11,
			cache: false,
			success: function(response){
				
					$('#nome_img11').val('');
				    $('#nome_img_cropada11').val('');
				    $('#uploaded_image11').html('');
				    $('#imagem_cropada_ftp11').hide();
			}
		});
	}					
});		

//Ação do botão de editar
$('#editar11').click( function (){
				
	$('#todo_conteudo11').hide();
	$('#upload_link11').hide();
	
	var valor_inicial_campo_original = $('#nome_img11').val();
	var valor_inicial_campo_cropada  = $('#nome_img_cropada11').val();
				
	if(valor_inicial_campo_original == ""){	
		
		alert("Não há imagem para editar!!");
	
	
	}else{
		var imagem_original11 = $('#nome_img11').val();
		var imagem_cropada11  = $('#nome_img_cropada11').val();				
			
			$('#todo_conteudo11').show();
			//$('#upload_link1').show();
			
			//coloca a imagem na div
			//TAMANHO DO VISUALIZADOR
			$('#uploaded_image11').html('<img src="'+arq_din+imagem_original11+'" style="float: left; margin-right: 10px;" id="thumbnail11" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original11+'" style="position: relative;" id="thumbnail_preview11" alt="Thumbnail Preview" /></div>');
					
			//find the image inserted above, and allow it to be cropped
					
			//TAMANHO DO QUADRADO
			$('#uploaded_image11').find('#thumbnail11').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview11 }); 

			//display the hidden form
			$('#thumbnail_form11').show();
			
			$('#imagem_cropada_ftp11').hide();					
	}
});				

var myUpload = $('#upload_link11').upload({
	name: 'image',
	action: image_handling_file,
	enctype: 'multipart/form-data',
	params: {upload:'Upload' , nome_imagem_original: $('#nome_img11').val() },
	autoSubmit: true,
	onSubmit: function()
	{
		$('#upload_status11').html('').hide();
		loadingmessage('Espere, carregando a imagem...', 'show');
	},
	onComplete: function(response)
	{	
		//alert('veio para parte de edição js, valor do campo: ' + $('#nome_img11').val() );
		loadingmessage('', 'hide');
		response = unescape(response);
		var response = response.split("|");
		var responseType = response[0];
		var responseMsg = response[1];
		
		if(responseType=="success")
		{					
			var current_width   = response[2];
			var current_height  = response[3];
			var nome_da_imagem11 = response[4];									
				
				$('#nome_img11').val(nome_da_imagem11);
				//coloca a imagem na div
				//TAMANHO DO VISUALIZADOR
				$('#uploaded_image11').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail11" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview11" alt="Thumbnail Preview" /></div>');
				
				//find the image inserted above, and allow it to be cropped
				
				//TAMANHO DO QUADRADO
				$('#uploaded_image11').find('#thumbnail11').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview11 }); 

				//display the hidden form
				$('#thumbnail_form11').show();
			}else if(responseType=="error"){
				$('#upload_status11').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image11').html('');
				$('#thumbnail_form11').hide();
			}else{
				$('#upload_status11').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
				$('#uploaded_image11').html('');
				$('#thumbnail_form11').hide();
			}
	   }
	});				


//botão de salvamento do crop na edição
$('#save_thumb11').click(function(){			

	var nome_img_original = $('#nome_img11').val();
	var nome_img_cropada = $('#nome_img_cropada2').val();
			
	var x111 = $('#x111').val();
	var y111 = $('#y111').val();
	var x211 = $('#x211').val();
	var y211 = $('y211').val();
	var w11 = $('#w11').val();
	var h11 = $('#h11').val();
	
	if(x111=="" || y111=="" || x211=="" || y211=="" || w11=="" || h11==""){
		alert("Primeiro você precisa recortar a imagem");
		return false;
	
	}else{			
		
		//hide the selection and disable the imgareaselect plugin
		$('#uploaded_image11').find('#thumbnail11').imgAreaSelect({ disable: true, hide: true }); 
		loadingmessage('Espere, salvando imagem....', 'show');

		//Insere no ftp a imagem cropada
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'save_thumb_edt=Save Thumbnail&x1='+x111+'&y1='+y111+'&x2='+x211+'&y2='+y211+'&w='+w11+'&h='+h11+'&imagem_original_banco='+$('#nome_img11').val()+'&imagem_cropada_banco='+$('#nome_img_cropada11').val(),
			cache: false,
			success: function(response){
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseLargeImage = response[1];
				var responseThumbImage = response[2];
				var nomeImagem = response[3];								
				
				$('#nome_img_cropada11').val(nomeImagem);
				if(responseType=="success"){
					
					$('#upload_status11').show().html('<p>Imagem salva com sucesso!</p>');
					//load the new images
					
					$('#uploaded_image11').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
					//hide the thumbnail form
					$('#thumbnail_form11').hide();
				
					var id = $('#id11').val() ;
					var  nome_img_original = $('#nome_img11').val();
					var  nome_img_cropada = $('#nome_img_cropada11').val();
					
					$.ajax({
						type: 'POST',
						url: acao_edicao_incluir,
						data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
						cache: false,
						success: function(response){									
							
						}
					});
					
				}else{
					$('#upload_status11').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
					//reactivate the imgareaselect plugin to allow another attempt.
					$('#uploaded_image11').find('#thumbnail11').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview11 }); 
					$('#thumbnail_form11').show();
				}
			}
		});
		
		//Insere no banco o nome da imagem original e da imagem cropada 
		
	return false;
	}
});


$('#todo_conteudo21').hide();
$('#upload_link21').hide();
var imagem_cropada21  = $('#nome_img_cropada21').val();

if(imagem_cropada21 != ""){
	$('#imagem_cropada_ftp21').html('<img src="'+arq_din+imagem_cropada21+'">');
}

//Ação do botão de troca
$('#trocar21').click(function(){
	$('#todo_conteudo21').hide();
	$('#upload_link21').hide();
	
	if($('#nome_img21').val() == "" && $('#nome_img_cropada21').val() == ""){
		$('#todo_conteudo21').show();
		$('#upload_link21').show();
		$('#imagem_cropada_ftp21').hide();
		
		$('#todo_conteudo21').show();
		$('uploaded_image21').html('');
		$('#upload_link21').show();
	}else{
		alert("Você precisa deletar a imagem atual primeiro!!");
	}				
});

//Ação do botão de deletar
$('#deletar21').click(function(){
	
	$('#todo_conteudo21').hide();
	$('#upload_link21').hide();
	var nome_imagem_original21 = $('#nome_img21').val();
	var nome_imagem_cropada21 = $('#nome_img_cropada21').val();
	
	var id = $('#id21').val() ;
			
	$.ajax({
		type: 'POST',
		url: acao_deletar2,
		data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original21+'&nome_imagem_cropada='+nome_imagem_cropada21+'&id='+id,
		cache: false,
		success: function(response){
				alert("A imagem foi deletada com sucesso!!");						
		}
	});
	
	if(nome_imagem_original21 == ""){
		alert("Não há imagem para ser deletada!!");
	}else{
		
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original21+'&nome_imagem_cropada='+nome_imagem_cropada21,
			cache: false,
			success: function(response){
				
					$('#nome_img21').val('');
				    $('#nome_img_cropada21').val('');
				    $('#uploaded_image21').html('');
				    $('#imagem_cropada_ftp21').hide();
			}
		});
	}					
});		

//Ação do botão de editar
$('#editar21').click( function (){
				
	$('#todo_conteudo21').hide();
	$('#upload_link21').hide();
	
	var valor_inicial_campo_original = $('#nome_img21').val();
	var valor_inicial_campo_cropada  = $('#nome_img_cropada21').val();
				
	if(valor_inicial_campo_original == ""){	
		
		alert("Não há imagem para editar!!");
	
	
	}else{
		var imagem_original21 = $('#nome_img21').val();
		var imagem_cropada21  = $('#nome_img_cropada21').val();				
			
			$('#todo_conteudo21').show();
			//$('#upload_link1').show();
			
			//coloca a imagem na div
			//TAMANHO DO VISUALIZADOR
			$('#uploaded_image21').html('<img src="'+arq_din+imagem_original21+'" style="float: left; margin-right: 10px;" id="thumbnail21" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original21+'" style="position: relative;" id="thumbnail_preview21" alt="Thumbnail Preview" /></div>');
					
			//find the image inserted above, and allow it to be cropped
					
			//TAMANHO DO QUADRADO
			$('#uploaded_image21').find('#thumbnail21').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview21 }); 

			//display the hidden form
			$('#thumbnail_form21').show();
			
			$('#imagem_cropada_ftp21').hide();					
	}
});				

var myUpload21 = $('#upload_link21').upload({
	name: 'image',
	action: image_handling_file,
	enctype: 'multipart/form-data',
	params: {upload:'Upload' , nome_imagem_original: $('#nome_img21').val() },
	autoSubmit: true,
	onSubmit: function()
	{
		$('#upload_status21').html('').hide();
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
			var nome_da_imagem21 = response[4];									
				
				$('#nome_img21').val(nome_da_imagem21);
				//coloca a imagem na div
				//TAMANHO DO VISUALIZADOR
				$('#uploaded_image21').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail21" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview21" alt="Thumbnail Preview" /></div>');
				
				//find the image inserted above, and allow it to be cropped
				
				//TAMANHO DO QUADRADO
				$('#uploaded_image21').find('#thumbnail21').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview21 }); 

				//display the hidden form
				$('#thumbnail_form21').show();
			}else if(responseType=="error"){
				$('#upload_status21').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image21').html('');
				$('#thumbnail_form21').hide();
			}else{
				$('#upload_status21').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
				$('#uploaded_image21').html('');
				$('#thumbnail_form21').hide();
			}
	   }
	});				

//botão de salvamento do crop na edição
	
$('#save_thumb21').click(function(){			

	var nome_img_original = $('#nome_img21').val();
	var nome_img_cropada = $('#nome_img_cropada21').val();
			
	var x121 = $('#x121').val();
	var y121 = $('#y121').val();
	var x221 = $('#x221').val();
	var y221 = $('#y221').val();
	var w21 = $('#w21').val();
	var h21 = $('#h21').val();
	
	if(x121=="" || y121=="" || x221=="" || y221=="" || w21=="" || h21==""){
		alert("Primeiro você precisa recortar a imagem");
		return false;
	
	}else{			
		
		//hide the selection and disable the imgareaselect plugin
		$('#uploaded_image21').find('#thumbnail21').imgAreaSelect({ disable: true, hide: true }); 
		loadingmessage('Espere, salvando imagem....', 'show');

		//Insere no ftp a imagem cropada
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'save_thumb_edt=Save Thumbnail&x1='+x121+'&y1='+y121+'&x2='+x221+'&y2='+y221+'&w='+w21+'&h='+h21+'&imagem_original_banco='+$('#nome_img21').val()+'&imagem_cropada_banco='+$('#nome_img_cropada21').val(),
			cache: false,
			success: function(response){
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseLargeImage = response[1];
				var responseThumbImage = response[2];
				var nomeImagem = response[3];								
				
				$('#nome_img_cropada21').val(nomeImagem);
				if(responseType=="success"){
					
					$('#upload_status21').show().html('<p>Imagem salva com sucesso!</p>');
					//load the new images
					
					$('#uploaded_image21').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
					//hide the thumbnail form
					$('#thumbnail_form21').hide();
				
					var id = $('#id21').val() ;
					var  nome_img_original = $('#nome_img21').val();
					var  nome_img_cropada = $('#nome_img_cropada21').val();
					
					$.ajax({
						type: 'POST',
						url: acao_edicao_incluir2,
						data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
						cache: false,
						success: function(response){									
							
						}
					});
					
				}else{
					$('#upload_status21').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
					//reactivate the imgareaselect plugin to allow another attempt.
					$('#uploaded_image21').find('#thumbnail21').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview21 }); 
					$('#thumbnail_form21').show();
				}
			}
		});
		
		//Insere no banco o nome da imagem original e da imagem cropada 
		
	return false;
	}
});
//***************************************************************************************************//
//Segundo idioma
//**************************************************************************************************//
$('#todo_conteudo12').hide();
$('#upload_link12').hide();
var imagem_cropada12  = $('#nome_img_cropada12').val();

if(imagem_cropada12 != ""){
	$('#imagem_cropada_ftp12').html('<img src="'+arq_din+imagem_cropada12+'">');
}

//Ação do botão de troca
$('#trocar12').click(function(){
	$('#todo_conteudo12').hide();
	$('#upload_link12').hide();
	
	if($('#nome_img12').val() == "" && $('#nome_img_cropada12').val() == ""){
		$('#todo_conteudo12').show();
		$('#upload_link12').show();
		$('#imagem_cropada_ftp12').hide();
		
		$('#todo_conteudo12').show();
		$('uploaded_image12').html('');
		$('#upload_link12').show();
	}else{
		alert("Você precisa deletar a imagem atual primeiro!!");
	}				
});

//Ação do botão de deletar
$('#deletar12').click(function(){
	
	$('#todo_conteudo12').hide();
	$('#upload_link12').hide();
	var nome_imagem_original12 = $('#nome_img12').val();
	var nome_imagem_cropada12 = $('#nome_img_cropada12').val();
	
	var id = $('#id12').val() ;
			
	$.ajax({
		type: 'POST',
		url: acao_deletar,
		data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original12+'&nome_imagem_cropada='+nome_imagem_cropada12+'&id='+id,
		cache: false,
		success: function(response){
				alert("A imagem foi deletada com sucesso!!");						
		}
	});
	
	if(nome_imagem_original12 == ""){
		alert("Não há imagem para ser deletada!!");
	}else{
		
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original12+'&nome_imagem_cropada='+nome_imagem_cropada12,
			cache: false,
			success: function(response){
				
					$('#nome_img12').val('');
				    $('#nome_img_cropada12').val('');
				    $('#uploaded_image12').html('');
				    $('#imagem_cropada_ftp12').hide();
			}
		});
	}					
});		

//Ação do botão de editar
$('#editar12').click( function (){
				
	$('#todo_conteudo12').hide();
	$('#upload_link12').hide();
	
	var valor_inicial_campo_original = $('#nome_img12').val();
	var valor_inicial_campo_cropada  = $('#nome_img_cropada12').val();
				
	if(valor_inicial_campo_original == ""){	
		
		alert("Não há imagem para editar!!");
	
	
	}else{
		var imagem_original12 = $('#nome_img12').val();
		var imagem_cropada12  = $('#nome_img_cropada12').val();				
			
			$('#todo_conteudo12').show();
			//$('#upload_link1').show();
			
			//coloca a imagem na div
			//TAMANHO DO VISUALIZADOR
			$('#uploaded_image12').html('<img src="'+arq_din+imagem_original12+'" style="float: left; margin-right: 10px;" id="thumbnail12" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original12+'" style="position: relative;" id="thumbnail_preview12" alt="Thumbnail Preview" /></div>');
					
			//find the image inserted above, and allow it to be cropped
					
			//TAMANHO DO QUADRADO
			$('#uploaded_image12').find('#thumbnail12').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview12 }); 

			//display the hidden form
			$('#thumbnail_form12').show();
			
			$('#imagem_cropada_ftp12').hide();					
	}
});				

var myUpload12 = $('#upload_link12').upload({
	name: 'image',
	action: image_handling_file,
	enctype: 'multipart/form-data',
	params: {upload:'Upload' , nome_imagem_original: $('#nome_img12').val() },
	autoSubmit: true,
	onSubmit: function()
	{
		$('#upload_status12').html('').hide();
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
			var nome_da_imagem12 = response[4];									
				
				$('#nome_img12').val(nome_da_imagem12);
				//coloca a imagem na div
				//TAMANHO DO VISUALIZADOR
				$('#uploaded_image12').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail12" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview12" alt="Thumbnail Preview" /></div>');
				
				//find the image inserted above, and allow it to be cropped
				
				//TAMANHO DO QUADRADO
				$('#uploaded_image12').find('#thumbnail12').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview12 }); 

				//display the hidden form
				$('#thumbnail_form12').show();
			}else if(responseType=="error"){
				$('#upload_status12').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image12').html('');
				$('#thumbnail_form12').hide();
			}else{
				$('#upload_status12').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
				$('#uploaded_image12').html('');
				$('#thumbnail_form12').hide();
			}
	   }
	});				

//botão de salvamento do crop na edição
	
$('#save_thumb12').click(function(){			

	var nome_img_original = $('#nome_img12').val();
	var nome_img_cropada = $('#nome_img_cropada12').val();
			
	var x112 = $('#x112').val();
	var y112 = $('#y112').val();
	var x212 = $('#x212').val();
	var y212 = $('#y212').val();
	var w12 = $('#w12').val();
	var h12 = $('#h12').val();
	
	if(x112=="" || y112=="" || x212=="" || y212=="" || w12=="" || h12==""){
		alert("Primeiro você precisa recortar a imagem");
		return false;
	
	}else{			
		
		//hide the selection and disable the imgareaselect plugin
		$('#uploaded_image12').find('#thumbnail12').imgAreaSelect({ disable: true, hide: true }); 
		loadingmessage('Espere, salvando imagem....', 'show');

		//Insere no ftp a imagem cropada
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'save_thumb_edt=Save Thumbnail&x1='+x112+'&y1='+y112+'&x2='+x212+'&y2='+y212+'&w='+w12+'&h='+h12+'&imagem_original_banco='+$('#nome_img12').val()+'&imagem_cropada_banco='+$('#nome_img_cropada12').val(),
			cache: false,
			success: function(response){
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseLargeImage = response[1];
				var responseThumbImage = response[2];
				var nomeImagem = response[3];								
				
				$('#nome_img_cropada12').val(nomeImagem);
				if(responseType=="success"){
					
					$('#upload_status12').show().html('<p>Imagem salva com sucesso!</p>');
					//load the new images
					
					$('#uploaded_image12').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
					//hide the thumbnail form
					$('#thumbnail_form12').hide();
				
					var id = $('#id12').val() ;
					var  nome_img_original = $('#nome_img12').val();
					var  nome_img_cropada = $('#nome_img_cropada12').val();
					
					$.ajax({
						type: 'POST',
						url: acao_edicao_incluir,
						data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
						cache: false,
						success: function(response){									
							
						}
					});
					
				}else{
					$('#upload_status12').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
					//reactivate the imgareaselect plugin to allow another attempt.
					$('#uploaded_image12').find('#thumbnail12').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview12 }); 
					$('#thumbnail_form12').show();
				}
			}
		});
		
		//Insere no banco o nome da imagem original e da imagem cropada 
		
	return false;
	}
});
//*********************************************************************************************//

$('#todo_conteudo22').hide();
$('#upload_link22').hide();
var imagem_cropada22  = $('#nome_img_cropada22').val();

if(imagem_cropada22 != ""){
	$('#imagem_cropada_ftp22').html('<img src="'+arq_din+imagem_cropada22+'">');
}

//Ação do botão de troca
$('#trocar22').click(function(){
	$('#todo_conteudo22').hide();
	$('#upload_link22').hide();
	
	if($('#nome_img22').val() == "" && $('#nome_img_cropada22').val() == ""){
		$('#todo_conteudo22').show();
		$('#upload_link22').show();
		$('#imagem_cropada_ftp22').hide();
		
		$('#todo_conteudo22').show();
		$('uploaded_image22').html('');
		$('#upload_link22').show();
	}else{
		alert("Você precisa deletar a imagem atual primeiro!!");
	}				
});

//Ação do botão de deletar
$('#deletar22').click(function(){
	
	$('#todo_conteudo22').hide();
	$('#upload_link22').hide();
	var nome_imagem_original22 = $('#nome_img22').val();
	var nome_imagem_cropada22 = $('#nome_img_cropada22').val();
	
	var id = $('#id22').val() ;
			
	$.ajax({
		type: 'POST',
		url: acao_deletar2,
		data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original22+'&nome_imagem_cropada='+nome_imagem_cropada22+'&id='+id,
		cache: false,
		success: function(response){
				alert("A imagem foi deletada com sucesso!!");						
		}
	});
	
	if(nome_imagem_original22 == ""){
		alert("Não há imagem para ser deletada!!");
	}else{
		
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original22+'&nome_imagem_cropada='+nome_imagem_cropada22,
			cache: false,
			success: function(response){
				
					$('#nome_img22').val('');
				    $('#nome_img_cropada22').val('');
				    $('#uploaded_image22').html('');
				    $('#imagem_cropada_ftp22').hide();
			}
		});
	}					
});		

//Ação do botão de editar
$('#editar22').click( function (){
				
	$('#todo_conteudo22').hide();
	$('#upload_link22').hide();
	
	var valor_inicial_campo_original = $('#nome_img22').val();
	var valor_inicial_campo_cropada  = $('#nome_img_cropada22').val();
				
	if(valor_inicial_campo_original == ""){	
		
		alert("Não há imagem para editar!!");
	
	
	}else{
		var imagem_original22 = $('#nome_img22').val();
		var imagem_cropada22  = $('#nome_img_cropada22').val();				
			
			$('#todo_conteudo22').show();
			//$('#upload_link1').show();
			
			//coloca a imagem na div
			//TAMANHO DO VISUALIZADOR
			$('#uploaded_image22').html('<img src="'+arq_din+imagem_original22+'" style="float: left; margin-right: 10px;" id="thumbnail22" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original22+'" style="position: relative;" id="thumbnail_preview22" alt="Thumbnail Preview" /></div>');
					
			//find the image inserted above, and allow it to be cropped
					
			//TAMANHO DO QUADRADO
			$('#uploaded_image22').find('#thumbnail22').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview22 }); 

			//display the hidden form
			$('#thumbnail_form22').show();
			
			$('#imagem_cropada_ftp22').hide();					
	}
});				

var myUpload22 = $('#upload_link22').upload({
	name: 'image',
	action: image_handling_file,
	enctype: 'multipart/form-data',
	params: {upload:'Upload' , nome_imagem_original: $('#nome_img22').val() },
	autoSubmit: true,
	onSubmit: function()
	{
		$('#upload_status22').html('').hide();
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
			var nome_da_imagem22 = response[4];									
				
				$('#nome_img22').val(nome_da_imagem22);
				//coloca a imagem na div
				//TAMANHO DO VISUALIZADOR
				$('#uploaded_image22').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail22" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview22" alt="Thumbnail Preview" /></div>');
				
				//find the image inserted above, and allow it to be cropped
				
				//TAMANHO DO QUADRADO
				$('#uploaded_image22').find('#thumbnail22').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview22 }); 

				//display the hidden form
				$('#thumbnail_form22').show();
			}else if(responseType=="error"){
				$('#upload_status22').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image22').html('');
				$('#thumbnail_form22').hide();
			}else{
				$('#upload_status22').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
				$('#uploaded_image22').html('');
				$('#thumbnail_form22').hide();
			}
	   }
	});				

//botão de salvamento do crop na edição
	
$('#save_thumb22').click(function(){			

	var nome_img_original = $('#nome_img22').val();
	var nome_img_cropada = $('#nome_img_cropada22').val();
			
	var x122 = $('#x122').val();
	var y122 = $('#y122').val();
	var x222 = $('#x222').val();
	var y222 = $('#y222').val();
	var w22 = $('#w22').val();
	var h22 = $('#h22').val();
	
	if(x122=="" || y122=="" || x222=="" || y222=="" || w22=="" || h22==""){
		alert("Primeiro você precisa recortar a imagem");
		return false;
	
	}else{			
		
		//hide the selection and disable the imgareaselect plugin
		$('#uploaded_image22').find('#thumbnail22').imgAreaSelect({ disable: true, hide: true }); 
		loadingmessage('Espere, salvando imagem....', 'show');

		//Insere no ftp a imagem cropada
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'save_thumb_edt=Save Thumbnail&x1='+x122+'&y1='+y122+'&x2='+x222+'&y2='+y222+'&w='+w22+'&h='+h22+'&imagem_original_banco='+$('#nome_img22').val()+'&imagem_cropada_banco='+$('#nome_img_cropada22').val(),
			cache: false,
			success: function(response){
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseLargeImage = response[1];
				var responseThumbImage = response[2];
				var nomeImagem = response[3];								
				
				$('#nome_img_cropada22').val(nomeImagem);
				if(responseType=="success"){
					
					$('#upload_status22').show().html('<p>Imagem salva com sucesso!</p>');
					//load the new images
					
					$('#uploaded_image22').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
					//hide the thumbnail form
					$('#thumbnail_form22').hide();
				
					var id = $('#id22').val() ;
					var  nome_img_original = $('#nome_img22').val();
					var  nome_img_cropada = $('#nome_img_cropada22').val();
					
					$.ajax({
						type: 'POST',
						url: acao_edicao_incluir2,
						data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
						cache: false,
						success: function(response){									
							
						}
					});
					
				}else{
					$('#upload_status22').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
					//reactivate the imgareaselect plugin to allow another attempt.
					$('#uploaded_image22').find('#thumbnail22').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview22 }); 
					$('#thumbnail_form22').show();
				}
			}
		});
		
		//Insere no banco o nome da imagem original e da imagem cropada 
		
	return false;
	}
});
//********************************************************************************************************
//********************************************************************************************************
//********************************************************************************************************

$('#todo_conteudo13').hide();
$('#upload_link13').hide();
var imagem_cropada13  = $('#nome_img_cropada13').val();

if(imagem_cropada13 != ""){
	$('#imagem_cropada_ftp13').html('<img src="'+arq_din+imagem_cropada13+'">');
}

//Ação do botão de troca
$('#trocar13').click(function(){
	$('#todo_conteudo13').hide();
	$('#upload_link13').hide();
	
	if($('#nome_img13').val() == "" && $('#nome_img_cropada13').val() == ""){
		$('#todo_conteudo13').show();
		$('#upload_link13').show();
		$('#imagem_cropada_ftp13').hide();
		
		$('#todo_conteudo13').show();
		$('uploaded_image13').html('');
		$('#upload_link13').show();
	}else{
		alert("Você precisa deletar a imagem atual primeiro!!");
	}				
});

//Ação do botão de deletar
$('#deletar13').click(function(){
	
	$('#todo_conteudo13').hide();
	$('#upload_link13').hide();
	var nome_imagem_original13 = $('#nome_img13').val();
	var nome_imagem_cropada13 = $('#nome_img_cropada13').val();
	
	var id = $('#id13').val() ;
			
	$.ajax({
		type: 'POST',
		url: acao_deletar,
		data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original13+'&nome_imagem_cropada='+nome_imagem_cropada13+'&id='+id,
		cache: false,
		success: function(response){
				alert("A imagem foi deletada com sucesso!!");						
		}
	});
	
	if(nome_imagem_original13 == ""){
		alert("Não há imagem para ser deletada!!");
	}else{
		
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original13+'&nome_imagem_cropada='+nome_imagem_cropada13,
			cache: false,
			success: function(response){
				
					$('#nome_img13').val('');
				    $('#nome_img_cropada13').val('');
				    $('#uploaded_image13').html('');
				    $('#imagem_cropada_ftp13').hide();
			}
		});
	}					
});		

//Ação do botão de editar
$('#editar13').click( function (){
				
	$('#todo_conteudo13').hide();
	$('#upload_link13').hide();
	
	var valor_inicial_campo_original = $('#nome_img13').val();
	var valor_inicial_campo_cropada  = $('#nome_img_cropada13').val();
				
	if(valor_inicial_campo_original == ""){	
		
		alert("Não há imagem para editar!!");
	
	
	}else{
		var imagem_original13 = $('#nome_img13').val();
		var imagem_cropada13  = $('#nome_img_cropada13').val();				
			
			$('#todo_conteudo13').show();
			//$('#upload_link1').show();
			
			//coloca a imagem na div
			//TAMANHO DO VISUALIZADOR
			$('#uploaded_image13').html('<img src="'+arq_din+imagem_original13+'" style="float: left; margin-right: 10px;" id="thumbnail13" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original13+'" style="position: relative;" id="thumbnail_preview13" alt="Thumbnail Preview" /></div>');
					
			//find the image inserted above, and allow it to be cropped
					
			//TAMANHO DO QUADRADO
			$('#uploaded_image13').find('#thumbnail13').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview13 }); 

			//display the hidden form
			$('#thumbnail_form13').show();
			
			$('#imagem_cropada_ftp13').hide();					
	}
});				

var myUpload13 = $('#upload_link13').upload({
	name: 'image',
	action: image_handling_file,
	enctype: 'multipart/form-data',
	params: {upload:'Upload' , nome_imagem_original: $('#nome_img13').val() },
	autoSubmit: true,
	onSubmit: function()
	{
		$('#upload_status13').html('').hide();
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
			var nome_da_imagem13 = response[4];									
				
				$('#nome_img13').val(nome_da_imagem13);
				//coloca a imagem na div
				//TAMANHO DO VISUALIZADOR
				$('#uploaded_image13').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail13" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview13" alt="Thumbnail Preview" /></div>');
				
				//find the image inserted above, and allow it to be cropped
				
				//TAMANHO DO QUADRADO
				$('#uploaded_image13').find('#thumbnail13').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview13 }); 

				//display the hidden form
				$('#thumbnail_form13').show();
			}else if(responseType=="error"){
				$('#upload_status13').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image13').html('');
				$('#thumbnail_form13').hide();
			}else{
				$('#upload_status13').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
				$('#uploaded_image13').html('');
				$('#thumbnail_form13').hide();
			}
	   }
	});				

//botão de salvamento do crop na edição
	
$('#save_thumb13').click(function(){			

	var nome_img_original = $('#nome_img13').val();
	var nome_img_cropada = $('#nome_img_cropada21').val();
			
	var x113 = $('#x113').val();
	var y113 = $('#y113').val();
	var x213 = $('#x213').val();
	var y213 = $('#y213').val();
	var w13 = $('#w13').val();
	var h13 = $('#h13').val();
	
	if(x113=="" || y113=="" || x213=="" || y213=="" || w13=="" || h13==""){
		alert("Primeiro você precisa recortar a imagem");
		return false;
	
	}else{			
		
		//hide the selection and disable the imgareaselect plugin
		$('#uploaded_image13').find('#thumbnail13').imgAreaSelect({ disable: true, hide: true }); 
		loadingmessage('Espere, salvando imagem....', 'show');

		//Insere no ftp a imagem cropada
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'save_thumb_edt=Save Thumbnail&x1='+x113+'&y1='+y113+'&x2='+x213+'&y2='+y213+'&w='+w13+'&h='+h13+'&imagem_original_banco='+$('#nome_img13').val()+'&imagem_cropada_banco='+$('#nome_img_cropada13').val(),
			cache: false,
			success: function(response){
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseLargeImage = response[1];
				var responseThumbImage = response[2];
				var nomeImagem = response[3];								
				
				$('#nome_img_cropada13').val(nomeImagem);
				if(responseType=="success"){
					
					$('#upload_status13').show().html('<p>Imagem salva com sucesso!</p>');
					//load the new images
					
					$('#uploaded_image13').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
					//hide the thumbnail form
					$('#thumbnail_form13').hide();
				
					var id = $('#id13').val() ;
					var  nome_img_original = $('#nome_img13').val();
					var  nome_img_cropada = $('#nome_img_cropada13').val();
					
					$.ajax({
						type: 'POST',
						url: acao_edicao_incluir,
						data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
						cache: false,
						success: function(response){									
							
						}
					});
					
				}else{
					$('#upload_status13').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
					//reactivate the imgareaselect plugin to allow another attempt.
					$('#uploaded_image13').find('#thumbnail13').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview13 }); 
					$('#thumbnail_form13').show();
				}
			}
		});
		
		//Insere no banco o nome da imagem original e da imagem cropada 
		
	return false;
	}
});


//***********************************************************************************************//

$('#todo_conteudo23').hide();
$('#upload_link23').hide();
var imagem_cropada23  = $('#nome_img_cropada23').val();

if(imagem_cropada23 != ""){
	$('#imagem_cropada_ftp23').html('<img src="'+arq_din+imagem_cropada23+'">');
}

//Ação do botão de troca
$('#trocar23').click(function(){
	$('#todo_conteudo23').hide();
	$('#upload_link23').hide();
	
	if($('#nome_img23').val() == "" && $('#nome_img_cropada23').val() == ""){
		$('#todo_conteudo23').show();
		$('#upload_link23').show();
		$('#imagem_cropada_ftp23').hide();
		
		$('#todo_conteudo23').show();
		$('uploaded_image23').html('');
		$('#upload_link23').show();
	}else{
		alert("Você precisa deletar a imagem atual primeiro!!");
	}				
});

//Ação do botão de deletar
$('#deletar23').click(function(){
	
	$('#todo_conteudo23').hide();
	$('#upload_link23').hide();
	var nome_imagem_original23 = $('#nome_img23').val();
	var nome_imagem_cropada23 = $('#nome_img_cropada23').val();
	
	var id = $('#id23').val() ;
			
	$.ajax({
		type: 'POST',
		url: acao_deletar2,
		data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original23+'&nome_imagem_cropada='+nome_imagem_cropada23+'&id='+id,
		cache: false,
		success: function(response){
				alert("A imagem foi deletada com sucesso!!");						
		}
	});
	
	if(nome_imagem_original23 == ""){
		alert("Não há imagem para ser deletada!!");
	}else{
		
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original23+'&nome_imagem_cropada='+nome_imagem_cropada23,
			cache: false,
			success: function(response){
				
					$('#nome_img23').val('');
				    $('#nome_img_cropada23').val('');
				    $('#uploaded_image23').html('');
				    $('#imagem_cropada_ftp23').hide();
			}
		});
	}					
});		

//Ação do botão de editar
$('#editar23').click( function (){
				
	$('#todo_conteudo23').hide();
	$('#upload_link23').hide();
	
	var valor_inicial_campo_original = $('#nome_img23').val();
	var valor_inicial_campo_cropada  = $('#nome_img_cropada23').val();
				
	if(valor_inicial_campo_original == ""){	
		
		alert("Não há imagem para editar!!");
	
	
	}else{
		var imagem_original23 = $('#nome_img23').val();
		var imagem_cropada23  = $('#nome_img_cropada23').val();				
			
			$('#todo_conteudo23').show();
			//$('#upload_link1').show();
			
			//coloca a imagem na div
			//TAMANHO DO VISUALIZADOR
			$('#uploaded_image23').html('<img src="'+arq_din+imagem_original23+'" style="float: left; margin-right: 10px;" id="thumbnail23" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+arq_din+imagem_original23+'" style="position: relative;" id="thumbnail_preview23" alt="Thumbnail Preview" /></div>');
					
			//find the image inserted above, and allow it to be cropped
					
			//TAMANHO DO QUADRADO
			$('#uploaded_image23').find('#thumbnail23').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview23 }); 

			//display the hidden form
			$('#thumbnail_form23').show();
			
			$('#imagem_cropada_ftp23').hide();					
	}
});				

var myUpload23 = $('#upload_link23').upload({
	name: 'image',
	action: image_handling_file,
	enctype: 'multipart/form-data',
	params: {upload:'Upload' , nome_imagem_original: $('#nome_img23').val() },
	autoSubmit: true,
	onSubmit: function()
	{
		$('#upload_status23').html('').hide();
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
			var nome_da_imagem23 = response[4];									
				
				$('#nome_img23').val(nome_da_imagem23);
				//coloca a imagem na div
				//TAMANHO DO VISUALIZADOR
				$('#uploaded_image23').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail23" alt="Create Thumbnail" /><div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:'+largura_crop+'px; height:'+altura_crop+'px;"><img src="'+url_padrao+responseMsg+'" style="position: relative;" id="thumbnail_preview23" alt="Thumbnail Preview" /></div>');
				
				//find the image inserted above, and allow it to be cropped
				
				//TAMANHO DO QUADRADO
				$('#uploaded_image23').find('#thumbnail23').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview23 }); 

				//display the hidden form
				$('#thumbnail_form23').show();
			}else if(responseType=="error"){
				$('#upload_status23').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
				$('#uploaded_image23').html('');
				$('#thumbnail_form23').hide();
			}else{
				$('#upload_status23').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
				$('#uploaded_image23').html('');
				$('#thumbnail_form23').hide();
			}
	   }
	});				

//botão de salvamento do crop na edição
	
$('#save_thumb23').click(function(){			

	var nome_img_original = $('#nome_img23').val();
	var nome_img_cropada = $('#nome_img_cropada23').val();
			
	var x123 = $('#x123').val();
	var y123 = $('#y123').val();
	var x223 = $('#x223').val();
	var y223 = $('#y223').val();
	var w23 = $('#w23').val();
	var h23 = $('#h23').val();
	
	if(x123=="" || y123=="" || x223=="" || y223=="" || w23=="" || h23==""){
		alert("Primeiro você precisa recortar a imagem");
		return false;
	
	}else{			
		
		//hide the selection and disable the imgareaselect plugin
		$('#uploaded_image23').find('#thumbnail23').imgAreaSelect({ disable: true, hide: true }); 
		loadingmessage('Espere, salvando imagem....', 'show');

		//Insere no ftp a imagem cropada
		$.ajax({
			type: 'POST',
			url: image_handling_file,
			data: 'save_thumb_edt=Save Thumbnail&x1='+x123+'&y1='+y123+'&x2='+x223+'&y2='+y223+'&w='+w23+'&h='+h23+'&imagem_original_banco='+$('#nome_img23').val()+'&imagem_cropada_banco='+$('#nome_img_cropada23').val(),
			cache: false,
			success: function(response){
				loadingmessage('', 'hide');
				response = unescape(response);
				var response = response.split("|");
				var responseType = response[0];
				var responseLargeImage = response[1];
				var responseThumbImage = response[2];
				var nomeImagem = response[3];								
				
				$('#nome_img_cropada23').val(nomeImagem);
				if(responseType=="success"){
					
					$('#upload_status23').show().html('<p>Imagem salva com sucesso!</p>');
					//load the new images
					
					$('#uploaded_image23').html('<img src="'+url_padrao+responseLargeImage+'" alt="Large Image"  />&nbsp;<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  />');
					//hide the thumbnail form
					$('#thumbnail_form23').hide();
				
					var id = $('#id23').val() ;
					var  nome_img_original = $('#nome_img23').val();
					var  nome_img_cropada = $('#nome_img_cropada23').val();
					
					$.ajax({
						type: 'POST',
						url: acao_edicao_incluir2,
						data: '&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
						cache: false,
						success: function(response){									
							
						}
					});
					
				}else{
					$('#upload_status23').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
					//reactivate the imgareaselect plugin to allow another attempt.
					$('#uploaded_image23').find('#thumbnail23').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview23 }); 
					$('#thumbnail_form23').show();
				}
			}
		});
		
		//Insere no banco o nome da imagem original e da imagem cropada 
		
	return false;
	}
	

	});
});
//Fim das declarações referentes a imagem 1 do primeiro idioma
