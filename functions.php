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
			'menu-2' => esc_html__( 'NonUser', 'rebalance' ),
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
	wp_enqueue_style('rebalance-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);	
	wp_enqueue_script( 'bundledJs', get_template_directory_uri() . '/js/bundle_compiled.js', array(), '2020', true );	
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
// Our custom user role "paying subscriber"
	add_role(
		'paying_subscriber',
		__( 'Paying Subscriber' ),
		array(
			'read' => true,  // true allows this capability
		)
	);
// Our custom post type function for exercises
function create_posttype() {
    register_post_type( 'exercises',
    // CPT Options
			array(
				'labels' => array(
					'name' => __( 'Exercises' ),
					'singular_name' => __( 'Exercise' ),
				),
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'has_archive' => 'exercises',
			'rewrite' => array('slug' => 'exercises/%exercisetypes%', 'with_front' => false),
			'taxonomies' => array('exercise-type', 'exercise-tag'),
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'permalinks', 'featured_image' ),
		)
	);
	flush_rewrite_rules(); 
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype', 0 );
 
//create a custom taxonomy name it topics for your posts
function create_exercisetypes_hierarchical_taxonomy() {
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
  $labels = array(
    'name' => _x( 'Exercise-Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Exercise-Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Exercise-Types' ),
    'all_items' => __( 'All Exercise-Types' ),
    'parent_item' => __( 'Parent Exercise-Type' ),
    'parent_item_colon' => __( 'Parent Exercise-Type:' ),
    'edit_item' => __( 'Edit Exercise-Type' ), 
    'update_item' => __( 'Update Exercise-Type' ),
    'add_new_item' => __( 'Add New Exercise-Type' ),
    'new_item_name' => __( 'New Exercise-Type Name' ),
    'menu_name' => __( 'Exercise-Types' )
  );    
  $args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'exercise-type', 'with_front' => false ),
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true // Needed for tax to appear in Gutenberg editor
  );
// Now register the taxonomy
  register_taxonomy('exercisetypes', 'exercises', $args);
}
//hook into the init action and call create_exercisetypes_hierarchical_taxonomy when it fires
add_action( 'init', 'create_exercisetypes_hierarchical_taxonomy', 0 );

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
    'menu_name' => __( 'Tags' )
  ); 

  register_taxonomy('exercises-tag','exercises',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
	'rewrite' => array( 'slug' => 'exercises-tag' ),
	'public' => true,
	'has_archive' => true,
	'show_in_rest' => true
  ));
  flush_rewrite_rules(); 
}

function show_cpt_permalinks( $post_link, $post ){
	if ( is_object( $post ) && $post->post_type == 'exercises' ){
		$terms = wp_get_object_terms( $post->ID, 'exercisetypes' );
		if( $terms ){
			return str_replace( '%exercisetypes%' , $terms[0]->slug , $post_link );
		}
	}
	return $post_link;
}
add_filter( 'post_type_link', 'show_cpt_permalinks', 1, 2 );

/* Use special template for tiny exercises */
function get_custom_single_template($single_template) {
	global $post;
	if ( has_term( 'tiny', 'exercisetypes', $post->ID ) ) {
		$single_template = dirname( __FILE__ ) . '/single-exercises-tiny.php';
	}
	return $single_template;
}
add_filter( "single_template", "get_custom_single_template" ) ;

/* Shortcode to display tiny content inline */
function tiny_shortcode( $atts = array() ){
	//default parameters
	extract(shortcode_atts( array(
		'name' => 'deep-breathing'
	), $atts ));
	$page = get_posts( array(
		'name'      => $atts['name'],
		'post_type' => 'exercises'
	) );
	if ( $page ){
		echo '<div class="rebalance-mini">';
		echo '<div class="rebalance-mini-illustration">';
		get_template_part( 'inc/inline', 'tiny-illu-'.$atts['name'].'.svg' );
		echo '</div><div class="rebalance-mini-instructions">';
    echo '<h4 class="notification-header">Tiny Rebalance: '.get_the_title( $page[0]->ID ).'</h4>';
    echo $page[0]->post_content.'<a class="button button-confetti" id="confetter" href="#confetti">Congratulate Yourself!</a></div>';
		echo '</div>';
	}
}
add_shortcode( 'tiny', 'tiny_shortcode' ); 

