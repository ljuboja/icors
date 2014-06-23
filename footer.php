            </div> <!-- .middle -->
            <div class="bottom-widgetarea">
                <div class="bottom-widgetarea-inn clear">
                    <?php if ( !dynamic_sidebar('bottom-widget-area') ) : ?>
                    <?php endif; // end bottom-widget-area ?>
                </div>
            </div>
            <div class="footer clear">

            <?php wp_nav_menu(array('menu' => __('Navigation footer', 'unspoken'), 'theme_location' => __('Navigation footer', 'unspoken'), 'depth' => 1, 'container' => 'div', 'container_class' => 'menu-footer clear')); ?>

                <div class="footer-leftpart">
                    <a class="logo-footer" href="<?php bloginfo( 'url' ); ?>">
                        <?php
                            if ( get_option('unspoken_logo_text') ) {
                                echo get_option('unspoken_logo_text');
                            } elseif ( get_option('unspoken_logo_bottom') ) {
                                if ( function_exists('unspoken_get_logo') ) echo unspoken_get_logo(get_option('unspoken_logo_bottom'));
                            } else {
                            ?>
                            <?php
                            if (get_option('unspoken_skin') && get_option('unspoken_skin') != 'default') {
                                echo '<span style="background: url(' . get_bloginfo('template_url') . '/skins/unspoken-' . get_option('unspoken_skin') . '/images/logo-footer.png) 0 0 no-repeat;"></span>';
                            } else {
                                echo '<span style="background: url(' . get_bloginfo('template_url') . '/images/logo-footer.png) 0 0 no-repeat;"></span>';
                            }
                            ?>
                        <?php } ?>
                    </a>
                </div>
                <div class="footer-middlepart">
                    <div class="footer-searchform">
                        <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                            <fieldset>
                                <input type="text" name="s" onfocus="if(this.value=='<?php _e( 'Pretraga', 'unspoken' );?>') this.value='';" onblur="if(this.value=='') this.value='<?php _e( 'Pretraga', 'unspoken' );?>';" value="<?php _e( 'Pretraga', 'unspoken' );?>" />
                            </fieldset>
                        </form>
                    </div>
                    <div class="footer-tags">
                        <?php unspoken_get_tags(); ?>
                    </div>
                </div>

            <?php  wp_nav_menu(array('menu' => __('Footer left linkset', 'unspoken'), 'theme_location' => __('Footer left linkset', 'unspoken'), 'depth' => 1, 'container' => false, 'container_class' => false, 'menu_class' => 'footer-linkset')); ?>

            <?php  wp_nav_menu(array('menu' => __('Footer right linkset', 'unspoken'), 'theme_location' => __('Footer right linkset', 'unspoken'), 'depth' => 1, 'container' => false, 'container_class' => false, 'menu_class' => 'footer-linkset')); ?>

            </div><!-- .footer -->
            <div class="copyrights">
               
                <?php if ( get_option('unspoken_footer_text') ) echo '<p>' . get_option('unspoken_footer_text') . '</p>'; ?>
                 <p><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> &copy; <?php echo date('Y'); ?> <?php _e('', 'unspoken'); ?></p>
            </div>
            <div class="credits">
                
            </div>
            <div class="clear"></div>
        </div> <!-- .wrapper -->

        <?php wp_footer(); ?>

        <?php echo (get_option('unspoken_ga')) ? get_option('unspoken_ga') : ''; ?>

      

 <script type="text/javascript">
 // grab an element
var myElement = document.querySelector("#navigation");
// construct an instance of Headroom, passing the element
var headroom  = new Headroom(myElement, 

{
  "tolerance": 10,
  "offset": 221,
  "classes": {
    "initial": "animated",
    "pinned": "slideDown",
    "unpinned": "slideUp",
    "top": "headroom--top",
    "notTop": "headroom--not-top"
  }
    });
// initialise
headroom.init();
        
</script>
<script type="text/javascript">
    
jQuery(document).ready(function() {
  jQuery.simpleWeather({
    woeid: '', //2357536
    location: 'Odzaci,Zapad',
    unit: 'c',
    success: function(weather) {
      html = '<h2><i class="ikon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
      // html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
     //html += '<li class="currently">'+weather.currently+'</li>';
      // html += '<li>'+weather.alt.temp+'&deg;C</li></ul>';
    
  
      jQuery("#weather").html(html);
    },
    error: function(error) {
      jQuery("#weather").html('<p>'+error+'</p>');
    }
  });
});

</script>


	</body>
</html>
