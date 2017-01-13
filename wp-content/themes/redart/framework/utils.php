<?php
/* ---------------------------------------------------------------------------
 * Load default theme options
 * - To return default options to store in database.
 * --------------------------------------------------------------------------- */
function redart_default_option() {

	$general = array(
		'enable-nicescroll' => 'false',
		'show-pagecomments' => 'true',
		'loader-title' => 'Red',
		'loader-subtitle' => 'Art',
		'enable-responsive' => 'true',
		'show-mobileslider' => 'true'
	);

	$layout = array(
		'logo' => 'true',
		'show-breadcrumb' => 'true',
		'breadcrumb-delimiter' => 'fa fa-hand-o-right',
		'show-boxed-layout-pattern-color' => 'true',
		'show-boxed-layout-bg-color' => 'true',
		'site-layout' => 'wide',
		'header-type' => 'fullwidth-header',
		'layout-stickynav' => 'true',
		'header-position' => 'above slider',
		'show-sociables' => 'on',
		'enable-footer' => 'true',
		'footer-columns' => '4',
		'enable-copyright' => 'true'
	);
	
	$social = array(
		'social-1' => array(
			'icon' => 'fa-facebook',
			'link' => '#'
		),
		'social-2' => array(
			'icon' => 'fa-twitter',
			'link' => '#'
		),
		'social-3' => array(
			'icon' => 'fa-google-plus',
			'link' => '#'
		)
	);

	$pageoptions = array(
		'single-post-comments' => 'true',
		'show-standard-left-sidebar-for-post-archives' => 'true',
		'show-standard-right-sidebar-for-post-archives' => 'true',
		'post-format-meta' => 'true',
		'post-author-meta' => 'false',
		'post-date-meta' => 'true',
		'post-comment-meta' => 'false',
		'post-category-meta' => 'false',
		'post-tag-meta' => 'true',
		'post-archives-enable-excerpt' => 'true',
		'post-archives-excerpt' => 40,
		'post-archives-enable-readmore' => 'false',
		'post-archives-readmore' => '[dt_sc_button size="small" style="filled" target="_blank" class="dt-sc-expand dt-sc-expand-vertical" title="Read More" /]',
		'post-style' => 'entry-date-left',
		'show-standard-left-sidebar-for-portfolio-archives' => 'true',
		'show-standard-right-sidebar-for-portfolio-archives' => 'true',
		'show-notfound-bg-color' => 'true',
		'show-launchdate' => 'true',
		'show-comingsoon-bg-color' => 'true'
	);

	$woo = array(
		'show-shop-standard-left-sidebar-for-product-layout' => 'true',
		'show-shop-standard-right-sidebar-for-product-layout' => 'true',
		'show-shop-standard-left-sidebar-for-product-category-layout' => 'true',
		'show-shop-standard-right-sidebar-for-product-category-layout' => 'true',
		'show-shop-standard-left-sidebar-for-product-tag-layout' => 'true',
		'show-shop-standard-right-sidebar-for-product-tag-layout' => 'true'
	);

	$colors = array(
		'theme-skin' => 'red',
		'body-bgcolor' => '#000000'
	);

	$fonts = array(
		'content-font' => 'Droid Sans',
		'menu-font' => 'PT Sans Narrow',
		'pagetitle-font' => 'Josefin Sans',
		'h1-font' => 'Josefin Sans',
		'h2-font' => 'Josefin Sans',
		'h3-font' => 'Josefin Sans',
		'h4-font' => 'Josefin Sans',
		'h5-font' => 'Josefin Sans',
		'h6-font' => 'Josefin Sans',
		'font-style' => array( '100', '200', '300', '400', '400italic', '500', '600', '700', '800', '900' ),
		'content-font-size' => '14',
		'menu-font-size' => '14',
		'h1-font-size' => '30',
		'h2-font-size' => '24',
		'h3-font-size' => '18',
		'h4-font-size' => '16',
		'h5-font-size' => '14',
		'h6-font-size' => '13',
		'menu-letter-spacing' => '0.5px',
		'h1-letter-spacing' => '0.5px',
		'h2-letter-spacing' => '0.5px',
		'h3-letter-spacing' => '0.5px',
		'h4-letter-spacing' => '0.5px',
		'h5-letter-spacing' => '0.5px',
		'h6-letter-spacing' => '0.5px',
		'body-line-height' => '24'
	);
	
	$data = array(
		'general' => $general,
		'layout'  => $layout,
		'social'  => $social,
		'pageoptions' => $pageoptions,
		'woo'	  => $woo,
		'colors'  => $colors,
		'fonts'   => $fonts
	);
	return $data;
}

/* ---------------------------------------------------------------------------
 * Check activated plugins
 * --------------------------------------------------------------------------- */
function redart_is_plugin_active($plugin) {
	return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || redart_is_plugin_active_for_network( $plugin );
}

function redart_is_plugin_active_for_network( $plugin ) {
	if ( !is_multisite() )
		return false;

	$plugins = get_site_option( 'active_sitewide_plugins');
	if ( isset($plugins[$plugin]) )
		return true;

	return false;
}

/* ---------------------------------------------------------------------------
 * Load default theme options
 * - To return default options to store in database.
 * --------------------------------------------------------------------------- */
function redart_show_footer_widgetarea( $count ) {
	$classes = array (
		"1" => "dt-sc-full-width",
		"dt-sc-one-half",
		"dt-sc-one-third",
		"dt-sc-one-fourth",
		"1-2" => "dt-sc-one-half",
		"1-3" => "dt-sc-one-third",
		"1-4" => "dt-sc-one-fourth",
		"3-4" => "dt-sc-three-fourth",
		"2-3" => "dt-sc-two-third" );

	if ($count <= 4) :
		for($i = 1; $i <= $count; $i ++) :

			$class = $classes [$count];
			$class = esc_attr( $class );

			$first = ($i == 1) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$i}" )) : endif;
			echo "</div>";
		endfor;
	elseif ($count == 5 || $count == 6) :

		$a = array (
			"1-4",
			"1-4",
			"1-2" );

		$a = ($count == 5) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) : endif;
			echo "</div>";
		endforeach;
	elseif ($count == 7 || $count == 8) :
		$a = array (
			"1-4",
			"3-4");

		$a = ($count == 7) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );


			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) :endif;
			echo "</div>";
		endforeach;
	elseif ($count == 9 || $count == 10) :
		$a = array ( 
			"1-3",
			"2-3" );
		$a = ($count == 9) ? $a : array_reverse ( $a );

		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) :endif;
			echo "</div>";
		endforeach;
	endif;
}?>