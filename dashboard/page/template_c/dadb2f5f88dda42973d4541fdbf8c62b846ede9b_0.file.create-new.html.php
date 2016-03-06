<?php
/* Smarty version 3.1.29, created on 2016-03-02 04:10:24
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/create-new.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56d659a01f08e9_44790551',
  'file_dependency' => 
  array (
    'dadb2f5f88dda42973d4541fdbf8c62b846ede9b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/institution/create-new.html',
      1 => 1455941348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56d659a01f08e9_44790551 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
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

                <div id="step-1">
                  <div class="col-md-12">
                    <?php
$_from = $_smarty_tpl->tpl_vars['templates']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_template_0_saved_item = isset($_smarty_tpl->tpl_vars['template']) ? $_smarty_tpl->tpl_vars['template'] : false;
$_smarty_tpl->tpl_vars['template'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['template']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['template']->value) {
$_smarty_tpl->tpl_vars['template']->_loop = true;
$__foreach_template_0_saved_local_item = $_smarty_tpl->tpl_vars['template'];
?>
                      <div class="template">
                        <label>
                          <input type="radio" name="template" value="<?php echo $_smarty_tpl->tpl_vars['template']->value->idPlantilla;?>
"/>
                          <img src="<?php echo @constant('BASE');
echo $_smarty_tpl->tpl_vars['template']->value->imagen;?>
" alt="">
                          <p><?php echo $_smarty_tpl->tpl_vars['template']->value->plantilla;?>
</p>
                        </label>
                      </div>
                    <?php
$_smarty_tpl->tpl_vars['template'] = $__foreach_template_0_saved_local_item;
}
if ($__foreach_template_0_saved_item) {
$_smarty_tpl->tpl_vars['template'] = $__foreach_template_0_saved_item;
}
?>
                  </div>
                </div>

                <div id="step-2">
                  <div class="col-md-6">

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
$__foreach_group_1_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_1_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                              <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->idGrupo;?>
-group"><?php echo $_smarty_tpl->tpl_vars['group']->value->grado;?>
-<?php echo $_smarty_tpl->tpl_vars['group']->value->identificador;?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_1_saved_local_item;
}
if ($__foreach_group_1_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_1_saved_item;
}
?>
                          </optgroup>
                          <optgroup label="Personas">
                           <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_2_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_2_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
                              <option value="<?php echo $_smarty_tpl->tpl_vars['user']->value->idUsuario;?>
-user"><?php echo $_smarty_tpl->tpl_vars['user']->value->nombre;?>
 (<?php echo $_smarty_tpl->tpl_vars['user']->value->usuario;?>
)</option>
                            <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_2_saved_local_item;
}
if ($__foreach_user_2_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_2_saved_item;
}
?>
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

                      <div class="form-group" id="group-video">
                        <label for="video">Url video</label>
                        <input type="text" class="form-control" name="video" id="video" placeholder="Digite la url">
                      </div>

                      <div class="form-group" id="group-image">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" id="image">
                        <p class="help-block">Imagen de la noticia.</p>
                      </div>

                      <div class="form-group">
                        <label for="datepublication">Fecha publicación:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Digite la fecha" data-mask name="datepublication" id="datepublication">
                        </div>
                      </div>

                      <div class="form-group checkbox">
                        <label>
                            <input id="publishnow" name="publishnow" type="checkbox" value="Si"> Publicar ahora mismo
                        </label>
                      </div>

                      <div class="form-group checkbox">
                        <label>
                          <input id="approved" name="approved" type="checkbox" value="Si"> Aprobada
                        </label>
                      </div>

                      <div class="form-group checkbox">
                        <label>
                          <input id="answer" name="answer" type="checkbox" value="Si"> Con respuesta
                        </label>
                      </div>

                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
            <input type="hidden" name="institute" id="institute" value="<?php echo $_smarty_tpl->tpl_vars['userdata']->value['idInstitucion'];?>
">
            <input type="hidden" name="videoid" id="videoid" >
            <div class="box-footer">
              <button type="button" class="btn btn-primary" id="btn-step-1">Siguiente</button>
              <button type="button" class="btn btn-primary" id="btn-step-2">Enviar</button>
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
 src="<?php echo fileversion('resources/js/profile/new.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
