<?php
/* Smarty version 3.1.29, created on 2016-07-30 19:38:03
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/institution/honors.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579d486bc2a988_17964910',
  'file_dependency' => 
  array (
    '5ad81e9769e67706d8e67bb04eb203b57ddd802d' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/institution/honors.html',
      1 => 1460917717,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579d486bc2a988_17964910 ($_smarty_tpl) {
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
      Ver reconocimientos
      <small>Listado de las reconocimientos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Reconocimientos</a></li>
      <li class="active">Ver reconocimientos</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listado de las reconocimientos</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Reconocimiento</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
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
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['honor']->value->reconocimiento;?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['honor']->value->tipoReconocimiento;?>
</td>
                  <td>
                    <button class="btn btn-primary btn-edit" data-honor="<?php echo $_smarty_tpl->tpl_vars['honor']->value->idReconocimiento;?>
">Editar</button>
                    <button class="btn btn-primary btn-clear" data-honor="<?php echo $_smarty_tpl->tpl_vars['honor']->value->idReconocimiento;?>
">Eliminar</button>
                  </td>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['honor'] = $__foreach_honor_0_saved_local_item;
}
if ($__foreach_honor_0_saved_item) {
$_smarty_tpl->tpl_vars['honor'] = $__foreach_honor_0_saved_item;
}
?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Reconocimiento</th>
                  <th>Tipo</th>
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
modificar-reconocimiento" method="post" id="form-edit">
      <input type="hidden" name="idReconocimiento">
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
 src="<?php echo fileversion('resources/js/profile/honors.js');?>
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
