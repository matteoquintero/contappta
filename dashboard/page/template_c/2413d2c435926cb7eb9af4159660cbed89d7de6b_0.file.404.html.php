<?php
/* Smarty version 3.1.29, created on 2016-07-30 14:07:10
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/errorpage/404.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579cfaded09c01_58871253',
  'file_dependency' => 
  array (
    '2413d2c435926cb7eb9af4159660cbed89d7de6b' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/errorpage/404.html',
      1 => 1453870454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579cfaded09c01_58871253 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, filetemplate("master/general/header.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<body>
  <div class="main">
    <div id="large-header" class="large-header">
      <canvas id="demo-canvas"></canvas>
      <div class="page-text">
        <cite class="rotate">	Error 404!,Oops!</cite><span>Parece que la página que usted está buscando no existe.<br/>Por favor vaya al <a href="<?php echo @constant('BASE');?>
">homepage.</a></span>
      </div>
      <div id="arrow"></div>
    </div>

</body>
<?php }
}
