<?php
/* Smarty version 3.1.29, created on 2016-07-30 14:08:26
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/master/profile/nav-institution.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579cfb2a09e762_90189755',
  'file_dependency' => 
  array (
    '64bd828afd2a0ce71c745ae225cad4e7344d5167' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/master/profile/nav-institution.html',
      1 => 1456887630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579cfb2a09e762_90189755 ($_smarty_tpl) {
?>

          <ul class="sidebar-menu">
            <li class="header">Menu de navegación</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-object-group"></i> <span>Grupos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo @constant('BASE');?>
crear-grupo"><i class="fa fa-plus"></i> Crear grupo</a></li>
                <li><a href="<?php echo @constant('BASE');?>
grupos"><i class="fa fa-table"></i> Ver grupos</a></li>
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
                <li><a href="<?php echo @constant('BASE');?>
importar-usuarios"><i class="fa fa-upload"></i>Importar usuarios</a></li>
              </ul>
            </li>
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
            <li class="treeview">
              <a href="#">
                <i class="fa ion-ribbon-a"></i> <span>Reconocimientos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo @constant('BASE');?>
crear-reconocimiento"><i class="fa fa-plus"></i> Crear reconocimiento</a></li>
                <li><a href="<?php echo @constant('BASE');?>
reconocimientos"><i class="fa fa-table"></i> Ver reconocimientos</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Revistas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo @constant('BASE');?>
crear-revista"><i class="fa fa-plus"></i> Crear revistas</a></li>
                <li><a href="<?php echo @constant('BASE');?>
revistas"><i class="fa fa-table"></i> Ver revistas</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo @constant('BASE');?>
notificaciones">
                <i class="fa fa-magic"></i> <span>Notificaciones</span>
              </a>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Ayuda</span></a></li>

          </ul>
<?php }
}
