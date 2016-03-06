<?php
/* Smarty version 3.1.29, created on 2016-02-02 06:53:16
  from "/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/errorpage/404.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56b0444ccad560_02332692',
  'file_dependency' => 
  array (
    '0efbe9709f886700ad6cd0bba408cb11b942d0c6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/contappta/dashboard/page/template/errorpage/404.html',
      1 => 1453870454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56b0444ccad560_02332692 ($_smarty_tpl) {
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
