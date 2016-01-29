<?php /* Smarty version 2.6.6, created on 2016-01-29 02:00:21
         compiled from user/create-user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'filetemplate', 'user/create-user.html', 1, false),array('modifier', 'fileversion', 'user/create-user.html', 129, false),)), $this); ?>
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
      Crear usuario
      <small>formulario para crear usuarios</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Usuarios</a></li>
      <li class="active">Crear usuario</li>
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
            <h3 class="box-title">Complete los datos para crear una usuario</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-user" data-action="create">
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="user">Usuario</label>
                    <input type="text" class="form-control" name="user" id="user" placeholder="Digite el el usuario">
                  </div>
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Digite el nombre del usuario">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Digite el apellido del usuario">
                  </div>
                  <div class="form-group">
                    <label for="document">Documento</label>
                    <input type="text" class="form-control" name="document" id="document" placeholder="Digite el documento del usuario">
                  </div>
               <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite el correo del usuario">
                  </div>


                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto">
                    <p class="help-block">Foto del usuario.</p>
                  </div>

              </div>
              <div class="col-md-6">

                 <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Digite la contraseña del usuario">
                  </div>

                  <div class="form-group">
                    <label for="smartphone">Celular</label>
                    <input type="text" class="form-control" name="smartphone" id="smartphone" placeholder="Digite el celular del usuario">
                  </div>
                <div class="form-group">
                  <label for="role">Rol</label>
                  <select class="form-control select2" name="role" id="role" data-placeholder="Seleecione el rol" style="width: 100%;">
                    <option></option>
                    <?php if (count($_from = (array)$this->_tpl_vars['roles'])):
    foreach ($_from as $this->_tpl_vars['role']):
?>
                      <option value="<?php echo $this->_tpl_vars['role']->idRol; ?>
"><?php echo $this->_tpl_vars['role']->rol; ?>
</option>
                    <?php endforeach; unset($_from); endif; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="institution">Institución</label>
                  <select class="form-control select2" style="width: 100%;" name="institution" id="institution" data-placeholder="Seleecione una institución">
                    <option></option>
                    <?php if (count($_from = (array)$this->_tpl_vars['institutions'])):
    foreach ($_from as $this->_tpl_vars['institution']):
?>
                      <option value="<?php echo $this->_tpl_vars['institution']->idInstitucion; ?>
"><?php echo $this->_tpl_vars['institution']->institucion; ?>
</option>
                    <?php endforeach; unset($_from); endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="guardian">Acudientes</label>
                  <select name="guardian" id="guardian" multiple class="form-control select2" style="width: 100%;" data-placeholder="Seleecione los acudientes">
                    <option></option>
                    <?php if (count($_from = (array)$this->_tpl_vars['guardians'])):
    foreach ($_from as $this->_tpl_vars['guardian']):
?>
                      <option value="<?php echo $this->_tpl_vars['guardian']->idUsario; ?>
"><?php echo $this->_tpl_vars['guardian']->nombre; ?>
 <?php echo $this->_tpl_vars['guardian']->apellido; ?>
</option>
                    <?php endforeach; unset($_from); endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="group">Grupo</label>
                  <select class="form-control select2" id="group" name="group" style="width: 100%;" data-placeholder="Seleecione grupo">
                    <option></option>
                    <?php if (count($_from = (array)$this->_tpl_vars['groups'])):
    foreach ($_from as $this->_tpl_vars['group']):
?>
                      <option value="<?php echo $this->_tpl_vars['group']->idGrupo; ?>
"><?php echo $this->_tpl_vars['group']->grado; ?>
-<?php echo $this->_tpl_vars['group']->identificador; ?>
</option>
                    <?php endforeach; unset($_from); endif; ?>
                  </select>
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
  <script src="<?php echo ((is_array($_tmp='resources/js/vendor/select2.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script src="<?php echo ((is_array($_tmp='resources/js/profile/user.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/botoom.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
