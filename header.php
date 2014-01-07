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

	<link rel="stylesheet" href="/wp-content/themes/eightface/css/style.css" media="screen" />

	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="/images/eightface/logo.128.png"/>

	<script type="text/javascript" src="http://use.typekit.net/yjc3syb.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<header>
		<a href="/"><img src="/images/eightface/logo.png" alt="" class="logo"></a>
		<h1><a href="/">Eightface</a></h1>

		<p>by <a href="http://davekellam.com">Dave Kellam</a></p>
		
		<nav>
			<ul>
				<li><a href="/about/">About</a></li>
				<li><a href="/archive/">Archive</a></li>
				<li><a href="/subscribe/">Subscribe</a></li>
			</ul>
		</nav>
	</header>
	
	<section id="content">