<?php
/* Smarty version 3.1.29, created on 2016-03-08 21:35:30
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/master/profile/nav-app.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56df37920a5a29_95289464',
  'file_dependency' => 
  array (
    'e362225ed1bbe11eff587b3b48926cc3fbc1a939' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/master/profile/nav-app.html',
      1 => 1457469328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56df37920a5a29_95289464 ($_smarty_tpl) {
?>

          <ul class="sidebar-menu">
            <li class="header">Menu de navegación</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-institution"></i> <span>Institución</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo @constant('BASE');?>
crear-institucion"><i class="fa fa-plus"></i> Crear institución</a></li>
                <li><a href="<?php echo @constant('BASE');?>
instituciones"><i class="fa fa-table"></i> Ver instituciones</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo @constant('BASE');?>
crear-usuario"><i class="fa fa-plus"></i> Crear usuario</a></li>
                <li><a href="<?php echo @constant('BASE');?>
usuarios"><i class="fa fa-table"></i> Ver usuarios</a></li>
              </ul>
            </li>

          </ul>
<?php }
}
