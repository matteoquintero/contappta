<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Contactos</title>
	<base href="{{base_url}}" />
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
	<meta name="keywords" content="" />
		<meta name="generator" content="Zyro - Website Builder" />
	
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>

	<link href="css/site.css?v=1.1.27" rel="stylesheet" type="text/css" />
	<link href="css/common.css?ts=1461464812" rel="stylesheet" type="text/css" />
	<link href="css/3.css?ts=1461464812" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="/gallery/ico-ts1450054965.png" type="image/png" />
	<script type="text/javascript">var currLang = '';</script>		
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>


<body>{{ga_code}}<div class="root"><div class="vbox wb_container" id="wb_header">
	
<div id="wb_element_instance37" class="wb_element"><a class="btn btn-default btn-collapser"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><ul class="hmenu"><li><a href="Inicio/" target="_self" title="Inicio">Inicio</a></li><li><a href="Acerca-de/" target="_self" title="Acerca de">Acerca de</a></li><li class="active"><a href="Contactos/" target="_self" title="Contactos">Contactos</a></li></ul><script type="text/javascript"> (function() { var isOpen = false, elem = $('#wb_element_instance37'), btn = elem.children('.btn-collapser').eq(0); btn.on('click', function() { if (elem.hasClass('collapse-expanded')) { isOpen = false; elem.removeClass('collapse-expanded'); } else { isOpen = true; elem.addClass('collapse-expanded'); } }); elem.find('ul').each(function() { var ul = $(this); if (ul.parent('li').length > 0) { ul.parent('li').eq(0).children('a').on('click', function() { if (!isOpen) return true; if (ul.css('display') !== 'block') ul.css({display: 'block'}); else ul.css({display: ''}); return false; }); } }); })(); </script></div><div id="wb_element_instance39" class="wb_element"><img alt="logotipocontapptahostinguer" src="gallery_gen/18151edfd08fc1438a52fdd38e2446f8_140x97.png"></div></div>
<div class="vbox wb_container" id="wb_main">
	
<div id="wb_element_instance40" class="wb_element" style=" line-height: normal;"><h1 class="wb-stl-heading1">Contacto</h1>
</div><div id="wb_element_instance41" class="wb_element" style=" line-height: normal;"><h2 class="wb-stl-heading2" style="text-align: center;">Ingresa tus datos en el siguiente formulario y muy pronto nos pondremos en contacto, gracias!</h2>
</div><div id="wb_element_instance42" class="wb_element"><form class="wb_form" method="post"><input type="hidden" name="wb_form_id" value="5ddc1af9"><textarea name="message" rows="3" cols="20" class="hpc"></textarea><table><tr><th>Nombre&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_0" value="Nombre"><input class="form-control form-field" type="text" value="" name="wb_input_0"></td></tr><tr><th>E-mail&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_1" value="E-mail"><input class="form-control form-field" type="text" value="" name="wb_input_1"></td></tr><tr class="area-row"><th>Mensaje&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_2" value="Mensaje"><textarea class="form-control form-field form-area-field" rows="3" cols="20" name="wb_input_2"></textarea></td></tr><tr class="form-footer"><td colspan="2"><button type="submit" class="btn btn-default">Enviar</button></td></tr></table></form><script type="text/javascript">
			var formValues = <?php echo json_encode($_POST); ?>;
			var formErrors = <?php global $formErrors; echo json_encode($formErrors); ?>;
			wb_form_validateForm("5ddc1af9", formValues, formErrors);
			<?php global $wb_form_send_state; if (isset($wb_form_send_state) && $wb_form_send_state) { ?>
				setTimeout(function() {
					alert("<?php echo addcslashes($wb_form_send_state, "\\'\"&\n\r\0\t<>"); ?>");
				}, 1);
				<?php $wb_form_send_state = null; ?>
			<?php } ?>
			</script></div><div id="wb_element_instance43" class="wb_element" style="width: 100%;">
			<?php
				global $show_comments;
				if (isset($show_comments) && $show_comments) {
					renderComments(3);
			?>
			<script type="text/javascript">
				$(function() {
					var block = $("#wb_element_instance43");
					var comments = block.children(".wb_comments").eq(0);
					var contentBlock = $("#wb_main");
					contentBlock.height(contentBlock.height() + comments.height());
				});
			</script>
			<?php
				} else {
			?>
			<script type="text/javascript">
				$(function() {
					$("#wb_element_instance43").hide();
				});
			</script>
			<?php
				}
			?>
			</div></div>
<div class="vbox wb_container" id="wb_footer" style="height: 134px;">
	
<div id="wb_element_instance38" class="wb_element" style=" line-height: normal;"><p class="wb-stl-footer">© 2015 <a href="http://contappta.com">contappta.com</a></p></div><div id="wb_element_instance44" class="wb_element" style="text-align: center; width: 100%;"><div class="wb_footer"></div><script type="text/javascript">
			$(function() {
				var footer = $(".wb_footer");
				var html = (footer.html() + "").replace(/^\s+|\s+$/g, "");
				if (!html) {
					footer.parent().remove();
					footer = $("#wb_footer");
					footer.height(74);
				}
			});
			</script></div></div><div class="wb_sbg"></div></div></body>
</html>
