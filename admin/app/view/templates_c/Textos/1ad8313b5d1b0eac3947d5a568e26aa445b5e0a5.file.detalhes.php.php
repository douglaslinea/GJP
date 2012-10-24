<?php /* Smarty version Smarty-3.1.1, created on 2012-07-09 14:09:30
         compiled from "app/view/templates/Textos/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:3310544164ffb104a465f72-09499506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ad8313b5d1b0eac3947d5a568e26aa445b5e0a5' => 
    array (
      0 => 'app/view/templates/Textos/detalhes.php',
      1 => 1341853764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3310544164ffb104a465f72-09499506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'dados_texto' => 0,
    'textos_layout' => 0,
    'texto_nao_encontrado' => 0,
    'dados' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_4ffb104a5908c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ffb104a5908c')) {function content_4ffb104a5908c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<article class="full-block clearfix">
		<div class="article-container">
			<header>
				<h2>Textos</h2>
				<nav>
					<ul class="tab-switch">
						<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos');" href="" rel="tooltip" title="Listar">Listar</a></li>
						<li><a class="default-tab" href="#" rel="tooltip" title="Ver detalhes">Ver detalhes</a></li>
						<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar/id_rel_idioma/<?php echo $_smarty_tpl->tpl_vars['dados_texto']->value['cod_texto'];?>
');" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
                     </ul>
				</nav>
			</header>

			<div class="tab default-tab" id="tab0">
				<?php if (!isset($_smarty_tpl->tpl_vars['texto_nao_encontrado']->value)){?>
                
					<?php  $_smarty_tpl->tpl_vars['dados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_texto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->key => $_smarty_tpl->tpl_vars['dados']->value){
$_smarty_tpl->tpl_vars['dados']->_loop = true;
?>
                    
                    <fieldset>
                    	<legend><?php echo $_smarty_tpl->tpl_vars['dados']->value['WebsiteIdiomas']['txt_idioma'];?>
</legend>
						<table>
							<tr>
								<td class="detalhes">
									<strong>T&iacute;tulo</strong><br />
	                            	<h3><?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_titulo'];?>
</h3>
	                            </td>
	                        </tr>
	                        <tr>
	                        	<td class="detalhes">
	                        		<strong>Texto</strong><br />
	                            	<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_texto'];?>

	                            </td>
	                        </tr>
                    </table>
                    </fieldset>
                    <br />

                    <?php } ?>
                    
	                        	<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>&nbsp;&nbsp;&nbsp;
	                            <button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar/id_rel_idioma/<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_texto'];?>
');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
                   
                <?php }else{ ?>
                
                   	<div class="notification error">
                   		<p><strong>Registro n&atilde;o encontrado.</strong> Volte para a lista e acesse um registro v&aacute;lido.</p>
                   	</div>
                   	<br /><br />
                    	
                   	<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
                <?php }?>
            </div>
            
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>