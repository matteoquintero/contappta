<?php
/* Smarty version 3.1.29, created on 2016-02-16 03:31:55
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/magazines.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c28a1be89280_95239933',
  'file_dependency' => 
  array (
    '8f60345b9d058e05367ecd143ef681c38e92ebed' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/magazines.html',
      1 => 1455589907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c28a1be89280_95239933 ($_smarty_tpl) {
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
      Ver revistas
      <small>Listado de las revistas</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Revistas</a></li>
      <li class="active">Ver revistas</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listado de las revistas</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Revista</th>
                  <th>Descripción</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['magazines']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_magazine_0_saved_item = isset($_smarty_tpl->tpl_vars['magazine']) ? $_smarty_tpl->tpl_vars['magazine'] : false;
$_smarty_tpl->tpl_vars['magazine'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['magazine']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['magazine']->value) {
$_smarty_tpl->tpl_vars['magazine']->_loop = true;
$__foreach_magazine_0_saved_local_item = $_smarty_tpl->tpl_vars['magazine'];
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['magazine']->value->revista;?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['magazine']->value->descripcion;?>
</td>
                  <td>
                    <button class="btn btn-primary btn-edit" data-magazine="<?php echo $_smarty_tpl->tpl_vars['magazine']->value->idRevista;?>
">Editar</button>
                  </td>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['magazine'] = $__foreach_magazine_0_saved_local_item;
}
if ($__foreach_magazine_0_saved_item) {
$_smarty_tpl->tpl_vars['magazine'] = $__foreach_magazine_0_saved_item;
}
?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Revista</th>
                  <th>Descripción</th>
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
modificar-revista" method="post" id="form-edit">
      <input type="hidden" name="idRevista">
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
>
    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-magazine") );
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
