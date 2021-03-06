<?php if ( have_posts() ) : ?>

    <div class="loop">
        <div id="loop" class="list clear">
        <?php
            $postedon_data = array(
                'date' => get_option('unspoken_postedon_date'),
                'category' => get_option('unspoken_postedon_cat'),
                'comment' => get_option('unspoken_postedon_comm'),
                'author' => get_option('unspoken_postedon_author')
            );
            $i = 0;
            while ( have_posts() ) : the_post();
                $i++;
        ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
                    <a href="<?php the_permalink(); ?>" class="post-thumb"><?php if ( has_post_thumbnail() ) the_post_thumbnail('general'); ?></a>
                    <div class="post-meta"><?php if (function_exists('unspoken_posted_on')) unspoken_posted_on($postedon_data); ?></div>
                    <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
        <?php
            if ( $i % 2 == 0 ) echo '<div class="clear"></div>';
            endwhile; // end of the loop.
        ?>
            <div class="grid-line"></div>
        </div><!-- #loop -->
    </div><!-- .loop -->

<?php else : ?>

    <div class="loop">
        <div id="post-0" class="post hentry error404 not-found clear">
            <h2><?php _e( 'Nista nije pronadjeno', 'unspoken' ); ?></h2>
            <p><?php _e( 'Zao nam je, ali nema sadrzaja koji ste trazili, probajte sa pretragom...', 'unspoken' ); ?></p>
        </div><!-- #post-0 -->
    </div>

<?php endif; ?>
