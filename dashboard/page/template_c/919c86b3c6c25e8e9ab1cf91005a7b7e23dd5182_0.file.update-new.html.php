<?php
/* Smarty version 3.1.29, created on 2016-02-01 07:57:07
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/any/update-new.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56af01c301de13_78823409',
  'file_dependency' => 
  array (
    '919c86b3c6c25e8e9ab1cf91005a7b7e23dd5182' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/any/update-new.html',
      1 => 1454309823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56af01c301de13_78823409 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/XAMPP/xamppfiles/htdocs/smarty/libs/plugins/modifier.date_format.php';
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


  <section class="content-header">
    <h1>
      Modificar noticia
      <small>formulario para crear usuarios</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Noticia</a></li>
      <li class="active">Modificar noticia</li>
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
            <h3 class="box-title">Complete los datos para modificar una noticia</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-news" data-action="create">
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">

                  <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Digite el el asunto" value="<?php echo $_smarty_tpl->tpl_vars['new']->value['asunto'];?>
">
                  </div>
                  <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea type="text" class="form-control" name="description" id="description" placeholder="Digite la descripción"><?php echo $_smarty_tpl->tpl_vars['new']->value['descripcion'];?>
</textarea>
                  </div>

              </div>
              <div class="col-md-6">

                <?php if (smarty_modifier_date_format(time(),"%y/%m/%d") > $_smarty_tpl->tpl_vars['new']->value['fechaPublicacion']) {?>

                  <div class="form-group">
                    <label for="datepublication">Fecha publicación:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Digite la fecha" data-mask name="datepublication" id="datepublication" value="<?php echo $_smarty_tpl->tpl_vars['new']->value['fechaPublicacion'];?>
">
                    </div>
                  </div>

                <?php }?>

                  <div class="form-group">
                    <label for="video">Url video</label>
                    <input type="text" class="form-control" name="video" id="video" placeholder="Digite la url" value="<?php echo $_smarty_tpl->tpl_vars['new']->value['media'];?>
">
                  </div>

                  <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" id="image">
                    <p class="help-block">Imagen de la noticia.</p>
                  </div>

              </div>

            </div><!-- /.box-body -->
            <input type="hidden" name="institute" id="institute" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['idInstitucion'];?>
">
            <div class="box-footer">
              <button type="button" class="btn btn-primary">Enviar</button>
            </div>
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
 src="<?php echo fileversion('resources/js/vendor/jquery-inputmask.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery-inputmask-date-extensions.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery-inputmask-extensions.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/select2.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/new.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
