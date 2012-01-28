<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php
	/*
	* Print the <title> tag based on what is being viewed.
	*/
	global $page, $paged;
	
	wp_title( '|', true, 'right' );
	
	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";	
	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/prettify.css" type="text/css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/prettify.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php if(is_page('Home')){ ?>
	<script type="text/javascript">
	$(document).ready(function(){
		function goToSlide(num,speed){
			$("#heroslider").animate({marginLeft:(num-1)*-900},speed)
			$("#featureicons li a").removeClass('active');
			$("#icon"+num).addClass('active');
		}
		$('.hero-unit ul').fadeIn('slow');
		var slide = 1;
		var int=self.setInterval(function(){
			slide++
			if(slide>4){
				slide = 1	
			}
			goToSlide(slide,1400);
		},9000);
	});
	</script>
	<?php 
	}
	wp_head(); 
	?>
</head>

<body onload="prettyPrint()" <?php body_class(); ?>>

	<div class="topbar">
		<div class="fill">
			<div class="container">
				<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<ul class="nav" style="float: right">
					<?php wp_nav_menu( array( 'menu' => 'header-menu', 'depth' => '1' ) ); ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="content">