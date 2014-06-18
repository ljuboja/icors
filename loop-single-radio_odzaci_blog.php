<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>

    <div class="hentry-meta">
        <h1><?php the_title(); ?></h1>
        <p class="hentry-meta-data"><?php printf(__( ' %1$s  %2$s %3$s &middot; %4$s', 'unspoken' ), sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url( get_the_author_meta( 'ID' ) ), sprintf(esc_attr__( 'View all posts by %s', 'unspoken' ), get_the_author() ), get_the_author()), get_the_date(), (!is_attachment() )? sprintf( __( ' %1$s', 'unspoken' ), get_the_category_list( ', ' ) ) : '', sprintf(__( '<a href="#comments">%1$u Komentara</a>', 'unspoken' ), get_comments_number())); edit_post_link( __( 'Uredi clanak', 'uspoken' ), ' &middot; ');?></p>
    </div>

    <div class="hentry-container clear">
        <?php
            $videourl = get_post_meta(get_the_ID(), 'usn_videolink', true );
            if ( $videourl != '' ) {
                echo '<div class="wide">';
                $AE = new AutoEmbed();
                if ($AE->parseUrl($videourl)) {
                    $AE->setParam('wmode','transparent');
                    $AE->setParam('autoplay','false');
                    $AE->setHeight(400);
                    $AE->setWidth(620);
                    echo $AE->getEmbedCode();
                }
                echo '</div>';
            }
        ?>
        <div class="hentry-middle">
            <div class="hentry-content clear">
                <?php the_content(); ?>
            </div>
            <div class="hentry-footer">
                <?php ( get_the_tag_list() )? printf( __( '<p class="hentry-tags">Tagovi: %1$s</p>', 'unspoken' ),  get_the_tag_list('', ', ', '') ) : ''; ?>
                <?php if ( get_option( 'unspoken_like' ) ) : ?>
                <p class="hentry-like"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" show_faces="false" width="460" font=""></fb:like></p>
                <?php endif; ?>
                <?php wp_link_pages( array( 'before' => '<p class="page-link">' . __( 'Stranice:', 'unspoken' ), 'after' => '</p>' ) ); ?>
                <div class="hentry-navigation">
                    <div class="hentry-navigation-inn clear">
                        <?php
                            $prev_post = get_adjacent_post(false, '', true);
                            $next_post = get_adjacent_post(false, '', false);
                            if ($prev_post) : $prev_post_url = get_permalink($prev_post->ID); $prev_post_title = $prev_post->post_title;
                        ?>
                            <a class="hentry-navigation-prev" href="<?php echo $prev_post_url; ?>">
                                <em><?php _e( 'Prethodna', 'unspoken' ); ?></em>
                                <span><?php echo $prev_post_title; ?></span>
                            </a>
                        <?php
                            endif;
                            if ($next_post) : $next_post_url = get_permalink($next_post->ID); $next_post_title = $next_post->post_title;
                        ?>
                            <a class="hentry-navigation-next" href="<?php echo $next_post_url; ?>">
                                <em><?php _e( 'Sledeca', 'unspoken' ); ?></em>
                                <span><?php echo $next_post_title; ?></span>
                            </a>
                        <?php endif; ?>
                            <div class="hentry-navigation-line"></div>
                    </div>
                </div>

                <?php
                    if ( get_option('unspoken_rel_type1') ) {
                        if ( function_exists('related_posts') ) related_posts( array('template_file'=>'yarpp-template-recommended.php', 'limit'=>3) );
                    }
                ?>

            </div>
        </div>
        <div class="hentry-sidebar">
            <?php if ( !get_option('unspoken_author') ) : ?>
            <div class="hentry-widget hentry-author">
                <h6><?php _e( 'O Autoru', 'unspoken' ); ?></h6>
                <div class="hentry-author-meta clear">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), '60' ); ?>
                    <p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></p>
                    <?php if (get_the_author_meta('user_url') != '') : ?>
                    <span><a href="<?php the_author_meta( 'user_url' ); ?>"><?php _e( 'Website', 'unspoken' ); ?></a></span>
                    <?php endif; ?>
                </div>
                <div class="hentry-author-about"><?php the_author_meta( 'description' ); ?></div>
            </div>
            <?php endif; ?>

            <?php
                if ( get_option('unspoken_rel_type2') ) {
                    if ( function_exists('related_posts') ) related_posts( array('template_file'=>'yarpp-template-similar.php') );
                }
            ?>

            <?php if ( get_option('unspoken_share_type1') ) : ?>
            <div class="hentry-widget hentry-share">
                <h6><?php _e( 'Podeli ovaj clanak', 'unspoken' ); ?></h6>
                <ul>
                    
                    <li class="twitter"><a href="http://twitter.com/share?text=<?php echo urlencode(the_title('','', false)); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="external nofollow"><?php _e( 'Tvituj', 'unspoken' ); ?></a></li>
                    <li class="digg"><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)); ?>" target="_blank" rel="external nofollow"><?php _e( 'Dig', 'unspoken' ); ?></a></li>
                    <li class="delicious"><a href="http://del.icio.us/post?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank" rel="external nofollow"><?php _e( 'Dodaj', 'unspoken' ); ?></a></li>
                    <li class="fb"><a href="http://facebook.com/share.php?u=<?php the_permalink() ?>&amp;t=<?php echo urlencode(the_title('','', false)) ?>" target="_blank" rel="external nofollow"><?php _e( 'Share na Facebook', 'unspoken' ); ?></a></li>
                    <li class="stumbleupon"><a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank" rel="external nofollow"><?php _e( 'Stumble', 'unspoken' ); ?></a></li>
                    <li class="feed"><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
                </ul>
            </div>
            <?php endif; ?>

            <?php if ( get_option('unspoken_sidebar_ad') ) : ?>
            <div class="hentry-widget unspoken-adplace">
                <?php echo get_option('unspoken_sidebar_ad'); ?>
            </div>
            <?php endif; ?>

        </div>

        <?php if ( get_option('unspoken_share_type2') ) : ?>
        <div id="sharebox">
            <div class="share-item"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
            <div class="share-item"><a name="fb_share" type="box_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div>
            <div class="share-item"><script src="http://www.stumbleupon.com/hostedbadge.php?s=5"></script></div>
            <div class="share-item"><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="<?php the_permalink(); ?>" data-counter="top"></script></div>
            <div class="share-item"><script type="text/javascript"> (function() { var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0]; s.type = 'text/javascript'; s.async = true; s.src = 'http://widgets.digg.com/buttons.js'; s1.parentNode.insertBefore(s, s1); })(); </script> <a class="DiggThisButton DiggMedium"></a></div>
        </div>
        <?php endif; ?>
        
    </div>

    <div class="clear"></div>

    <?php comments_template(); ?>
	<p class="warning">Radio Odzaci zadrzavaju pravo da ne objave komentare ili delove komentara koji sadrze uvrede, nepristojan govor, svaki oblik netolerancije ili stavove u kojima se propagira rasna, verska, nacionalna ili polna diskriminacija. Stavovi izneti u komentarima su licni stavovi autora komentara, a ne redakcije Radio Odzaka. Komentari u kojima ukazujete na slovne ili neke druge tehnicke greske u vezi objavljenog teksta ili slike bice prosledeni redakciji koja ce ih razmotriti, ali takvi komentari nece biti objavljeni. Unapred vam se zahvaljujemo na svim komentarima.</p>

</div> <!-- .single -->

<?php endwhile; // end of the loop. ?>
