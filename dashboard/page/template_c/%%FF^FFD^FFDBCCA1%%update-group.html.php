<?php /* Smarty version 2.6.6, created on 2016-01-27 02:51:30
         compiled from user/update-group.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'filetemplate', 'user/update-group.html', 1, false),array('modifier', 'fileversion', 'user/update-group.html', 66, false),)), $this); ?>
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
      Crear grupo
      <small>formulario para crear grupos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Grupo</a></li>
      <li class="active">Crear grupo</li>
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
            <h3 class="box-title">Complete los datos para crear una grupo</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-group" data-action="update">
            <div class="box-body">
              <div class="form-group">
                <label for="institution">Institución</label>
                <select class="form-control select2" style="width: 100%;" name="institution" id="institution" data-placeholder="Seleecione institución">
                  <?php if (count($_from = (array)$this->_tpl_vars['institutions'])):
    foreach ($_from as $this->_tpl_vars['institution']):
?>
                    <?php if ($this->_tpl_vars['group']['idInstitucion'] == $this->_tpl_vars['institution']->idInstitucion): ?>
                      <option value="<?php echo $this->_tpl_vars['institution']->idInstitucion; ?>
" >
                        <?php echo $this->_tpl_vars['institution']->institucion; ?>

                      </option>
                    <?php endif; ?>
                  <?php endforeach; unset($_from); endif; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="degree">Grado</label>
                <input type="text" class="form-control" name="degree" id="degree" placeholder="Digite el grado" value="<?php echo $this->_tpl_vars['group']['grado']; ?>
">
              </div>
              <div class="form-group">
                <label for="id">Identificador</label>
                <input type="text" class="form-control" name="id" id="id" placeholder="Digite el identificador" value="<?php echo $this->_tpl_vars['group']['identificador']; ?>
">
              </div>
            </div><!-- /.box-body -->
            <input type="hidden" name="idGrupo" value="<?php echo $this->_tpl_vars['group']['idGrupo']; ?>
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
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/select2-full.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script src="<?php echo ((is_array($_tmp='resources/js/profile/group.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/botoom.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
