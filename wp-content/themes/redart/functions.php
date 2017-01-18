<?php
/**
 * Theme Functions
 *
 * @package DTtheme
 * @author DesignThemes
 * @link http://wedesignthemes.com
 */

define( 'REDART_DIR', get_template_directory() );
define( 'REDART_URI', get_template_directory_uri() );
define( 'REDART_CORE_PLUGIN', WP_PLUGIN_DIR.'/designthemes-core-features' );
define( 'REDART_SETTINGS', 'redart-opts' );

if (function_exists ('wp_get_theme')) :
	$themeData = wp_get_theme();
	define( 'REDART_NAME', $themeData->get('Name'));
	define( 'REDART_VERSION', $themeData->get('Version'));
endif;

define( 'LANG_DIR', REDART_DIR. '/languages' );

/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * --------------------------------------------------------------------------- */
load_theme_textdomain( 'redart', LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads the Admin Panel Scripts
 * --------------------------------------------------------------------------- */
function redart_admin_scripts() {

	wp_enqueue_style('redart-admin', REDART_URI .'/framework/theme-options/style.css');
	wp_enqueue_style('chosen', REDART_URI .'/framework/theme-options/css/chosen.css');
	wp_enqueue_style('wp-color-picker');

	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('wp-color-picker');

	wp_enqueue_script('tools', REDART_URI . '/framework/theme-options/js/jquery.tools.min.js');
	wp_enqueue_script('chosen', REDART_URI . '/framework/theme-options/js/chosen.jquery.min.js');
	wp_enqueue_script('redart-custom', REDART_URI . '/framework/theme-options/js/dttheme.admin.js');
	wp_enqueue_media();

	wp_localize_script('redart-custom', 'objectL10n', array(
		'saveall' => esc_html__('Save All', 'redart'),
		'saving' => esc_html__('Saving ...', 'redart'),
		'noResult' => esc_html__('No Results Found!', 'redart'),
		'resetConfirm' => esc_html__('This will restore all of your options to default. Are you sure?', 'redart'),
		'importConfirm' => esc_html__('You are going to import the dummy data provided with the theme, kindly confirm?', 'redart'),
		'backupMsg' => esc_html__('Click OK to backup your current saved options.', 'redart'),
		'backupSuccess' => esc_html__('Your options are backuped successfully', 'redart'),
		'backupFailure' => esc_html__('Backup Process not working', 'redart'),
		'disableImportMsg' => esc_html__('Importing is disabled.. :), Please select atleast import type','redart'),
		'restoreMsg' => esc_html__('Warning: All of your current options will be replaced with the data from your last backup! Proceed?', 'redart'),
		'restoreSuccess' => esc_html__('Your options are restored from previous backup successfully', 'redart'),
		'restoreFailure' => esc_html__('Restore Process not working', 'redart'),
		'importMsg' => esc_html__('Click ok import options from the above textarea', 'redart'),
		'importSuccess' => esc_html__('Your options are imported successfully', 'redart'),
		'importFailure' => esc_html__('Import Process not working', 'redart')));
}
add_action( 'admin_enqueue_scripts', 'redart_admin_scripts' );

/* ---------------------------------------------------------------------------
 * Loads the Options Panel
 * --------------------------------------------------------------------------- */
require_once( REDART_DIR .'/framework/utils.php' );
require_once( REDART_DIR .'/framework/fonts.php' );
require_once( REDART_DIR .'/framework/theme-options/init.php' );

/* ---------------------------------------------------------------------------
 * Loads Theme Functions
 * --------------------------------------------------------------------------- */

// Functions --------------------------------------------------------------------
require_once( REDART_DIR .'/functions/register-functions.php' );

// Header -----------------------------------------------------------------------
require_once( REDART_DIR .'/functions/register-head.php' );

// Meta box ---------------------------------------------------------------------
require_once( REDART_DIR .'/framework/theme-metaboxes/post-metabox.php' );
require_once( REDART_DIR .'/framework/theme-metaboxes/page-metabox.php' );

// Tribe Events -----------------------------------------------------------------
if ( class_exists( 'Tribe__Events__Main' ) )
	require_once( REDART_DIR .'/framework/theme-metaboxes/event-metabox.php' );

// Menu -------------------------------------------------------------------------
require_once( REDART_DIR .'/functions/register-menu.php' );
require_once( REDART_DIR .'/functions/register-mega-menu.php' );

// Hooks ------------------------------------------------------------------------
require_once( REDART_DIR .'/functions/register-hooks.php' );

// Likes ------------------------------------------------------------------------
require_once( REDART_DIR .'/functions/register-likes.php' );

// Widgets ----------------------------------------------------------------------
add_action( 'widgets_init', 'redart_widgets_init' );
function redart_widgets_init() {
	require_once( REDART_DIR .'/functions/register-widgets.php' );

	if(class_exists('DTCorePlugin')) {
		register_widget('Redart_Twitter');
	}

	register_widget('Redart_Flickr');
	register_widget('Redart_Recent_Posts');
	register_widget('Redart_Portfolio_Widget');
}
if(class_exists('DTCorePlugin')) {
	require_once( REDART_DIR .'/functions/widgets/widget-twitter.php' );
}
require_once( REDART_DIR .'/functions/widgets/widget-flickr.php' );
require_once( REDART_DIR .'/functions/widgets/widget-recent-posts.php' );
require_once( REDART_DIR .'/functions/widgets/widget-recent-portfolios.php' );

// Plugins ---------------------------------------------------------------------- 
require_once( REDART_DIR .'/functions/register-plugins.php' );

// WooCommerce ------------------------------------------------------------------
if( function_exists( 'is_woocommerce' ) ){
	require_once( REDART_DIR .'/functions/register-woocommerce.php' ); }

// Global Layout ---------------------------------------------------------------
$page_layout = redart_option('pageoptions', 'global-layout');
$GLOBALS['page_layout'] = !empty($page_layout) ? $page_layout : 'content-full-width';
$GLOBALS['force_enable'] = redart_option('pageoptions', 'force-enable-global-layout'); 

register_post_type( 'news',
		array(
		  'labels' => array(
		    'name' => __( 'NEWS' )
		  ),
		  'public' => true,
		  'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
		  'hierarchical' => true
		)
	);
register_post_type( 'music',
		array(
		  'labels' => array(
		    'name' => __( 'Music' )
		  ),
		  'public' => true,
		  'supports' => array('title'),
		  'hierarchical' => true
		)
	);

// custom add
function my_assets() {  
    wp_enqueue_style('jplayer_css', get_template_directory_uri() . '/css/jplayer.blue.monday.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('mystyle_css', get_template_directory_uri() . '/css/mystyle.css', array(), '1.0.0', 'all');
    wp_enqueue_script('jplayer_js', get_template_directory_uri() . '/js/jquery.jplayer.min.js', array(), '1', true);
    wp_enqueue_script('jplaylist_js', get_template_directory_uri() . '/js/jplayer.playlist.min.js', array(), '1', true);
    wp_enqueue_script('myscript', get_template_directory_uri() . '/js/myscript.js', array(), '1', true);
    wp_localize_script('myscript', 'ajaxurl', admin_url( 'admin-ajax.php' ));
}
add_action( 'wp_enqueue_scripts', 'my_assets' );

add_action( 'wp_ajax_get_music', 'get_music' );
add_action( 'wp_ajax_nopriv_get_music', 'get_music' );
function get_music(){
	$args = array(
	    'post_type' => 'music',
            'posts_per_page' => -1,
            'order' => 'ASC'
	);
	$the_query = new WP_Query($args);
	$music = array();
	$i = 0;
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post(); 
		$music[$i][] = get_the_title();
		$music[$i][] = get_field('music_file');
		$i++;
	endwhile; 
	wp_reset_postdata();
	endif;	
	echo json_encode($music);
	die();
}
?>