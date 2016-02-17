<?php
/* Smarty version 3.1.29, created on 2016-02-16 03:28:22
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/create-magazine.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c28946aa8e57_70429943',
  'file_dependency' => 
  array (
    'b0d30af5cb427df06fea9240d9fb5997d7fb52e3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/create-magazine.html',
      1 => 1455589692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c28946aa8e57_70429943 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <section class="content-header">
    <h1>
      Crear revista
      <small>formulario para crear revistas</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Revistas</a></li>
      <li class="active">Crear revista</li>
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
            <h3 class="box-title">Complete los datos para crear un revista</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-magazines" data-action="create">
            <div class="box-body">
              <div class="row">
                  <div class="col-md-12">

                    <div class="form-group">
                      <label for="namemagazine">Revista</label>
                      <input type="text" class="form-control" name="namemagazine" id="namemagazine" placeholder="Digite el nombre de la revista">
                    </div>

                    <div class="form-group">
                      <label for="description">Descripción</label>
                      <textarea type="text" class="form-control" name="description" id="description" placeholder="Digite la descripción"></textarea>
                    </div>

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
 src="<?php echo fileversion('resources/js/profile/magazine.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
