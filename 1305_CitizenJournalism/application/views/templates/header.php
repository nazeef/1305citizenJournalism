<?php
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
?>
<!doctype html>
<html>
<head>
	<title> Citizen JOURNALISM </title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width ,initial-scale=1.0"/>
	<meta charset="iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/registration/registration.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/registration/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet"  href="<?= base_url() ?>public/style/style.css">
        <link rel="icon" type="image/ico" href="<?= base_url() ?>public/images/favicon.ico">
        
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/admin.css">
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="all">
	
	<link href="<?php echo base_url();?>css/rs-1200-prototype-50/layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>css/rs-1200-prototype-50/layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>css/rs-1200-prototype-50/layout/scripts/responsiveslides.js-v1.53/responsiveslides.css" rel="stylesheet" type="text/css" media="all">
	<script src="<?php echo base_url();?>js/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery-latest.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
	<script>window.jQuery || document.write('<script src="layout/scripts/jquery-latest.min.js"><\/script>\
	<script src="layout/scripts/jquery-ui.min.js"><\/script>')</script>
	<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
	<script src="<?php echo base_url();?>css/rs-1200-prototype-50/layout/scripts/responsiveslides.js-v1.53/responsiveslides.min.js"></script>
	<script src="<?php echo base_url();?>css/rs-1200-prototype-50/layout/scripts/jquery-mobilemenu.min.js"></script>
	<script src="<?php echo base_url();?>css/rs-1200-prototype-50/layout/scripts/custom.js"></script>
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<!--profile-->

	
	<!-- Add jQuery library -->
	<script type="text/javascript"   href="<?php echo base_url();?>js/lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript"  href="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript"  href="<?php echo base_url();?>js/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript"  href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript"  href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript"  href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	
	
      
</head>

<body class="">
<div class="wrapper row1">
  <header id="header" class="full_width clear">
    <div id="hgroup">
      <h1><a href="<?php echo base_url().'index.php/news' ?>">Citizen Journalism</a></h1>
      <h2>Where The News Are Real</h2>
    </div>
    <div id="header-contact">
      <ul class="list none">
        <li><span class="icon-envelope"></span> <a href="<?php echo base_url().'index.php/login/aboutus' ?>">About Us</a></li>
        <li><span class="icon-phone"></span>987-654-3210</a></li>
		
      </ul>
	  
    </div>
  </header>
</div>

<!--<body>
<div id="logo">
    CITIZEN JOURNALISM
</div>
-->
<?php include('menu.php'); ?>