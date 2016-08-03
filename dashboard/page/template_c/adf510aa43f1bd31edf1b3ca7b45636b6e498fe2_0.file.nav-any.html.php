<?php
/* Smarty version 3.1.29, created on 2016-07-30 19:23:56
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/master/profile/nav-any.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579d451c1ccaa7_27133716',
  'file_dependency' => 
  array (
    'adf510aa43f1bd31edf1b3ca7b45636b6e498fe2' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/master/profile/nav-any.html',
      1 => 1456887628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579d451c1ccaa7_27133716 ($_smarty_tpl) {
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
              <a href="<?php echo @constant('BASE');?>
notificaciones">
                <i class="fa fa-envelope"></i> <span>Notificaciones</span>
                <!--small class="label pull-right bg-yellow">12</small-->
              </a>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Ayuda</span></a></li>

          </ul>
<?php }
}
