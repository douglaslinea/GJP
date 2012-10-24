<?php /* Smarty version Smarty-3.1.1, created on 2012-10-16 14:46:45
         compiled from "app/view/templates/Noticias/index.php" */ ?>
<?php /*%%SmartyHeaderCode:94022457507d9d85c56a19-23199676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caef4f34d6873d5b778b7f58814858eb2933cb8d' => 
    array (
      0 => 'app/view/templates/Noticias/index.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94022457507d9d85c56a19-23199676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_noticias' => 0,
    'params' => 0,
    'noticias' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_507d9d85e4377',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507d9d85e4377')) {function content_507d9d85e4377($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


			<header>
			<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
				<nav>
					<ul class="tab-switch">
						<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</a></li>
						<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li> 
						<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
						<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
					</ul>
				</nav>
			</header>
			
			<div class="tab default-tab" id="tab0">
				<?php if ($_smarty_tpl->tpl_vars['dados_noticias']->value!==false){?> <?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])){?>
					<div class="notification success">
						<a href="#" class="close-notification" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[44];?>
" rel="tooltip">x</a>
						<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
					</div>
				<?php }?>
				
				<table class="datatable" id="sec-desc">
						<thead>
							<tr>
								<th width="20%">Idioma</th>
								<th width="10%">Data</th>
								<th width="50%">T&iacute;tulo</th>
								<th width="10%">Publicado</th>
								<th width="10%">&nbsp;</th>
							</tr>
						</thead>
						
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['noticias'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['noticias']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_noticias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['noticias']->key => $_smarty_tpl->tpl_vars['noticias']->value){
$_smarty_tpl->tpl_vars['noticias']->_loop = true;
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['noticias']->value['WebsiteIdiomas']['idioma'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['noticias']->value['dat_data'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_titulo'];?>
</td>
									<td><?php if ($_smarty_tpl->tpl_vars['noticias']->value['cod_publicado']==1){?> Sim <?php }else{ ?> N&atilde;o <?php }?></td>
									<td>
										<ul class="actions">
											<li><a class="view" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/detalhes/id_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['noticias']->value['cod_relacao_idioma'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
">see</a></li>
											<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/editar/id_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['noticias']->value['cod_relacao_idioma'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
">edit</a></li>
											<li><a class="delete" onclick="javascript:exclusaoMultipla('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/excluir/id_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['noticias']->value['cod_relacao_idioma'];?>
', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[9];?>
')" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
">delete</a></li>
										</ul>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
                    
				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>

				<?php }?>

			</div>

<script type="text/javascript">
function exclusaoMultipla(url, url_direcionamento, msg_pegunta)
{
	if(confirm(msg_pegunta))
	{
	    //seta a url e os parâmetros a serem usamos pelo PHP             
	    var pars = "/rnd/" + Math.random()*4;

	    //Requisição Ajax
	    jQuery.ajax(
	    {
	       url: url+pars, //URL de destino
	       contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
	       type: 'post',
	       dataType: "json", //Tipo de Retorno
	       success: function(json)
	       {           
	           //Verifica a resposta do JSON
	           if(json[0] == "1")
	           {
	               	document.location = url_direcionamento;
	           }
			}
	    });
	}
}


</script>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>