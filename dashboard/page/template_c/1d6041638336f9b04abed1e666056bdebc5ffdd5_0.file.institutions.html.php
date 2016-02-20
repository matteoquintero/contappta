<?php
/* Smarty version 3.1.29, created on 2016-02-19 01:17:50
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/app/institutions.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c65f2e0d1e92_09395533',
  'file_dependency' => 
  array (
    '1d6041638336f9b04abed1e666056bdebc5ffdd5' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/app/institutions.html',
      1 => 1455671400,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c65f2e0d1e92_09395533 ($_smarty_tpl) {
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
      Ver instituciones
      <small>Listado de las instituciones</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Institución</a></li>
      <li class="active">Ver instituciones</li>
    </ol>
  </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de las instituciones</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="data" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$_from = $_smarty_tpl->tpl_vars['institutions']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_institution_0_saved_item = isset($_smarty_tpl->tpl_vars['institution']) ? $_smarty_tpl->tpl_vars['institution'] : false;
$_smarty_tpl->tpl_vars['institution'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['institution']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['institution']->value) {
$_smarty_tpl->tpl_vars['institution']->_loop = true;
$__foreach_institution_0_saved_local_item = $_smarty_tpl->tpl_vars['institution'];
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['institution']->value->institucion;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['institution']->value->correo;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['institution']->value->direccion;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['institution']->value->activo;?>
</td>
                        <td><button class="btn-edit btn btn-primary" data-institution="<?php echo $_smarty_tpl->tpl_vars['institution']->value->idInstitucion;?>
">Editar</button></td>
                      </tr>
                      <?php
$_smarty_tpl->tpl_vars['institution'] = $__foreach_institution_0_saved_local_item;
}
if ($__foreach_institution_0_saved_item) {
$_smarty_tpl->tpl_vars['institution'] = $__foreach_institution_0_saved_item;
}
?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Activo</th>
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
modificar-institucion" method="post" id="form-edit"><input type="hidden" name="idInstitucion"></form>

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
>
    $(function () {

      $( ".btn-edit" ).click(function() {

        $("#form-edit input").val( $(this).attr("data-institution") );
        $("#form-edit").submit();

      });

      $("#data").DataTable();

    });
  <?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>




<?php }
}
