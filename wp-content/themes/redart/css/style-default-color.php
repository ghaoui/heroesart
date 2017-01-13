<?php
/* ---------------------------------------------------------------------------
 * Default Color Styles
 * --------------------------------------------------------------------------- */

if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
$mtype = redart_option('layout','menu-active-type');
$skin = redart_option('colors','theme-skin');
if($skin == 'custom'):
	
	# Will do after working custom skin...

else:
    if( isset($mtype) && (($mtype == 'menu-active-highlight') || ($mtype == 'menu-active-with-icon menu-active-highlight')) ): ?>
        #main-menu > ul.menu > li.current_page_item > a, #main-menu > ul.menu > li.current_page_ancestor > a, #main-menu > ul.menu > li.current-menu-item > a, #main-menu > ul.menu > li.current-menu-ancestor > a,  .menu-active-highlight-grey #main-menu > ul.menu > li.current_page_item, .menu-active-highlight-grey #main-menu > ul.menu > li.current_page_ancestor, .menu-active-highlight-grey #main-menu > ul.menu > li.current-menu-item, .menu-active-highlight-grey #main-menu > ul.menu > li.current-menu-ancestor {
            background-color:<?php redart_opts_show('menu-activebgcolor', '');?>;
        }<?php
    endif;
    if( isset($mtype) && ($mtype == 'menu-active-highlight') ): ?>
        .menu-active-highlight-with-arrow #main-menu > ul.menu > li.current_page_item > a:before, .menu-active-highlight-with-arrow #main-menu > ul.menu > li.current_page_ancestor > a:before, .menu-active-highlight-with-arrow #main-menu > ul.menu > li.current-menu-item > a:before, .menu-active-highlight-with-arrow #main-menu > ul.menu > li.current-menu-ancestor > a:before {    	
            border-top-color:<?php redart_opts_show('menu-activebgcolor', '');?>;
        }<?php
    endif;
    if( isset($mtype) && ($mtype == 'menu-active-with-icon menu-active-highlight') ): ?>
        .menu-active-highlight-grey #main-menu > ul.menu > li.current_page_item > a:before, .menu-active-highlight-grey #main-menu > ul.menu > li.current_page_ancestor > a:before, .menu-active-highlight-grey #main-menu > ul.menu > li.current-menu-item > a:before, .menu-active-highlight-grey #main-menu > ul.menu > li.current-menu-ancestor > a:before {
            background-color:<?php redart_opts_show('menu-activecolor', '');?>;
        }<?php
    endif;
	if( isset($mtype) && ($mtype == 'menu-active-border-with-arrow')): ?>
		.menu-active-border-with-arrow #main-menu > ul.menu > li.current_page_item > a:before, .menu-active-border-with-arrow #main-menu > ul.menu > li.current_page_ancestor > a:before, .menu-active-border-with-arrow #main-menu > ul.menu > li.current-menu-item > a:before, .menu-active-border-with-arrow #main-menu > ul.menu > li.current-menu-ancestor > a:before {
			border-bottom-color:<?php redart_opts_show('menu-activecolor', '');?>;
		}
		.menu-active-border-with-arrow #main-menu > ul.menu > li.current_page_item > a:after, .menu-active-border-with-arrow #main-menu > ul.menu > li.current_page_ancestor > a:after, .menu-active-border-with-arrow #main-menu > ul.menu > li.current-menu-item > a:after, .menu-active-border-with-arrow #main-menu > ul.menu > li.current-menu-ancestor > a:after {
			background-color:<?php redart_opts_show('menu-activecolor', '');?>;
		}<?php
	endif;

	$mhovercolor = redart_opts_get('menu-hovercolor', '');
	$mactivecolor = redart_opts_get('menu-activecolor', '');

	if( !empty($mhovercolor) ){ ?>
      	#main-menu ul.menu > li > a:hover, #main-menu ul.menu li.menu-item-megamenu-parent:hover > a, #main-menu ul.menu > li.menu-item-simple-parent:hover > a { color:<?php echo esc_attr($mhovercolor);?>; }<?php
	}

	if( !empty($mactivecolor) ){ ?>
      	#main-menu > ul.menu > li.current_page_item > a, #main-menu > ul.menu > li.current_page_ancestor > a, #main-menu > ul.menu > li.current-menu-item > a, #main-menu ul.menu > li.current-menu-ancestor > a, #main-menu ul.menu li.menu-item-simple-parent ul > li.current_page_item > a, #main-menu ul.menu li.menu-item-simple-parent ul > li.current_page_ancestor > a, #main-menu ul.menu li.menu-item-simple-parent ul > li.current-menu-item > a, #main-menu ul.menu li.menu-item-simple-parent ul > li.current-menu-ancestor > a, .left-header #main-menu > ul.menu > li.current_page_item > a,.left-header #main-menu > ul.menu > li.current_page_ancestor > a,.left-header #main-menu > ul.menu > li.current-menu-item > a, .left-header #main-menu > ul.menu > li.current-menu-ancestor > a { color:<?php echo esc_attr($mactivecolor);?>;}<?php
	}
