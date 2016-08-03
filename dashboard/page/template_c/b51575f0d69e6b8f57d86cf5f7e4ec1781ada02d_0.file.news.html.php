<?php
/* Smarty version 3.1.29, created on 2016-07-30 16:09:35
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/institution/news.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579d178f173480_25392547',
  'file_dependency' => 
  array (
    'b51575f0d69e6b8f57d86cf5f7e4ec1781ada02d' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/institution/news.html',
      1 => 1460915653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579d178f173480_25392547 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <link rel="stylesheet" href="<?php echo fileversion('resources/css/vendor/datatables-bootstrap.css');?>
">
  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


  <section class="content-header">
    <h1>
      Ver noticias
      <small>Listado de las noticias</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Noticia</a></li>
      <li class="active">Ver noticias</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listado de las noticias</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Asunto</th>
                  <th>Aprobada</th>
                  <th>Fecha publicación</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_new_0_saved_item = isset($_smarty_tpl->tpl_vars['new']) ? $_smarty_tpl->tpl_vars['new'] : false;
$_smarty_tpl->tpl_vars['new'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['new']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['new']->value) {
$_smarty_tpl->tpl_vars['new']->_loop = true;
$__foreach_new_0_saved_local_item = $_smarty_tpl->tpl_vars['new'];
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['new']->value->asunto;?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['new']->value->aprobada;?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['new']->value->fechaPublicacion;?>
</td>
                  <td>
                    <button class="btn btn-primary btn-edit" data-new="<?php echo $_smarty_tpl->tpl_vars['new']->value->idNoticia;?>
">Editar</button>
                    <button class="btn btn-primary btn-sender" data-new="<?php echo $_smarty_tpl->tpl_vars['new']->value->idNoticia;?>
">Receptores</button>
                    <button class="btn btn-primary btn-answer" data-new="<?php echo $_smarty_tpl->tpl_vars['new']->value->idNoticia;?>
">Respuestas</button>
                    <button class="btn btn-primary btn-clear" data-new="<?php echo $_smarty_tpl->tpl_vars['new']->value->idNoticia;?>
">Eliminar</button>
                  </td>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['new'] = $__foreach_new_0_saved_local_item;
}
if ($__foreach_new_0_saved_item) {
$_smarty_tpl->tpl_vars['new'] = $__foreach_new_0_saved_item;
}
?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Asunto</th>
                  <th>Aprobada</th>
                  <th>Fecha publicación</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
  <form action="<?php echo @constant('BASE');?>
modificar-noticia" method="post" id="form-edit">
      <input type="hidden" name="idNoticia">
  </form>
  <form action="<?php echo @constant('BASE');?>
receptores-noticia" method="post" id="form-sender">
      <input type="hidden" name="idNoticia">
  </form>
  <form action="<?php echo @constant('BASE');?>
respuestas-noticia" method="post" id="form-answer">
      <input type="hidden" name="idNoticia">
  </form>


  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/footer.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/scripts.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery-datatables.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/datatables-bootstrap.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery-slimscroll.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/news.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/data.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>




<?php }
}