/** Display posts by category */
function postsbycategory($which_category = 'uncategorized') {
	// the query
	$the_query = new WP_Query( array( 'category_name' => $which_category, 'posts_per_page' => 30 ) ); 
	 
	// The Loop
	if ( $the_query->have_posts() ) {
		$catObj = get_category_by_slug($which_category); 
		$catName = $catObj->name;
		echo '<h2 class="posts-row-title">' . $catName .'</h2>';
		echo '<div class="posts-row">';
		//echo '<ul class="postsbycategory widget_recent_entries">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			get_template_part( 'template-parts/content', get_post_type() );	
				}
	} else {
		// no posts found
		echo 'no posts found';
	}
	echo '</div>';
	 
	/* Restore original Post Data */
	wp_reset_postdata();
	}
	// Add a shortcode
	add_shortcode('categoryposts', 'postsbycategory');
	// Enable shortcodes in text widgets
	add_filter('widget_text', 'do_shortcode');

	// Include tags in search results
	// search all taxonomies, based on: http://projects.jesseheap.com/all-projects/wordpress-plugin-tag-search-in-wordpress-23
	function atom_search_where($where){
		global $wpdb;
		if (is_search())
			$where .= "OR (t.name LIKE '%".get_search_query()."%' AND {$wpdb->posts}.post_status = 'publish')";
		return $where;
  }
  
	function atom_search_join($join){
		global $wpdb;
		if (is_search())
			$join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
		return $join;
  }
  
  function atom_search_groupby($groupby){
		global $wpdb;
		// we need to group on post ID
		$groupby_id = "{$wpdb->posts}.ID";
		if(!is_search() || strpos($groupby, $groupby_id) !== false) return $groupby;
		// groupby was empty, use ours
		if(!strlen(trim($groupby))) return $groupby_id;
		// wasn't empty, append ours
		return $groupby.", ".$groupby_id;
  }
  
  add_filter('posts_where','atom_search_where');
  add_filter('posts_join', 'atom_search_join');
  add_filter('posts_groupby', 'atom_search_groupby');

// breadcrumbs for custom taxomonies
	function show_custax_breadcrumb($name,$type){
    $list = "";
    $home = get_bloginfo("url");
    if ($type && $name){
			$ans = get_term_by('name', $name, $type);
			$parentID=$ans->parent;
			while ($parentID > 0){
				$parent = get_term_by('id', $parentID, $type);
				$url = $home."/".$type."/".$parent->slug;
				$list = "<li><a href='".$url."'>".$parent->name."</a></li>".$list;
				$parentID = $parent->parent;
			}
			$url = $home."/".$type."/".$ans->slug;
			$list = $list."<li>".$ans->name."</li>";
		}   
    if ($list) echo "<ul class='breadcrumbs'><li><a href='".$home."'>Home</a></li>".$list."</ul>";
	}

//  breadcrumbs for default taxonomies
function show_breadcrumb() {
	if (!is_front_page()) {
		// Start the breadcrumb with a link to your homepage
		echo '<ul class="breadcrumbs">';
		echo '<li><a href="';
		echo get_option('home');
		echo '">Home';
		echo '</a></li>';
		// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
		if ( is_category() || is_single() ) {
			echo '<li>';
			the_category('<li>', '</li>');
			echo '</li>'; } 
		elseif ( is_archive() || is_single() ) {
			if ( is_day() ) {
				printf( __( '%s', 'text_domain' ), get_the_date() ); } 
			elseif ( is_month() ) {
				printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );} 
			elseif ( is_year() ) {
				printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) ); } 
			else {
				_e( 'Blog Archives', 'text_domain' );
			}
		}
		// If the current page is a single post, show its title with the separator
		if (is_single()) {
			echo '<li>';
			the_title();
			echo '</li>';
		}
		// If the current page is a static page, show its title.
		if (is_page()) {
			echo '<li>';	
			echo the_title();
			echo '</li>';
		}
		// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
		if (is_home()){
			global $post;
			$page_for_posts_id = get_option('page_for_posts');
			if ( $page_for_posts_id ) { 
				$post = get_page($page_for_posts_id);
				setup_postdata($post);
				echo '<li>';
				the_title();
				echo '</li>';
				rewind_posts();
			}
		}
		if (is_search()){
			echo '<li>';
			echo 'Search';
			echo '</li>';
		}
		echo '</ul>';
	}
}

