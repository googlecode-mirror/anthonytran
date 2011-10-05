<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tonynews.com | template</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="<?php echo base_url();?>public/client_2/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/client_2/js/client_2.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo css_link('style.css');?>" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss-articles/" />
</head>
<body>

<div id="wrap">

<div id="top"> </div>

<div id="header"> 
<h1><a href="#">Tonynews.com</a></h1>
<h2>Tonytran's First Website Template</h2>
</div>

<div id="menu">
<ul>
<li><a href="<?php echo base_url();?>home.html">Home</a></li>
  <?php foreach ($navlist as $k => $v){?>
	<li>
		<?php if($v->parent_id == 0) {?>
			<a href="<?php echo base_url();?>categories/<?php echo $v->name_ascii.'.html';?>"><?php echo $v->name; ?></a>
		<?php }?>
	</li>
  <?php }?>
</ul>
</div>
<div id="content"> 






