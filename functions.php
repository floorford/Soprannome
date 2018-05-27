<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action('init','create_custom_post_type_show');

function create_custom_post_type_show(){
	$labels = array(
		'name' => 'Shows',
		'singular_name' => 'Show',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Show',
		'edit_item' => 'Edit Show',
		'new_item' => 'New Show',
		'view_item' => 'View Show',
		'search_items' => 'Search Shows',
		'not_found' => 'No shows found',
		'not_found_in_trash' => 'No shows found in Trash',
		'parent_item_colon' => '',
	);

  $args = array(
		'label' => __('Shows'),
		'labels' => $labels, // from array above
		'public' => true,
		'can_export' => true,
    'has_archive' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-calendar', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "shows" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'show_category', 'post_tag') // own categories
	);


	register_post_type('shows', $args); // used as internal identifier
}

/**
 * Footer credits
 */
function obliquechild_footer_credits() {
	echo '<a href="' . esc_url( __( 'http://www.soprannome/privacy-policy/', 'oblique' ) ) . '" rel="nofollow">';
	/* translators: Privacy Policy */
		printf( __( 'Privacy Policy', 'oblique' ), 'WordPress' );
	echo '</a>';
	echo '<span class="sep"> | </span>';
	/* translators: Contact Us */
  echo '<a href="' . esc_url( __( 'http://www.soprannome/contact-us/', 'oblique' ) ) . '" rel="nofollow">';
		printf( __( 'Contact Us', 'oblique' ), 'WordPress' );
	echo '</a>';
}
add_action( 'obliquechild_footer', 'obliquechild_footer_credits' );
