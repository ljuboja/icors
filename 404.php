<?php get_header(); ?>

<div id="content">
    <div class="archive">
        
        <div class="title"><?php _e('Žao nam je, ova stranica ne postoji!', 'unspoken'); ?></div>

        <div id="post-0" class="post hentry error404 not-found clear">
            
            <p><a href="<?php bloginfo('url'); ?>"><?php _e( 'NAZAD NA POČETNU STRANICU', 'unspoken' ); ?></a></p>
        </div><!-- #post-0 -->

    </div> <!-- .archive -->
</div> <!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
