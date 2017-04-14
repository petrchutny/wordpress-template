<?php

// Register menu

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Modify CSS Styles

add_action('wp_print_styles', 'modifyStyles');
function modifyStyles() {
  // Zde patří Enqueue a Dequeue metody

  // wp_dequeue_style('nazev_stylu');
}

// Modify scripts

if (!is_admin()) add_action("wp_enqueue_scripts", "modifyScripts", 11);
function modifyScripts() {

  // jquery
  wp_deregister_script('jquery');
  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-3.1.1.slim.min.js", false, null);
  wp_enqueue_script('jquery');

  // Magnific popup lightbox on Works page
  if ( is_page( '6' ) ) {
    wp_enqueue_script(
      'magnific-popup',
      get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',
      null,
      null,
      true
    );
  }

	// Svgeezy
	wp_enqueue_script(
		'svgeezy',
		get_template_directory_uri() . '/js/svgeezy.min.js',
		null,
		null,
		true
	);

  // Scripts.js
  wp_enqueue_script(
    'scripts',
    get_template_directory_uri() . '/js/scripts.js',
    null,
    null,
    true
  );
}



?>
