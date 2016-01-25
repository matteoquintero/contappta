<?php /* Smarty version 2.6.6, created on 2016-01-25 02:38:58
         compiled from user/edit-institute.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'filetemplate', 'user/edit-institute.html', 1, false),array('modifier', 'fileversion', 'user/edit-institute.html', 72, false),)), $this); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/header.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </head>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/profile/profile-nav.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <section class="content-header">
    <h1>
      Editar institución
      <small>formulario para editar instituciones</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Institución</a></li>
      <li class="active">Editar institución</li>
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
            <h3 class="box-title">Complete los datos para editar la institución</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="create-institute">
            <div class="box-body">
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite el nombre de la institución" value="<?php echo $this->_tpl_vars['institute']['nombre']; ?>
">
              </div>
              <div class="form-group">
                <label for="email">Correo</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Digite el correo de la institución" value="<?php echo $this->_tpl_vars['institute']['correo']; ?>
">
              </div>
              <div class="form-group">
                <label for="address">Dirección</label>
                <input type="address" class="form-control" name="address" id="address" placeholder="Digite la dirección de la institución" value="<?php echo $this->_tpl_vars['institute']['direccion']; ?>
">
              </div>
              <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo">
                <p class="help-block">Logo de la institución.</p>
              </div>
              <div class="checkbox">
                <label>
                  <?php if ($this->_tpl_vars['institute']['activo'] == 'Si'): ?>
                    <input id="active" name="active" type="checkbox" value="Si" checked> Activar
                  <?php else: ?>
                    <input id="active" name="active" type="checkbox" value="Si"> Activar
                  <?php endif; ?>
                </label>
              </div>
            </div><!-- /.box-body -->
            <input type="hidden" name="idInstitucion" value="<?php echo $this->_tpl_vars['institute']['idInstitucion']; ?>
">
            <div class="box-footer">
              <button type="button" class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (left) -->

    </div>   <!-- /.row -->
  </section><!-- /.content -->

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
  <script src="<?php echo ((is_array($_tmp='resources/js/profile/create-institute.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/botoom.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
