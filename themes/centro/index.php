<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Communication
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20090523

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Centro Electrico S.A. - Intranet</title>
<?php echo Assets::css()?>
<?php echo Assets::css('jquery-ui-1.8.16.blitzer')?>
<?php echo Assets::js('jquery-1.6.2.min')?>
<?php echo Assets::js('jquery-ui-1.8.16.min')?>
</head>
<body>
  <div id="wrapper">
	<div id="header">
		<div id="logo">
                  <img src="<?php echo base_url()."themes/centro/images/logoCE.jpg"?>" width="70px" height="70px" />
			<h1><a href="<?php echo base_url()?>">Centro Electrico S.A.</a></h1>
			<p> calidad para el hogar</p>
		</div>
	</div>
	<!-- end #header -->
        <?php echo Template::block('menu', 'menu');?>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
                  <?php echo Template::yield();?>
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
                <?php echo Template::block('sidebar','sidebar');?>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>
	<div id="footer">
		<p>Copyright (c) 2008 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
	</div>
	<!-- end #footer -->
</body>
</html>