// adding custom body classes
function rebalance_bodyclass_names( $classes ) {
	global $post;
	if ( is_singular() && has_term( 'tiny', 'exercisetypes', $post->ID ) ) {
			$classes[] = 'tiny-single';
	}
	$usypusy = SwpmAuth::get_instance();
	if ( SwpmMemberUtils::is_member_logged_in()) {
		if ($usypusy->is_expired_account()){
			$classes[] = 'wpsmp-loggedin-expired';
		}
			$classes[] = 'wpsmp-loggedin';
	}  else {
			$classes[] = 'wpsmp-loggedout';
	}
	return $classes;
}
add_filter( 'body_class', 'rebalance_bodyclass_names' );

// Rebalancecustom post navigation
function rebalance_get_the_posts_navigation( $args = array() ) {
	$navigation = '';

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
			// Make sure the nav element has an aria-label attribute: fallback to the screen reader text.
			if ( ! empty( $args['screen_reader_text'] ) && empty( $args['aria_label'] ) ) {
					$args['aria_label'] = $args['screen_reader_text'];
			}
			$args = wp_parse_args(
					$args,
					array(
							'prev_text'          => __( 'More exercises ???' ),
							'next_text'          => __( '??? Back' ),
							'screen_reader_text' => __( 'Exercise navigation' ),
							'aria_label'         => __( 'Exercises' ),
					)
			);
			$next_link = get_previous_posts_link( $args['next_text'] );
			$prev_link = get_next_posts_link( $args['prev_text'] );
			if ( $prev_link ) {
					$navigation .= '<div class="nav-previous">' . $prev_link . '</div>';
			}
			if ( $next_link ) {
					$navigation .= '<div class="nav-next">' . $next_link . '</div>';
			}
			$navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'], $args['aria_label'] );
	}
	return $navigation;
}

// adding support for html emails
add_filter( 'wp_mail_content_type','mycustom_set_content_type' );
function mycustom_set_content_type() {
				return "text/html";
}

// also filter the password reset email for compatibility with the HTML format
add_filter( 'retrieve_password_message', 'mycustom_retrieve_password_message', 10, 1 );
function mycustom_retrieve_password_message( $message ) {
				$message = str_replace('<','',$message);
				$message = str_replace('>','',$message);
				$message = str_replace("\n",'<br>',$message);
				return $message;
}

// adding the html to the wp_mail function
add_filter( 'wp_mail', 'my_wp_mail_filter' );
function my_wp_mail_filter( $args ) {
	
	$new_wp_mail = array(
		'to'          => $args['to'],
		'subject'     => $args['subject'],
		'message'     => '<head><meta charset="utf-8"><meta name="viewport" content="width=device-width"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="x-apple-disable-message-reformatting"><!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. --><!--[if mso]><style>*{font-family: sans-serif !important;}</style><![endif]--><!-- CSS Reset --><style>@import url("https://use.typekit.net/vzx1etu.css");body,html{margin:0 auto!important;padding:0!important;height:100%!important;width:100%!important}*{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}div[style*="margin: 16px 0"]{margin:0!important}table,td{mso-table-lspace:0!important;mso-table-rspace:0!important}table{border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important}table table table{table-layout:auto}img{-ms-interpolation-mode:bicubic}[x-apple-data-detectors]{color:inherit!important;text-decoration:none!important}.aBn,.x-gmail-data-detectors,.x-gmail-data-detectors *{border-bottom:0!important;cursor:default!important}.button-link{text-decoration:none!important}@media only screen and (min-device-width:375px) and (max-device-width:413px){.email-container{min-width:375px!important}}.button-container { background-color: #FF9B7A !important; }.button-container a { color: #FFFFFF !important; }@media (prefers-color-scheme: dark ){.dark-img { display:block!important; width: auto!important; height: auto!important; overflow: visible!important; float: none!important; max-height:inherit!important; max-width:inherit!important; line-height: auto!important;margin-top:0px!important; visibility:inherit!important;}.light-img { display:none; display:none !important;}.button-container{background-color: #FF9B7A !important;}.button-container a { color: #FFFFFF !important;}}</style><!-- What it does: Makes background images in 72ppi Outlook render at correct size. --><!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]--><!-- Progressive Enhancements --><style>@media screen and (max-width:600px){.email-container, td {font-size:16px!important;line-height:23px!important}}</style></head>
		<body width="100%" bgcolor="#9ACFE9" style="margin: 0; mso-line-height-rule: exactly;">
			<div style="max-width: 600px; margin: auto;" class="email-container"><table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;"><tr><td class="logo-container" style="text-align: center; padding: 30px; background-color: #FFFFFF;">
		<img class="light-img" src="https://re-balance.io/wp-content/themes/rebalance-wptheme/img/rebalance-logo.png" alt="rebalance" style="width: 200px; height: 55px; border: none; font-size:12px; font-style: italic; margin-bottom: 10px;" />
		<!--[if !mso]><! --><div class="dark-img" style="display:none; overflow:hidden; float:left; width:0px; max-height:0px; max-width:0px; line-height:0px; visibility:hidden;" align="center">
		<img src="https://re-balance.io/wp-content/themes/rebalance-wptheme/img/rebalance-logo-darkmode.png" alt="rebalance" style="width: 200px; height: 55px; border: none; font-size:12px; font-style: italic; margin-bottom: 10px;" /></div><!--<![endif]-->
		</td></tr><tr><td style="padding: 30px; font-family: hero-new, sans-serif; font-size: 17px; line-height: 25px; color: #333333; background-color: #FFFFFF;">'.$args['message'].'</td></tr><tr><td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: hero-new,  sans-serif; line-height:18px; text-align: center; background-color: #FFFFFF; color: #888888; border-top: 1px solid #EEEEEE;">
			This Email address was sent by <a href="www.re-balance.io" style="color: #FF9B7A; text-decoration: none;">www.re-balance.io</a><br /><br />
			ReBalance for work | 92 Boundary St, Paddington, NSW 2021 | Australia
			</td></tr></table></div></body>',
		'headers'     => $args['headers'],
		'attachments' => $args['attachments'],
	);
	return $new_wp_mail;
}

