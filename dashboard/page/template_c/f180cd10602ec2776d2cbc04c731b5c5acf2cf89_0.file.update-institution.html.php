<?php
/* Smarty version 3.1.29, created on 2016-02-19 01:25:17
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/app/update-institution.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c660ed1dd6f8_50826233',
  'file_dependency' => 
  array (
    'f180cd10602ec2776d2cbc04c731b5c5acf2cf89' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/app/update-institution.html',
      1 => 1455841514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c660ed1dd6f8_50826233 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


  <section class="content-header">
    <h1>
      Editar institución
      <small>formulario para editar instituciones</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Instituciónes</a></li>
      <li class="active">Editar institución</li>
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
            <h3 class="box-title">Complete los datos para editar la institución</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-institution" data-action="update">
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="institutionType">Tipo institución</label>
                      <select class="form-control select2" name="institutionType" id="institutionType" data-placeholder="Seleecione el tipo" style="width: 100%;">
                        <option></option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['institutionsTypes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_institutionType_0_saved_item = isset($_smarty_tpl->tpl_vars['institutionType']) ? $_smarty_tpl->tpl_vars['institutionType'] : false;
$_smarty_tpl->tpl_vars['institutionType'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['institutionType']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['institutionType']->value) {
$_smarty_tpl->tpl_vars['institutionType']->_loop = true;
$__foreach_institutionType_0_saved_local_item = $_smarty_tpl->tpl_vars['institutionType'];
?>
                          <?php if (!($_smarty_tpl->tpl_vars['institution']->value['idTipoInstitucion'] === $_smarty_tpl->tpl_vars['institutionType']->value->idTipoInstitucion)) {?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['institutionType']->value->idTipoInstitucion;?>
"><?php echo $_smarty_tpl->tpl_vars['institutionType']->value->tipoInstitucion;?>
</option>
                          <?php } else { ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['institutionType']->value->idTipoInstitucion;?>
" selected><?php echo $_smarty_tpl->tpl_vars['institutionType']->value->tipoInstitucion;?>
</option>
                          <?php }?>

                        <?php
$_smarty_tpl->tpl_vars['institutionType'] = $__foreach_institutionType_0_saved_local_item;
}
if ($__foreach_institutionType_0_saved_item) {
$_smarty_tpl->tpl_vars['institutionType'] = $__foreach_institutionType_0_saved_item;
}
?>
                      </select>
                    </div>


              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite el nombre de la institución" value="<?php echo $_smarty_tpl->tpl_vars['institution']->value['institucion'];?>
">
              </div>
              <div class="form-group">
                <label for="email">Correo</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Digite el correo de la institución" value="<?php echo $_smarty_tpl->tpl_vars['institution']->value['correo'];?>
">
              </div>
              <div class="form-group">
                <label for="address">Dirección</label>
                <input type="address" class="form-control" name="address" id="address" placeholder="Digite la dirección de la institución" value="<?php echo $_smarty_tpl->tpl_vars['institution']->value['direccion'];?>
">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="smartphone">Celular</label>
                <input type="smartphone" class="form-control" name="smartphone" id="smartphone" placeholder="Digite el celular de la institución" value="<?php echo $_smarty_tpl->tpl_vars['institution']->value['celular'];?>
">
              </div>
              <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="phone" class="form-control" name="phone" id="phone" placeholder="Digite el telefono de la institución" value="<?php echo $_smarty_tpl->tpl_vars['institution']->value['telefono'];?>
">
              </div>
              <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo">
                <p class="help-block">Logo de la institución.</p>
              </div>
              <div class="checkbox">
                <label>
                  <?php if ($_smarty_tpl->tpl_vars['institution']->value['activo'] == "Si") {?>
                    <input id="active" name="active" type="checkbox" value="Si" checked> Activar
                  <?php } else { ?>
                    <input id="active" name="active" type="checkbox" value="Si"> Activar
                  <?php }?>
                </label>
              </div>
              </div>
              </div>
            </div><!-- /.box-body -->
            <input type="hidden" name="institution" value="<?php echo $_smarty_tpl->tpl_vars['institution']->value['idInstitucion'];?>
">
            <div class="box-footer">
              <button type="button" class="btn btn-primary" data-action="update">Enviar</button>
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
 src="<?php echo fileversion('resources/js/profile/institution.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php }
}
