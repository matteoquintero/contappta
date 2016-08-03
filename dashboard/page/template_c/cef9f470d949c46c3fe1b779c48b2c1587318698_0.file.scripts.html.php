<?php
/* Smarty version 3.1.29, created on 2016-07-30 13:48:46
  from "/Applications/MAMP/htdocs/contappta/dashboard/page/template/master/general/scripts.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579cf68ec80713_13434959',
  'file_dependency' => 
  array (
    'cef9f470d949c46c3fe1b779c48b2c1587318698' => 
    array (
      0 => '/Applications/MAMP/htdocs/contappta/dashboard/page/template/master/general/scripts.html',
      1 => 1454627075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579cf68ec80713_13434959 ($_smarty_tpl) {
if (@constant('SITE') == 'local') {
echo '<script'; ?>
 type="text/javascript" src="<?php echo fileversion('resources/js/general/routes-local.js');?>
"><?php echo '</script'; ?>
>
<?php } elseif (@constant('SITE') == 'production') {
echo '<script'; ?>
 type="text/javascript" src="<?php echo fileversion('resources/js/general/routes-production.js');?>
"><?php echo '</script'; ?>
>
<?php }?>
<!-- jQuery 2.1.4 -->
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/jquery-validate.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/placeholders.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/bootstrap.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/vendor/fastclick.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/general/onkeypress.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/general/functions.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/app.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo fileversion('resources/js/profile/demo.js');?>
"><?php echo '</script'; ?>
>

<?php }
}
