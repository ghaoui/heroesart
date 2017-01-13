<?php
/* ---------------------------------------------------------------------------
 * Hook of Top
 * --------------------------------------------------------------------------- */
function redart_hook_top()
{
	if( redart_option( 'pageoptions','enable-top-hook' ) ) :
		echo '<!-- redart_hook_top -->';
			$hook = stripslashes(htmlspecialchars_decode(redart_option('pageoptions','top-hook'),ENT_QUOTES));
			$hook = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "$1", $hook);
			if (!empty($hook))
				echo DTCoreShortcodesDefination::dtShortcodeHelper( $hook );
		echo '<!-- redart_hook_top -->';
	endif;	
}
add_action( 'redart_hook_top', 'redart_hook_top' );


/* ---------------------------------------------------------------------------
 * Hook of Content before
 * --------------------------------------------------------------------------- */
function redart_hook_content_before()
{
	if( redart_option( 'pageoptions','enable-content-before-hook' ) ) :
		echo '<!-- redart_hook_content_before -->';
			$hook = stripslashes(htmlspecialchars_decode(redart_option('pageoptions','content-before-hook'),ENT_QUOTES));
			$hook = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "$1", $hook);
			if (!empty($hook))
				echo DTCoreShortcodesDefination::dtShortcodeHelper( $hook );
		echo '<!-- redart_hook_content_before -->';
	endif;
}
add_action( 'redart_hook_content_before', 'redart_hook_content_before' );


/* ---------------------------------------------------------------------------
 * Hook of Content after
 * --------------------------------------------------------------------------- */
function redart_hook_content_after()
{
	if( redart_option( 'pageoptions','enable-content-after-hook' ) ) :
		echo '<!-- redart_hook_content_after -->';
			$hook = stripslashes(htmlspecialchars_decode(redart_option('pageoptions','content-after-hook'),ENT_QUOTES));
			$hook = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "$1", $hook);
			if (!empty($hook))
				echo DTCoreShortcodesDefination::dtShortcodeHelper( $hook );
		echo '<!-- redart_hook_content_after -->';
	endif;
}
add_action( 'redart_hook_content_after', 'redart_hook_content_after' );


/* ---------------------------------------------------------------------------
 * Hook of Bottom
 * --------------------------------------------------------------------------- */
function redart_hook_bottom()
{
	if( redart_option( 'pageoptions','enable-bottom-hook' ) ) :
		echo '<!-- redart_hook_bottom -->';
			$hook = stripslashes(htmlspecialchars_decode(redart_option('pageoptions','bottom-hook'),ENT_QUOTES));
			$hook = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "$1", $hook);
			if (!empty($hook))
				echo DTCoreShortcodesDefination::dtShortcodeHelper( $hook );
		echo '<!-- redart_hook_bottom -->';
	endif;
}
add_action( 'redart_hook_bottom', 'redart_hook_bottom' );

?>