<?php /* Smarty version Smarty-3.1.1, created on 2012-09-12 16:10:25
         compiled from "app/view/templates/Noticias/incluir.php" */ ?>
<?php /*%%SmartyHeaderCode:19080416335050de217c1237-78809075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d67f19487d62a6985cb548f23e50a5fb3e675af' => 
    array (
      0 => 'app/view/templates/Noticias/incluir.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19080416335050de217c1237-78809075',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'altura_crop' => 0,
    'largura_crop' => 0,
    'CONTROLLER_DADOS' => 0,
    'textos_layout' => 0,
    'idiomas' => 0,
    'idioma' => 0,
    'data_hora_atual' => 0,
    'data_hora_termino' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5050de21bc5eb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5050de21bc5eb')) {function content_5050de21bc5eb($_smarty_tpl) {?>  <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/imagem1.js"></script>
<script type="text/javascript">
var image_handling_file  = "<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/imagem";
var url_padrao = "<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
";

var altura_crop = '<?php echo $_smarty_tpl->tpl_vars['altura_crop']->value;?>
';
var largura_crop = '<?php echo $_smarty_tpl->tpl_vars['largura_crop']->value;?>
';

</script>

<header>
<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
<nav>
<ul class="tab-switch">
	<li><a
		onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias');"
		href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</a>
	</li>
	<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
	<li><a class="default-tab"
		onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir');"
		href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a>
	</li>
	<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
</ul>
</nav> </header>

<div class="tab default-tab" id="tab0">
	<form name="frm_conteudo" id="frm_conteudo" method="post" enctype="multipart/form-data" action='<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir'>
	<!--   <form name="frm_conteudo" id="frm_conteudo" method="post" enctype="multipart/form-data" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir', 'frm_conteudo', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar')"> -->
		<?php  $_smarty_tpl->tpl_vars['idioma'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['idioma']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['idiomas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['idi']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['idioma']->key => $_smarty_tpl->tpl_vars['idioma']->value){
$_smarty_tpl->tpl_vars['idioma']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['idi']['iteration']++;
?>
		<fieldset>
			<legend>
				<strong><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_idioma'];?>
</strong>
			</legend>
			<fieldset>
				<legend>Dados de publica&ccedil;&atilde;o</legend>
				<dl>
					<dt>
						<label>Publicado</label>
					</dt>
					<dd>
						<input type="radio"
							name="cod_publicado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							id="radio" value="1" checked="checked" /> Sim
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
							name="cod_publicado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							id="radio2" value="0" /> N&atilde;o <span
							id="msg_cod_publicado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></span>
						<p>
							Ao escolher "sim", o conte&uacute;do que est&aacute; sendo
							inclu&iacute;do passa a aparecer no website depois de salvo.<br />
							Ao escolher "n&atilde;o", o conte&uacute;do &eacute; salvo,
							por&eacute;m segue sem aparecer no website.
						</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>Data de In&iacute;cio da Publica&ccedil;&atilde;o</label>
					</dt>

					<dd>
						<input type="text"
							name="dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							id="dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							class="datepicker small" maxlength="19"
							value="<?php echo $_smarty_tpl->tpl_vars['data_hora_atual']->value;?>
"
							onKeyPress="DataHoraMinutoSegundo(event, this)" /> <span
							id="msg_dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></span>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
						<p>Marque a data e hora na qual voc&ecirc; quer que este
							conte&uacute;do passe a aparecer no website.</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</label>
					</dt>

					<dd>
						<input type="text"
							name="dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							id="dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							class="datepicker small" maxlength="19"
							value="<?php echo $_smarty_tpl->tpl_vars['data_hora_termino']->value;?>
"
							onKeyPress="DataHoraMinutoSegundo(event, this)" /> <span
							id="msg_dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></span>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
						<p>Marque a data e hora na qual voc&ecirc; quer que este
							conte&uacute;do deixe aparecer no website.</p>
					</dd>
				</dl>
			</fieldset>

			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Data</label>
					</dt>

					<dd>
						<input type="text"
							name="dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							id="dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							class="datepicker small" /> <span
							id="msg_dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></span>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						<p>Formato correto: dd/mm/aaaa.</p>
						<p>Esta &eacute; a data que aparece junto ao conte&uacute;do no
							website.</p>
					</dd>
				</dl>
				
				<dl>
					<dt>
						<label>Imagem</label>
					</dt>
					<dd>
						<!--  COMEÇO DO HTML DO PLUGIN -->
						
						<input type="text" name="nome_img<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" value="" id="nome_img<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" /> 
						<input type="text" name="nome_img_cropada<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" value="" id="nome_img_cropada<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" /> 
						<div id="upload_status<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
						<p>
							<a id="upload_link<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" style="font-size: 32px; color: black;" href="#">Imagem </a>
						</p>
						<span id="loader<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" style="display: none;">
							<img src="loader.gif" alt="Carregando..." />
						</span>
						<span id="progress<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></span> <br />
						<div id="uploaded_image<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></div>
						<div id="thumbnail_form<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" style="display: none;">
								<input type="hidden" name="x1" value="" id="x1<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
								<input type="hidden" name="y1" value="" id="y1<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
								<input type="hidden" name="x2" value="" id="x2<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
								<input type="hidden" name="y2" value="" id="y2<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
								<input type="hidden" name="w" value="" id="w<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
								<input type="hidden" name="h" value="" id="h<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
								<input type="hidden" name="flag<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="flag<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="inclusao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
">
								<input type="button"  name="save_thumb<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" value="Save Thumbnail" id="save_thumb<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" onclick="acao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
() ;"/>
								
						</div>

							<!--  FIM DO HTML DO PLUGIN -->


						<p>Tamanho recomendado de imagem: 200px de largura e altura
							proporcional ao original do arquivo.</p>
						<p>Tamanho m&aacute;ximo recomendado de arquivo: 200kb.</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>T&iacute;tulo</label>
					</dt>

					<dd>
						<input type="text"
							name="txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							id="txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							maxlength="255" class="medium" /> <span
							id="msg_txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></span>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					</dd>
				</dl>
				<dl>
					<dt>
						<label>Texto</label>
					</dt>

					<dd>
						<textarea
							name="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							id="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
							class="wysiwyg large"></textarea>
						<span id="msg_txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></span>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					</dd>
				</dl>
				<input type="hidden"
					name="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
					id="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"
					value="<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
">
			</fieldset>
		</fieldset>
		<?php } ?>


		<button type="submit" id="btn_enviar" class="gray" />
		<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>

		</button>
		&nbsp;ou&nbsp; <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias" />Cancelar</a>
	</form>

</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>