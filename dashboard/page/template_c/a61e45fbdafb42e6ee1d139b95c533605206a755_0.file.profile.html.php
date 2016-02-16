<?php
/* Smarty version 3.1.29, created on 2016-02-13 23:41:43
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/profile.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56bfb1272b8692_77232313',
  'file_dependency' => 
  array (
    'a61e45fbdafb42e6ee1d139b95c533605206a755' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/profile.html',
      1 => 1455403234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56bfb1272b8692_77232313 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


  <section class="content-header">
    <h1>
      Perfil de usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo @constant('BASE');?>
"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Perfil</li>
    </ol>
  </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo @constant('BASE');
echo $_smarty_tpl->tpl_vars['userdata']->value['foto'];?>
" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $_smarty_tpl->tpl_vars['userdata']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['userdata']->value['apellido'];?>
</h3>
                  <p class="text-muted text-center"><?php echo $_smarty_tpl->tpl_vars['userdata']->value['institucion'];?>
</p>
                  <p class="text-muted text-center"><?php echo $_smarty_tpl->tpl_vars['userdata']->value['usuario'];?>
</p>
                  <p class="text-muted text-center"><?php echo $_smarty_tpl->tpl_vars['userdata']->value['rol'];?>
</p>
                  <p class="text-muted text-center"><?php echo $_smarty_tpl->tpl_vars['userdata']->value['correo'];?>
</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
            <div class="col-md-9">

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Complete los datos de su perifl</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" autocomplete="off" id="form-user" data-action="update">
                  <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Digite el nombre del usuario" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['nombre'];?>
">
                        </div>
                        <div class="form-group">
                          <label for="lastname">Apellido</label>
                          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Digite el apellido del usuario" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['apellido'];?>
">
                        </div>
                        <div class="form-group">
                          <label for="document">Documento</label>
                          <input type="text" class="form-control" name="document" id="document" placeholder="Digite el documento del usuario" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['documento'];?>
">
                        </div>
                        <div class="form-group">
                          <label for="photo">Foto</label>
                          <input type="file" name="photo" id="photo">
                          <p class="help-block">Foto del usuario.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="smartphone">Celular</label>
                          <input type="text" class="form-control" name="smartphone" id="smartphone" placeholder="Digite el celular del usuario" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['celular'];?>
">
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
$__foreach_role_0_saved_item = isset($_smarty_tpl->tpl_vars['role']) ? $_smarty_tpl->tpl_vars['role'] : false;
$_smarty_tpl->tpl_vars['role'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['role']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
$__foreach_role_0_saved_local_item = $_smarty_tpl->tpl_vars['role'];
?>
                            <?php if (!($_smarty_tpl->tpl_vars['userdata']->value['idRol'] === $_smarty_tpl->tpl_vars['role']->value->idRol)) {?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value->idRol;?>
"><?php echo $_smarty_tpl->tpl_vars['role']->value->rol;?>
</option>
                            <?php } else { ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value->idRol;?>
" selected><?php echo $_smarty_tpl->tpl_vars['role']->value->rol;?>
</option>
                            <?php }?>
                          <?php
$_smarty_tpl->tpl_vars['role'] = $__foreach_role_0_saved_local_item;
}
if ($__foreach_role_0_saved_item) {
$_smarty_tpl->tpl_vars['role'] = $__foreach_role_0_saved_item;
}
?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="group">Grupo</label>
                        <select class="form-control select2" id="group" name="group" style="width: 100%;" data-placeholder="Seleecione grupo">
                          <option></option>
                          <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_1_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_1_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                            <?php if (!($_smarty_tpl->tpl_vars['userdata']->value['idGrupo'] === $_smarty_tpl->tpl_vars['group']->value->idGrupo)) {?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->idGrupo;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->grado;?>
-<?php echo $_smarty_tpl->tpl_vars['group']->value->identificador;?>
</option>
                            <?php } else { ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->idGrupo;?>
" selected><?php echo $_smarty_tpl->tpl_vars['group']->value->grado;?>
-<?php echo $_smarty_tpl->tpl_vars['group']->value->identificador;?>
</option>
                            <?php }?>
                          <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_1_saved_local_item;
}
if ($__foreach_group_1_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_1_saved_item;
}
?>
                        </select>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['idUsuario'];?>
" name="user">
                  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['usuario'];?>
" name="namephoto">
                  <div class="box-footer">
                    <button type="button" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-primary">Modificar contraseña</button>
                    <button type="button" class="btn btn-primary">Modificar usuario</button>
                    <button type="button" class="btn btn-primary">Modificar correo</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
  </section>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/footer.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/scripts.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/placeholders.js');?>
"><?php echo '</script'; ?>
>
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