// conditionals for memberships 
//if user is logged in 
function rebalance_member_is_logged_in() {
	if ( SwpmMemberUtils::is_member_logged_in()){ return true; } else { return false; }
}
// if membership is expired
function rebalance_membership_is_expired() {
	$userauth = SwpmAuth::get_instance();
	if ($userauth->is_expired_account()) { return true; } else { return false; }
}
// ID to check against
function get_rebalance_membership_id() {
	$userauth = SwpmAuth::get_instance();
	return $userauth->get('membership_level'); 
}
// Alias mainly for testing, since can be changed by admin in WP
function get_rebalance_membership_alias() {
	$userauth = SwpmAuth::get_instance();
	return $userauth->get('alias'); 
}
 
//Notification for when subscription or trial period is expired 
function get_the_expired_notification($closebtn = false, $message = '', $class = 'notification'){
	$loginlink = '/membership-login';
	$signuplink = '/membership-registration';
	$headline = '<h4 class="'.$class.'-header"><svg class="alarm-clock" style="width: 1.25em; height: auto; position: relative; top: 2px; margin-right: .5em;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 245.681 245.681">
	<path d="M191.727,211.986c15.715-16.843,25.349-39.431,25.349-64.229c0-17.99-5.07-34.816-13.852-49.131   c6.861-6.979,10.83-16.461,10.83-26.381c0-17.439-11.938-32.141-28.07-36.37C183.499,15.686,166.257,0,145.408,0h-45.135   C79.424,0,62.182,15.686,59.696,35.874c-16.132,4.229-28.07,18.931-28.07,36.37c0,9.919,3.969,19.401,10.83,26.382   c-8.782,14.315-13.852,31.141-13.852,49.131c0,24.798,9.633,47.386,25.349,64.229l-14.137,19.392   c-2.929,4.017-2.046,9.646,1.971,12.574c1.6,1.167,3.455,1.729,5.294,1.729c2.778,0,5.519-1.282,7.28-3.699l13.128-18.009   c15.552,11.325,34.683,18.019,55.351,18.019s39.799-6.693,55.351-18.019l13.128,18.009c1.762,2.417,4.502,3.699,7.28,3.699   c1.838,0,3.694-0.563,5.294-1.729c4.017-2.928,4.899-8.558,1.971-12.574L191.727,211.986z M196.054,72.244   c0,4.266-1.409,8.376-3.911,11.73c-8.876-9.637-19.73-17.422-31.912-22.709c3.592-5.288,9.642-8.618,16.225-8.618   C187.263,52.647,196.054,61.438,196.054,72.244z M100.273,18h45.135c10.833,0,19.927,7.565,22.292,17.689   c-10.778,2.597-20.014,9.887-24.977,19.95c-6.412-1.383-13.063-2.118-19.882-2.118s-13.47,0.735-19.882,2.118   c-4.963-10.063-14.199-17.354-24.977-19.95C80.346,25.565,89.44,18,100.273,18z M49.626,72.244   c0-10.806,8.791-19.597,19.598-19.597c6.583,0,12.632,3.33,16.225,8.618c-12.182,5.287-23.036,13.072-31.912,22.709   C51.036,80.621,49.626,76.509,49.626,72.244z M46.605,147.757c0-42.036,34.199-76.235,76.235-76.235s76.235,34.199,76.235,76.235   s-34.199,76.234-76.235,76.234S46.605,189.793,46.605,147.757z"/>
		<path d="M165.37,144.256h-34.629v-43.322c0-4.971-4.029-9-9-9s-9,4.029-9,9v52.322c0,4.971,4.029,9,9,9h43.629c4.971,0,9-4.029,9-9   S170.34,144.256,165.37,144.256z"/>
	</svg>Your subscription has expired.</h4>';
	$text = SwpmUtils::_('') .  SwpmMiscUtils::get_renewal_link();
	if ( $message ){
		$text = $message;
	}
	$text .= get_manage_subscription_button(); 
	if ( $closebtn ){
		$text .= '<div class="close"><svg class="close-x" style="position: absolute; right: 1.5rem; top: 1.33rem; width: 1em; height: 1em;" x="0px" y="0px" viewBox="0 0 96 96" enable-background="new 0 0 96 96" xml:space="preserve"><polygon fill="#FF9B7A" points="96,14 82,0 48,34 14,0 0,14 34,48 0,82 14,96 48,62 82,96 96,82 62,48 "/></svg></div>';
	}
	$error_msg = '<div class="'.$class. ' notification-expired"><span class="'.$class.'-text">'.$headline.$text.'</span></div>';	
	return $error_msg;
}

