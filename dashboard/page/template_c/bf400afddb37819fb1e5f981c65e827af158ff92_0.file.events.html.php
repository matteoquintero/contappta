<?php
/* Smarty version 3.1.29, created on 2016-02-05 00:38:58
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/events.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56b3e112321be1_05300231',
  'file_dependency' => 
  array (
    'bf400afddb37819fb1e5f981c65e827af158ff92' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/events.html',
      1 => 1454629131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56b3e112321be1_05300231 ($_smarty_tpl) {
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
      Ver eventos
      <small>Listado de las eventos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Evento</a></li>
      <li class="active">Ver eventos</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listado de las eventos</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Asunto</th>
                  <th>Fecha inicio</th>
                  <th>Fecha fin</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['events']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_event_0_saved_item = isset($_smarty_tpl->tpl_vars['event']) ? $_smarty_tpl->tpl_vars['event'] : false;
$_smarty_tpl->tpl_vars['event'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['event']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
$__foreach_event_0_saved_local_item = $_smarty_tpl->tpl_vars['event'];
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['event']->value->asunto;?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['event']->value->fechaInicio;?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['event']->value->fechaFin;?>
</td>
                  <td>
                    <button class="btn btn-primary btn-edit" data-event="<?php echo $_smarty_tpl->tpl_vars['event']->value->idEvento;?>
">Editar</button>
                    <button class="btn btn-primary btn-sender" data-event="<?php echo $_smarty_tpl->tpl_vars['event']->value->idEvento;?>
">Ver receptores</button>
                  </td>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['event'] = $__foreach_event_0_saved_local_item;
}
if ($__foreach_event_0_saved_item) {
$_smarty_tpl->tpl_vars['event'] = $__foreach_event_0_saved_item;
}
?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Asunto</th>
                  <th>Fecha inicio</th>
                  <th>Fecha fin</th>
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
modificar-evento" method="post" id="form-edit">
      <input type="hidden" name="idEvento">
  </form>
  <form action="<?php echo @constant('BASE');?>
receptores-evento" method="post" id="form-sender">
      <input type="hidden" name="idEvento">
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
        $("#form-edit input").val( $(this).attr("data-event") );
        $("#form-edit").submit();
      });

      $( ".btn-sender" ).click(function() {
        $("#form-sender input").val( $(this).attr("data-event") );
        $("#form-sender").submit();
      });

      $("#data").DataTable();

    });
  <?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>




<?php }
}
