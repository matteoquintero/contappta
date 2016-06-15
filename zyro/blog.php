<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Blog</title>
	<base href="{{base_url}}" />
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
	<meta name="keywords" content="Blog" />
		<meta name="generator" content="Zyro - Website Builder" />
	
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>

	<link href="css/site.css?v=1.1.27" rel="stylesheet" type="text/css" />
	<link href="css/common.css?ts=1461464812" rel="stylesheet" type="text/css" />
	<link href="css/blog.css?ts=1461464812" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="/gallery/ico-ts1450054965.png" type="image/png" />
	<script type="text/javascript">var currLang = '';</script>		
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>


<body>{{ga_code}}<div class="root"><div class="vbox wb_container" id="wb_header">
	
<div id="wb_element_instance49" class="wb_element"><a class="btn btn-default btn-collapser"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><ul class="hmenu"><li><a href="Inicio/" target="_self" title="Inicio">Inicio</a></li><li><a href="Acerca-de/" target="_self" title="Acerca de">Acerca de</a></li><li><a href="Contactos/" target="_self" title="Contactos">Contactos</a></li></ul><script type="text/javascript"> (function() { var isOpen = false, elem = $('#wb_element_instance49'), btn = elem.children('.btn-collapser').eq(0); btn.on('click', function() { if (elem.hasClass('collapse-expanded')) { isOpen = false; elem.removeClass('collapse-expanded'); } else { isOpen = true; elem.addClass('collapse-expanded'); } }); elem.find('ul').each(function() { var ul = $(this); if (ul.parent('li').length > 0) { ul.parent('li').eq(0).children('a').on('click', function() { if (!isOpen) return true; if (ul.css('display') !== 'block') ul.css({display: 'block'}); else ul.css({display: ''}); return false; }); } }); })(); </script></div></div>
<div class="vbox wb_container" id="wb_main">
	
<div id="wb_element_instance51" class="wb_element" style="width: 100%;">
			<?php
				global $show_comments;
				if (isset($show_comments) && $show_comments) {
					renderComments(blog);
			?>
			<script type="text/javascript">
				$(function() {
					var block = $("#wb_element_instance51");
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
					$("#wb_element_instance51").hide();
				});
			</script>
			<?php
				}
			?>
			</div></div>
<div class="vbox wb_container" id="wb_footer" style="height: 134px;">
	
<div id="wb_element_instance50" class="wb_element" style=" line-height: normal;"><p class="wb-stl-footer">© 2015 <a href="http://contappta.com">contappta.com</a></p></div><div id="wb_element_instance52" class="wb_element" style="text-align: center; width: 100%;"><div class="wb_footer"></div><script type="text/javascript">
			$(function() {
				var footer = $(".wb_footer");
				var html = (footer.html() + "").replace(/^\s+|\s+$/g, "");
				if (!html) {
					footer.parent().remove();
					footer = $("#wb_footer");
					footer.height(54);
				}
			});
			</script></div></div><div class="wb_sbg"></div></div></body>
</html>