// Helper Function to quickly get SWPM subscriber ID
function get_the_subscriberid() {
	if ( SwpmAuth::get_instance()->userData ) {
		$subscr_id = SwpmAuth::get_instance()->userData->subscr_id;
		return $subscr_id;
	} else {
		return false;
	}
}

// Check if user has a paid SWPM Membership
function user_has_paid_subscription() {
	$subscri_id = get_the_subscriberid();
	if ($subscri_id) { //if there's a stripe subscriber id stored in WP 
		require_once('stripe-php/init.php');
		// Set your secret key. Remember to switch to your live secret key in production!
		$settings = SwpmSettings::get_instance();
		$sandbox_enabled = $settings->get_value('enable-sandbox-testing');
		if ($sandbox_enabled) {
			\Stripe\Stripe::setApiKey(TESTSTRIPEAPIKEY);
			$stripe = new \Stripe\StripeClient(TESTSTRIPEAPIKEY);
		} 
		else {
			\Stripe\Stripe::setApiKey(LIVESTRIPEAPIKEY);
			$stripe = new \Stripe\StripeClient(LIVESTRIPEAPIKEY);
		}
		try {
			$response = $stripe->subscriptions->retrieve(
				$subscri_id,
				[]
			);
			$status = $response->status;
			if ( $status !== 'canceled' ) {
				return true;
			}
			else {
				return false;
			}
		}
		catch (Exception $e) {
			echo '<p>Either payment is in livemode and you are trying to reach a testmode subscription or the other way round... anyways if this message is confusing to you please notify us through our <a href="/contact">contact page</a>.</p>';
		} 	
	}
}

function get_manage_subscription_button() {
	$subscr_id = SwpmAuth::get_instance()->userData->subscr_id;
	if ($subscr_id){
		if ( SwpmTransactions::get_transaction_row_by_subscr_id($subscr_id) ){
			$transaction = SwpmTransactions::get_transaction_row_by_subscr_id($subscr_id)->txn_id;                        
		}
		else $transaction = null;
	} else {
		$transaction = null;
	}
	if ($transaction and user_has_paid_subscription() ) {
		require_once('stripe-php/init.php');
		// Set your secret key. Remember to switch to your live secret key in production!
		$settings = SwpmSettings::get_instance();
		$sandbox_enabled = $settings->get_value('enable-sandbox-testing');
		if ($sandbox_enabled) {
			\Stripe\Stripe::setApiKey(TESTSTRIPEAPIKEY);
		} else {
			\Stripe\Stripe::setApiKey(LIVESTRIPEAPIKEY);
		}
		$stripecall = \Stripe\BillingPortal\Session::create([
			'customer' => $transaction,
			'return_url' => 'http://re-balance.io/membership-profile',
		]);
		if ($stripecall) {
			return '<a class="button button-small" href="'.$stripecall['url'].'">Manage&nbsp;subscription</a>';
		}		
	} 
	else { // This should only show up if user has a free subscription 
		return '<a class="button button-small" href="/pricing">Go to subscriptions</a>';
	}
}

