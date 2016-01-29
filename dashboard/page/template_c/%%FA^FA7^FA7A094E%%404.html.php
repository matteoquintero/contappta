<?php /* Smarty version 2.6.6, created on 2016-01-27 05:54:17
         compiled from errorpage/404.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'filetemplate', 'errorpage/404.html', 1, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp="master/general/header.html")) ? $this->_run_mod_handler('filetemplate', true, $_tmp) : filetemplate($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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

</body>