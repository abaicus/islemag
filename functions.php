<?php
/**
 * islemag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package islemag
 */

if ( ! function_exists( 'islemag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function islemag_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on islemag, use a find and replace
	 * to change 'islemag' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'islemag', get_template_directory() . '/languages' );

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

	add_image_size( 'islemag_main_slider', 400, 400, true );
	add_image_size( 'islemag_sections_small_thumbnail', 110, 110, true );
	add_image_size( 'islemag_section4_big_thumbnail', 420, 420, true );
	add_image_size( 'islemag_author_avatar', 90, 90, true );
	add_image_size( 'islemag_related_post', 348, 194, true );
	add_image_size( 'islemag_blog_post', 770, 430, true );

	/* IAB SIZES */
	add_image_size( 'islemag_leaderboard', 728, 90, true );
	add_image_size( 'islemag_3_1_rectangle', 300, 100, true );
	add_image_size( 'islemag_medium_rectangle', 300, 250, true );
	add_image_size( 'islemag_half_page', 300, 600, true );
	add_image_size( 'islemag_square_pop_up', 250, 250, true );
	add_image_size( 'islemag_vertical_rectangle', 240, 400, true );
	add_image_size( 'islemag_ad_125', 125, 125, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header'  => esc_html__( 'Top', 'islemag'),
		'primary' => esc_html__( 'Primary', 'islemag' ),
		'footer'  => esc_html__( 'Footer', 'islemag')
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', array(
		'default-image' => get_template_directory_uri() . '/img/islemag-background.jpg',
		'default-repeat'         => 'no-repeat',
		'default-position-x'     => 'center',
		'default-attachment'     => 'fixed',
	) );

	register_default_headers( array(
		'wheel' => array(
			'url'           => get_stylesheet_directory_uri().'/img/banner.jpg',
			'thumbnail_url' => get_stylesheet_directory_uri().'/img/banner_th.jpg',
			'description'   => __( 'Banner', 'islemag' )
		)
	) );

	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}
endif; // islemag_setup
add_action( 'after_setup_theme', 'islemag_setup' );


/**
 * Add image size in image_size_names_choose for media uploader
 */
add_filter( 'image_size_names_choose', 'islemg_media_uploader_custom_sizes' );
function islemg_media_uploader_custom_sizes( $sizes ) {
		return array_merge( $sizes, array(
				'islemag_ad_125' => esc_html__('Small Advertisement','islemag'),
				'islemag_leaderboard' => esc_html__( 'Leaderboard', 'islemag'),
				'islemag_3_1_rectangle' => esc_html__( '3:1 Rectangle', 'islemag'),
				'islemag_medium_rectangle' => esc_html__( 'Medium Rectangle', 'islemag'),
				'islemag_half_page' => esc_html__( 'Half-page ad', 'islemag'),
				'islemag_square_pop_up' => esc_html__( 'Big Square', 'islemag'),
				'islemag_vertical_rectangle' => esc_html__( 'Vertical Rectangle', 'islemag'),
				'islemag_ad_125' => esc_html__( 'Small Square', 'islemag'),
		) );
}