endif; ?>

/*-----------------------*****------------------------- Topbar  -----------------------*****-------------------------*/

.top-bar a, .top-bar a { color:<?php redart_opts_show('topbar-linkcolor', '');?>; }
.top-bar { color:<?php redart_opts_show('topbar-textcolor', '#000000');?>; background-color:<?php redart_opts_show('topbar-bgcolor','#eeeeee');?>}
.top-bar a:hover, .top-bar a:hover { color:<?php redart_opts_show('topbar-linkhovercolor', '#000000');?>; }

/*-----------------------*****------------------------- Header -----------------------*****-------------------------*/<?php

$htype = redart_option('layout','header-type');
$hcolor = redart_option('colors','header-bgcolor');
if( isset($htype) && ($htype == 'boxed-header') && isset($hcolor) && ($hcolor != '')): ?>
	.main-header, .boxed-header.semi-transparent-header .main-header, .boxed-header .main-header { background: rgba(<?php $rgbcolor = redart_hex2rgb($hcolor); $rgbcolor = implode(',', $rgbcolor); echo esc_attr($rgbcolor); ?>, <?php redart_opts_show('header-bgcolor-opacity', '1');?>); }<?php
elseif( isset($hcolor) && ($hcolor != '') ):?>
	.main-header-wrapper, .fullwidth-header.semi-transparent-header .main-header-wrapper { background: rgba(<?php $rgbcolor = redart_hex2rgb(redart_opts_get('header-bgcolor', '')); $rgbcolor = implode(',', $rgbcolor); echo esc_attr($rgbcolor); ?>, <?php redart_opts_show('header-bgcolor-opacity', '1');?>); }<?php
endif;

$headbg = redart_option('layout','header-bg');
$bgrepeat = redart_opts_get('header-bg-repeat', 'no-repeat');
$bgposition = redart_opts_get('header-bg-position', 'center center');
if( !empty( $headbg) ) {?>
	#main-header-wrapper { background-image: url('<?php echo esc_attr($headbg);?>'); background-repeat: <?php echo esc_attr($bgrepeat);?>; background-position: <?php echo esc_attr($bgposition);?>; }<?php
}?>

/*-----------------------*****------------------------- Menu  -----------------------*****-------------------------*/<?php

$mbg = redart_option('colors','menu-bgcolor');
if( isset($mbg) ): ?>
	.menu-wrapper {  background: rgba(<?php $rgbcolor = redart_hex2rgb(redart_opts_get('menu-bgcolor', '')); $rgbcolor = implode(',', $rgbcolor); echo esc_attr($rgbcolor); ?>, <?php redart_opts_show('menu-bgcolor-opacity', '1');?>); }<?php
endif;

$mlinkcolor = redart_opts_get('menu-linkcolor','');
if( isset($mlinkcolor) ): ?>
	#main-menu ul.menu > li > a { color:<?php echo esc_attr($mlinkcolor);?>; }<?php
endif; ?>

<?php
if( isset($mtype) && ($mtype == 'menu-active-with-icon menu-active-highlight') ): ?>
	.menu-active-highlight.menu-active-with-icon #main-menu > ul.menu > li.current_page_item > a:before, .menu-active-highlight.menu-active-with-icon #main-menu > ul.menu > li.current_page_ancestor > a:before, .menu-active-highlight.menu-active-with-icon #main-menu > ul.menu > li.current-menu-item > a:before, .menu-active-highlight.menu-active-with-icon #main-menu > ul.menu > li.current-menu-ancestor > a:before,  .menu-active-highlight.menu-active-with-icon #main-menu > ul.menu > li.current_page_item > a:after, .menu-active-highlight.menu-active-with-icon #main-menu > ul.menu > li.current_page_ancestor > a:after, .menu-active-highlight.menu-active-with-icon #main-menu > ul.menu > li.current-menu-item > a:after, .menu-active-highlight.menu-active-with-icon #main-menu > ul.menu > li.current-menu-ancestor > a:after {
		background-color:<?php redart_opts_show('menu-activecolor', '#ffffff');?>;
	}<?php