function display_manage_subscription_button() {
	echo get_manage_subscription_button();
}

function vimeo_duration ($id) {
	try {
	$authorization = 'a8551ce418b6b633a01d7e456fdf262b';
	$ch = curl_init();
	
	curl_setopt_array($ch, array(
			CURLOPT_URL => "https://api.vimeo.com/videos/$id?fields=duration",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
					"authorization: Bearer {$authorization}",
					"cache-control: no-cache",
			),
	));
	
			$res = curl_exec($ch);
			$obj = json_decode($res, true);
			return $obj['duration'];
	
	} catch (Exception $e) {
		# returning 0 if the Vimeo API fails for some reason.
		return "0";
	}
}				

// Adding the shortcode for SWPM plugin to hide only embeds 
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
	if ( in_array( get_post()->post_type, [ 'exercises' ] ) and is_single() and !is_admin() ) {
		if ( rebalance_membership_is_expired() ){
			return get_the_expired_notification(false, '', 'swpm-partial-protection');
		}
		else {
			// display the time of the video
			$pattern = "#https://vimeo.com/#";
			$vimeoidslash = preg_replace($pattern, "", $url);			
			$vimeoid = preg_replace("#/#", ":", $vimeoidslash);			
			$t = vimeo_duration($vimeoid);
			$loginlink = '/membership-login';
			$signuplink = '/membership-registration';
			echo '<div class="video-duration">Time: '.sprintf('%02d:%02d', ($t/60%60), $t%60).'</div>';
			return '
				[swpm_protected custom_msg="
					Please <a href=\''.$loginlink.'\'>log in</a> to view this exercise or <a href=\''.$signuplink.'\'>sign up</a> for a free trial"]' . $html . '
				[/swpm_protected]';			
		}
	}
	elseif ( in_array( get_post()->post_type, [ 'exercises' ] ) and !is_single() and !is_admin() ) { 
		// If we're in the archive we only want to show the duration of the video
		$pattern = "#https://vimeo.com/#";
		$vimeoidslash = preg_replace($pattern, "", $url);			
		$vimeoid = preg_replace("#/#", ":", $vimeoidslash);			
		$t = vimeo_duration($vimeoid);	
		echo '<div class="video-duration">Time: '.sprintf('%02d:%02d', ($t/60%60), $t%60).'</div>';
		// To get the vimeo to display on the archive uncomment below
		//return $html;
	}
	else {
		return $html;
	}
}

// This is to get the vimeo post, then extract the id with the function above and display only the duration in the post thumnail view:  
function get_first_embed_media($post_id) {
	$post = get_post($post_id);
	$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
	$embeds = get_media_embedded_in_content( $content );
	if( !empty($embeds) ) {
			//check what is the first embed containg vimeo
			foreach( $embeds as $embed ) {
					if( strpos( $embed, 'vimeo' ) ) {
							return $embed;
					}
			}
	} else {
			//No video embedded found
			return false;
	}
}

//For development you can use get_current_template to show which template is used
add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
		$GLOBALS['current_theme_template'] = basename($t);
		return $t;
}

function get_current_template( $echo = false ) {
		if( !isset( $GLOBALS['current_theme_template'] ) )
				return false;
		if( $echo )
				echo $GLOBALS['current_theme_template'];
		else
				return $GLOBALS['current_theme_template'];
}

//Mailpoet stuff

// Mailpoet Forms customisation
add_filter( 'mailpoet_manage_subscription_page_form_fields', 'mp_remove_manage_fields', 10);
function mp_remove_manage_fields( $form ) {	
	unset($form[0]); // First Name
	unset($form[1]); // Last Name
//	unset($form[3]); // List Selection Dropdown
	return $form;
}
// Mailpoet remove custom fonts
add_filter('mailpoet_display_custom_fonts', function () {
	return false;
});

