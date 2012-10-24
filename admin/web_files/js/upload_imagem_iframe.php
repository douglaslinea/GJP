<script type="text/javascript">
//Procedimento responsável por emitir a saida do JSON
function EvalJSON(){

//OBJETO JSON - POR DEFAULT O VALOR DESTE OBJETO VEM DO CONTROLLER(NÂO É PRECISO ALTERAR!!!)
var json = <?php echo $json_object_response_IFRAME; ?>;

//Verifica a resposta do JSON
if(json[0]=="1")
	    	{
	    		window.parent.document.location = window.parent.upload_final_url;
	    	}
			
			//Se der erro no JSON então vai cair aqui
	    	else
	    	{
	    		//limpa o span com os erros
	    		window.parent.limpaSpan(window.parent.upload_span_class_name);
				
				//Instancia o formulário de conteudos-exclusivos
				var form = window.parent.document.getElementById(window.parent.upload_form_id);
				
	    		//Percorre os erros    
	            for(var msg_erro in json)
	            {
	            	erro = window.parent.document.getElementById(json[msg_erro]['id_element']);
	            	erro.className = window.parent.upload_span_class_name;
	            	erro.innerHTML = json[msg_erro]['mensagem'];
	            }
		    }
}
//Chama o procedimento
EvalJSON();
</script>