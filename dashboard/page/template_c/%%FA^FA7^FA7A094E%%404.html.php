<?php /* Smarty version 2.6.6, created on 2016-01-25 02:17:57
         compiled from errorpage/404.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'filetemplate', 'errorpage/404.html', 1, false),array('modifier', 'fileversion', 'errorpage/404.html', 2, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/header.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo ((is_array($_tmp='resources/css/pymes/404.css')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"/>
<body>
  <div class="main">
    <div id="large-header" class="large-header">
      <canvas id="demo-canvas"></canvas>
      <div class="page-text">
        <cite class="rotate">	Error 404!,Oops!</cite><span>Parece que la página que usted está buscando no existe.<br/>Por favor vaya al <a href="<?php echo @constant('BASE'); ?>
">homepage.</a></span>
      </div>
      <div id="arrow"></div>
    </div>
  </div>
  <div class="footer">
    <div class="menu-container">
      <ul class="menu">
        <li><a href="<?php echo @constant('BASE'); ?>
que-es">
            <q class="icon-247-bulb"></q><span>¿Qué es Casos 24-7?</span></a></li>
        <li><a href="<?php echo @constant('BASE'); ?>
asesoria-juridica">
            <q class="icon-247-box"></q><span>Servicios</span></a></li>
        <li><a href="<?php echo @constant('BASE'); ?>
contacto">
            <q class="icon-247-mail"></q><span>Contacto</span></a></li>
      </ul>
    </div>
    <div class="socila-container clearfix">
      <ul class="social pull-right">
        <li><a rel="nofollow" href="<?php echo @constant('FACEBOOK'); ?>
" target="_blank"><i class="icon-0-facebook"></i></a></li>
        <li><a rel="nofollow" href="<?php echo @constant('TWITTER'); ?>
" target="_blank"><i class="icon-0-twitter"></i></a></li>
        <li><a rel="nofollow" href="<?php echo @constant('GOOGLE'); ?>
" target="_blank"><i class="icon-0-google-plus"></i></a></li>
        <li><a rel="nofollow" href="<?php echo @constant('YOUTUBE'); ?>
" target="_blank"><i class="icon-0-youtube"></i></a></li>
      </ul>
    </div>
    <div class="copyright pull-right">Copyright © 2015 <a href="<?php echo @constant('BASE'); ?>
">Casos 24-7</a>	| Todos los derechos reservados.</div>
  </div><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/scripts.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <script type="text/javascript" src="<?php echo ((is_array($_tmp='resources/js/vendor/jquery-simple-text-rotator.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script type="text/javascript" src="<?php echo ((is_array($_tmp='resources/js/vendor/TweenLite.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script type="text/javascript" src="<?php echo ((is_array($_tmp='resources/js/vendor/EasePack.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script type="text/javascript" src="<?php echo ((is_array($_tmp='resources/js/vendor/rAF.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
  <script type="text/javascript" src="<?php echo ((is_array($_tmp='resources/js/errorpage/404-config.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
</body>