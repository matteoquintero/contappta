<?php
/* Smarty version 3.1.29, created on 2016-02-16 06:25:08
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/create-message.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c2b2b44942c9_74953312',
  'file_dependency' => 
  array (
    'b271292423ba4733e718e62a5893ae3531082887' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/create-message.html',
      1 => 1455599662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c2b2b44942c9_74953312 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <section class="content-header">
    <h1>
      Crear mensaje
      <small>formulario para crear mensajes</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Mensaje</a></li>
      <li class="active">Crear mensaje</li>
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
            <h3 class="box-title">Complete los datos para crear una mensaje</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" autocomplete="off" id="form-messages" data-action="create">
            <div class="box-body">
              <div class="row">
                  <div class="col-md-12">

                      <div class="form-group">
                        <label for="sender">Para</label>
                        <select class="form-control select2" multiple style="width: 100%;" name="sender[]" id="sender" data-placeholder="Seleecione los remitentes">
                          <option></option>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['idInstitucion'];?>
-institution">Todos</option>
                          <optgroup label="Grupos">
                           <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_0_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_0_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                              <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->idGrupo;?>
-group"><?php echo $_smarty_tpl->tpl_vars['group']->value->grado;?>
-<?php echo $_smarty_tpl->tpl_vars['group']->value->identificador;?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_local_item;
}
if ($__foreach_group_0_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_item;
}
?>
                          </optgroup>
                          <optgroup label="Personas">
                           <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_1_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_1_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
                              <option value="<?php echo $_smarty_tpl->tpl_vars['user']->value->idUsuario;?>
-user"><?php echo $_smarty_tpl->tpl_vars['user']->value->nombre;?>
 (<?php echo $_smarty_tpl->tpl_vars['user']->value->usuario;?>
)</option>
                            <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_1_saved_local_item;
}
if ($__foreach_user_1_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_1_saved_item;
}
?>
                          </optgroup>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="dispatch">Mensaje</label>
                      <textarea type="text" class="message form-control" name="dispatch" id="dispatch" placeholder="Digite el mensaje"></textarea>
                    </div>

                      <div class="form-group" id="group-image">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" id="image" class="message">
                        <p class="help-block">Imagen de la noticia.</p>
                      </div>

                    </div>

              </div>
            </div><!-- /.box-body -->
            <input type="hidden" name="institute" id="institute" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['idInstitucion'];?>
">
            <div class="box-footer">
              <button type="button" class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div><!-- /.box -->
      </div><!--/.col (left) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/footer.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/scripts.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery-inputmask.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery-inputmask-date-extensions.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery-inputmask-extensions.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/select2.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/message.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
