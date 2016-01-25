<?php /* Smarty version 2.6.6, created on 2016-01-25 03:11:57
         compiled from user/institutes.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'filetemplate', 'user/institutes.html', 1, false),array('modifier', 'fileversion', 'user/institutes.html', 2, false),)), $this); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/header.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <link rel="stylesheet" href="<?php echo ((is_array($_tmp='resources/css/vendor/datatables-bootstrap.css')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
">
  </head>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/profile/profile-nav.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
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
                  <table id="example1" class="table table-bordered table-striped">
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
                      <?php if (count($_from = (array)$this->_tpl_vars['institutes'])):
    foreach ($_from as $this->_tpl_vars['institute']):
?>
                      <tr>
                        <td><?php echo $this->_tpl_vars['institute']->nombre; ?>
</td>
                        <td><?php echo $this->_tpl_vars['institute']->correo; ?>
</td>
                        <td><?php echo $this->_tpl_vars['institute']->direccion; ?>
</td>
                        <td><?php echo $this->_tpl_vars['institute']->activo; ?>
</td>
                        <td><button class="btn-edit" data-institute="<?php echo $this->_tpl_vars['institute']->idInstitucion; ?>
">Editar</button></td>
                      </tr>
                      <?php endforeach; unset($_from); endif; ?>
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
        <form action="<?php echo @constant('BASE'); ?>
modificar-institucion" method="post" id="form-edit"><input type="hidden" name="idInstitucion"></form>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/footer.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/scripts.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/jquery-datatables.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/datatables-bootstrap.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/jquery-slimscroll.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script>
    $(function () {

      $( ".btn-edit" ).click(function() {

        $("#form-edit input").val( $(this).attr("data-institute") );
        $("#form-edit").submit();

      });

      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/botoom.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


