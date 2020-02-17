<?php
/**
 * rebalance functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rebalance
 */

if ( ! function_exists( 'rebalance_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rebalance_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rebalance, use a find and replace
		 * to change 'rebalance' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rebalance', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rebalance' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rebalance_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'rebalance_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rebalance_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rebalance_content_width', 640 );
}
add_action( 'after_setup_theme', 'rebalance_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rebalance_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rebalance' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rebalance' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rebalance_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rebalance_scripts() {
	wp_enqueue_style( 'new-hero', 'https://use.typekit.net/vzx1etu.css', false );
	
	wp_enqueue_style( 'rebalance-style', get_stylesheet_uri() );

	wp_enqueue_script( 'swup', get_template_directory_uri() . '/js/swup.js', array(), '20151215', true );
	
	wp_enqueue_script( 'swupbodyclass', get_template_directory_uri() . '/js/SwupBodyClassPlugin.min.js', array(), '20151215', true );

	wp_enqueue_script( 'rebalance-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rebalance-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rebalance_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Our custom post type function for exercises
function create_posttype() {
 
    register_post_type( 'exercises',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Exercises' ),
                'singular_name' => __( 'Exercise' )
            ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => 'exercises'),
			'taxonomies' => array('exercise-type', 'exercise-tag'),
			// below is to enable Gutenberg for this post type
			'show_in_rest' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'permalinks', 'featured_image' ),
        )
	);
	flush_rewrite_rules(); 
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype', 0 );

 
//create a custom taxonomy name it topics for your posts
 
function create_types_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  );    
  $args = array(
	'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
	'rewrite' => array( 'slug' => 'exercise-type' ),
	'public' => 'true',
	'has_archive' => 'true',
  );

// Now register the taxonomy
 
  register_taxonomy('types', 'exercises', $args);
}
//hook into the init action and call create_types_hierarchical_taxonomy when it fires
add_action( 'init', 'create_types_hierarchical_taxonomy', 0 );



/**
 * Add Tags to Exercises
 */

add_action( 'init', 'create_tag_taxonomies_for_exercises', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies_for_exercises() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

  register_taxonomy('exercises-tag','exercises',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
	'rewrite' => array( 'slug' => 'exercises-tag' ),
	'public' => 'true',
	'has_archive' => 'true',
  ));
  flush_rewrite_rules(); 
}

// /**
//  * Get taxonomies terms links.
//  *
//  * @see get_object_taxonomies()
//  */
// function wpdocs_custom_taxonomies_terms_links() {
//     // Get post by post ID.
//     if ( ! $post = get_post() ) {
//         return '';
//     }
 
//     // Get post type by post.
//     $post_type = $post->post_type;
 
//     // Get post type taxonomies.
//     $taxonomies = get_object_taxonomies( $post_type, 'objects' );
 
//     $out = array();
 
//     foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
 
//         // Get the terms related to post.
//         $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
//         if ( ! empty( $terms ) ) {
//             $out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
//             foreach ( $terms as $term ) {
//                 $out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
//                     esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
//                     esc_html( $term->name )
//                 );
//             }
//             $out[] = "\n</ul>\n";
//         }
//     }
//     return implode( '', $out );
// }
?>