// Custom Mailpoet Shortcodes to use tiny exercises in emails. Usage: "[custom:gratitude]" in mailpoet email editor
add_filter('mailpoet_newsletter_shortcode', 'mailpoet_custom_shortcode', 10, 5);

function mailpoet_custom_shortcode($shortcode, $newsletter, $subscriber, $queue, $newsletter_body) {
	// always return the shortcode if it doesn't match your own!
	$end = strlen($shortcode);
	$tinyname = substr($shortcode, 8, $end-9); //cut the string to only the word
	
	$page = get_posts( array(
		'name'      => $tinyname,
		'post_type' => 'exercises'
	) );

	if ( $page ){
		$output = '<table style="border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0" width="100%" cellspacing="0" cellpadding="0" border="0">';
		$output .= '<tr><td style="background-color: #ffe8e0; padding: 0; border-radius: 5px">';
		$output .= '<div style="display: inline-block; max-width: 30%; vertical-align: middle; text-align: center; width: 100%; padding: 0">';
		$output .= '<table style="border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0" width="100%" cellspacing="0" cellpadding="0" border="0"><tr>';
		$output .= '<td style="padding: 15px 0 15px 15px; text-align: center">';
		$output .= get_the_post_thumbnail( $page[0]->ID, 'full', array( 'style' => 'width: 100%; height: auto' ) );
		$output .= '</td></tr></table>';
		$output .= '</div><div style="display: inline-block; max-width: 70%; vertical-align: middle; width: 100%; padding: 0; line-height: 1.5">';
		$output .= '<table style="border-collapse:collapse;border-spacing:0;mso-table-lspace:0;mso-table-rspace:0" width="100%" cellspacing="0" cellpadding="0" border="0"><tr>';
		$output .= '<td style="padding: 25px; border-collapse: collapse; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 16px; line-height: 1.5; word-break: break-word; word-wrap: break-word; text-align: left;">';
		$output .= '<h4 style="margin-top: 0">Tiny Rebalance: '.get_the_title( $page[0]->ID ).'</h4>';
		$output .= '<style type="text/css">ol{padding-left: 1em; margin-bottom: 0} ol li{ padding: 5px 0}</style>';
		$output .= $page[0]->post_content;
		$output .= '</td></tr></table></div></td></tr></table>';
	} else { 
		$output = $tinyname.' does not exist, check if the name of the post is identical with the URL'; 
	};
  
	return $output;
}

// After user registered unsubscribe them from the pdf mail list
function after_registration_callback ($member_info)
{
  $userEmail = $member_info['email'];
  if (class_exists(\MailPoet\API\API::class)) {
    // Get MailPoet API instance
    $mailpoet_api = \MailPoet\API\API::MP('v1');
    try {
      $the_subscriber = $mailpoet_api->getSubscriber($userEmail);
    } catch (\Exception $e) {}
    try {
      if (!$the_subscriber) {
        // Subscriber doesn't exist nothing needs to happen
        //$mailpoet_api->addSubscriber($subscriber, $list_ids);
      } else {
        // In case subscriber exists just unsubscribe them from the PDF list with ID 7
        $mailpoet_api->unsubscribeFromList($userEmail, 7);
      }
    } catch (\Exception $e) {
      $error_message = $e->getMessage(); 
    }
  }
}
add_action('swpm_front_end_registration_complete_user_data', 'after_registration_callback');

