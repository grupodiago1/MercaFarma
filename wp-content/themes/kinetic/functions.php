<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'KINETIC_PARENT_DIR', get_template_directory() );
define( 'KINETIC_CHILD_DIR', get_stylesheet_directory() );
define( 'KINETIC_INCLUDES_DIR', KINETIC_PARENT_DIR . '/framework' );
define( 'KINETIC_CSS_DIR', KINETIC_PARENT_DIR . '/css' );
define( 'KINETIC_JS_DIR', KINETIC_PARENT_DIR . '/js' );
define( 'KINETIC_LANGUAGES_DIR', KINETIC_PARENT_DIR . '/languages' );
define( 'KINETIC_WIDGETS_DIR', KINETIC_INCLUDES_DIR . '/widgets' );
define( 'KINETIC_ELEMENTOR_DIR', KINETIC_INCLUDES_DIR . '/elementor' );
define( 'KINETIC_ELEMENTOR_WIDGETS_DIR', KINETIC_ELEMENTOR_DIR . '/widgets' );

/**
 * Define URL Location Constants
 */
define( 'KINETIC_PARENT_URL', get_template_directory_uri() );
define( 'KINETIC_CHILD_URL', get_stylesheet_directory_uri() );
define( 'KINETIC_INCLUDES_URL', KINETIC_PARENT_URL . '/framework' );
define( 'KINETIC_CSS_URL', KINETIC_PARENT_URL . '/css' );
define( 'KINETIC_JS_URL', KINETIC_PARENT_URL . '/js' );
define( 'KINETIC_LANGUAGES_URL', KINETIC_PARENT_URL . '/languages' );
define( 'KINETIC_WIDGETS_URL', KINETIC_INCLUDES_URL . '/widgets' );
define( 'KINETIC_ELEMENTOR_URL', KINETIC_INCLUDES_URL . '/elementor' );
define( 'KINETIC_ELEMENTOR_WIDGETS_URL', KINETIC_ELEMENTOR_URL . '/widgets' );

/** Add the Elementor compatibility file */
if ( defined( 'ELEMENTOR_VERSION' ) ) {
  require_once( KINETIC_ELEMENTOR_DIR . '/elementor.php' );
}

if(class_exists( 'Menu_Item_Custom_Fields' )){
  require_once KINETIC_INCLUDES_DIR  . '/menu-item-custom-fields.php';
}

require_once KINETIC_INCLUDES_DIR . '/meta-box.php';
require_once KINETIC_INCLUDES_DIR . '/kinetic_bootstrap_navwalker.php';
require_once KINETIC_INCLUDES_DIR . '/import.php';
require_once KINETIC_INCLUDES_DIR . '/customize.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

// Set up theme support
function kinetic_setup() {

  add_theme_support( 'post-thumbnails' );
  add_image_size( 'kinetic-thumb', 740, 420, true );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'custom-header');
  add_theme_support( 'custom-background');
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
  add_theme_support( 'custom-logo' );
  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'primary'    => esc_html__( 'Primary Menu', 'kinetic' ),
    'onepage'    => esc_html__( 'One Page Menu', 'kinetic' ),
  ) );
  add_theme_support( 'editor-styles' );
  add_editor_style( 'css/style-editor.css' );
  load_theme_textdomain( 'kinetic', get_template_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'kinetic_setup' );

// Theme Scripts & Styles
function kinetic_scripts_styles() {

  wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
  wp_enqueue_style( 'bxslider', get_template_directory_uri().'/css/jquery.bxslider.css');
  wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css');
  wp_enqueue_style( 'line-awesome', get_template_directory_uri().'/css/line-awesome.min.css');
  wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/css/owl.carousel.css');
  wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/css/owl.theme.css');
	wp_enqueue_style( 'kinetic-default', get_template_directory_uri().'/css/style.css?v=1');
  wp_enqueue_style( 'kinetic', get_stylesheet_uri() );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

    // enqueue the javascript that performs in-link comment reply fanciness
    wp_enqueue_script( 'comment-reply' );

  }
  wp_enqueue_script('jquery-ui-core');
 	wp_enqueue_script('masonry');
  wp_enqueue_script('bxslider', get_template_directory_uri().'/js/jquery.bxslider.min.js',array('jquery'),false,true);
  wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js',array('jquery'),false,true);
  wp_enqueue_script('appear', get_template_directory_uri().'/js/jquery.appear.js',array('jquery'),false,true);
  wp_enqueue_script('countto', get_template_directory_uri().'/js/jquery.countTo.js',array('jquery'),false,true);
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),false,true);
  wp_enqueue_script('isotope', get_template_directory_uri().'/js/jquery.isotope.min.js',array('jquery'),false,true);
  wp_enqueue_script('waypoint', get_template_directory_uri().'/js/waypoint.min.js',array('jquery'),false,true);
  if ( defined( 'ELEMENTOR_VERSION' ) ) {

    wp_enqueue_script( 'kinetic-elementor', get_template_directory_uri().'/js/elementor-frontend.js', array( 'jquery' ), '1.0', true );

  }
  wp_enqueue_script('kinetic-script', get_template_directory_uri().'/js/script.js',array('jquery'),false,true);

}
add_action( 'wp_enqueue_scripts', 'kinetic_scripts_styles' );

