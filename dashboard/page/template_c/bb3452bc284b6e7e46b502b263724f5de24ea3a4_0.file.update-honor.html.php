<?php
/* Smarty version 3.1.29, created on 2016-02-16 02:32:57
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/update-honor.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c27c49417776_51724685',
  'file_dependency' => 
  array (
    'bb3452bc284b6e7e46b502b263724f5de24ea3a4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/update-honor.html',
      1 => 1455586076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c27c49417776_51724685 ($_smarty_tpl) {
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
      Modificar reconocimiento
      <small>formulario para crear reconocimientos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Reconocimientos</a></li>
      <li class="active">Modificar reconocimiento</li>
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
            <h3 class="box-title">Complete los datos para crear un reconocimiento</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-honors" data-action="update">
            <div class="box-body">
              <div class="row">
                  <div class="col-md-12">

                    <div class="form-group">
                      <label for="namehonor">Nombre reconocimiento</label>
                      <input type="text" class="form-control" name="namehonor" id="namehonor" placeholder="Digite el nombre del reconocimiento" value="<?php echo $_smarty_tpl->tpl_vars['honor']->value['reconocimiento'];?>
">
                    </div>

                    <div class="form-group">
                      <label for="typeHonor">Tipo reconocimiento</label>
                      <select class="form-control select2" name="typeHonor" id="typeHonor" data-placeholder="Seleecione el tipo" style="width: 100%;">
                        <option></option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['typesHonors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_typeHonor_0_saved_item = isset($_smarty_tpl->tpl_vars['typeHonor']) ? $_smarty_tpl->tpl_vars['typeHonor'] : false;
$_smarty_tpl->tpl_vars['typeHonor'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['typeHonor']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['typeHonor']->value) {
$_smarty_tpl->tpl_vars['typeHonor']->_loop = true;
$__foreach_typeHonor_0_saved_local_item = $_smarty_tpl->tpl_vars['typeHonor'];
?>
                          <?php if (!($_smarty_tpl->tpl_vars['honor']->value['idTipoReconocimiento'] === $_smarty_tpl->tpl_vars['typeHonor']->value->idTipoReconocimiento)) {?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['typeHonor']->value->idTipoReconocimiento;?>
"><?php echo $_smarty_tpl->tpl_vars['typeHonor']->value->tipoReconocimiento;?>
</option>
                          <?php } else { ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['typeHonor']->value->idTipoReconocimiento;?>
" selected><?php echo $_smarty_tpl->tpl_vars['typeHonor']->value->tipoReconocimiento;?>
</option>
                          <?php }?>

                        <?php
$_smarty_tpl->tpl_vars['typeHonor'] = $__foreach_typeHonor_0_saved_local_item;
}
if ($__foreach_typeHonor_0_saved_item) {
$_smarty_tpl->tpl_vars['typeHonor'] = $__foreach_typeHonor_0_saved_item;
}
?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="description">Descripción</label>
                      <textarea type="text" class="form-control" name="description" id="description" placeholder="Digite la descripción" ><?php echo $_smarty_tpl->tpl_vars['honor']->value['descripcion'];?>
</textarea>
                    </div>

                  </div>

              </div>
            </div><!-- /.box-body -->
            <input type="hidden" name="institute" id="institute" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['idInstitucion'];?>
">
            <input type="hidden" name="honor" id="honor" value="<?php echo $_smarty_tpl->tpl_vars['honor']->value['idReconocimiento'];?>
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
 src="<?php echo fileversion('resources/js/profile/honor.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
