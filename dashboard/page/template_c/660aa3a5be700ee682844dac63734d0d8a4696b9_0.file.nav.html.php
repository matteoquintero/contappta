<?php
/* Smarty version 3.1.29, created on 2016-03-02 04:00:34
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/master/profile/nav.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56d65752bb9ba6_49646532',
  'file_dependency' => 
  array (
    '660aa3a5be700ee682844dac63734d0d8a4696b9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/master/profile/nav.html',
      1 => 1456887623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56d65752bb9ba6_49646532 ($_smarty_tpl) {
?>
    <body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo @constant('BASE');?>
" class="logo">
          <span class="logo-mini"><b>C</b>A</span>
          <span class="logo-lg"><b>Cont</b>appta</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo @constant('BASE');
echo $_smarty_tpl->tpl_vars['userdata']->value['foto'];?>
" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['userdata']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['userdata']->value['apellido'];?>
</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo @constant('BASE');
echo $_smarty_tpl->tpl_vars['userdata']->value['foto'];?>
" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_smarty_tpl->tpl_vars['userdata']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['userdata']->value['apellido'];?>

                      <small><?php echo $_smarty_tpl->tpl_vars['userdata']->value['usuario'];?>
</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo @constant('BASE');
echo $_smarty_tpl->tpl_vars['userdata']->value['usuario'];?>
" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo @constant('BASE');?>
cerrar-sesion" class="btn btn-default btn-flat">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo @constant('BASE');
echo $_smarty_tpl->tpl_vars['userdata']->value['foto'];?>
" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_smarty_tpl->tpl_vars['userdata']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['userdata']->value['apellido'];?>
</p>
            </div>
          </div>

          <?php if ($_smarty_tpl->tpl_vars['userdata']->value['permiso'] == "any") {?>
              <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav-any.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

          <?php } elseif ($_smarty_tpl->tpl_vars['userdata']->value['permiso'] == "app") {?>
              <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav-app.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

          <?php } elseif ($_smarty_tpl->tpl_vars['userdata']->value['permiso'] == "institution") {?>
              <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/profile/nav-institution.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

          <?php }?>

        </section>
      </aside>
      <div class="content-wrapper">
<?php }
}