add_image_size( 'islemag_leaderboard', 728, 90, true );
add_image_size( 'islemag_3_1_rectangle', 300, 100, true );
add_image_size( 'islemag_medium_rectangle', 300, 250, true );
add_image_size( 'islemag_half_page', 300, 600, true );
add_image_size( 'islemag_square_pop_up', 250, 250, true );
add_image_size( 'islemag_vertical_rectangle', 240, 400, true );
add_image_size( 'islemag_ad_125', 125, 125, true );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function islemag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'islemag_content_width', 640 );
}
add_action( 'after_setup_theme', 'islemag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 require_once ( 'inc/class/islemag-widget-multiple-ads.php');
 require_once ( 'inc/class/islemag-widget-big-ad.php');
 require_once ( 'inc/class/islemag-widget-content-ad.php');
 function islemag_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'islemag' ),
		'id'            => 'islemag-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title-border dkgreen title-bg-line"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header advertisment area', 'islemag' ),
		'id'            => 'islemag-header-ad',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );

	register_sidebars(5, array(
	'name'          => __('Advertisments area %d', 'islemag'),
    'id'            => 'ads',          
	'class'         => 'islemag-ads',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' ) );



	$sidebars = array ( 'a' => 'islemag-first-footer-area', 'b' => 'islemag-second-footer-area', 'c' => 'islemag-third-footer-area' );
	foreach ( $sidebars as $sidebar ){

		switch ($sidebar) {
			case 'islemag-first-footer-area':
				$name = esc_html__('Footer area 1','islemag');
				break;
			case 'islemag-second-footer-area':
				$name = esc_html__('Footer area 2','islemag');
				break;
			case 'islemag-third-footer-area':
				$name = esc_html__('Footer area 3','islemag');
				break;
			default:
				$name = $sidebar;
		}

    register_sidebar(
        array (
            'name'          => $name,
            'id'            => $sidebar,
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>'
        )
    );
	}


	register_widget( 'islemag_multiple_ads' );
	register_widget( 'islemag_big_ad' );
	register_widget( 'islemag_content_ad' );
	wp_enqueue_script( 'islemag-widget-js', get_template_directory_uri() . '/js/islemag-wigdet.js', array(), '1.0.0', true );

}
add_action( 'widgets_init', 'islemag_widgets_init' );


/**
 * Add default widgets
 */
add_action('after_switch_theme', 'islemag_register_default_widgets');

function islemag_register_default_widgets() {
	/* Default widgets */
	$sidebars = array ( 'a' => 'islemag-first-footer-area', 'b' => 'islemag-second-footer-area', 'c' => 'islemag-third-footer-area' );
	$active_widgets = get_option( 'sidebars_widgets' );


	if ( empty ( $active_widgets[ $sidebars['a'] ] ) ):

		$counter = 1;

		$active_widgets[ $sidebars['a'] ][0] = 'categories-' . $counter;
		$categories[ $counter ] = array( 'title' => esc_html__( 'Categories', 'islemag' ) );
		update_option( 'widget_categories', $categories );
		$counter++;

		$active_widgets[ $sidebars['a'] ][] = 'tag_cloud-' . $counter;
		$tagcloud[ $counter ] = array( 'title' =>  esc_html__( 'Tagcloud', 'islemag' ) );
		update_option( 'widget_tag_cloud', $tagcloud );
		$counter++;

		update_option( 'sidebars_widgets', $active_widgets );

	endif;


	if ( empty ( $active_widgets[ $sidebars['b'] ] ) ):

		$counter = 1;

		$active_widgets[ $sidebars['b'] ][] = 'pages-' . $counter;
		$pages[ $counter ] = array( 'title' => esc_html__( 'Pages', 'islemag' )  );
		update_option( 'widget_pages', $pages );
		$counter++;

		update_option( 'sidebars_widgets', $active_widgets );

	endif;

	if ( empty ( $active_widgets[ $sidebars['c'] ] ) ):

		$counter = 1;

		$active_widgets[ $sidebars['c'] ][] = 'calendar-' . $counter;
		$calendar[ $counter ] = array ( 'title' => esc_html__( 'Calendar', 'islemag' ) );
		update_option( 'widget_calendar', $calendar );
		$counter++;

		update_option( 'sidebars_widgets', $active_widgets );

	endif;
}

/**
 * Enqueue scripts and styles.
 */
function islemag_scripts() {


	wp_enqueue_style( 'islemag-bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css',array(), '3.3.5');

	wp_enqueue_style( 'islemag-style', get_stylesheet_uri() );

	wp_enqueue_style( 'islemag-fontawesome', get_stylesheet_directory_uri().'/css/font-awesome.min.css',array(), '4.4.0');

	if( is_front_page() ){
		wp_enqueue_script( 'islemag-script-index', get_template_directory_uri() . '/js/script.index.js', array('jquery'), '1.0.0', true );
	}

	if( is_single() ){
		wp_enqueue_script( 'islemag-script-single', get_template_directory_uri() . '/js/script.single.js', array('jquery'), '1.0.0', true );
	}

	wp_enqueue_script( 'islemag-script-all', get_template_directory_uri() . '/js/script.all.js', array('jquery'), '1.0.1', true );
	wp_localize_script( 'islemag-script-all', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'islemag' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'islemag' ) . '</span>',
	) );
	$sticky_menu = get_theme_mod( 'islemag_sticky_menu', false );
	wp_localize_script( 'islemag-script-all', 'stickyMenu', array( 'disable_sticky' => $sticky_menu ) );

	wp_enqueue_script( 'islemag-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'islemag_scripts' );


/**
 * Enqueue scripts and styles.
 */
function islemag_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$lato = _x( 'on', 'Lato font: on or off', 'islemag' );
	$raleway = _x( 'on','Raleway font: on or off','islemag' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'islemag' );

	if( 'off' !== $lato || 'off' !== $raleway || 'off' !== $open_sans ){
		$font_families = array();
		if( 'off' !== $lato ){
			$font_families[] = 'Lato:400,700';
		}
		if( 'off' !== $raleway ){
			$font_families[] = 'Raleway:400,500,600,700';
		}
		if( 'off' !== $open_sans ){
			$font_families[] = 'Open Sans:400,700,600';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

function islemag_scripts_styles() {
	wp_enqueue_style( 'islemag-fonts', islemag_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'islemag_scripts_styles' );




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
 * Load customize controls js
 */
function islemag_customizer_script() {

	wp_enqueue_style( 'islemag-fontawesome_admin', get_stylesheet_directory_uri().'/css/font-awesome.min.css',array(), '1.0.0' );

  wp_register_script( 'islemag_ddslick', get_template_directory_uri() .'/js/jquery.ddslick.js', array("jquery"), '1.0.0');

  wp_enqueue_script( 'islemag_customizer_script', get_template_directory_uri() .'/js/islemag_customizer.js', array( 'jquery', 'jquery-ui-draggable', 'islemag_ddslick' ), '1.0.1', true );

	wp_enqueue_style( 'islemag_admin_stylesheet', get_stylesheet_directory_uri().'/css/admin-style.css','1.0.0' );

}
add_action(  'customize_controls_enqueue_scripts', 'islemag_customizer_script'  );


/**
 * Related Posts Excerpt
 **/
function islemag_get_excerpt(){
	$excerpt = get_the_content();
	$permalink = get_the_permalink();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 140);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'...';
	return $excerpt;
}

/**
 * Callback function for form
 **/
function islemag_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>


	<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf( __( '<h4 class="media-heading">%s</h4><span class="comment-date">(%2$s - %3$s)</span>','islemag' ), get_comment_author_link(), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( '(Edit)','islemag' ), '  ', '' ); ?>
		<div class="reply pull-right reply-link"> <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> </div>
	</div>


	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'islemag' ); ?></em>
		<br />
	<?php endif; ?>



	<div class="media-body">
		<?php comment_text(); ?>
	</div>

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}



add_action( 'wp_ajax_nopriv_request_post', 'islemag_requestpost' );
add_action( 'wp_ajax_request_post', 'islemag_requestpost' );

$islemag_section1_category = '';

function islemag_requestpost() {
	$colors = array( "red", "orange", "blue", "green", "purple", "pink", "light_red" );
	$section = $_POST['section'];

	if( $section == 'islemag_topslider_category' ){
		$cat = $_POST['category'];
		$nb_of_posts = $_POST['nb_of_posts'];

		$wp_query = new WP_Query( array(
			'posts_per_page'        => $nb_of_posts,
			'order'                 => 'ASC',
			'post_status'           => 'publish',
			'category_name'         =>  ( !empty( $cat ) && $cat != 'all' ? $cat : '' )
		));

		if ( $wp_query->have_posts() ) : ?>
	    	<div class="islemag-top-container">
	    		<div class="owl-carousel islemag-top-carousel rect-dots">
	    			<?php
					while ( $wp_query->have_posts() ) : $wp_query->the_post();
						get_template_part( 'template-parts/slider-posts', get_post_format() );
					endwhile;
					wp_reset_postdata(); ?>
	        	</div><!-- End .islemag-top-carousel -->
	        </div><!-- End .islemag-top-container -->
		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
	}

	if( $section == 'islemag_section1_category' ){
		$islemag_section_category = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		include( locate_template( 'template-parts/content-template1.php' ) );
	}

	if( $section == 'islemag_section2_category' ){
		$islemag_section_category = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		include( locate_template( 'template-parts/content-template2.php' ) );
	}

	if( $section == 'islemag_section3_category' ){
		$islemag_section_category = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		include( locate_template( 'template-parts/content-template1.php' ) );
	}

	if( $section == 'islemag_section4_category' ){
		$islemag_section_category = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		$postperpage = $_POST['posts_per_page'];
		include( locate_template( 'template-parts/content-template3.php' ) );
	}

	if( $section == 'islemag_section5_category' ){
		$islemag_section_category = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		include( locate_template( 'template-parts/content-template4.php' ) );
	}

    die();
}


add_action('wp_head','islemag_style', 100);
function islemag_style() {

	echo '<style type="text/css">';

	$islemag_title_color = esc_attr( get_theme_mod( 'islemag_title_color','#454545' ) );
	if( !empty( $islemag_title_color ) ){
		echo '.title-border span { color: '. $islemag_title_color .' }';
		echo '.post .entry-title, .post h1, .post h2, .post h3, .post h4, .post h5, .post h6, .post h1 a, .post h2 a, .post h3 a, .post h4 a, .post h5 a, .post h6 a { color: '. $islemag_title_color .' }';
		echo '.page-header h1 { color: '. $islemag_title_color .' }';
	}

	$islemag_sidebar_textcolor = esc_attr( get_theme_mod( 'header_textcolor','#454545' ) );
	if( !empty( $islemag_sidebar_textcolor ) ){
		echo '.sidebar .widget li a, .islemag-content-right, .islemag-content-right a, .post .entry-content, .post .entry-content p,
		 .post .entry-cats, .post .entry-cats a, .post .entry-comments', '.post .entry-separator, .post .entry-footer a,
		 .post .entry-footer span, .post .entry-footer .entry-cats, .post .entry-footer .entry-cats a, .author-content { color: #'.$islemag_sidebar_textcolor.'}';
	}

	$islemag_top_slider_post_title_color = esc_attr( get_theme_mod( 'islemag_top_slider_post_title_color','#ffffff' ) );
	if( !empty( $islemag_top_slider_post_title_color ) ){
		echo '.islemag-top-container .entry-block .entry-overlay-meta .entry-title a { color: '. $islemag_top_slider_post_title_color .' }';
	}

	$islemag_top_slider_post_text_color = esc_attr( get_theme_mod( 'islemag_top_slider_post_text_color','#ffffff' ) );
	if( !empty($islemag_top_slider_post_text_color) ){
		echo '.islemag-top-container .entry-overlay-meta .entry-overlay-date { color: '. $islemag_top_slider_post_text_color .' }';
		echo '.islemag-top-container .entry-overlay-meta .entry-separator { color: '. $islemag_top_slider_post_text_color .' }';
		echo '.islemag-top-container .entry-overlay-meta > a { color: '. $islemag_top_slider_post_text_color .' }';
	}

	$islemag_sections_post_title_color = esc_attr( get_theme_mod( 'islemag_sections_post_title_color','#454545' ) );
	if( !empty($islemag_sections_post_title_color) ){
		echo '.home.blog .islemag-content-left .entry-title a, .blog-related-carousel .entry-title a { color: '. $islemag_sections_post_title_color .' }';
	}



	$islemag_sections_post_text_color = esc_attr( get_theme_mod( 'islemag_sections_post_text_color','#454545' ) );
	if( !empty($islemag_sections_post_text_color) ){
		echo '.islemag-content-left .entry-meta, .islemag-content-left .blog-related-carousel .entry-content p,
		.islemag-content-left .blog-related-carousel .entry-cats .entry-label, .islemag-content-left .blog-related-carousel .entry-cats a,
		.islemag-content-left .blog-related-carousel > a, .islemag-content-left .blog-related-carousel .entry-footer > a { color: '. $islemag_sections_post_text_color .' }';
		echo '.islemag-content-left .entry-meta .entry-separator { color: '. $islemag_sections_post_text_color .' }';
		echo '.islemag-content-left .entry-meta a { color: '. $islemag_sections_post_text_color .' }';
		echo '.islemag-content-left .islemag-template3 .col-sm-6 .entry-overlay p { color: '. $islemag_sections_post_text_color .' }';
	}

	echo '</style>';
}

add_filter( 'comment_form_fields', 'islemag_move_comment_field_to_bottom' );
function islemag_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}



//for the comment wrapping functions - ensures HTML does not break.
$comment_open_div = 0;

/**
 * Creates an opening div for a bootstrap row.
 * @global int $comment_open_div
 */
add_action('comment_form_before_fields', 'islemag_before_comment_fields');
function islemag_before_comment_fields(){
    global $comment_open_div;
    $comment_open_div = 1;
    echo '<div class="row">';
}

/**
 * Creates a closing div for a bootstrap row.
 * @global int $comment_open_div
 * @return type
 */
	add_action('comment_form_after_fields', 'islemag_after_comment_fields');
	function islemag_after_comment_fields(){
	    global $comment_open_div;
	    if($comment_open_div == 0)
	        return;
	    echo '</div>';
	}


add_action('admin_head', 'islemag_widget_stile');
function islemag_widget_stile() {
	$screen = get_current_screen();
	if( $screen->base == "widgets"){
		echo '
		<style type="text/css">
		.islemag-ad-widget-top{
			background: #fafafa;
			color: #23282d;
			-webkit-transition: opacity .5s;
			transition: opacity .5s;
			padding: 0;
			line-height: 1.4em;
			font-size: 13px;
			font-weight: 600;
			border: 1px solid #e5e5e5;
			-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);
			box-shadow: 0 1px 1px rgba(0,0,0,.04);
		}

		.islemag-ad-widget-inside{
			display: none;
		}

		.islemag-ad-widget-title{
			font-size: 1em;
			margin: 0;
			padding: 0 15px;
			font-size: 1em;
			line-height: 1;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
			user-select: none;
		}

		.islemag-ad-widget-inside {
				padding: 1px 10px 10px;
				line-height: 16px;
				background: #fff;
				border: 1px solid #e5e5e5;
				border-top: none;
		}

		</style>';
	}
}