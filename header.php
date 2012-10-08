<!doctype html>
<html <?php language_attributes(); ?> id="html">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="verify-v1" content="z3eqzSUb9U1e0Iq+e6/+CvGdMEz/AXFyd84tgkseiLM=" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?version=0.7" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/print.css" type="text/css" media="print" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?>/images/zol2.gif" type="image/gif" />
<link type="text/plain" rel="author" href="http://www.zolininkas.lt/humans.txt" />
<link href="https://plus.google.com/112463392244221631179/" rel="publisher" />
<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php wp_head(); ?>

</head>
<body>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8252303-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<header id="header_wrapper">
	<div id="header" class="clearfix">
		<div class="fl lefter">
			<a class="logo" href="<?php echo get_settings('home'); ?>/"><span>Žolininkas</span></a>
			<p class="site-description"> 
				<?php bloginfo('description'); ?> 
			</p>
			<nav>
				<ul class="menu main_menu clearfix">
					<?php wp_list_pages('sort_column=menu_order&hierarchical=0&title_li=&include=1279,1281,146,142'); ?>
				</ul>
			</nav>
			<div class="fb_like">
				<fb:like href="http://www.facebook.com/pages/Zolininkaslt/195382747178262" send="false" layout="box_count" width="80" show_faces="false" font="trebuchet ms"></fb:like>
			</div>
			<div class="fb_like g-badge" style="left: 580px;">
				<a href="https://plus.google.com/112463392244221631179/?prsrc=3" style="text-decoration: none;"><img src="https://ssl.gstatic.com/images/icons/gplus-64.png" width="64" height="64" style="border: 0;"></img></a>
			</div>
		</div>
		<div id="portrait-bg">
			<span>
				<a href="http://www.zolininkas.lt/iliustracija/">
					<span class="ico"><br/></span>
					<img src="<?php echo get_bloginfo('template_directory'); ?>/images/theme-img.jpg" alt="" />
				</a>
			</span>
		</div>
	</div>
</header>