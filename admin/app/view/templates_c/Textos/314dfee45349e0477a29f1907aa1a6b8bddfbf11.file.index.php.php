<?php /* Smarty version Smarty-3.1.1, created on 2012-09-26 11:29:13
         compiled from "app/view/templates/Textos/index.php" */ ?>
<?php /*%%SmartyHeaderCode:56259024506311396e0643-64198490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '314dfee45349e0477a29f1907aa1a6b8bddfbf11' => 
    array (
      0 => 'app/view/templates/Textos/index.php',
      1 => 1345738649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56259024506311396e0643-64198490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'dados_textos' => 0,
    'params' => 0,
    'texto' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_506311397f7c0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506311397f7c0')) {function content_506311397f7c0($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<article class="full-block clearfix">
		
			<div class="article-container">

				<header>
					<h2>Textos</h2>

					<nav>
						<ul class="tab-switch">
							<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos');" href="" rel="tooltip" title="Listar">Listar</a></li>
							<li class="inativo">Ver Detalhes</li>                            
                            <li class="inativo">Editar registro</li>
						</ul>
					</nav>

				</header>


				<div class="tab default-tab" id="tab0">

				<?php if ($_smarty_tpl->tpl_vars['dados_textos']->value!==false){?>
                
                    <?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])){?>
                    
                    <div class="notification success">
                    <a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
                    <p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
                    </div>
                    
                    <?php }?>  
                    
                    <table class="datatable">
                    
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Idioma</th>
                            <th width="75%">Texto</th>                                
                            <th width="10%">&nbsp;</th>
                      </tr>
                    </thead>
                        <tbody>
                          <?php  $_smarty_tpl->tpl_vars['texto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['texto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_textos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['texto']->key => $_smarty_tpl->tpl_vars['texto']->value){
$_smarty_tpl->tpl_vars['texto']->_loop = true;
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['texto']->value['cod_texto'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['texto']->value['WebsiteIdiomas']['txt_idioma'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['texto']->value['txt_titulo'];?>
</td>
                            <td>
                            <ul class="actions">
                                <li><a class="view" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/detalhes/id_rel_idioma/<?php echo $_smarty_tpl->tpl_vars['texto']->value['cod_texto'];?>
" rel="tooltip" original-title="Ver detalhes">ver</a></li>
	                            <li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar/id_rel_idioma/<?php echo $_smarty_tpl->tpl_vars['texto']->value['cod_texto'];?>
" rel="tooltip" original-title="Editar registro">editar</a></li>
                              </ul>
							</td>
                          </tr>  
                        <?php } ?>
						</tbody>
                        </table>                    
 

            <?php }else{ ?>
                 
                 <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>
	
            
            <?php }?>

			</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>