function kinetic_load_custom_wp_admin_style() {

  wp_register_style( 'line-awesome', get_template_directory_uri().'/css/line-awesome.min.css', false, '1.0.0' );
  wp_enqueue_style( 'line-awesome' );

}
add_action( 'admin_enqueue_scripts', 'kinetic_load_custom_wp_admin_style' );

/* Function which displays your post date in time ago format */
function kinetic_time_ago() {

  return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.esc_html__( 'ago','kinetic' );

}

// Register Elementor Locations
function kinetic_register_elementor_locations( $elementor_theme_manager ) {

	$elementor_theme_manager->register_all_core_location();

};
add_action( 'elementor/theme/register_locations', 'kinetic_register_elementor_locations' );

function kinetic_excerpt($limit = 30) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;

}

function kinetic_elementor_categories() {

    $output     = array();
    $categories = get_categories();
    $output[  ] = 'Select';
    foreach ( $categories as $category ) {
        $output[ $category->term_id ] = $category->name;
    }

    return $output;
}

//pagination
function kinetic_pagination($prev = '', $next = '', $pages='') {

    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }if(is_front_page() and !is_home()) {
    $curent = (get_query_var('page')) ? get_query_var('page') : 1;
  } else {
    $curent = (get_query_var('paged')) ? get_query_var('paged') : 1;
  }
    $pagination = array(
      'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
      'format'    => '',
      'current'     => max( 1, $curent),
      'total'     => $pages,
      'prev_text' => $prev,
      'next_text' => $next,
      'type'      => 'list',
      'end_size'    => 2,
      'mid_size'    => 1
  );
    $return =  paginate_links( $pagination );
  echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination-list">', $return );

}


