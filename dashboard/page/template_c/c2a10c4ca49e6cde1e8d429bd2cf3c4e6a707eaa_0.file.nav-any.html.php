<?php
/* Smarty version 3.1.29, created on 2016-02-14 01:58:20
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/master/profile/nav-any.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56bfd12c7bd7d5_77622956',
  'file_dependency' => 
  array (
    'c2a10c4ca49e6cde1e8d429bd2cf3c4e6a707eaa' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/master/profile/nav-any.html',
      1 => 1455411034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56bfd12c7bd7d5_77622956 ($_smarty_tpl) {
?>

          <ul class="sidebar-menu">
            <li class="header">Menu de navegación</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-newspaper-o"></i> <span>Noticias</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo @constant('BASE');?>
crear-noticia"><i class="fa fa-plus"></i> Crear noticia</a></li>
                <li><a href="<?php echo @constant('BASE');?>
noticias"><i class="fa fa-table"></i> Ver noticias</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-ticket"></i> <span>Eventos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo @constant('BASE');?>
crear-evento"><i class="fa fa-plus"></i> Crear evento</a></li>
                <li><a href="<?php echo @constant('BASE');?>
eventos"><i class="fa fa-table"></i> Ver eventos</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-paper-plane-o"></i> <span>Mensajes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo @constant('BASE');?>
crear-mensaje"><i class="fa fa-plus"></i> Crear mensaje</a></li>
                <li><a href="<?php echo @constant('BASE');?>
mensajes"><i class="fa fa-table"></i> Ver menasajes</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fa fa-envelope"></i> <span>Notificaciones</span>
                <!--small class="label pull-right bg-yellow">12</small-->
              </a>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Ayuda</span></a></li>

          </ul>
<?php }
}
