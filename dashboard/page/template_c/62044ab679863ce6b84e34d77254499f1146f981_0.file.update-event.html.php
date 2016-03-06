<?php
/* Smarty version 3.1.29, created on 2016-02-20 04:51:57
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/any/update-event.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c7e2ddaf44d1_54202726',
  'file_dependency' => 
  array (
    '62044ab679863ce6b84e34d77254499f1146f981' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/any/update-event.html',
      1 => 1455940141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c7e2ddaf44d1_54202726 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/XAMPP/xamppfiles/htdocs/smarty/libs/plugins/modifier.date_format.php';
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <link rel="stylesheet" href="<?php echo fileversion('resources/css/vendor/daterangepicker-bs3.css');?>
">
  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


  <section class="content-header">
    <h1>
      Modificar evento
      <small>formulario para crear usuarios</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Evento</a></li>
      <li class="active">Modificar evento</li>
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
            <h3 class="box-title">Complete los datos para modificar un evento</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-events" data-action="update">
            <div class="box-body">
            <div class="row">

               <div class="col-md-6">

                  <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Digite el el asunto" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['asunto'];?>
">
                  </div>
                  <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea type="text" class="form-control" name="description" id="description" placeholder="Digite la descripción"><?php echo $_smarty_tpl->tpl_vars['event']->value['descripcion'];?>
</textarea>
                  </div>

                    </div>
                    <div class="col-md-6">

                    <div class="form-group">
                      <label>Fecha evento:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input disabled type="text" class="form-control pull-right" id="dateevent" name="dateevent" value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['fechaInicio'],"%G/%m/%d");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['fechaFin'],"%G/%m/%d");?>
'>
                      </div>
                    </div>

                  <?php if ($_smarty_tpl->tpl_vars['event']->value['publicado'] === "No") {?>

                    <div class="form-group">
                      <label for="datepublication">Fecha publicación:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input disabled type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Digite la fecha" data-mask name="datepublication" id="datepublication" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['fechaPublicacion'];?>
">
                      </div>
                    </div>

                  <?php } else { ?>

                    <div class="form-group checkbox">
                      <label>
                          <input id="publishnow" name="publishnow" type="checkbox" value="Si"checked disabled> Publicar ahora mismo
                      </label>
                    </div>

                  <?php }?>

                    </div>

              </div>

            </div><!-- /.box-body -->
            <input type="hidden" name="event" id="event" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['idEvento'];?>
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
 src="<?php echo fileversion('resources/js/vendor/select2.js');?>
"><?php echo '</script'; ?>
>
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
 src="<?php echo fileversion('resources/js/vendor/moment.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/daterangepicker.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/event.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
