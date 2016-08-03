<?php
/* Smarty version 3.1.29, created on 2016-07-30 19:08:04
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/page/authentication.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579d416471b822_90746592',
  'file_dependency' => 
  array (
    '0a0a3731203ada14cac7f3bfe98167bcb7e8a0a7' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/page/authentication.html',
      1 => 1469921050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579d416471b822_90746592 ($_smarty_tpl) {
?>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Cont</b>appta</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Iniciar sesión</p>
        <form method="post" id="form-authentication">
          <div class="form-group has-feedback">
            <input type="text" name="user" id="user" class="form-control" placeholder="Usuario">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
            </div><!-- /.col -->
          </div>
        </form>
        <a href="<?php echo @constant('BASE');?>
recordar-datos">Olvide mis datos</a><br>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/scripts.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/placeholders.js');?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/page/authentication.js');?>
"><?php echo '</script'; ?>
>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/botoom.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php }
}
