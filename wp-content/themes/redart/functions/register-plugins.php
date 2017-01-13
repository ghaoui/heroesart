<?php
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
 * @version    2.6.1 for parent theme Redart for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once REDART_DIR . '/functions/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'redart_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function redart_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'     				=> 'Visual Composer',
			'slug'     				=> 'js_composer',
			'source'   				=> 'https://s3.amazonaws.com/wedesignthemes/premium/js_composer.zip',
			'version' 				=> '4.12.1',
			'required' 				=> true,
		),

		array(
			'name'     				=> 'Ultimate Addons for Visual Composer',
			'slug'     				=> 'Ultimate_VC_Addons',
			'source'   				=> 'https://s3.amazonaws.com/wedesignthemes/premium/Ultimate_VC_Addons.zip',
			'version' 				=> '3.16.7',
			'required' 				=> true,
		),

		array(
			'name'     				=> 'Layer Slider',
			'slug'     				=> 'LayerSlider',
			'source'   				=> 'https://s3.amazonaws.com/wedesignthemes/premium/LayerSlider.zip',
		),

		array(
			'name'     				=> 'Revolution Slider',
			'slug'     				=> 'revslider',
			'source'   				=> 'https://s3.amazonaws.com/wedesignthemes/premium/revslider.zip',
		),

		array(
			'name'     				=> 'Responsive Google Maps',
			'slug'     				=> 'responsive-maps-plugin',
			'source'   				=> 'https://s3.amazonaws.com/wedesignthemes/premium/responsive-maps-plugin.zip',
			'version' 				=> '4.0',
		),

		array(
			'name'     				=> 'DesignThemes Core Features Plugin',
			'slug'     				=> 'designthemes-core-features',
			'source'   				=> 'https://s3.amazonaws.com/wedesignthemes/redart/designthemes-core-features.zip',
			'required' 				=> true,
			'version' 				=> '1.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> true,
		),

		array(
			'name' 					=> 'Contact Form 7',
			'slug' 					=> 'contact-form-7',
			'required' 				=> false,
		),

		array(
			'name' 					=> 'WooCommerce - excelling eCommerce',
			'slug' 					=> 'woocommerce',
			'required' 				=> false,
		),
		
		array(
			'name'     				=> 'YITH WooCommerce Wishlist',
			'slug'     				=> 'yith-woocommerce-wishlist',
			'required' 				=> false,
		),

		array(
			'name'     				=> 'YITH WooCommerce Zoom Magnifier',
			'slug'     				=> 'yith-woocommerce-zoom-magnifier',
			'required' 				=> false,
		),

		array(
			'name'					=> 'Envato WordPress Toolkit',
			'slug' 					=> 'envato-wordpress-toolkit',
			'source' 				=> 'https://s3.amazonaws.com/wedesignthemes/premium/envato-wordpress-toolkit.zip',
		),
		
		array(
			'name' 					=> 'The Events Calendar',
			'slug' 					=> 'the-events-calendar',
			'required' 				=> false,
		),
		
		array(
			'name'     				=> 'Unyson',
			'slug'     				=> 'unyson',
			'required' 				=> true,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'redart',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'redart' ),
			'menu_title'                      => __( 'Install Plugins', 'redart' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'redart' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'redart' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'redart' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'redart'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'redart'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'redart'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'redart'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'redart'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'redart'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'redart'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'redart'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'redart'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'redart' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'redart' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'redart' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'redart' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'redart' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'redart' ),
			'dismiss'                         => __( 'Dismiss this notice', 'redart' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'redart' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'redart' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}