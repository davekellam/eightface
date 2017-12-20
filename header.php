<!DOCTYPE html>  

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title( '&mdash;', true, 'right' );; ?></title>
	
	<meta name="description" content="This is Eightface, a weblog by Dave Kellam." />
	<meta name="author" content="Dave Kellam">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="alternate" type="application/rss+xml" title="RSS" href="http://eightface.com/feed/" />
	
	<?php wp_head(); ?>

	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="/images/eightface/logo.128.png"/>

	<script type="text/javascript">(function(d){var config = {kitId: 'yjc3syb',scriptTimeout:3000},h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)})(document);</script>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<header>
		<a href="/"><img src="/images/eightface/logo.png" alt="" class="logo"></a>
		<h1><a href="/">Eightface</a></h1>
		
		<nav>
			<ul>
				<li><a href="/about/">About</a></li>
				<li><a href="/archive/">Archive</a></li>
				<li><a href="/subscribe/">Subscribe</a></li>
			</ul>
		</nav>
	</header>
	
	<section id="content">