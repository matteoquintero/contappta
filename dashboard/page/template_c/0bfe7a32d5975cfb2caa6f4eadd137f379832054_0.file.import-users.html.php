<?php
/* Smarty version 3.1.29, created on 2016-03-28 22:42:44
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/import-users.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f9f9b489d564_23253647',
  'file_dependency' => 
  array (
    '0bfe7a32d5975cfb2caa6f4eadd137f379832054' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/import-users.html',
      1 => 1459222910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f9f9b489d564_23253647 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <section class="content-header">
    <h1>
      Importar usuarios
      <small>formulario para crear usuarios</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Usuarios</a></li>
      <li class="active">Importar usuarios</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Descargue el formato para importar los usuarios</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form target="_blank" enctype="multipart/form-data" action="<?php echo @constant('BASE');?>
application/controller/import.php" role="form" method="post" autocomplete="off" id="form-import-users" data-action="import">
            <div class="box-body">

              <div class="form-group">
                <label for="users">Usuarios</label>
                <input type="file" name="users" id="users">
                <p class="help-block">Archivo de los usuarios.</p>
              </div>

            </div><!-- /.box-body -->
            <input type="hidden" name="institute" id="institute" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['idInstitucion'];?>
">
            <input type="hidden" name="videoid" id="videoid" >
            <div class="box-footer">
              <button type="button" class="btn btn-primary" id="import">Importar usuarios</button>
              <button type="button" class="btn btn-primary" id="download">Descagar formato</button>
            </div>
          </form>
          <form action="<?php echo @constant('BASE');?>
application/controller/download.php" method="post" id="form-download" class="hide" target="_blank" enctype="multipart/form-data">
              <input name="ruta" value="_data/formats/formato.xls">
              <input name="nombre" value="formato.xlsx">
            </form>

        </div><!-- /.box -->
      </div><!--/.col (left) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/footer.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/scripts.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/import.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
