<?php
/**
 * MT functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mt
 */

if ( ! function_exists( 'mt_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mt_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MT, use a find and replace
	 * to change 'mt' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mt', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'mt' ),
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
	add_theme_support( 'custom-background', apply_filters( 'mt_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'mt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mt_content_width', 640 );
}
add_action( 'after_setup_theme', 'mt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mt_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mt' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mt' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mt_widgets_init' );


add_action('wp_head', 'apple_icons');
function apple_icons() {
    ?>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri()?>/images/apple-touch-icon-144x144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri()?>/images/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri()?>/images/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri()?>/images/apple-touch-icon-precomposed.png">
    <?php
}


class MT_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
}

/**
 * Enqueue scripts and styles.
 */
function mt_scripts() {
	wp_enqueue_style( 'mt-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'Droid Serif', '//fonts.googleapis.com/css?family=Droid+Serif:400');
	wp_enqueue_style( 'Merriweather', '//fonts.googleapis.com/css?family=Merriweather:300,400');
	
	wp_enqueue_style( 'mt-main-style', get_template_directory_uri() . '/css/style.css');
	
	wp_enqueue_script( 'jquery-1.9.1', get_template_directory_uri() . '/js/jquery-1.9.1.min.js', array(), '20151215', false );
	
	wp_enqueue_script( 'mt-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mt-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	
	wp_enqueue_script( 'mt-js', get_template_directory_uri() . '/js/custom.js', array(), '20151215', false );
	
	
	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.min.js', array(), '20151215', false );
	wp_enqueue_script( 'classie-js', get_template_directory_uri() . '/js/classie.js', array(), '20151215', false );
	wp_enqueue_script( 'masonry-min-js', get_template_directory_uri() . '/js/masonry.min.js', array(), '20151215', false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mt_scripts' );


/**
 * Add SVG capabilities
 */
function wpcontent_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );

function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}


function wpb_postsbycategory($cat_id) {
	$cat_id = $cat_id;
	$the_query = new WP_Query( 
			array( 'category__in' => array($cat_id), 
			'posts_per_page' => 4 ) 
	); 
	
	$post_count =1;
	
	if ( $the_query->have_posts() ):?>
		<div class="bucket col-sm-4 module">
			
			<?php 
			$cat_obj = get_category($cat_id);
			$cat_slug = $cat_obj->slug;
			$cat_slug = str_replace("-","", $cat_slug);?>
			
			
			<h4><a class="<?php echo $cat_slug?>" href="<?php echo esc_url( get_category_link($cat_id)) ?>"><i class="icon icon-bucket-<?php echo $cat_slug?>"></i><b><?php echo get_the_category_by_ID($cat_id)?></a></b>
			</h4>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
				
				<?php if($post_count == 1):?>
					<div class="buckets-post module-sm">
						<a class="cover-bg " style="background-image: url(<?php the_post_thumbnail_url(); ?>);" href="<?php the_permalink()?>" title="<?php the_title()?>" data-wpex-post-id="">
						<h3><?php the_title()?></h3>
						</a>
					</div>
				<?php else:?>
					<p class="small-link">
						<a href="<?php the_permalink()?>"><?php the_title()?></a>
					</p>
				<?php endif; $post_count++;?>
			<?php endwhile;?>
		</div>		
	<?php endif;
		/* Restore original Post Data */
		wp_reset_postdata();
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Custom Post Type: Videos
 */
require get_template_directory() . '/inc/videos.php';
/**
 * Custom Post Type: Team
 */
require get_template_directory() . '/inc/team.php';
/**
 * Custom Post Type: Experts
 */
require get_template_directory() . '/inc/experts.php';
/**
 * Custom Post Type: Sponsors
 */
require get_template_directory() . '/inc/sponsors.php';
/**
 * Custom Post Type: Images
 */
require get_template_directory() . '/inc/images.php';
