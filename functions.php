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
	
	wp_enqueue_style( 'rebalance-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.0/gsap.min.js', array(), true );
	
	wp_enqueue_script( 'gsapScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.0/ScrollTrigger.min.js', array(), true );
	
	wp_enqueue_script( 'gsapDrawSVGPlugin', get_template_directory_uri() . '/js/DrawSVGPlugin.js', array(), true );

	wp_enqueue_script( 'swup', get_template_directory_uri() . '/js/swup.js', array(), '20151215', true );
	
	wp_enqueue_script( 'swupbodyclass', get_template_directory_uri() . '/js/SwupBodyClassPlugin.min.js', array(), '20151215', true );

	wp_enqueue_script( 'swupjsplugin', get_template_directory_uri() . '/js/SwupJsPlugin.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'rebalance-animations', get_template_directory_uri() . '/js/gsapAnimations.js', array(), '2020', true );

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
    'singular_name' => _x( 'Exercise', 'taxonomy singular name' ),
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
	 
	//return $string;
	 
	/* Restore original Post Data */
	wp_reset_postdata();
	}
	// Add a shortcode
	add_shortcode('categoryposts', 'postsbycategory');
	 
	// Enable shortcodes in text widgets
	add_filter('widget_text', 'do_shortcode');


	// Trying to include tags in search results

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
    $home = get_bloginfo("home");
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
			if (is_category() || is_single() ){
					echo '<li>';
					the_category('<li>', '</li>');
					echo '</li>';
			} elseif (is_archive() || is_single()){
					if ( is_day() ) {
							printf( __( '%s', 'text_domain' ), get_the_date() );
					} elseif ( is_month() ) {
							printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
					} elseif ( is_year() ) {
							printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
					} else {
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
	// if we are not in a mobile environment
	if ( SwpmMemberUtils::is_member_logged_in()) {
			// add 'desktop' to the $classes array
			$classes[] = 'wpsmp-loggedin';
			return $classes;
	} else {
			$classes[] = 'wpsmp-loggedout';
			return $classes;
	}
}

add_filter( 'body_class', 'rebalance_bodyclass_names' );



// My Own post navigation

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
							'prev_text'          => __( 'More exercises →' ),
							'next_text'          => __( '← Back' ),
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

add_filter( 'wp_mail', 'my_wp_mail_filter' );
function my_wp_mail_filter( $args ) {
	
	$new_wp_mail = array(
		'to'          => $args['to'],
		'subject'     => $args['subject'],
		'message'     => '<head><meta charset="utf-8"><meta name="viewport" content="width=device-width"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="x-apple-disable-message-reformatting"><!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. --><!--[if mso]>
					<style>
							* {
									font-family: sans-serif !important;
							}
					</style>
			<![endif]--><!-- CSS Reset --><style>@import url("https://use.typekit.net/vzx1etu.css");body,html{margin:0 auto!important;padding:0!important;height:100%!important;width:100%!important}*{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}div[style*="margin: 16px 0"]{margin:0!important}table,td{mso-table-lspace:0!important;mso-table-rspace:0!important}table{border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important}table table table{table-layout:auto}img{-ms-interpolation-mode:bicubic}[x-apple-data-detectors]{color:inherit!important;text-decoration:none!important}.aBn,.x-gmail-data-detectors,.x-gmail-data-detectors *{border-bottom:0!important;cursor:default!important}.button-link{text-decoration:none!important}@media only screen and (min-device-width:375px) and (max-device-width:413px){.email-container{min-width:375px!important}}@media (prefers-color-scheme: dark ){
				.dark-img { display:block!important; width: auto!important; height: auto!important; overflow: visible!important; float: none!important; max-height:inherit!important; max-width:inherit!important; line-height: auto!important; margin-top:0px!important; visibility:inherit!important; }
				.light-img { display:none; display:none !important; }				
				.button-container { background-color: #FF9B7A!important }
				.button-container a { color: #FFFFFF!important }
			}</style><!-- What it does: Makes background images in 72ppi Outlook render at correct size. --><!--[if gte mso 9]>
		<xml>
			<o:OfficeDocumentSettings>
				<o:AllowPNG/>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml>
		<![endif]--><!-- Progressive Enhancements --><style>@media screen and (max-width:600px){.email-container, td {font-size:16px!important;line-height:23px!important}}</style></head><body width="100%" bgcolor="#9ACFE9" style="margin: 0; mso-line-height-rule: exactly;"><div style="max-width: 600px; margin: auto;" class="email-container"><table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;"><tr><td class="logo-container" style="text-align: center; padding: 30px; background-color: #FFFFFF;">
		<img class="light-img" src="https://re-balance.io/wp-content/themes/rebalance-wptheme/img/rebalance-logo.png" alt="rebalance" style="width: 200px; height: 55px; border: none; font-size:12px; font-style: italic; margin-bottom: 10px;" />
		<!--[if !mso]><! --><div class="dark-img" style="display:none; overflow:hidden; float:left; width:0px; max-height:0px; max-width:0px; line-height:0px; visibility:hidden;" align="center">
		<img src="https://re-balance.io/wp-content/themes/rebalance-wptheme/img/rebalance-logo-darkmode.png" alt="rebalance" style="width: 200px; height: 55px; border: none; font-size:12px; font-style: italic; margin-bottom: 10px;" /></div><!--<![endif]-->
		</td></tr><tr><td style="padding: 30px; font-family: hero-new, sans-serif; font-size: 17px; line-height: 25px; color: #333333; background-color: #FFFFFF;">'.$args['message'].'</td></tr><tr><td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: hero-new,  sans-serif; line-height:18px; text-align: center; background-color: #FFFFFF; color: #888888; border-top: 1px solid #EEEEEE;">This Email address was sent by <a href="www.re-balance.io" style="color: #FF9B7A; text-decoration: none;">www.re-balance.io</a></td></tr></table></div></body>',
		'headers'     => $args['headers'],
		'attachments' => $args['attachments'],
	);
	
	return $new_wp_mail;
}


?>


