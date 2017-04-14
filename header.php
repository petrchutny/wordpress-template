<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
	<!-- Setup Google Analytics! -->
	<meta name="google-site-verification" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
	<!--  Favicon -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png" />
	<!-- Wordpress will put custom styles/scripts here -->
	<?php wp_head(); ?>
</head>
<body>
	<!--  Mobile menu overlay -->
	<div class="mobile-menu-overlay">
		<?php wp_nav_menu(array('theme_location' => 'header-menu','container_class' => 'mobile-menu')); ?>
		<div class="close-cross"></div>
	</div>
	<!-- Show the menu that we've registered -->
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
