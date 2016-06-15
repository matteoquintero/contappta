<?php
/* Smarty version 3.1.29, created on 2016-04-23 19:44:06
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/user-recognitions.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_571c16d6bd6c70_77294861',
  'file_dependency' => 
  array (
    '3c77019f4d1ff501bf2029e839c497c135dd8d5b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/user-recognitions.html',
      1 => 1461458643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_571c16d6bd6c70_77294861 ($_smarty_tpl) {
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
      Ver reconocimientos de <?php echo $_smarty_tpl->tpl_vars['user']->value['nombre'];?>

      <small>Listado de los reconocimientos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Usuario</a></li>
      <li class="active"><?php echo $_smarty_tpl->tpl_vars['user']->value['nombre'];?>
</li>
    </ol>
  </section>
        <!-- Main content -->
        <section class="content">
        <div class="box box-primary">


          <form role="form" autocomplete="off" id="form-recognition" >
            <div class="box-body">

                  <div class="form-group">
                    <label for="honor">Reconocimiento</label>
                    <select class="form-control select2" id="honor" name="honor"  style="width: 100%;" data-placeholder="Seleecione reconocimiento">
                      <option></option>
                      <?php
$_from = $_smarty_tpl->tpl_vars['honors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_honor_0_saved_item = isset($_smarty_tpl->tpl_vars['honor']) ? $_smarty_tpl->tpl_vars['honor'] : false;
$_smarty_tpl->tpl_vars['honor'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['honor']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['honor']->value) {
$_smarty_tpl->tpl_vars['honor']->_loop = true;
$__foreach_honor_0_saved_local_item = $_smarty_tpl->tpl_vars['honor'];
?>
                      <?php if (!in_array($_smarty_tpl->tpl_vars['honor']->value->idReconocimiento,$_smarty_tpl->tpl_vars['user']->value['reconocimientos'])) {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['honor']->value->idReconocimiento;?>
"><?php echo $_smarty_tpl->tpl_vars['honor']->value->reconocimiento;?>
</option>
                      <?php }?>
                      <?php
$_smarty_tpl->tpl_vars['honor'] = $__foreach_honor_0_saved_local_item;
}
if ($__foreach_honor_0_saved_item) {
$_smarty_tpl->tpl_vars['honor'] = $__foreach_honor_0_saved_item;
}
?>
                    </select>
                  </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
              <button data-user="<?php echo $_smarty_tpl->tpl_vars['user']->value['idUsuario'];?>
" type="button" class="btn btn-primary">Añadir</button>
            </div>
          </form>
                  </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de los reconocimientos del usuario <?php echo $_smarty_tpl->tpl_vars['user']->value['nombre'];?>
</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="data" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Reconocimiento</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$_from = $_smarty_tpl->tpl_vars['userrecognition']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_usre_1_saved_item = isset($_smarty_tpl->tpl_vars['usre']) ? $_smarty_tpl->tpl_vars['usre'] : false;
$_smarty_tpl->tpl_vars['usre'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['usre']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['usre']->value) {
$_smarty_tpl->tpl_vars['usre']->_loop = true;
$__foreach_usre_1_saved_local_item = $_smarty_tpl->tpl_vars['usre'];
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['usre']->value->reconocimiento;?>
</td>
                        <td>
                          <button class="btn btn-primary btn-clear" data-usre="<?php echo $_smarty_tpl->tpl_vars['usre']->value->idReconocimientoUsuario;?>
" >Eliminar</button>
                        </td>
                      </tr>
                      <?php
$_smarty_tpl->tpl_vars['usre'] = $__foreach_usre_1_saved_local_item;
}
if ($__foreach_usre_1_saved_item) {
$_smarty_tpl->tpl_vars['usre'] = $__foreach_usre_1_saved_item;
}
?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Reconocimiento</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


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
 src="<?php echo fileversion('resources/js/vendor/select2.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/user-recognition.js');?>
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