endif;
if( isset($mtype) && ($mtype == 'menu-active-with-two-border') ): ?>
	.menu-active-with-two-border #main-menu > ul.menu > li.current_page_item > a:before, .menu-active-with-two-border #main-menu > ul.menu > li.current_page_ancestor > a:before, .menu-active-with-two-border #main-menu > ul.menu > li.current-menu-item > a:before, .menu-active-with-two-border #main-menu > ul.menu > li.current-menu-ancestor > a:before, .menu-active-with-two-border #main-menu > ul.menu > li.current_page_item > a:after, .menu-active-with-two-border #main-menu > ul.menu > li.current_page_ancestor > a:after, .menu-active-with-two-border #main-menu > ul.menu > li.current-menu-item > a:after, .menu-active-with-two-border #main-menu > ul.menu > li.current-menu-ancestor > a:after {
		background-color:<?php redart_opts_show('menu-activecolor', '');?>;
	}<?php
endif; ?>

.menu-active-highlight #main-menu > ul.menu > li.current_page_item > a, .menu-active-highlight #main-menu > ul.menu > li.current_page_ancestor > a, .menu-active-highlight #main-menu > ul.menu > li.current-menu-item > a, .menu-active-highlight #main-menu > ul.menu > li.current-menu-ancestor > a { color:<?php redart_opts_show('menu-activecolor', '#ffffff');?>; }

/*-----------------------*****------------------------- Content -----------------------*****-------------------------*/<?php

$ccolor = redart_option('colors','content-text-color');
if( isset($ccolor) ): ?>
	body, p { color:<?php redart_opts_show('content-text-color', '');?>; }<?php
endif;
$ccolor = redart_option('colors','content-link-color');
if( isset($ccolor) ): ?>
	a { color:<?php redart_opts_show('content-link-color', '');?>; }<?php
endif;
$ccolor = redart_option('colors','content-link-hcolor');
if( isset($ccolor) ): ?>
	a:hover { color:<?php redart_opts_show('content-link-hcolor', '');?>; }<?php
endif;?>

/*-----------------------*****------------------------- Heading -----------------------*****-------------------------*/<?php

for($i = 1; $i <= 6; $i++):
	$hcolor = redart_option("colors","heading-h{$i}-color");
	if( isset($hcolor) ):
		echo "h{$i} { color: ";
			redart_opts_show("heading-h{$i}-color", "");
		echo "; }\n";	
	endif;
endfor;?>

/*-----------------------*****------------------------- Footer -----------------------*****-------------------------*/<?php

$fcolor = redart_option('colors','footer-bgcolor');
if( isset($fcolor) && ($fcolor != '')): ?>
    .footer-widgets {
        background: rgba(<?php
        $rgbcolor = redart_hex2rgb($fcolor);
        $rgbcolor = implode(',', $rgbcolor);
        echo esc_attr($rgbcolor); ?>, <?php redart_opts_show('footer-bgcolor-opacity', '1');?>) url( <?php redart_opts_show('footer-bg', '');?> ) <?php redart_opts_show('footer-bg-position', 'center center')?> <?php redart_opts_show('footer-bg-repeat', 'no-repeat');?>;
    }<?php
endif;

$footerbg = redart_option('layout','footer-bg');
if( !empty( $footerbg) ) {?>
    .footer-widgets {
        background-image: url('<?php echo esc_attr($footerbg);?>'); background-repeat: <?php redart_opts_show('footer-bg-repeat', 'no-repeat');?>; background-position: <?php redart_opts_show('footer-bg-position', 'center center')?>;
    }<?php
}?>

.footer-widgets, #footer, .footer-copyright, #footer p { color:<?php redart_opts_show('footer-text-color', '');?>; }
.footer-widgets a, #footer a, .widget ul li a, .footer-widgets .widget ul li > a, #footer .widget ul li > a { color:<?php redart_opts_show('footer-link-color', '');?>; }
#footer h3 { color:<?php redart_opts_show('footer-heading-color', '');?>; }

/*-----------------------*****------------------ Copyright Section ---------------*****-------------------------*/<?php

$fccolor = redart_option('colors','copyright-bgcolor');
if( isset($fccolor) && ($fccolor != '')): ?>
    .footer-copyright {
        background: rgba(<?php
        $rgbcolor = redart_hex2rgb($fccolor);
        $rgbcolor = implode(',', $rgbcolor);
        echo esc_attr($rgbcolor); ?>, <?php redart_opts_show('copyright-bgcolor-opacity', '1');?>);
    }<?php
endif; ?>