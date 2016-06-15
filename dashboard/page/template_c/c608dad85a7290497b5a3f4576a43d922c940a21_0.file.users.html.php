<?php
/* Smarty version 3.1.29, created on 2016-04-23 19:43:35
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/users.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_571c16b7cedc44_59795492',
  'file_dependency' => 
  array (
    'c608dad85a7290497b5a3f4576a43d922c940a21' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/users.html',
      1 => 1461458614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_571c16b7cedc44_59795492 ($_smarty_tpl) {
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
      Ver usuarios
      <small>Listado de las usuarios</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Usuario</a></li>
      <li class="active">Ver usuarios</li>
    </ol>
  </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de los usuarios</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="data" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_0_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_0_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->usuario;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->nombre;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->apellido;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->rol;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->celular;?>
</td>
                        <td>
                          <button class="btn btn-primary btn-edit" data-user="<?php echo $_smarty_tpl->tpl_vars['user']->value->idUsuario;?>
">Editar</button>
                          <?php if ($_smarty_tpl->tpl_vars['user']->value->acudientes != '') {?>
                          <button class="btn btn-primary btn-guardians" data-user="<?php echo $_smarty_tpl->tpl_vars['user']->value->idUsuario;?>
">Acudientes</button>
                          <?php }?>

                          <?php if ($_smarty_tpl->tpl_vars['user']->value->idRol == "5" || $_smarty_tpl->tpl_vars['user']->value->idRol == "6") {?>
                          <button class="btn btn-primary btn-recognitions" data-user="<?php echo $_smarty_tpl->tpl_vars['user']->value->idUsuario;?>
">Reconocimientos</button>
                          <?php }?>

                          <button class="btn btn-primary btn-clear" data-user="<?php echo $_smarty_tpl->tpl_vars['user']->value->idUsuario;?>
">Eliminar</button>
                        </td>
                      </tr>
                      <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_local_item;
}
if ($__foreach_user_0_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_item;
}
?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Celular</th>
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
modificar-usuario" method="post" id="form-edit">
            <input type="hidden" name="idUsuario">
        </form>

        <form action="<?php echo @constant('BASE');?>
acudientes-usuario" method="post" id="form-guardians">
            <input type="hidden" name="idUsuario">
        </form>

        <form action="<?php echo @constant('BASE');?>
reconocimientos-usuario" method="post" id="form-recognitions">
            <input type="hidden" name="idUsuario">
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
 src="<?php echo fileversion('resources/js/profile/users.js');?>
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
