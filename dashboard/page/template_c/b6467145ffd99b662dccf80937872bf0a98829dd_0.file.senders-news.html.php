<?php
/* Smarty version 3.1.29, created on 2016-07-30 19:10:31
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/institution/senders-news.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579d41f7225ae7_59763628',
  'file_dependency' => 
  array (
    'b6467145ffd99b662dccf80937872bf0a98829dd' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/institution/senders-news.html',
      1 => 1456531954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579d41f7225ae7_59763628 ($_smarty_tpl) {
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
      Ver receptores
      <small>Listado de los receptores</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Noticia</a></li>
      <li class="active">Ver receptores</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listado de los receptores</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Vista</th>
                </tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['sendersnews']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_sendernew_0_saved_item = isset($_smarty_tpl->tpl_vars['sendernew']) ? $_smarty_tpl->tpl_vars['sendernew'] : false;
$_smarty_tpl->tpl_vars['sendernew'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['sendernew']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['sendernew']->value) {
$_smarty_tpl->tpl_vars['sendernew']->_loop = true;
$__foreach_sendernew_0_saved_local_item = $_smarty_tpl->tpl_vars['sendernew'];
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['sendernew']->value->nombre;?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['sendernew']->value->usuario;?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['sendernew']->value->vista;?>
</td>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['sendernew'] = $__foreach_sendernew_0_saved_local_item;
}
if ($__foreach_sendernew_0_saved_item) {
$_smarty_tpl->tpl_vars['sendernew'] = $__foreach_sendernew_0_saved_item;
}
?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Vista</th>
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
 src="<?php echo fileversion('resources/js/profile/data.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>




<?php }
}