add_filter('wp_list_categories', 'kinetic__span_cat_count');
function kinetic__span_cat_count($links) {

  $links = str_replace('</a> (', '</a> <span>(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;

}


/* Header */
function kinetic_header() {

    global $wp_query;
    $header_layout = get_post_meta($wp_query->get_queried_object_id(), '_kinetic_header_layout', true);
    if($header_layout!='' and $header_layout!='1'){
        $header_layout = $header_layout;
    }else{
    $header_layout = get_theme_mod( 'header_layout', '1' );
    }

    if($header_layout!='' and $header_layout!='1'){
      $header_layout = $header_layout;
    }else{

        $header_layout = '1';

    }

   get_template_part('template-parts/header', $header_layout);
}

function kinetic_footer() {

    global $wp_query;
    $footer_layout = get_post_meta($wp_query->get_queried_object_id(), '_kinetic_footer_layout', true);
    if($footer_layout!='' and $footer_layout!='1'){
        $footer_layout = $footer_layout;
    }else{
      $footer_layout = get_theme_mod( 'footer_layout', '1' );
    }

    if($footer_layout!='' and $footer_layout!='1'){
      $footer_layout = $footer_layout;
    }else{

        $footer_layout = '1';

    }

   get_template_part('template-parts/footer', $footer_layout);

}

/*
Register Fonts
*/
function kinetic_fonts_url() {

  $font_url = '';

  /*
  Translators: If there are characters in your language that are not supported
  by chosen font(s), translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Google font: on or off', 'kinetic' ) ) {
    $font_url = add_query_arg( 'family', urlencode( 'Source Sans Pro:300,300i,400,400i,600,600i,700' ), "//fonts.googleapis.com/css" );
  }
  return $font_url;
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kinetic_widgets_init() {

  register_sidebar( array(
    'name'          => esc_html__( 'Blog sidebar', 'kinetic' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here to appear in your blog sidebar.', 'kinetic' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="heading2 title-sidebar">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer 1', 'kinetic' ),
    'id'            => 'footer-1',
    'description'   => esc_html__( 'Add widgets here to appear in your Footer style 1.', 'kinetic' ),
    'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="heading2 title-sidebar">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer 2', 'kinetic' ),
    'id'            => 'footer-2',
    'description'   => esc_html__( 'Add widgets here to appear in your Footer style 2.', 'kinetic' ),
    'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h1 class="heading1 title-sidebar">',
    'after_title'   => '</h1>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer 3', 'kinetic' ),
    'id'            => 'footer-3',
    'description'   => esc_html__( 'Add widgets here to appear in your Footer style 3.', 'kinetic' ),
    'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h1 class="heading1 title-sidebar">',
    'after_title'   => '</h1>',
  ) );

}
add_action( 'widgets_init', 'kinetic_widgets_init' );

/*
Enqueue scripts and styles.
*/
function kinetic_font_scripts() {

  wp_enqueue_style( 'kinetic-fonts', kinetic_fonts_url(), array(), '1.0.0' );

}
//add_action( 'wp_enqueue_scripts', 'kinetic_font_scripts' );

function kinetic_get_comment_depth( $my_comment_id ) {

  $depth_level = 0;
  while( $my_comment_id > 0  ) { // if you have ideas how we can do it without a loop, please, share it with us in comments
    $my_comment = get_comment( $my_comment_id );
    $my_comment_id = $my_comment->comment_parent;
    $depth_level++;
  }
  return $depth_level;

}

//Custom comment List:
function kinetic_theme_comment($comment, $args, $depth) {

     $GLOBALS['comment'] = $comment; ?>
     <!--=======  COMMENTS =========-->

    <li <?php comment_class(''); ?> id="comment-<?php comment_ID() ?>" >

        <?php if($comment->user_id!='0' and get_user_meta($comment->user_id, '_kinetic_avatar' ,true)!=''){ ?>
            <?php $image = get_user_meta($comment->user_id, '_kinetic_avatar' ,true); ?>
            <img src="<?php echo esc_attr($image); ?>" />
        <?php }else{ ?>
          <?php echo get_avatar($comment); ?>
        <?php } ?>
        <div class="comment-box">
            <div class="row-title">
                <div class="col-author">
                    <h3><?php comment_author(); ?></h3>

                </div>
                <div class="col-meta">
                    <ul class="comment-tags">
                        <li><?php esc_html_e('Posted', 'kinetic');?> <?php printf(esc_html__('%1$s','kinetic'), get_comment_date()) ?> </li>

                        <?php if(comments_open() and $depth < 3){ ?>
                          <li><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php comment_text() ?>
               <?php if ($comment->comment_approved == '0') : ?>
                 <em><?php esc_html_e('Your comment is awaiting moderation.','kinetic') ?></em>
                 <br />
              <?php endif; ?>
        </div>

<?php
}



function kinetic_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'kinetic_excerpt_more' );

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme construct for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'kinetic_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function kinetic_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
             // This is an example of how to include a plugin from a private repo in your theme.

        array(
            'name'               => esc_html__('Revolution Slider', 'kinetic' ), // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/framework/plugins/revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository.

       array(
            'name'      => esc_html__( 'Kirki', 'kinetic' ),
            'slug'      => 'kirki',
            'required'  => true,
        ), array(
            'name'      => esc_html__( 'Elementor Page Builder', 'kinetic' ),
            'slug'      => 'elementor',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'CMB2', 'kinetic' ),
            'slug'      => 'cmb2',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'Easy Google Fonts', 'kinetic' ),
            'slug'      => 'easy-google-fonts',
            'required'  => false,
        ),array(
            'name'      => esc_html__( 'Contact Form 7', 'kinetic' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'One Click Demo Import', 'kinetic' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        )
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'kinetic' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'kinetic' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'kinetic' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'kinetic' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'kinetic' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'kinetic' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'kinetic' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'kinetic' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'kinetic' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'kinetic' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'kinetic' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'kinetic' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'kinetic' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'kinetic' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'kinetic' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'kinetic' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'kinetic' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
