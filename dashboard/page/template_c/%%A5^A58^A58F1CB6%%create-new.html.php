<?php /* Smarty version 2.6.6, created on 2016-01-29 01:52:32
         compiled from user/create-new.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'filetemplate', 'user/create-new.html', 1, false),array('modifier', 'fileversion', 'user/create-new.html', 107, false),)), $this); ?>
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
      Crear noticia
      <small>formulario para crear usuarios</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Noticia</a></li>
      <li class="active">Crear noticia</li>
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
            <h3 class="box-title">Complete los datos para crear una noticia</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-news" data-action="create">
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">

                  <div class="form-group">
                    <label for="sender">Para</label>
                    <select class="form-control select2" multiple style="width: 100%;" name="sender" id="sender" data-placeholder="Seleecione los remitentes">
                      <option></option>
                      <option value="<?php echo $this->_tpl_vars['datauser']['idInstitucion']; ?>
-institution">Todos</option>
                      <optgroup label="Grupos">
                       <?php if (count($_from = (array)$this->_tpl_vars['groups'])):
    foreach ($_from as $this->_tpl_vars['user']):
?>
                          <option value="<?php echo $this->_tpl_vars['user']->idGrupo; ?>
-group"><?php echo $this->_tpl_vars['user']->grado; ?>
-<?php echo $this->_tpl_vars['user']->identificador; ?>
</option>
                        <?php endforeach; unset($_from); endif; ?>
                      </optgroup>
                      <optgroup label="Personas">
                       <?php if (count($_from = (array)$this->_tpl_vars['users'])):
    foreach ($_from as $this->_tpl_vars['user']):
?>
                          <option value="<?php echo $this->_tpl_vars['user']->idInstitucion; ?>
-user"><?php echo $this->_tpl_vars['user']->nombre; ?>
 (<?php echo $this->_tpl_vars['user']->usuario; ?>
)</option>
                        <?php endforeach; unset($_from); endif; ?>
                      </optgroup>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Digite el el asunto">
                  </div>
                  <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea type="text" class="form-control" name="description" id="description" placeholder="Digite la descripción"></textarea>
                  </div>

              </div>
              <div class="col-md-6">

                  <div class="form-group">
                    <label for="datepublication">Fecha publicación:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Digite la fecha" data-mask name="datepublication" id="datepublication">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="video">Url video</label>
                    <input type="text" class="form-control" name="video" id="video" placeholder="Digite la url">
                  </div>

                  <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" id="image">
                    <p class="help-block">Imagen de la noticia.</p>
                  </div>

                  <div class="checkbox form-group">
                    <label>
                      <input id="approved" name="approved" type="checkbox" value="check"> Aprobada
                    </label>
                  </div>

              </div>

            </div><!-- /.box-body -->

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
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/jquery-inputmask.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/jquery-inputmask-date-extensions.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/jquery-inputmask-extensions.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/select2.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script src="<?php echo ((is_array($_tmp='resources/js/profile/new.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/botoom.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
