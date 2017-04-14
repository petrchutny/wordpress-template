<?php

// TGM plugin activation
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {
	$plugins = array(

		array(
			'name'               => 'Contact Form 7', // The plugin name.
			'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'               => 'Akismet', // The plugin name.
			'slug'               => 'akismet', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'      => 'Advanced Custom Fields Pro',
			'slug'      => 'advanced-custom-fields-pro',
			'source'    => 'https://github.com/wp-premium/advanced-custom-fields-pro/archive/master.zip',
		),
		array(
			'name'               => 'Show IDs', // The plugin name.
			'slug'               => 'wpsite-show-ids', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'               => 'WP-SCSS', // The plugin name.
			'slug'               => 'wp-scss', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_deactivation' => true
		),
		array(
			'name'               => 'WP Migrate DB', // The plugin name.
			'slug'               => 'wp-migrate-db', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'               => 'ManageWP - Worker', // The plugin name.
			'slug'               => 'worker', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_deactivation' => true
		),
		array(
			'name'               => 'Facebook Open Graph, Google+ and Twitter Card Tags', // The plugin name.
			'slug'               => 'wonderm00ns-simple-facebook-open-graph-tags', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'               => 'Regenerate Thumbnails', // The plugin name.
			'slug'               => 'regenerate-thumbnails', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'               => 'Favicon by RealFaviconGenerator', // The plugin name.
			'slug'               => 'favicon-by-realfavicongenerator', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'               => 'EWWW Image Optimizer', // The plugin name.
			'slug'               => 'ewww-image-optimizer', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),

	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}

// Register menu

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('mobile-menu',__( 'Mobile Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Modify CSS Styles

add_action('wp_print_styles', 'modifyStyles');
function modifyStyles() {
  // Zde patří Enqueue a Dequeue metody

  // wp_dequeue_style('nazev_stylu');

  // Magnific Popup – display on specific page or specific post typpe
  if ( is_page( '173' )  || ('work' == get_post_type())) {
    wp_enqueue_style( 'magnific-popup',
    get_template_directory_uri() . '/css/magnific-popup.css' );
  }
}

// Modify scripts

if (!is_admin()) add_action("wp_enqueue_scripts", "modifyScripts", 11);
function modifyScripts() {

  // jquery 3.1.1 replacing the default one
  wp_deregister_script('jquery');
  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-3.1.1.min.js", false, null);
  wp_enqueue_script('jquery');

  // Scripts.js
  wp_enqueue_script(
    'scripts',
    get_template_directory_uri() . '/js/scripts.js',
    null,
    null,
    true
  );

  // Magnific popup lightbox on specific page or specific post type
  if ( is_page( '173' ) || ('work' == get_post_type()) ) {
    wp_enqueue_script(
      'magnific-popup',
      get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',
      null,
      null,
      true
    );
  }

}

// Add option page

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Other Content',
		'menu_title'	=> 'Other Content',
		'menu_slug' 	=> 'other-content',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

}

// Filter for Opengraph plugin

add_filter("fb_og_title","change_og_name");
function change_og_name(){
  echo '<meta property="og:title" content="' . wp_title( '|', false, 'right' ) . get_bloginfo('name') . '">';
}

// Hide admin bar in frontend

if(!is_admin()) {
	show_admin_bar(false);
}

?>
