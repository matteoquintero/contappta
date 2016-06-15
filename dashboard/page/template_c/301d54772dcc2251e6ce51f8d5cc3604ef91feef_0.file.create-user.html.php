<?php
/* Smarty version 3.1.29, created on 2016-03-19 01:28:06
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/app/create-user.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ecf1765bf900_65979970',
  'file_dependency' => 
  array (
    '301d54772dcc2251e6ce51f8d5cc3604ef91feef' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/app/create-user.html',
      1 => 1458367900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ecf1765bf900_65979970 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


  <section class="content-header">
    <h1>
      Crear usuario
      <small>formulario para crear usuarios</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Usuarios</a></li>
      <li class="active">Crear usuario</li>
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
            <h3 class="box-title">Complete los datos para crear una usuario</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-user" data-action="create">
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                                  <div class="form-group">
                  <label for="institute">Institución</label>
                  <select class="form-control select2" name="institute" id="institute" data-placeholder="Seleecione la institution" style="width: 100%;">
                    <option></option>
                    <?php
$_from = $_smarty_tpl->tpl_vars['institutions']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_institute_0_saved_item = isset($_smarty_tpl->tpl_vars['institute']) ? $_smarty_tpl->tpl_vars['institute'] : false;
$_smarty_tpl->tpl_vars['institute'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['institute']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['institute']->value) {
$_smarty_tpl->tpl_vars['institute']->_loop = true;
$__foreach_institute_0_saved_local_item = $_smarty_tpl->tpl_vars['institute'];
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['institute']->value->idInstitucion;?>
"><?php echo $_smarty_tpl->tpl_vars['institute']->value->institucion;?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['institute'] = $__foreach_institute_0_saved_local_item;
}
if ($__foreach_institute_0_saved_item) {
$_smarty_tpl->tpl_vars['institute'] = $__foreach_institute_0_saved_item;
}
?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Digite el el usuario">
                  </div>
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Digite el nombre del usuario">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Digite el apellido del usuario">
                  </div>
                  <div class="form-group">
                    <label for="document">Documento</label>
                    <input type="text" class="form-control" name="document" id="document" placeholder="Digite el documento del usuario">
                  </div>

                  <div class="form-group">
                    <label for="photo">Foto</label>
                    <input type="file" name="photo" id="photo">
                    <p class="help-block">Foto del usuario.</p>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite el correo del usuario">
                  </div>
                 <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Digite la contraseña del usuario">
                  </div>
                  <div class="form-group">
                    <label for="smartphone">Celular</label>
                    <input type="text" class="form-control" name="smartphone" id="smartphone" placeholder="Digite el celular del usuario">
                  </div>
                  <div class="form-group">
                  <label for="role">Rol</label>
                  <select class="form-control select2" name="role" id="role" data-placeholder="Seleecione el rol" style="width: 100%;">
                    <option></option>
                    <?php
$_from = $_smarty_tpl->tpl_vars['roles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_role_1_saved_item = isset($_smarty_tpl->tpl_vars['role']) ? $_smarty_tpl->tpl_vars['role'] : false;
$_smarty_tpl->tpl_vars['role'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['role']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
$__foreach_role_1_saved_local_item = $_smarty_tpl->tpl_vars['role'];
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value->idRol;?>
"><?php echo $_smarty_tpl->tpl_vars['role']->value->rol;?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['role'] = $__foreach_role_1_saved_local_item;
}
if ($__foreach_role_1_saved_item) {
$_smarty_tpl->tpl_vars['role'] = $__foreach_role_1_saved_item;
}
?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="permission">Permisos</label>
                    <select class="form-control select2" id="permission" name="permission" style="width: 100%;" data-placeholder="Seleecione el permiso">
                      <option></option>
                      <option value="app">Administrador app</option>
                      <option value="institution">Administrador institución</option>
                      <option value="any">Ninguno</option>
                      <option value="user">Acudientes o alumnos</option>
                    </select>
                  </div>
              </div>
            </div><!-- /.box-body -->
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
 src="<?php echo fileversion('resources/js/profile/user.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php }
}
