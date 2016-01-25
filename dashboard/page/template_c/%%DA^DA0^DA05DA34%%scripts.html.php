<?php /* Smarty version 2.6.6, created on 2016-01-25 01:47:48
         compiled from master/general/scripts.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fileversion', 'master/general/scripts.html', 2, false),)), $this); ?>
<?php if (@constant('SITE') == 'local'): ?>
<script type="text/javascript" src="<?php echo ((is_array($_tmp='resources/js/general/routes-local.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<?php elseif (@constant('SITE') == 'production'): ?>
<script type="text/javascript" src="<?php echo ((is_array($_tmp='resources/js/general/routes-production.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<?php endif; ?>
<!-- jQuery 2.1.4 -->
<script src="<?php echo ((is_array($_tmp='resources/js/vendor/jquery.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<script src="<?php echo ((is_array($_tmp='resources/js/vendor/jquery-validate.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<script src="<?php echo ((is_array($_tmp='resources/js/vendor/bootstrap.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<script src="<?php echo ((is_array($_tmp='resources/js/vendor/fastclick.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<script src="<?php echo ((is_array($_tmp='resources/js/general/onkeypress.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<script src="<?php echo ((is_array($_tmp='resources/js/general/functions.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<script src="<?php echo ((is_array($_tmp='resources/js/profile/app.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
<script src="<?php echo ((is_array($_tmp='resources/js/profile/demo.js')) ? $this->_run_mod_handler('fileversion', true, $_tmp) : fileversion($_tmp)); ?>
"></script>