function wp_maintenance_mode() {
  if (!current_user_can('edit_themes') || !is_user_logged_in()) {
    wp_die('<div style="width: 166px; height: 46px; margin: 10px auto 20px auto"><svg id="rebalance-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 166 46" style="enable-background:new 0 0 166 46;" xml:space="preserve">
 <style type="text/css">
   .st0{fill:#000000;}
   .st1{fill:#FF9B7A;}
 </style>
 <path class="st0" d="M-0.4,9.3h1.9l0.3,3.1h0c1.3-2.5,3.8-3.3,5.5-3.3c0.5,0,0.9,0,1.2,0.1v2.3c-0.4-0.1-0.8-0.1-1.2-0.1
   c-2.6,0-5.3,1.7-5.3,5.5v11.4h-2.4V9.3z"/>
 <path class="st0" d="M27.4,19.7H12.9c0.4,4.2,3.1,6.8,7,6.8c2.2,0,4.5-0.8,6.6-2.7v2.7c-2,1.5-4.2,2.3-6.7,2.3
   c-5.7,0-9.3-3.9-9.3-9.8c0-6.2,4.3-10,9-10c4.4,0,8,3.3,8,9.5C27.5,18.9,27.5,19.3,27.4,19.7z M25.1,17.6c-0.1-4.5-2.8-6.5-5.7-6.5
   c-3.2,0-6.1,2.5-6.5,6.5H25.1z"/>
 <path d="M35,12.8c1.4-2.6,4.1-3.9,6.8-3.9c4.5,0,8.7,3.8,8.7,9.9c0,6.1-4.2,9.9-8.7,9.9c-2.7,0-5.4-1.3-7-4.1l-0.3,3.7h-1.9V0H35
   V12.8z M34.9,18.8c0,4.6,2.9,7.6,6.6,7.6c3.7,0,6.6-3.1,6.6-7.6c0-4.6-2.9-7.6-6.6-7.6C37.8,11.2,34.9,14.3,34.9,18.8z"/>
 <path d="M54.4,18.8c0-6.1,4.2-9.9,8.7-9.9c2.7,0,5.5,1.3,7,4.1l0.3-3.7h2v19.1h-2l-0.3-3.7c-1.5,2.8-4.3,4.1-7,4.1
   C58.6,28.7,54.4,24.9,54.4,18.8z M70,18.8c0-4.5-3-7.6-6.6-7.6c-3.7,0-6.6,3-6.6,7.6c0,4.6,2.9,7.6,6.6,7.6
   C67.1,26.4,70,23.3,70,18.8z"/>
 <path d="M78.8,0h2.4v28.4h-2.4V0z"/>
 <path d="M86.4,18.8c0-6.1,4.2-9.9,8.7-9.9c2.7,0,5.5,1.3,7,4.1l0.3-3.7h2v19.1h-2l-0.3-3.7c-1.5,2.8-4.3,4.1-7,4.1
   C90.6,28.7,86.4,24.9,86.4,18.8z M102.1,18.8c0-4.5-3-7.6-6.6-7.6c-3.7,0-6.6,3-6.6,7.6c0,4.6,2.9,7.6,6.6,7.6
   C99.1,26.4,102.1,23.3,102.1,18.8z"/>
 <path d="M125.8,15.7v12.6h-2.4V16.8c0-3.7-1.7-5.5-4.9-5.5c-3,0-5.3,2.2-5.3,5.3v11.8h-2.4V9.3h1.8l0.3,3h0.1
   c1.1-1.8,3.2-3.3,5.9-3.3C123,8.9,125.8,11.6,125.8,15.7z"/>
 <path d="M140.1,26.4c1.6,0,3.6-0.4,5.2-1.6v2.6c-1.4,0.8-3.1,1.3-5.2,1.3c-5.4,0-9.5-4.3-9.5-10c0-5.5,4-9.9,9.5-9.9
   c2,0,3.7,0.4,5.2,1.4v2.6c-1.6-1.2-3.2-1.7-5.2-1.7c-3.6,0-7,2.8-7,7.6C133.1,23.6,136.5,26.4,140.1,26.4z"/>
 <path class="st0" d="M165.7,19.7h-14.5c0.4,4.2,3.1,6.8,7,6.8c2.2,0,4.5-0.8,6.6-2.7v2.7c-2,1.5-4.2,2.3-6.7,2.3
   c-5.7,0-9.3-3.9-9.3-9.8c0-6.2,4.3-10,9-10c4.4,0,8,3.3,8,9.5C165.8,18.9,165.8,19.3,165.7,19.7z M163.5,17.6
   c-0.1-4.5-2.8-6.5-5.7-6.5c-3.2,0-6.1,2.5-6.5,6.5H163.5z"/>
 <g>
   <path class="st1" d="M80,45.5c-9.3,0-14.8-6.8-15.1-7.1l1.7-1.3l-0.8,0.7l0.8-0.7c0.1,0.1,5.2,6.3,13.4,6.3
     c8.2,0,13.3-6.3,13.4-6.3l1.7,1.3C94.8,38.6,89.2,45.5,80,45.5z"/>
 </g>
 </svg></div><h1 style="text-align: center">re-balance.io is now offline</h1><p style="text-align: center">If you have any questions, please <a href="mailto:emma@re-balance.io">email us</a>.');
  }
}
add_action('get_header', 'wp_maintenance_mode');

?>

