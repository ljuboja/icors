<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php bloginfo('text_direction'); ?>" xml:lang="<?php bloginfo('language'); ?>">
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="google-site-verification" content="ybpBPY91mAYfY5ITLhczitljfnszwDHL-jyp3EOnJCQ" />
       
        <title>
            <?php
                global $page, $paged;
                wp_title( '|', true, 'right' );
                bloginfo( 'name' );
                $site_description = get_bloginfo( 'description', 'display' );
                if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
                if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
            ?>
        </title>
        
        
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <?php if ( get_option('unspoken_favicon') ) echo '<link rel="shortcut icon" href="' . get_option('unspoken_favicon') . '" type="image/x-icon" />'; ?>
        <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="all" />
		
		<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/lib/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="all" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>"/>
        <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<!--[if lt IE 8]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie.css" type="text/css" media="all" /><![endif]-->

      <!--   <?php if (get_option('unspoken_skin') && get_option('unspoken_skin') != 'default') : ?>
            <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/skins/unspoken-<?php echo get_option('unspoken_skin'); ?>/unspoken-<?php echo get_option('unspoken_skin'); ?>.css" type="text/css" media="all" />
        <?php endif; ?> -->

        <?php if (get_option('unspoken_font') != 'arial' && function_exists('unspoken_get_font')) unspoken_get_font(get_option('unspoken_font')); ?>

        <?php
			wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'jcarousellite', get_template_directory_uri() . '/lib/js/jcarousellite_1.0.1_mod.js', 'jquery', false );
            wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/lib/js/fancybox/jquery.fancybox-1.3.4.pack.js', 'jquery', false );
            wp_enqueue_script( 'script', get_template_directory_uri() . '/lib/js/scripts.js', 'jquery', false );
            if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
            if ( get_option('unspoken_pagination_mode') == 3 ) wp_enqueue_script( 'infinitescroll_init', get_template_directory_uri() . '/lib/js/jquery.infinitescroll.init.js', 'jquery', false );
            wp_enqueue_script( 'headroom', get_template_directory_uri() . '/lib/js/headroom.js', 'jquery', false );

            wp_head();

     
            if ( is_page_template( 'template-magazine.php' ) ) { ?>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        jQuery('#mainposts').jCarouselLite({
                            btnNext: "#mainposts .next", btnPrev: "#mainposts .prev", visible: 1, scroll: 1 <?php if ( get_option('unspoken_mag_auto') && get_option('unspoken_mag_delay') > 0 ) echo ', auto: ' . get_option('unspoken_mag_delay') ;  ?>
                        });
                    });
                </script>
        <?php
            }
           //if ( get_option('unspoken_styles') ) echo '<style type="text/css">' . get_option('unspoken_styles') . '</style>';
            ?>
       



<!--<script type='text/javascript' src='http://www.ico.rs/wp-content/themes/unspoken/lib/js/marq.js'></script>-->
<!--<script language="JavaScript">
$('marquee').marquee(optionalClass);
</script>-->


	</head>
	<body <?php body_class(); ?>>
     <?php ob_start(); ?>


        <div class="wrapper">


            <div class="header">
                <div class="header-meta">

                    <?php wp_nav_menu(array('menu' => __('Top menu', 'unspoken'), 'theme_location' => __('Top menu', 'unspoken'), 'container' => 'div', 'container_id' => 'top-menu', 'menu_class' => 'header-menu clear', 'walker' => new extended_walker())); ?>

                    <div class="header-searchform">
                        <form method="get" action="<?php bloginfo('url'); ?>">
                            <fieldset>
                                <input type="text" id="s" name="s" onfocus="if(this.value=='<?php _e( 'Search', 'unspoken' );?>') this.value='';" onblur="if(this.value=='') this.value='<?php _e( 'Search', 'unspoken' );?>';" value="<?php _e( 'Pretraga', 'unspoken' );?>" />
                                <button type="submit"></button>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="header-middle clear">
                    <div class="logo-header <?php if ( !get_option('unspoken_logo_top') && !get_option('unspoken_logo_text') ) echo 'offset' ?>">
                        <a href="<?php bloginfo( 'url' ); ?>">
                        <?php
                            if ( get_option('unspoken_logo_text') ) {
                                echo get_option('unspoken_logo_text');
                            } elseif ( get_option('unspoken_logo_top') ) {
                                if ( function_exists('unspoken_get_logo') ) echo unspoken_get_logo(get_option('unspoken_logo_top'));
                            } else {
                            ?>
                                <?php
                                if (get_option('unspoken_skin') && get_option('unspoken_skin') != 'default') {
                                    echo '<span style="background: url(' . get_bloginfo('template_url') . '/skins/unspoken-' . get_option('unspoken_skin') . '/images/logo-header.png) 0 0 no-repeat;"></span>';
                                } else {
                                    echo '<span style="background: url(' . get_bloginfo('template_url') . '/images/logo-header.png) 0 0 no-repeat;"></span>';
                                }
                                ?>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="header-adplace">
                        <?php if ( !dynamic_sidebar( 'header-widget-area' ) ) ?>
                    </div>
                </div>

                <?php wp_nav_menu(array('menu' => __('Navigation', 'unspoken'), 'theme_location' => __('Navigation', 'unspoken'), 'container' => 'div', 'container_class' => 'menu-navigation clear', 'container_id' => 'navigation', 'walker' => new extended_walker())); ?>

            </div>

            <div class="middle clear">

                <?php if ( is_active_sidebar( 'topcontent-widget-area' ) ) : ?>
                <div class="top-content-adplace">
                    <?php if ( !dynamic_sidebar( 'topcontent-widget-area' ) ) ?>
                </div>
                <?php endif; ?>
