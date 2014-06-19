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
        <style type="text/css">
            html,body,div,span,iframe,h2,h3,p,a,img,ul,li,fieldset,form{border:0;outline:0;font-size:120%;vertical-align:baseline;background:transparent;margin:0;padding:0}
body{background-color:#f9f9f9;line-height:1;text-align:left;font:62.5% Georgia, Times New Roman, Serif;background:#f9f9f9 url(images/bg.png) 0 0 repeat}ul{list-style:none}
:focus{outline:0}
.br{border-right:1px solid #f5f1ec}
.nb{border:0!important}
.wrapper{background-color:#fff;width:940px;border-top:3px solid #dc881d;border-bottom:3px solid #dc881d;background:#fff url(images/bg2.png) 0 0 repeat;margin:0 auto;padding:0 20px 15px}
.middle{padding:0 0 40px}
#content{width:620px;float:left;padding-right:9px}
#sidebar{width:300px;float:right;padding-left:10px}
.header-meta{background-color:#f6f6f8;height:40px;background:#fffff8 url(images/bg2.png) 0 0 repeat;margin-bottom:20px;border-radius:0 0 2px 2px;-moz-border-radius:0 0 2px 2px;-webkit-border-radius:0 0 2px 2px}
#top-menu{width:770px;height:40px;float:left}
#top-menu ul li{font-size:12px;position:relative;z-index:3;float:left;border-left:1px solid #e6e6e7;margin:12px 0;padding:0 15px}
#top-menu ul li a{color:#3D3239;margin:12px 0}
#top-menu ul li.parent a{background:url(images/menu-parent.png) 100% 3px no-repeat;padding-right:15px}
#top-menu ul.sub-menu{position:absolute;left:0;z-index:3;display:block;visibility:hidden;background-color:#3D3239;padding:8px 0}
#top-menu ul.sub-menu a{display:block;color:#fff;background:none!important;white-space:nowrap;padding-right:0!important;margin:0}
#top-menu ul.sub-menu li{border-left:none;float:none;line-height:2;margin:0}
.header-searchform{width:127px;height:27px;float:right;position:relative;background-color:#fff;border:1px solid #E8DFD4;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;margin:5px 5px 5px 0;padding:1px 7px}
.header-searchform input{width:108px;border:0;color:#333;font:12px Arial, Helvetica, sans-serif;vertical-align:middle;margin:0 5px 0 0;padding:6px 0}
.header-searchform button{width:11px;height:11px;border:0;position:absolute;right:7px;top:9px;background:url(images/header-searchform-button.png) 0 0 no-repeat;vertical-align:middle;cursor:pointer;margin:0;padding:0}
.logo-header{display:block;max-width:405px;float:left}
.logo-header a{color:#3b3b3b;font-size:40px;font-weight:400}
.header-adplace{width:468px;float:right;margin-top:30px}
.menu-navigation{clear:both;border-top:1px solid #DC881D;border-bottom:1px solid #e8dfd4;margin-bottom:20px}
#navigation ul li{font-family:"Trebuchet MS";float:left;font-size:16px;font-weight:700;height:40px;line-height:40px;padding-left:10px;position:relative;text-transform:uppercase}
#navigation ul li a{display:block;white-space:nowrap;color:#3d3239;padding-right:12px}
.block-title{font-size:18px;font-weight:400;height:34px;line-height:34px;color:#3d3239;border-top:2px solid #DC881D;border-bottom:1px solid #e8dfd4}
.block-title a{color:#3d3239;padding-right:15px;background:url(images/link-arrow.png) 100% 6px no-repeat}
.block-title2{font-size:16px;font-weight:400;color:#fff;padding-bottom:6px;border-bottom:1px solid #fff}
.latest{padding-bottom:30px}
.slider{background-color:whitesmoke;width:360px;float:left;padding:10px 10px 20px}
.slider .block-title2 a.prev{background:#d57a2c url(images/arrows.png) 5px 50% no-repeat;right:19px;border-radius:3px 0 0 3px;-moz-border-radius:3px 0 0 3px;-webkit-border-radius:3px 0 0 3px}
.slider .block-title2 a.next{background:#d57a2c url(images/arrows.png) -28px 50% no-repeat;right:0;border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;-webkit-border-radius:0 3px 3px 0}
.slider-inn{overflow:hidden;width:360px}
.slider-inn li{width:360px;float:left}
.slider-item{width:360px;padding-top:10px}
.slider-item-meta{color:#fff;font-size:10px;margin-bottom:3px}
.slider-item h2{color:#fff;font-size:21px;margin-bottom:5px}
.slider-item p{color:#fff;font-size:12px}
.latest-news{width:220px;float:right;padding-top:10px}
.latest-news .block-title{border-top:none;height:auto;line-height:normal;padding-bottom:6px}
.latest-news li{border-bottom:1px solid #E8DFD4;padding:10px 0}
.latest-news-meta{color:#968268;font-size:10px;margin-bottom:4px}
.category-inn{padding-top:10px}
.category-item{width:300px;float:left;border-right:1px solid #e8dfd4;padding:0 10px 10px 0}
.category-list{width:299px;padding-left:10px;float:right}
.category-list li{border-bottom:1px solid #e8dfd4;margin:-10px 0 10px;padding:10px 0}
.widget{width:300px;overflow:hidden;margin-bottom:30px}
.textwidget,.unspoken-adplace{font-size:13px;line-height:1.5;color:#2a2a21}
.unspoken-adplace .aligncenter{clear:both;display:block;margin-left:auto;margin-right:auto;text-align:center}
a[href$=.rar]{padding-left:32px;background:url(icons/rar.png) no-repeat center left;float:left;margin-bottom:45px;margin-right:2px}
100%{text-indent:-105em}a{text-decoration:none}
.clear:after{content:".";display:block;height:0;clear:both;visibility:hidden}
a img,#top-menu ul li.first{border:none}
.header-middle{margin-bottom:10px}.category{margin-bottom:30px}
.slider .block-title2{position:relative}
.slider .block-title2 a.prev,.slider .block-title2 a.next{position:absolute;width:18px;height:18px}
.slider-inn ul{width:10000px}
.slider-photo,.category-item-photo{margin-bottom:8px}
.slider-photo a,.slider-photo img,.category-item-photo a,.category-item-photo img,.logo-header img{display:block}
.slider-item-meta a,.slider-item h2 a{color:#fff}
.latest-news-meta a,.category-list-meta a{color:#968268}
.latest-news-title,.category-list-title{font-size:12px;font-weight:400}
.latest-news-title a,.category-list-title a,.widget a,.unspoken-adplace a{color:#DC881D}.category-list-meta{color:#968268;font-size:10px;margin-bottom:3px}
#menu-item-17862{color:white;background:#e41414;padding:8px;border:1px solid gray;}

#menu-item-17862 a{color:white;}

        </style>
        
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <?php if ( get_option('unspoken_favicon') ) echo '<link rel="shortcut icon" href="' . get_option('unspoken_favicon') . '" type="image/x-icon" />'; ?>
		
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
            wp_enqueue_script( 'script', get_template_directory_uri() . '/lib/js/jsmini.min.js', 'jquery', false );
            //wp_enqueue_script( 'jcarousellite', get_template_directory_uri() . '/lib/js/jcarousellite_1.0.1_mod.js', 'jquery', false );
            wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/lib/js/fancybox/jquery.fancybox-1.3.4.pack.js', 'jquery', false );
            //wp_enqueue_script( 'script', get_template_directory_uri() . '/lib/js/scripts.js', 'jquery', false );
            wp_enqueue_script( 'script', get_template_directory_uri() . '/lib/js/jsmini.min.js', 'jquery', false );
            //if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
            if ( get_option('unspoken_pagination_mode') == 3 ) wp_enqueue_script( 'infinitescroll_init', get_template_directory_uri() . '/lib/js/jquery.infinitescroll.init.js', 'jquery', false );
            wp_head();
            if ( is_home() ) { ?>
                // <script type="text/javascript">
                //     jQuery(document).ready(function() {
                //         jQuery('.videolist-inn').jCarouselLite({
                //             btnNext: ".videolist .next",
                //             btnPrev: ".videolist .prev",
                //             visible: <?php echo get_option('unspoken_video_visible'); ?>,
                //             scroll: 1,
                //             vertical: true
                //         });
                //         jQuery('.videolist-inn li a').click(function(){
                //             jQuery('.videolist-inn li a').removeClass('active');
                //             jQuery(this).addClass('active');
                //             var vsel = jQuery(this).attr('rev');
                //             jQuery('.video-item.active').removeClass('active');
                //             jQuery('.video-item.' + vsel).addClass('active');
                //         });
                //     });
                // </script>
                <?php
            }
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


<script language="JavaScript">

function popUp(URL) {
eval("page" + id + " = window.open(URL, '" + id + "', '
toolbar=1,
scrollbars=1,
location=1,
statusbar=1,
menubar=1,
resizable=1,
width=500,
height=500,
left = 390,
top = 150');");
}
</script>
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
