<?php
/* Smarty version 3.1.29, created on 2016-07-30 19:28:26
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/any/update-new.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579d462ac69c74_68700647',
  'file_dependency' => 
  array (
    '55163c70ea7691408d95e4c4316061c2ebc227b5' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/any/update-new.html',
      1 => 1457060001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579d462ac69c74_68700647 ($_smarty_tpl) {
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
          <form role="form" autocomplete="off" id="form-news" data-action="update">
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

                  <div class="form-group hide">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" id="image">
                    <p class="help-block">Imagen de la noticia.</p>
                  </div>

              </div>
              <div class="col-md-6">


              <?php if ($_smarty_tpl->tpl_vars['new']->value['publicada'] === "No") {?>

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

                  <div class="form-group checkbox">
                    <label>
                      <?php if ($_smarty_tpl->tpl_vars['new']->value['publicada'] == "Si") {?>
                        <input id="publishnow" name="publishnow" type="checkbox" value="Si" checked > Publicar ahora mismo
                      <?php } else { ?>
                        <input id="publishnow" name="publishnow" type="checkbox" value="Si" > Publicar ahora mismo
                      <?php }?>

                    </label>
                  </div>



                <?php } else { ?>

                  <div class="form-group">
                    <label for="datepublication">Fecha publicación:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Digite la fecha" data-mask name="datepublication" id="datepublication" value="<?php echo $_smarty_tpl->tpl_vars['new']->value['fechaPublicacion'];?>
">
                    </div>
                  </div>

                  <div class="form-group checkbox">
                    <label>
                        <input id="publishnow" name="publishnow" type="checkbox" value="Si" checked disabled> Publicar ahora mismo
                    </label>
                  </div>

                <?php }?>



                  <div class="checkbox">
                    <label>
                      <?php if ($_smarty_tpl->tpl_vars['new']->value['respuesta'] == "Si") {?>
                        <input id="answer" name="answer" type="checkbox" value="Si" checked disabled> Con respuesta
                      <?php } else { ?>
                        <input id="answer" name="answer" type="checkbox" value="Si"> Con respuesta
                      <?php }?>
                    </label>
                  </div>

              </div>

            </div><!-- /.box-body -->
            <input type="hidden" name="new" id="new" value="<?php echo $_smarty_tpl->tpl_vars['new']->value['idNoticia'];?>
">
            <div class="box-footer">
              <button type="button" id="btn-update" class="btn btn-primary">Enviar</button>
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
